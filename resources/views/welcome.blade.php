
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Sistem Informasi Sertifikasi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            background: #ffffff;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
            color: #334155;
        }

        nav a {
            text-decoration: none;
            color: #475569;
            font-size: 14px;
            margin-left: 20px;
        }

        .hero {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .content {
            max-width: 650px;
        }

        h1 {
            font-size: 34px;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 16px;
            color: #1e293b;
        }

        h1 span {
            color: #475569;
        }

        .description {
            color: #64748b;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .btn {
            display: inline-block;
            padding: 11px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            margin: 5px;
        }

        .btn-primary {
            background: #475569;
            color: white;
        }

        .btn-primary:hover {
            background: #334155;
        }

        .btn-secondary {
            background: white;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
        }

        footer {
            text-align: center;
            padding: 18px;
            font-size: 13px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            background: white;
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 27px;
            }

            nav {
                padding: 18px 5%;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">Sistem Informasi Sertifikasi</div>
    </nav>

    <main class="hero">
        <div class="content">

            <h1>
                Selamat Datang di<br>
                <span>Sistem Informasi Sertifikasi</span>
            </h1>

            <p class="description">
                Sistem untuk membantu pengelolaan data peserta
                dan skema sertifikasi secara mudah dan terorganisir.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-secondary">
                Register
            </a>

        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Informasi Sertifikasi
    </footer>

</body>
</html>