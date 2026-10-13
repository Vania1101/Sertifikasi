```php
<x-app-layout>
    <div style="background:#f8fafc; min-height:100vh; padding:30px;">
        <div style="max-width:700px; margin:auto; background:white; padding:30px; border-radius:12px;">

            <h1 style="font-size:26px; font-weight:bold; margin-bottom:20px;">
                Edit Profil
            </h1>

            @if (session('success'))
                <p style="color:green; margin-bottom:15px;">
                    {{ session('success') }}
                </p>
            @endif

            <form method="POST" action="{{ route('user.profile.update') }}">
                @csrf
                @method('PATCH')

                <div style="margin-bottom:15px;">
                    <label>Nama</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        required
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;"
                    >
                    @error('name')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom:20px;">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        required
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;"
                    >
                    @error('email')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    style="background:#2563eb; color:white; padding:10px 18px; border:none; border-radius:6px; cursor:pointer;"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('user.profile') }}"
                    style="margin-left:10px; color:#374151;"
                >
                    Kembali
                </a>
            </form>

        </div>
    </div>
</x-app-layout>
```