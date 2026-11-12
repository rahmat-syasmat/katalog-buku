
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku | BookSpace</title>
</head>
<body>

<h2>Tambah Buku Baru</h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <p>Judul Buku</p>
    <input type="text" name="title" value="{{ old('title') }}" required>

    <p>Penulis</p>
    <input type="text" name="author" value="{{ old('author') }}" required>

    <p>Kategori</p>
    <input type="text" name="category" value="{{ old('category') }}" required>

    <p>Tahun Terbit</p>
    <input type="number" name="year" value="{{ old('year') }}">

    <p>URL Gambar Cover</p>
    <input type="url" name="image" value="{{ old('image') }}">

    <p>Deskripsi</p>
    <textarea name="description">{{ old('description') }}</textarea>

    <p>Isi Buku (satu paragraf per baris)</p>
    <textarea name="content">{{ old('content') }}</textarea>

    <br><br>
    <button type="submit">Simpan Buku</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>

</body>
</html>
