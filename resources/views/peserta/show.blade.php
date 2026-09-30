<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Peserta</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f3f4f6;">

<div style="max-width: 700px; margin: 40px auto;">

    <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
        Detail Peserta
    </h1>

    <div style="
        background-color: white;
        padding: 25px;
        border-radius: 8px;
    ">

        <p><strong>Nama:</strong> {{ $peserta->nama }}</p>

        <p><strong>NISN:</strong> {{ $peserta->nisn }}</p>

        <p><strong>Jenis Kelamin:</strong> {{ $peserta->jenis_kelamin }}</p>

        <p><strong>Email:</strong> {{ $peserta->email }}</p>

        <p><strong>No. HP:</strong> {{ $peserta->no_hp }}</p>

        <p><strong>Tanggal Lahir:</strong> {{ $peserta->tanggal_lahir }}</p>

        <p><strong>Alamat:</strong> {{ $peserta->alamat }}</p>

        <p>
            <strong>Skema Sertifikasi:</strong>
            {{ $peserta->skema->nama_skema ?? '-' }}
        </p>

        <div style="margin-top: 20px;">

    <a href="{{ route('peserta.edit', $peserta->id) }}"
       style="
           background-color: #d97706;
           color: white;
           padding: 10px 15px;
           border-radius: 6px;
           text-decoration: none;
       ">
        Edit
    </a>

    <a href="{{ route('peserta.index') }}"
       style="
           margin-left: 10px;
           background-color: #6b7280;
           color: white;
           padding: 10px 15px;
           border-radius: 6px;
           text-decoration: none;
       ">
        Kembali
    </a>

</div>


    </div>

</div>

</body>
</html>
