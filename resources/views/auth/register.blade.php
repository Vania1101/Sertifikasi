<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NISN -->
        <div>
            <x-input-label for="nisn" value="NISN" />

            <x-text-input
                id="nisn"
                class="block mt-1 w-full"
                type="text"
                name="nisn"
                :value="old('nisn')"
                required
                autofocus
                autocomplete="off"
            />

            <x-input-error
                :messages="$errors->get('nisn')"
                class="mt-2"
            />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                :value="__('Konfirmasi Password')"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between mt-4">
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