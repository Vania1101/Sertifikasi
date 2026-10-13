
<x-app-layout>

    <div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 24px;">

        <div style="max-width: 1400px; margin: auto;">

            <!-- HEADER -->
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        gap: 20px;
                        flex-wrap: wrap;
                        margin-bottom: 20px;">

                <div>
                    <h1 style="font-size: 28px;
                               font-weight: bold;
                               margin: 0 0 5px 0;
                               color: #111827;">
                        Data Skema Sertifikasi
                    </h1>

                    <p style="margin: 0 0 10px 0;
                              color: #6b7280;
                              font-size: 14px;">
                        Kelola data skema sertifikasi.
                    </p>

                    <a href="{{ route('dashboard') }}"
                       style="display: inline-block;
                              background-color: #6b7280;
                              color: white;
                              padding: 8px 14px;
                              border-radius: 6px;
                              text-decoration: none;
                              font-size: 14px;">
                        ← Kembali ke Dashboard
                    </a>
                </div>

                <a href="{{ route('skema.create') }}"
                   style="background-color: #2563eb;
                          color: white;
                          padding: 10px 16px;
                          border-radius: 6px;
                          text-decoration: none;
                          font-size: 14px;
                          white-space: nowrap;">
                    + Tambah Skema
                </a>

            </div>

            <!-- PESAN SUKSES -->
            @if (session('success'))
                <div style="background-color: #dcfce7;
                            color: #166534;
                            padding: 12px 15px;
                            border-radius: 6px;
                            margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TABEL -->
            <div style="background-color: white;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
                        overflow-x: auto;">

                <table style="width: 100%;
                              min-width: 900px;
                              border-collapse: collapse;
                              table-layout: auto;">

                    <thead>
                        <tr style="background-color: #f3f4f6;">

                            <th style="padding: 12px; text-align: left;">
                                No
                            </th>

                            <th style="padding: 12px; text-align: left;">
                                Kode Skema
                            </th>

                            <th style="padding: 12px; text-align: left;">
                                Nama Skema
                            </th>

                            <th style="padding: 12px; text-align: left;">
                                Deskripsi
                            </th>

                            <th style="padding: 12px;
                                       text-align: center;
                                       min-width: 240px;">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($skemas as $skema)

                            <tr style="border-bottom: 1px solid #e5e7eb;">

                                <td style="padding: 12px;">
                                    {{ $loop->iteration }}
                                </td>

                                <td style="padding: 12px;">
                                    {{ $skema->kode_skema }}
                                </td>

                                <td style="padding: 12px;">
                                    {{ $skema->nama_skema }}
                                </td>

                                <td style="padding: 12px;
                                           min-width: 200px;
                                           max-width: 350px;
                                           overflow-wrap: anywhere;">
                                    {{ $skema->deskripsi ?? '-' }}
                                </td>

                                <!-- AKSI -->
                                <td style="padding: 12px;">

                                    <div style="display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                gap: 8px;
                                                flex-wrap: nowrap;">

                                        <a href="{{ route('skema.show', $skema->id) }}"
                                           style="display: inline-flex;
                                                  align-items: center;
                                                  justify-content: center;
                                                  background-color: #6b7280;
                                                  color: white;
                                                  padding: 8px 12px;
                                                  border-radius: 5px;
                                                  text-decoration: none;
                                                  font-size: 13px;
                                                  white-space: nowrap;">
                                            Detail
                                        </a>

                                        <a href="{{ route('skema.edit', $skema->id) }}"
                                           style="display: inline-flex;
                                                  align-items: center;
                                                  justify-content: center;
                                                  background-color: #f59e0b;
                                                  color: white;
                                                  padding: 8px 12px;
                                                  border-radius: 5px;
                                                  text-decoration: none;
                                                  font-size: 13px;
                                                  white-space: nowrap;">
                                            Edit
                                        </a>

                                        <form action="{{ route('skema.destroy', $skema->id) }}"
                                              method="POST"
                                              style="display: inline-flex;
                                                     margin: 0;
                                                     flex-shrink: 0;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus skema ini?')"
                                                    style="display: inline-flex;
                                                           align-items: center;
                                                           justify-content: center;
                                                           background-color: #dc2626;
                                                           color: white;
                                                           padding: 8px 12px;
                                                           border-radius: 5px;
                                                           border: none;
                                                           cursor: pointer;
                                                           font-size: 13px;
                                                           white-space: nowrap;">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5"
                                    style="padding: 25px;
                                           text-align: center;
                                           color: #6b7280;">
                                    Belum ada data skema sertifikasi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
