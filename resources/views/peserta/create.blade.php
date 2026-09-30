<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f3f4f6;">

<div style="max-width: 700px; margin: 40px auto;">

    <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
        Tambah Peserta
    </h1>

    @if($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 15px; margin-bottom: 20px; border-radius: 6px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peserta.store') }}" method="POST"
          style="background-color: white; padding: 25px; border-radius: 8px;">

        @csrf

        <!-- Nama -->
        <div style="margin-bottom: 15px;">
            <label>Nama Peserta</label>

            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <!-- NISN -->
        <div style="margin-bottom: 15px;">
            <label>NISN</label>

            <input
                type="text"
                name="nisn"
                value="{{ old('nisn') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <!-- Jenis Kelamin -->
        <div style="margin-bottom: 15px;">
            <label>Jenis Kelamin</label>

            <select
                name="jenis_kelamin"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>

                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>

            </select>
        </div>

        <!-- Email -->
        <div style="margin-bottom: 15px;">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <!-- No HP -->
        <div style="margin-bottom: 15px;">
            <label>No. HP</label>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <!-- Tanggal Lahir -->
        <div style="margin-bottom: 15px;">
            <label>Tanggal Lahir</label>

            <input
                type="date"
                name="tanggal_lahir"
                value="{{ old('tanggal_lahir') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <!-- Alamat -->
        <div style="margin-bottom: 15px;">
            <label>Alamat</label>

            <textarea
                name="alamat"
                rows="4"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>{{ old('alamat') }}</textarea>
        </div>

        <!-- Skema -->
        <div style="margin-bottom: 20px;">
            <label>Skema Sertifikasi</label>

            <select
                name="skema_sertifikasi_id"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>

                <option value="">-- Pilih Skema --</option>

                @foreach($skemas as $skema)
                    <option value="{{ $skema->id }}">
                        {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- Tombol -->
        <button
            type="submit"
            style="background-color: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">
            Simpan Peserta
        </button>

        <a
            href="{{ route('peserta.index') }}"
            style="margin-left: 10px; color: #374151; text-decoration: none;">
            Kembali
        </a>

    </form>

</div>

</body>
</html>