<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Peserta</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f3f4f6;">

<div style="max-width: 1200px; margin: 40px auto;">

    <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
        Data Peserta
    </h1>

    @if(session('success'))
        <div style="
            background-color: #dcfce7;
            color: #166534;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        ">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('peserta.create') }}"
       style="
           display: inline-block;
           background-color: #2563eb;
           color: white;
           padding: 10px 15px;
           border-radius: 6px;
           text-decoration: none;
           margin-bottom: 20px;
       ">
        + Tambah Peserta
    </a>

    <div style="
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        overflow-x: auto;
    ">

        <table style="width: 100%; border-collapse: collapse;">

            <thead>
                <tr style="background-color: #f3f4f6;">

                    <th style="padding: 12px;">No</th>
                    <th style="padding: 12px;">Nama</th>
                    <th style="padding: 12px;">NISN</th>
                    <th style="padding: 12px;">Jenis Kelamin</th>
                    <th style="padding: 12px;">Email</th>
                    <th style="padding: 12px;">Skema</th>
                    <th style="padding: 12px;">Aksi</th>

                </tr>
            </thead>

            <tbody>

                @forelse($pesertas as $peserta)

                    <tr>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $peserta->nama }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $peserta->nisn }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $peserta->jenis_kelamin }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $peserta->email }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">
                            {{ $peserta->skema->nama_skema ?? '-' }}
                        </td>

                        <td style="padding: 12px; border-bottom: 1px solid #eee;">

                            <a href="{{ route('peserta.show', $peserta->id) }}"
                               style="color: #2563eb; margin-right: 8px;">
                                Detail
                            </a>

                            <a href="{{ route('peserta.edit', $peserta->id) }}"
                               style="color: #d97706; margin-right: 8px;">
                                Edit
                            </a>

                            <form action="{{ route('peserta.destroy', $peserta->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus peserta ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="
                                            color: #dc2626;
                                            border: none;
                                            background: none;
                                            cursor: pointer;
                                        ">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7"
                            style="padding: 20px; text-align: center;">
                            Belum ada data peserta.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
