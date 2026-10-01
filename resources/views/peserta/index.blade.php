<x-app-layout>

    <div style="
        background-color: #f3f4f6;
        min-height: 100vh;
        padding: 40px;
    ">

        <div style="
            max-width: 1100px;
            margin: auto;
        ">

            <!-- HEADER -->
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 25px;
            ">

                <div>
                    <h1 style="
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        color: #111827;
                    ">
                        Data Peserta
                    </h1>

                    <p style="
                        margin-top: 5px;
                        color: #6b7280;
                    ">
                        Daftar peserta sertifikasi
                    </p>
                </div>

                <div style="
                    display: flex;
                    gap: 10px;
                ">

                    <a href="{{ route('dashboard') }}"
                       style="
                           background-color: #6b7280;
                           color: white;
                           padding: 10px 16px;
                           border-radius: 6px;
                           text-decoration: none;
                       ">
                        Dashboard
                    </a>

                    <a href="{{ route('peserta.create') }}"
                       style="
                           background-color: #2563eb;
                           color: white;
                           padding: 10px 16px;
                           border-radius: 6px;
                           text-decoration: none;
                       ">
                        + Tambah Peserta
                    </a>

                </div>

            </div>


            <!-- PENCARIAN -->
            <form action="{{ route('peserta.index') }}" method="GET"
                  style="
                      display: flex;
                      gap: 10px;
                      margin-bottom: 20px;
                  ">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari nama, NISN, atau email..."
                    style="
                        flex: 1;
                        padding: 10px 12px;
                        border: 1px solid #d1d5db;
                        border-radius: 6px;
                        background-color: white;
                    "
                >

                <button type="submit"
                        style="
                            background-color: #2563eb;
                            color: white;
                            padding: 10px 18px;
                            border: none;
                            border-radius: 6px;
                            cursor: pointer;
                        ">
                    Cari
                </button>

                @if(!empty($search))

                    <a href="{{ route('peserta.index') }}"
                       style="
                           background-color: #6b7280;
                           color: white;
                           padding: 10px 18px;
                           border-radius: 6px;
                           text-decoration: none;
                       ">
                        Reset
                    </a>

                @endif

            </form>


            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div id="success-alert"
                     style="
                         background-color: #d1fae5;
                         color: #065f46;
                         padding: 12px 16px;
                         border-radius: 6px;
                         margin-bottom: 20px;
                         border: 1px solid #a7f3d0;
                     ">

                    {{ session('success') }}

                </div>

            @endif


            <!-- DATA PESERTA -->
            <div style="
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
            ">

                @forelse ($pesertas as $peserta)

                    <div style="
                        background-color: white;
                        border-radius: 10px;
                        padding: 20px;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                    ">

                        <!-- NAMA -->
                        <div style="margin-bottom: 15px;">

                            <div style="
                                font-size: 13px;
                                color: #6b7280;
                                margin-bottom: 4px;
                            ">
                                Nama Peserta
                            </div>

                            <div style="
                                font-size: 20px;
                                font-weight: bold;
                                color: #111827;
                            ">
                                {{ $peserta->nama }}
                            </div>

                        </div>


                        <!-- NISN -->
                        <div style="margin-bottom: 12px;">
                            <strong>NISN:</strong>
                            {{ $peserta->nisn }}
                        </div>


                        <!-- JENIS KELAMIN -->
                        <div style="margin-bottom: 12px;">
                            <strong>Jenis Kelamin:</strong>
                            {{ $peserta->jenis_kelamin }}
                        </div>


                        <!-- EMAIL -->
                        <div style="margin-bottom: 12px;">
                            <strong>Email:</strong>
                            {{ $peserta->email }}
                        </div>


                        <!-- NO HP -->
                        <div style="margin-bottom: 12px;">
                            <strong>No. HP:</strong>
                            {{ $peserta->no_hp }}
                        </div>


                        <!-- TANGGAL LAHIR -->
                        <div style="margin-bottom: 12px;">
                            <strong>Tanggal Lahir:</strong>
                            {{ $peserta->tanggal_lahir }}
                        </div>


                        <!-- ALAMAT -->
                        <div style="margin-bottom: 12px;">
                            <strong>Alamat:</strong>
                            {{ $peserta->alamat }}
                        </div>


                        <!-- SKEMA -->
                        <div style="margin-bottom: 18px;">

                            <strong>Skema Sertifikasi:</strong>

                            {{ $peserta->skema->kode_skema ?? '-' }}

                            -

                            {{ $peserta->skema->nama_skema ?? '-' }}

                        </div>


                        <!-- TOMBOL -->
                        <div style="
                            display: flex;
                            gap: 8px;
                            align-items: center;
                        ">

                            <!-- DETAIL -->
                            <a href="{{ route('peserta.show', $peserta->id) }}"
                               style="
                                   color: #384e79;
                                   padding: 8px 14px;
                                   border-radius: 5px;
                                   text-decoration: none;
                               ">
                                Detail
                            </a>


                            <!-- EDIT -->
                            <a href="{{ route('peserta.edit', $peserta->id) }}"
                               style="
                                   color: #f59e0b;
                                   padding: 8px 14px;
                                   border-radius: 5px;
                                   text-decoration: none;
                               ">
                                Edit
                            </a>


                            <!-- HAPUS -->
                            <form action="{{ route('peserta.destroy', $peserta->id) }}"
                                  method="POST"
                                  style="margin: 0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus peserta ini?')"
                                        style="
                                            color: red;
                                            padding: 8px 14px;
                                            border: none;
                                            border-radius: 5px;
                                            cursor: pointer;
                                        ">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div style="
                        grid-column: span 2;
                        background-color: white;
                        padding: 40px;
                        text-align: center;
                        border-radius: 10px;
                        color: #6b7280;
                    ">

                        @if(!empty($search))
                            Data peserta dengan kata kunci
                            "<strong>{{ $search }}</strong>"
                            tidak ditemukan.
                        @else
                            Belum ada data peserta.
                        @endif

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    <!-- PESAN BERHASIL HILANG OTOMATIS -->
    <script>

        setTimeout(function () {

            const alert = document.getElementById('success-alert');

            if (alert) {

                alert.style.transition = 'opacity 0.5s';

                alert.style.opacity = '0';

                setTimeout(function () {
                    alert.remove();
                }, 500);

            }

        }, 3000);

    </script>

</x-app-layout>