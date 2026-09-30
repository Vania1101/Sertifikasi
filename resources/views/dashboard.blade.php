<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Welcome -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">
                            Selamat Datang, {{ Auth::user()->name }}! 👋
                        </h1>

                        <p class="text-gray-500 mt-1">
                            Sistem Informasi Sertifikasi Kompetensi
                        </p>
                    </div>

                    <div class="text-5xl">
                        📋
                    </div>

                </div>

            </div>


            <!-- Statistik + Menu -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Total Peserta -->
                <div class="bg-white rounded-xl shadow-sm p-6">

                    <p class="text-gray-500 text-sm">
                        Total Peserta
                    </p>

                    <div class="flex items-center justify-between mt-2">

                        <p class="text-3xl font-bold text-gray-800">
                            {{ $totalPeserta }}
                        </p>

                        <div class="bg-blue-100 rounded-full p-3">
                            👤
                        </div>

                    </div>

                </div>


                <!-- Total Skema -->
                <div class="bg-white rounded-xl shadow-sm p-6">

                    <p class="text-gray-500 text-sm">
                        Total Skema
                    </p>

                    <div class="flex items-center justify-between mt-2">

                        <p class="text-3xl font-bold text-gray-800">
                            {{ $totalSkema }}
                        </p>

                        <div class="bg-green-100 rounded-full p-3">
                            📋
                        </div>

                    </div>

                </div>


                <!-- Data Peserta -->
                <a href="{{ route('peserta.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-sm p-6 transition">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="font-bold text-lg">
                                Data Peserta
                            </p>

                            <p class="text-sm mt-1 opacity-90">
                                Kelola peserta
                            </p>
                        </div>

                        <span class="text-3xl">
                            →
                        </span>

                    </div>

                </a>


                <!-- Skema Sertifikasi -->
                <a href="{{ route('skema.index') }}"
                   class="bg-green-600 hover:bg-green-700 text-white rounded-xl shadow-sm p-6 transition">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="font-bold text-lg">
                                Skema Sertifikasi
                            </p>

                            <p class="text-sm mt-1 opacity-90">
                                Kelola skema
                            </p>
                        </div>

                        <span class="text-3xl">
                            →
                        </span>

                    </div>

                </a>

            </div>

        </div>
    </div>

</x-app-layout>