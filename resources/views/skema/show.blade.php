<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Skema Sertifikasi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f3f4f6;">

    <div style="max-width: 900px; margin: 40px auto; padding: 20px;">

        <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
            Detail Skema Sertifikasi
        </h1>

        <div style="background-color: white; padding: 25px; border-radius: 10px;">

            <p style="margin-bottom: 15px;">
                <strong>Kode Skema:</strong>
                {{ $skema->kode_skema }}
            </p>

            <p style="margin-bottom: 15px;">
                <strong>Nama Skema:</strong>
                {{ $skema->nama_skema }}
            </p>

            <p style="margin-bottom: 25px;">
                <strong>Deskripsi:</strong>
                {{ $skema->deskripsi ?? '-' }}
            </p>

            <a href="{{ route('skema.index') }}"
               style="background-color: #6b7280; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                ← Kembali ke Skema
            </a>

            <a href="{{ route('dashboard') }}"
               style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; display: inline-block; margin-left: 8px;">
                Dashboard
            </a>

        </div>

        <div style="background-color: white; padding: 25px; border-radius: 10px; margin-top: 20px;">

            <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">
                Peserta yang Mengambil Skema
            </h2>

            @if($skema->peserta->count() > 0)

                <table style="width: 100%; border-collapse: collapse;">

                    <thead>
                        <tr style="background-color: #f3f4f6;">

                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">
                                No
                            </th>

                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">
                                Nama
                            </th>

                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">
                                NISN
                            </th>

                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">
                                Email
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach($skema->peserta as $index => $peserta)

                            <tr>

                                <td style="border: 1px solid #ddd; padding: 10px;">
                                    {{ $index + 1 }}
                                </td>

                                <td style="border: 1px solid #ddd; padding: 10px;">
                                    {{ $peserta->nama }}
                                </td>

                                <td style="border: 1px solid #ddd; padding: 10px;">
                                    {{ $peserta->nisn }}
                                </td>

                                <td style="border: 1px solid #ddd; padding: 10px;">
                                    {{ $peserta->email }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <p style="color: #6b7280;">
                    Belum ada peserta yang mengambil skema ini.
                </p>

            @endif

        </div>

    </div>

</body>
</html>