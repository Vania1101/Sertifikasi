<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skema Sertifikasi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto py-10 px-6">

        <div class="bg-white rounded-lg shadow p-6">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Data Skema Sertifikasi
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Kelola data skema sertifikasi.
                    </p>
                </div>

                <a href="{{ route('skema.create') }}"
   style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none;">
    + Tambah Skema
</a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-3 text-left">
                                No
                            </th>

                            <th class="border px-4 py-3 text-left">
                                Kode Skema
                            </th>

                            <th class="border px-4 py-3 text-left">
                                Nama Skema
                            </th>

                            <th class="border px-4 py-3 text-left">
                                Deskripsi
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($skemas as $skema)

                            <tr class="hover:bg-gray-50">

                                <td class="border px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ $skema->kode_skema }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ $skema->nama_skema }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ $skema->deskripsi ?? '-' }}
                                </td>

                                <td class="border px-4 py-3">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('skema.show', $skema->id) }}"
                                           class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">
                                            Detail
                                        </a>

                                        <a href="{{ route('skema.edit', $skema->id) }}"
   style="background-color: #f59e0b; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none;">
    Edit
</a>

                                        <form action="{{ route('skema.destroy', $skema->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus skema ini?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5"
                                    class="border px-4 py-6 text-center text-gray-500">
                                    Belum ada data skema sertifikasi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>