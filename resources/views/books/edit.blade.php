
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku | BookSpace</title>
</head>
<body>

<h2>Edit Buku</h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>Judul Buku</p>
    <input type="text" name="title"
        value="{{ old('title', $book->title) }}" required>

    <p>Penulis</p>
    <input type="text" name="author"
        value="{{ old('author', $book->author) }}" required>

    <p>Kategori</p>
    <input type="text" name="category"
        value="{{ old('category', $book->category) }}" required>

    <p>Tahun Terbit</p>
    <input type="number" name="year"
        value="{{ old('year', $book->year) }}">

    <p>URL Gambar Cover</p>
    <input type="url" name="image"
        value="{{ old('image', $book->image) }}">

    <p>Deskripsi</p>
    <textarea name="description">{{ old('description', $book->description) }}</textarea>

    <p>Isi Buku</p>
    <textarea name="content">{{ old('content', implode("\n", $book->content ?? [])) }}</textarea>

    <br><br>
    <button type="submit">Update Buku</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>

</body>
</html>
