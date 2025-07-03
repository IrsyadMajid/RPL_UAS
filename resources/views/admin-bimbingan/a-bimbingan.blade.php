<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Bimbingan - BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Dosen_Bimbingan/style.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Dosen_Dashboard/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
        <a href="{{ route('admin.a-dashboard') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-dashboard.png') }}" alt="" /> Dashboard</a>
        <a href="{{ route('admin.a-mahasiswa') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-mahasiswa.png') }}" alt="" /> Mahasiswa</a>
        <a href="{{ route('admin.a-bimbingan') }}" class="active"><img src="{{ asset('images/Dosen_Dashboard/icon-bimbingan.png') }}" alt="" /> Bimbingan</a>
        </nav>
        <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-logout.png') }}" alt="" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div></div>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Dosen_Mahasiswa/dashboard-profile.png') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <section class="mahasiswa-section">
                <h2>Daftar Permintaan Bimbingan</h2>
                <div class="total-box">
                    <div>
                        <div>Total Permintaan</div>
                        <h1>{{ $requests->count() }}</h1>
                    </div>
                    <img src="{{ asset('images/Dosen_Bimbingan/icon-totalmahasiswa.png') }}" alt="icon" />
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Topik/Keperluan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->user->npm ?? 'N/A' }}</td>
                                <td>{{ $request->user->name ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($request->proposed_date)->format('d M Y') }}</td>
                                <td>
                                    <a href="#" onclick="showAlasan('{{ $request->user->name }}', '{{ $request->user->npm }}', `{{ $request->topic }}`)">Lihat Alasan</a>
                                </td>
                                <td>
                                    @if($request->status == 'Diterima')
                                    <span class="status accepted">{{ $request->status }}</span>
                                    @elseif($request->status == 'Ditolak')
                                    <span class="status rejected">{{ $request->status }}</span>
                                    @else
                                    <span class="status pending">{{ $request->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($request->status == 'Menunggu')
                                    <form action="{{ route('admin.bimbingan.approve', $request->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="action-button approve">Terima</button>
                                    </form>
                                    <form action="{{ route('admin.bimbingan.reject', $request->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="action-button reject">Tolak</button>
                                    </form>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">Tidak ada permintaan bimbingan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{-- {{ $requests->links() }} --}}
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="alasanModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal('alasanModal')"><i class="fa fa-times"></i></button>
            <h2><span class="highlight">Alasan</span> Permintaan</h2>
            <div class="modal-row"><strong>Nama</strong> <span id="alasanNama"></span></div>
            <div class="modal-row"><strong>NPM</strong> <span id="alasanNPM"></span></div>
            <div class="modal-row"><strong>Alasan/Topik</strong> <p id="alasanIsi"></p></div>
        </div>
    </div>

    <script>
        function showAlasan(nama, npm, isi) {
            document.getElementById('alasanNama').textContent = nama;
            document.getElementById('alasanNPM').textContent = npm;
            document.getElementById('alasanIsi').textContent = isi;
            document.getElementById('alasanModal').style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>
</html>
