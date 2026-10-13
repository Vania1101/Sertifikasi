
<x-app-layout>

    <style>
        .dashboard-wrapper {
            min-height: calc(100vh - 64px);
            background: #f8fafc;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: #ffffff;
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
            width: 100%;
            box-sizing: border-box;
            transition: 0.2s;
        }

        .menu-item:hover {
            background: #f3f4f6;
            color: #2563eb;
        }

        .menu-item.active {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        .logout-button {
            background: #ffffff;
            border: none;
            cursor: pointer;
            text-align: left;
        }

        /* MAIN */
        .dashboard-main {
            flex: 1;
            min-width: 0;
            padding: 25px 30px;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 15px;
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

        /* TITLE */
        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        /* WELCOME */
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
        }

        .welcome-card p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* PROFILE */
        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .profile-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 22px;
        }

        .profile-label {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .profile-value {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            overflow-wrap: anywhere;
        }

        /* BUTTON */
        .btn-primary {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .navigation-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 15px;
        }

        .navigation-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .navigation-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 22px;
            text-decoration: none;
            transition: 0.2s;
        }

        .navigation-card:hover {
            border-color: #93c5fd;
            transform: translateY(-2px);
        }

        .navigation-card h3 {
            margin: 0 0 7px;
            font-size: 16px;
            color: #111827;
        }

        .navigation-card p {
            margin: 0;
            color: #6b7280;
            font-size: 13px;
        }

        .navigation-link {
            margin-top: 15px;
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
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

            .dashboard-main {
                padding: 20px 16px;
            }

            .profile-grid,
            .navigation-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
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

            <div class="menu-title">Akun</div>

            <a href="{{ route('user.profile') }}"
               class="menu-item">
                <span class="menu-icon">👤</span>
                Detail Profil
            </a>

            <div class="menu-title">Keluar</div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="menu-item logout-button">
                    <span class="menu-icon">↪</span>
                    Logout
                </button>
            </form>

        </aside>

        <!-- MAIN -->
        <main class="dashboard-main">

            <!-- TOPBAR -->
            <div class="topbar">
                <div class="user-circle">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>

            <!-- TITLE -->
            <div class="page-title">
                Dashboard User
            </div>

            <!-- WELCOME -->
            <div class="welcome-card">
                <h2>
                    Selamat Datang, {{ Auth::user()->name }}!
                </h2>

                <p>
                    Selamat datang di Sistem Informasi Sertifikasi
                    Kompetensi.
                </p>
            </div>

            <!-- PROFILE -->
            <div class="profile-grid">

                <div class="profile-card">
                    <div class="profile-label">Nama Lengkap</div>

                    <div class="profile-value">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <div class="profile-card">
                    <div class="profile-label">Email</div>

                    <div class="profile-value">
                        {{ Auth::user()->email }}
                    </div>
                </div>

            </div>

            <!-- NAVIGASI -->
            <div class="navigation-title">
                Pengaturan Akun
            </div>

            <div class="navigation-grid">

                <a href="{{ route('user.profile') }}"
                   class="navigation-card">

                    <h3>Detail Profil</h3>

                    <p>
                        Lihat informasi nama dan email
                        akun yang kamu gunakan.
                    </p>

                    <div class="navigation-link">
                        Lihat Profil →
                    </div>

                </a>

        </main>

    </div>

</x-app-layout>
