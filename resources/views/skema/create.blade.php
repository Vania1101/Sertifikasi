<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Skema</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-2xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Skema Sertifikasi
    </h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-5">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skema.store') }}"
          method="POST"
          class="bg-white p-6 rounded shadow">

        @csrf

        <div class="mb-4">
            <label class="block mb-2">
                Kode Skema
            </label>

            <input type="text"
                   name="kode_skema"
                   value="{{ old('kode_skema') }}"
                   class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Nama Skema
            </label>

            <input type="text"
                   name="nama_skema"
                   value="{{ old('nama_skema') }}"
                   class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="4"
                      class="w-full border p-2 rounded">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button
    type="submit"
    style="background-color: #2563eb; color: white; padding: 8px 20px; border-radius: 6px; border: none; cursor: pointer;">
    Simpan
</button>

            <a href="{{ route('skema.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>
