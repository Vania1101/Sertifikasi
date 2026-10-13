<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f3f4f6;">

<div style="max-width: 700px; margin: 40px auto; padding: 0 15px;">

    <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
        Edit Peserta
    </h1>

    @if ($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 15px; margin-bottom: 20px; border-radius: 6px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peserta.update', ['peserta' => $peserta->id]) }}"
      method="POST"
      style="background-color: white; padding: 25px; border-radius: 8px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="nama">Nama Peserta</label>
            <input id="nama" type="text" name="nama"
                value="{{ old('nama', $peserta->nama) }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nisn">NISN</label>
            <input id="nisn" type="text" name="nisn"
                value="{{ old('nisn', $peserta->nisn) }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>

                <option value="">-- Pilih Jenis Kelamin --</option>

                <option value="Laki-laki"
                    {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="Perempuan"
                    {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                value="{{ old('email', $peserta->email) }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="no_hp">No. HP</label>
            <input id="no_hp" type="text" name="no_hp"
                value="{{ old('no_hp', $peserta->no_hp) }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input id="tanggal_lahir" type="date" name="tanggal_lahir"
                value="{{ old('tanggal_lahir', $peserta->tanggal_lahir ? \Illuminate\Support\Carbon::parse($peserta->tanggal_lahir)->format('Y-m-d') : '') }}"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>{{ old('alamat', $peserta->alamat) }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="skema_sertifikasi_id">Skema Sertifikasi</label>
            <select id="skema_sertifikasi_id" name="skema_sertifikasi_id"
                style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px;"
                required>

                <option value="">-- Pilih Skema --</option>

                @foreach ($skemas as $skema)
                    <option value="{{ $skema->id }}"
                        {{ old('skema_sertifikasi_id', $peserta->skema_sertifikasi_id) == $skema->id ? 'selected' : '' }}>
                        {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            style="background-color: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">
            Update Peserta
        </button>

        <a href="{{ route('peserta.index') }}"
            style="margin-left: 10px; color: #374151; text-decoration: none;">
            Kembali
        </a>

    </form>
</div>

</body>
</html>