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

        /* MAIN */
        .dashboard-main {
            flex: 1;
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

        .search-box {
            width: 230px;
            padding: 9px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            background: white;
            font-size: 13px;
            outline: none;
        }

        .user-circle {
            width: 36px;
            height: 36px;
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

        /* STATISTIK */
        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 22px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 700;
            color: #111827;
            margin-top: 8px;
        }

        /* NAVIGASI */
        .navigation-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 15px;
        }

        .navigation-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
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
            .sidebar {
                width: 200px;
            }

            .stats,
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


            <div class="menu-title">
                Menu Utama
            </div>

            <a href="{{ route('dashboard') }}"
               class="menu-item active">

                <span class="menu-icon">⌂</span>
                Dashboard

            </a>


            <div class="menu-title">
                Data Sertifikasi
            </div>

            <a href="{{ route('peserta.index') }}"
               class="menu-item">

                <span class="menu-icon">👤</span>
                Data Peserta

            </a>


            <a href="{{ route('skema.index') }}"
               class="menu-item">

                <span class="menu-icon">▣</span>
                Skema Sertifikasi

            </a>


            <div class="menu-title">
                Akun
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="menu-item"
                        style="width:100%; border:none; background:white; cursor:pointer; text-align:left;">

                    <span class="menu-icon">↪</span>
                    Logout

                </button>
            </form>

        </aside>


        <!-- MAIN -->
        <main class="dashboard-main">

            <!-- TOPBAR -->
            <div class="topbar">

                <form action="{{ route('peserta.index') }}" method="GET">
    <input
        type="text"
        name="search"
        class="search-box"
        placeholder="Search"
        value="{{ request('search') }}"
    >
</form>

                <div class="user-circle">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

            </div>


            <!-- TITLE -->
            <div class="page-title">
                Dashboard
            </div>


            <!-- WELCOME -->
            <div class="welcome-card">

                <h2>
                    Selamat Datang, {{ Auth::user()->name }}
                </h2>

                <p>
                    Aplikasi Pengelolaan Data Peserta Sertifikasi
                </p>

            </div>


            <!-- STATISTIK -->
            <div class="stats">

                <div class="stat-card">

                    <div class="stat-label">
                        Total Peserta
                    </div>

                    <div class="stat-number">
                        {{ $totalPeserta }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-label">
                        Total Skema Sertifikasi
                    </div>

                    <div class="stat-number">
                        {{ $totalSkema }}
                    </div>

                </div>

            </div>


            <!-- NAVIGASI -->
            <div class="navigation-title">
                Navigasi Aplikasi
            </div>


            <div class="navigation-grid">

                <!-- PESERTA -->
                <a href="{{ route('peserta.index') }}"
                   class="navigation-card">

                    <h3>
                        Data Peserta
                    </h3>

                    <p>
                        Tambah, tampil, ubah, hapus,
                        detail, dan cari data peserta.
                    </p>

                    <div class="navigation-link">
                        Kelola Data Peserta →
                    </div>

                </a>


                <!-- SKEMA -->
                <a href="{{ route('skema.index') }}"
                   class="navigation-card">

                    <h3>
                        Skema Sertifikasi
                    </h3>

                    <p>
                        Tambah, tampil, ubah, dan hapus
                        data skema sertifikasi.
                    </p>

                    <div class="navigation-link">
                        Kelola Skema →
                    </div>

                </a>

            </div>

        </main>

    </div>

</x-app-layout>