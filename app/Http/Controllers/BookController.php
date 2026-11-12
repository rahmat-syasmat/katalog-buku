<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    // Menampilkan katalog buku
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('author', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $books = $query->latest()->get();

        $categories = book::select('category')
            ->distinct()
            ->pluck('category');

        return view('books.index', compact('books', 'categories'));
    }

    // Detail buku
    public function show($id)
    {
        $book = book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    // Form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'year' => 'nullable|integer|min:1000|max:9999',
            'image' => 'nullable|url|max:2048',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $validated['content'] = !empty($validated['content'])
            ? preg_split('/\r\n|\r|\n/', trim($validated['content']))
            : [];

        book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    // Form edit buku
    public function edit($id)
    {
        $book = book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    // Update buku
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'year' => 'nullable|integer|min:1000|max:9999',
            'image' => 'nullable|url|max:2048',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $validated['content'] = !empty($validated['content'])
            ? preg_split('/\r\n|\r|\n/', trim($validated['content']))
            : [];

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    // Hapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
