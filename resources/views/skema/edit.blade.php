<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Skema</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-2xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-6">
        Edit Skema Sertifikasi
    </h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-5">

            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

        </div>
    @endif

    <form action="{{ route('skema.update', $skema) }}"
          method="POST"
          class="bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label>Kode Skema</label>

            <input type="text"
                   name="kode_skema"
                   value="{{ old('kode_skema', $skema->kode_skema) }}"
                   class="w-full border p-2 rounded">

        </div>

        <div class="mb-4">

            <label>Nama Skema</label>

            <input type="text"
                   name="nama_skema"
                   value="{{ old('nama_skema', $skema->nama_skema) }}"
                   class="w-full border p-2 rounded">

        </div>

        <div class="mb-4">

            <label>Deskripsi</label>

            <textarea name="deskripsi"
                      class="w-full border p-2 rounded">{{ old('deskripsi', $skema->deskripsi) }}</textarea>

        </div>

        <button
    type="submit"
    style="background-color: #2563eb; color: white; padding: 8px 20px; border-radius: 6px; border: none; cursor: pointer;">
    Simpan Perubahan
</button>

        <a href="{{ route('skema.index') }}"
   style="margin-left: 10px; color: #374151; text-decoration: none;">
    Kembali
</a>

    </form>

</div>

</body>
</html>