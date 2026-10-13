<x-app-layout>
    <style>
        .dashboard-wrapper {
            min-height: calc(100vh - 64px);
            background: #f8fafc;
            display: flex;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 20px 14px;
        }

        .sidebar-logo {
            padding: 10px 14px 25px;
            font-size: 17px;
            font-weight: 700;
            color: #111827;
        }

        .menu-title {
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            margin: 20px 12px 8px;
            text-transform: uppercase;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 13px;
            margin-bottom: 4px;
            border-radius: 7px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu-item.active {
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        .dashboard-main {
            flex: 1;
            min-width: 0;
            padding: 25px 30px;
        }

        .topbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 25px;
        }

        .user-circle {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #111827;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        .welcome-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .welcome-card h2 {
            margin: 0 0 7px;
            font-size: 19px;
            color: #111827;
            font-weight: 600;
        }

        .welcome-card p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 15px;
        }

        .profile-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .profile-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }

        .profile-header p {
            margin: 5px 0 0;
            font-size: 13px;
            color: #6b7280;
        }

        .edit-button {
            display: inline-block;
            padding: 9px 15px;
            background: #2563eb;
            color: white;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .edit-button:hover {
            background: #1d4ed8;
        }

        .profile-body {
            padding: 8px 24px 20px;
        }

        .profile-row {
            display: grid;
            grid-template-columns: 180px minmax(0, 1fr);
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .profile-label {
            color: #6b7280;
        }

        .profile-value {
            color: #111827;
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .success-message {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .logout-area {
            margin-top: 25px;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            background: white;
            color: #4b5563;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #f3f4f6;
        }

        @media (max-width: 700px) {
            .dashboard-wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: auto;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
            }

            .sidebar-logo {
                padding-bottom: 12px;
            }

            .menu-title {
                margin-top: 12px;
            }

            .dashboard-main {
                padding: 20px 15px;
            }

            .profile-row {
                grid-template-columns: 1fr;
                gap: 6px;
            }

            .profile-header {
                align-items: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>

    <div class="dashboard-wrapper">

        {{-- SIDEBAR --}}
        <aside class="sidebar">
            <div class="sidebar-logo">
                Sertifikasi Kompetensi
            </div>

            <div class="menu-title">Menu Utama</div>

            <a href="{{ route('user.dashboard') }}"
               class="menu-item active">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

            <div class="menu-title">Data Saya</div>

            <a href="{{ route('user.profile.edit') }}"
               class="menu-item">
                <span class="menu-icon">👤</span>
                Data Diri
            </a>
        </aside>

        {{-- KONTEN --}}
        <main class="dashboard-main">

            <div class="topbar">
                <div class="user-circle">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>

            <div class="page-title">Dashboard</div>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="welcome-card">
                <h2>
                    Selamat Datang, {{ Auth::user()->name }}
                </h2>
                <p>
                    Berikut adalah informasi data diri kamu
                    dalam Sistem Informasi Sertifikasi.
                </p>
            </div>

            <div class="section-title">Data Diri Saya</div>

            <div class="profile-card">
                <div class="profile-header">
                    <div>
                        <h3>Informasi Peserta</h3>
                        <p>Periksa data diri kamu di bawah ini.</p>
                    </div>

                    <a href="{{ route('user.profile.edit') }}"
                       class="edit-button">
                        ✎ Edit Data Diri
                    </a>
                </div>

                <div class="profile-body">

                    <div class="profile-row">
                        <div class="profile-label">Nama Lengkap</div>
                        <div class="profile-value">
                            {{ $peserta->nama }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">NISN</div>
                        <div class="profile-value">
                            {{ $peserta->nisn }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Jenis Kelamin</div>
                        <div class="profile-value">
                            {{ $peserta->jenis_kelamin }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Email</div>
                        <div class="profile-value">
                            {{ $peserta->email }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Nomor HP</div>
                        <div class="profile-value">
                            {{ $peserta->no_hp }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Tanggal Lahir</div>
                        <div class="profile-value">
                            {{ $peserta->tanggal_lahir
                                ? \Illuminate\Support\Carbon::parse($peserta->tanggal_lahir)->format('d-m-Y')
                                : '-' }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Alamat</div>
                        <div class="profile-value">
                            {{ $peserta->alamat }}
                        </div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label">Skema Sertifikasi</div>
                        <div class="profile-value">
                            {{ $peserta->skema->nama_skema ?? 'Belum ada skema' }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        ↪ Logout
                    </button>
                </form>
            </div>

        </main>
    </div>
</x-app-layout>