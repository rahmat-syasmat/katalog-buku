<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();

        $totalKategori = Book::distinct('category')
            ->count('category');

        $bukuTerbaru = Book::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalKategori',
            'bukuTerbaru'
        ));
    }
}
