
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Katalog Buku | BookSpace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        body {
            background: #f8f7f4;
            font-family: 'Poppins', sans-serif;
            color: #292929;
        }

        .navbar {
            background: #292b35;
            padding: 18px 0;
        }

        .brand {
            font-size: 24px;
            font-weight: 800;
            color: #f6c177 !important;
        }

        .hero {
            background: linear-gradient(135deg, #292b35, #49465c);
            color: white;
            padding: 65px 25px;
            border-radius: 0 0 35px 35px;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 800;
        }

        .hero span {
            color: #f6c177;
        }

        .search-box {
            max-width: 600px;
            margin: 30px auto 0;
        }

        .search-box input {
            border-radius: 30px;
            padding: 15px 22px;
        }

        .section-title {
            font-weight: 700;
        }

        .category-btn {
            border-radius: 25px;
            margin: 5px;
        }

        .book-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: white;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 20px #00000008;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px #00000015;
        }

        .book-cover {
            width: 100%;
            height: 290px;
            object-fit: cover;
        }

        .book-title {
            font-size: 17px;
            font-weight: 700;
        }

        .category-label {
            color: #a36a29;
            background: #fff1dc;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .read-btn {
            background: #292b35;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 10px;
        }

        .read-btn:hover {
            background: #f6c177;
            color: #292b35;
        }

        .admin-actions {
            display: flex;
            gap: 8px;
            margin-top: 12px;
        }

        .admin-actions a,
        .admin-actions button {
            flex: 1;
            text-align: center;
            padding: 8px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            color: white;
            font-size: 13px;
        }

        .edit-btn {
            background: #2563eb;
        }

        .delete-btn {
            background: #dc2626;
        }

        footer {
            background: #292b35;
            color: white;
            margin-top: 80px;
            padding: 30px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a href="{{ route('books.index') }}" class="navbar-brand brand">
            📚 BookSpace
        </a>

        <span class="text-white">
            Katalog Buku Digital
        </span>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">

        <h1>Temukan Cerita <span>Favoritmu</span></h1>

        <p class="mt-3">
            NAMA: RAHMAT NIM: 2511032
        </p>

        <p class="mt-3">
            Jelajahi dunia melalui buku dan temukan inspirasi baru.
        </p>

        <form action="{{ route('books.index') }}"
              method="GET"
              class="search-box">

            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari judul, penulis, atau kategori..."
                       value="{{ request('search') }}">

                <button class="btn btn-warning px-4">
                    Cari
                </button>

            </div>
        </form>
    </div>
</section>

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-4">

        <h3 class="section-title">
            📖 Jelajahi Buku
        </h3>

        <p class="text-muted">
            Pilih buku yang ingin kamu baca.
        </p>

        <a href="{{ route('books.index') }}"
           class="btn btn-sm btn-outline-dark category-btn">
            Semua Buku
        </a>

        @foreach($categories as $category)

            <a href="{{ route('books.index', ['category' => $category]) }}"
               class="btn btn-sm btn-outline-dark category-btn">
                {{ $category }}
            </a>

        @endforeach

        <div class="mt-4">
            <a href="{{ route('books.create') }}"
               class="btn btn-success">
                + Tambah Buku
            </a>
        </div>

    </div>

    <div class="row g-4">

        @forelse($books as $book)

            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="card book-card">

                    
<img
    src="{{ $book->image }}"
    alt="{{ $book->title }}"
    style="width: 150px; height: 210px; object-fit: cover;"
    onerror="this.src='https://placehold.co/150x210?text=No+Cover'"
>

                    <div class="card-body">

                        <span class="category-label">
                            {{ $book->category }}
                        </span>

                        <h5 class="book-title mt-3">
                            {{ $book->title }}
                        </h5>

                        <p class="text-muted small">
                            ✍️ {{ $book->author }}
                        </p>

                        <p class="small">
                            {{ $book->description }}
                        </p>

                        <a href="{{ route('books.show', $book->id) }}"
                           class="btn read-btn w-100">
                            Baca Selengkapnya →
                        </a>

                        <!-- Tombol Edit dan Hapus -->
                        <div class="admin-actions">

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="edit-btn">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('books.destroy', $book->id) }}"
                                  method="POST"
                                  style="flex:1"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-btn w-100">
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        @empty

            <div class="col-12 text-center py-5">

                <h4>Buku tidak ditemukan 📚</h4>

                <p>Coba cari dengan judul atau kategori lain.</p>

                <a href="{{ route('books.index') }}"
                   class="btn btn-dark">
                    Kembali
                </a>

            </div>

        @endforelse

    </div>
</div>

<footer class="text-center">

    <h5>📚 BookSpace</h5>

    <p class="mb-0">
        Temukan inspirasi dalam setiap halaman.
    </p>

    <small>© 2026 BookSpace | Katalog Buku Digital</small>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
