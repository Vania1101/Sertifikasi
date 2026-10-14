
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-gray-800">
            Registrasi Peserta
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Lengkapi data diri untuk membuat akun sertifikasi.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="nama" value="Nama Lengkap" />
            <x-text-input
                id="nama"
                class="block mt-1 w-full"
                type="text"
                name="nama"
                :value="old('nama')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            <p class="mt-1 text-xs text-gray-500">
                Nama harus menggunakan huruf.
            </p>
        </div>

        <!-- NISN -->
        <div class="mt-4">
            <x-input-label for="nisn" value="NISN" />
            <x-text-input
                id="nisn"
                class="block mt-1 w-full"
                type="text"
                name="nisn"
                :value="old('nisn')"
                required
                maxlength="10"
                autocomplete="off"
            />
            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
            <select
                id="jenis_kelamin"
                name="jenis_kelamin"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>
                    Laki-laki
                </option>
                <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>
                    Perempuan
                </option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomor HP -->
        <div class="mt-4">
            <x-input-label for="no_hp" value="Nomor HP" />
            <x-text-input
                id="no_hp"
                class="block mt-1 w-full"
                type="tel"
                name="no_hp"
                :value="old('no_hp')"
                required
                maxlength="20"
                autocomplete="tel"
            />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tanggal_lahir" value="Tanggal Lahir" />
            <x-text-input
                id="tanggal_lahir"
                class="block mt-1 w-full"
                type="date"
                name="tanggal_lahir"
                :value="old('tanggal_lahir')"
                required
                max="{{ date('Y-m-d') }}"
            />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" value="Alamat Lengkap" />
            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                required
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Masukkan alamat lengkap"
            >{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Skema Sertifikasi -->
        <div class="mt-4">
            <x-input-label for="skema_sertifikasi_id" value="Skema Sertifikasi" />
            <select
                id="skema_sertifikasi_id"
                name="skema_sertifikasi_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">-- Pilih Skema Sertifikasi --</option>

                @foreach ($skemas as $skema)
                    <option
                        value="{{ $skema->id }}"
                        @selected(old('skema_sertifikasi_id') == $skema->id)
                    >
                        {{ $skema->nama_skema }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('skema_sertifikasi_id')" class="mt-2" />

            @if ($skemas->isEmpty())
                <p class="mt-2 text-sm text-red-600">
                    Belum ada skema sertifikasi. Silakan hubungi admin.
                </p>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                minlength="8"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <p class="mt-1 text-xs text-gray-500">
                Password minimal 8 karakter.
            </p>
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                value="Konfirmasi Password"
            />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                minlength="8"
                autocomplete="new-password"
            />
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between mt-6">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                Sudah punya akun?
            </a>

            <x-primary-button>
                Daftar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
