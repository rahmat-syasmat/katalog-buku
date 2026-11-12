
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $book['title'] }} | BookSpace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
          rel="stylesheet">

    <style>
        body {
            background: #f8f7f4;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: #292b35;
            padding: 18px;
        }

        .reader {
            max-width: 850px;
            margin: 50px auto;
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 5px 25px #00000010;
        }

        .reader h1 {
            font-weight: 700;
            color: #292b35;
        }

        .reader-content {
            font-family: Georgia, serif;
            font-size: 19px;
            line-height: 2;
            color: #444;
            text-align: justify;
        }

        .reader-content p {
            text-indent: 35px;
            margin-bottom: 25px;
        }

        .book-image {
            width: 170px;
            border-radius: 12px;
        }

        footer {
            background: #292b35;
            color: white;
            padding: 25px;
            text-align: center;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container">

        <a href="/" class="navbar-brand fw-bold">
            📚 BookSpace
        </a>

        <a href="/" class="btn btn-outline-light">
            Kembali ke Katalog
        </a>

    </div>
</nav>

<div class="container">

    <div class="reader">

        <div class="text-center mb-4">

            <img src="{{ $book['image'] }}"
                 class="book-image mb-4"
                 alt="{{ $book['title'] }}">

            <h1>{{ $book['title'] }}</h1>

            <p class="text-muted">
                Penulis: {{ $book['author'] }}
            </p>

            <span class="badge bg-warning text-dark">
                {{ $book['category'] }}
            </span>

            <p class="mt-3">
                {{ $book['description'] }}
            </p>

        </div>

        <hr>

        <h4 class="text-center mb-4">
            Isi Buku
        </h4>

        <div class="reader-content">

            @foreach($book['content'] as $paragraph)

                <p>{{ $paragraph }}</p>

            @endforeach

        </div>

        <hr>

        <div class="text-center mt-4">

            <a href="/" class="btn btn-dark">
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</div>

<footer>
    © 2026 BookSpace - Katalog Buku Digital
</footer>

</body>
</html>
