
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil | SertifikasiKu</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px #0f172a0a;
        }

        h1 {
            margin-top: 0;
            font-size: 26px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 18px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 25px;
        }

        .avatar {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 50%;
            font-size: 27px;
            font-weight: bold;
        }

        .profile-header h2 {
            margin: 0 0 8px;
            font-size: 20px;
        }

        .profile-header p {
            margin: 0;
            color: #64748b;
            overflow-wrap: anywhere;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .field p {
            margin: 0;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .primary {
            background: #2563eb;
            color: white;
        }

        .secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">

            <h1>Detail Profil</h1>
            <p class="subtitle">Informasi akun pengguna kamu.</p>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="profile-header">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div class="field">
                <label>Nama Lengkap</label>
                <p>{{ auth()->user()->name }}</p>
            </div>

            <div class="field">
                <label>Alamat Email</label>
                <p>{{ auth()->user()->email }}</p>
            </div>

            <div class="field">
                <label>Status Akun</label>
                <p>Pengguna Terdaftar</p>
            </div>

            <div class="actions">
                <a href="{{ route('user.dashboard') }}"
                   class="btn secondary">
                    ← Kembali
                </a>

                <a href="{{ route('user.profile.edit') }}"
                   class="btn primary">
                    Edit Profil
                </a>
            </div>

        </div>
    </div>
</body>
</html>
