
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin | BookSpace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #292b35, #49465c);
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 15px 40px #00000030;
        }

        .brand {
            color: #292b35;
            font-size: 29px;
            font-weight: 800;
        }

        .brand span {
            color: #e8a94e;
        }

        .form-control {
            padding: 13px;
            border-radius: 10px;
        }

        .login-btn {
            background: #292b35;
            color: white;
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
        }

        .login-btn:hover {
            background: #f6c177;
            color: #292b35;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">

        <div class="brand">📚 Book<span>Space</span></div>

        <h4 class="fw-bold mt-4">Login Admin</h4>

        <p class="text-muted">
            Silakan masuk untuk mengelola katalog buku.
        </p>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Email Admin</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email admin"
                   value="{{ old('email') }}"
                   autocomplete="username"
                   required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   autocomplete="current-password"
                   required>
        </div>

        <button type="submit" class="login-btn">
            Login Sekarang
        </button>

    </form>

    <div class="text-center mt-4">
        <a href="{{ route('books.index') }}"
           class="text-decoration-none text-muted small">
            ← Kembali ke Katalog
        </a>
    </div>

</div>

</body>
</html>
