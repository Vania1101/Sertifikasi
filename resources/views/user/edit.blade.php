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
            margin-bottom: 25px;
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

        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 7px;
        }

        .page-description {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-card {
            max-width: 950px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        .form-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-header h2 {
            font-size: 17px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px;
        }

        .form-header p {
            font-size: 13px;
            color: #6b7280;
            margin: 0;
        }

        .form-body {
            padding: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            display: block;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            padding: 11px 12px;
            font-family: inherit;
            font-size: 14px;
            color: #111827;
            background: white;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .form-input[readonly] {
            background: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-hint {
            margin-top: 6px;
            font-size: 12px;
            color: #9ca3af;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px;
            padding: 18px 25px;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 17px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-cancel {
            background: white;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #f3f4f6;
        }

        .btn-save {
            background: #2563eb;
            border: 1px solid #2563eb;
            color: white;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-body {
                padding: 20px 16px;
            }

            .form-footer {
                padding: 16px;
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
               class="menu-item">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>

            <div class="menu-title">Data Saya</div>

            <a href="{{ route('user.profile.edit') }}"
               class="menu-item active">
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

            <div class="page-title">Edit Data Diri</div>

            <div class="page-description">
                Perbarui informasi pribadi kamu pada formulir berikut.
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Data belum bisa disimpan.</strong>
                    <ul style="margin: 8px 0 0 18px; list-style: disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-card">

                <div class="form-header">
                    <h2>Informasi Peserta</h2>
                    <p>
                        Pastikan informasi yang kamu masukkan sudah benar.
                    </p>
                </div>

                <form method="POST"
                      action="{{ route('user.profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-body">
                        <div class="form-grid">

                            {{-- NAMA --}}
                            <div class="form-group">
                                <label class="form-label" for="nama">
                                    Nama Lengkap
                                </label>

                                <input
                                    class="form-input"
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama', $peserta->nama) }}"
                                    required
                                >

                                @error('nama')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- NISN --}}
                            <div class="form-group">
                                <label class="form-label" for="nisn">
                                    NISN
                                </label>

                                <input
                                    class="form-input"
                                    type="text"
                                    id="nisn"
                                    value="{{ $peserta->nisn }}"
                                    readonly
                                >

                                <div class="form-hint">
                                    NISN tidak dapat diubah.
                                </div>
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group">
                                <label class="form-label" for="email">
                                    Email
                                </label>

                                <input
                                    class="form-input"
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $peserta->email) }}"
                                    required
                                >

                                @error('email')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="form-group">
                                <label class="form-label" for="jenis_kelamin">
                                    Jenis Kelamin
                                </label>

                                <select
                                    class="form-select"
                                    id="jenis_kelamin"
                                    name="jenis_kelamin"
                                    required
                                >
                                    <option value="">Pilih jenis kelamin</option>

                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>

                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>

                                @error('jenis_kelamin')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- NOMOR HP --}}
                            <div class="form-group">
                                <label class="form-label" for="no_hp">
                                    Nomor HP
                                </label>

                                <input
                                    class="form-input"
                                    type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    value="{{ old('no_hp', $peserta->no_hp) }}"
                                    required
                                >

                                @error('no_hp')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- TANGGAL LAHIR --}}
                            <div class="form-group">
                                <label class="form-label" for="tanggal_lahir">
                                    Tanggal Lahir
                                </label>

                                <input
                                    class="form-input"
                                    type="date"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $peserta->tanggal_lahir ? \Illuminate\Support\Carbon::parse($peserta->tanggal_lahir)->format('Y-m-d') : '') }}"
                                    required
                                >

                                @error('tanggal_lahir')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ALAMAT --}}
                            <div class="form-group full">
                                <label class="form-label" for="alamat">
                                    Alamat Lengkap
                                </label>

                                <textarea
                                    class="form-textarea"
                                    id="alamat"
                                    name="alamat"
                                    required
                                >{{ old('alamat', $peserta->alamat) }}</textarea>

                                @error('alamat')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-footer">
                        <a href="{{ route('user.dashboard') }}"
                           class="btn btn-cancel">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-save">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>

        </main>
    </div>
</x-app-layout>