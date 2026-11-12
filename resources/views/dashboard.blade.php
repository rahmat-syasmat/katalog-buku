
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Admin | BookSpace</title>

    <form action="{{ route('logout') }}" method="POST">
    @csrf

    <button type="submit" class="btn btn-danger">
        Logout
    </button>
</form>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        body {
            background: #f8f7f4;
            font-family: 'Poppins', sans-serif;
            color: #292b35;
        }

        .sidebar {
            background: #292b35;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .brand {
            color: #f6c177;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 13px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #49465c;
            color: #f6c177;
        }

        .main {
            padding: 35px;
        }

        .stat-card {
            background: white;
            border: none;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 20px #00000008;
            height: 100%;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
        }

        .stat-icon {
            font-size: 30px;
        }

        .table-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 20px #00000008;
        }

        .btn-add {
            background: #292b35;
            color: white;
            border-radius: 10px;
            padding: 10px 18px;
        }

        .btn-add:hover {
            background: #f6c177;
            color: #292b35;
        }

        .cover {
            width: 45px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        @media(max-width: 767px) {
            .sidebar {
                min-height: auto;
            }

            .main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-md-3 col-lg-2 sidebar">

            <div class="brand">📚 BookSpace</div>

            <a href="{{ route('dashboard') }}" class="active">
                🏠 Dashboard
            </a>

            <a href="{{ route('books.index') }}">
                📖 Kelola Buku
            </a>

            <a href="{{ route('books.create') }}">
                ➕ Tambah Buku
            </a>

            <a href="{{ route('books.index') }}">
                🌐 Lihat Katalog
            </a>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="col-md-9 col-lg-10 main">

            <div class="d-flex justify-content-between
                        align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h2 class="fw-bold">Dashboard Admin</h2>
                    <p class="text-muted mb-0">
                        Selamat datang di pengelolaan BookSpace.
                    </p>
                </div>

                <a href="{{ route('books.create') }}"
                   class="btn btn-add">
                    + Tambah Buku
                </a>

            </div>

            <!-- STATISTIK -->
            <div class="row g-4 mb-4">

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-2">
                                    Total Buku
                                </p>

                                <div class="stat-number">
                                    {{ $totalBuku }}
                                </div>
                            </div>

                            <div class="stat-icon">📚</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-2">
                                    Total Kategori
                                </p>

                                <div class="stat-number">
                                    {{ $totalKategori }}
                                </div>
                            </div>

                            <div class="stat-icon">📂</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-2">
                                    Status Website
                                </p>

                                <div class="fs-4 fw-bold text-success">
                                    Aktif
                                </div>
                            </div>

                            <div class="stat-icon">🌐</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- DAFTAR BUKU -->
            <div class="table-card">

                <div class="d-flex justify-content-between
                            align-items-center flex-wrap gap-3 mb-4">

                    <h5 class="fw-bold mb-0">
                        📖 Buku Terbaru
                    </h5>

                    <a href="{{ route('books.index') }}"
                       class="btn btn-outline-dark btn-sm">
                        Lihat Semua
                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($bukuTerbaru as $buku)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if($buku->image)
                                        <img src="{{ $buku->image }}"
                                             class="cover"
                                             alt="Cover buku">
                                    @else
                                        📚
                                    @endif
                                </td>

                                <td>{{ $buku->title }}</td>

                                <td>{{ $buku->author }}</td>

                                <td>
                                    <span class="badge bg-warning text-dark">
                                        {{ $buku->category }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('books.edit', $buku->id) }}"
                                       class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center py-4 text-muted">
                                    Belum ada buku.
                                    Silakan tambahkan buku pertama.
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

            <footer class="text-center text-muted mt-5">
                © 2026 BookSpace | Admin Dashboard
            </footer>

        </main>

    </div>
</div>

</body>
</html>
