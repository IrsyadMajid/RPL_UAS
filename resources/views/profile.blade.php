<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA - Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/Profile/style.css') }}" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div>
                <img src="{{ asset('images/Profile/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
                <nav class="menu">
                    <a href="{{ route('homepage') }}" class="active"><img src="{{ asset('images/Dashboard/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a>
                    <a href="{{ route('peta.peta1') }}"><img src="{{ asset('images/Dashboard/icon-peta.png') }}" alt="Icon Peta" /> Peta</a>
                    <a href="{{ route('mentoring') }}"><img src="{{ asset('images/Dashboard/icon-mentoring.png') }}" alt="Icon Mentoring" /> Mentoring</a>
                    <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Dashboard/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a>
                    <a href="{{ route('library') }}"><img src="{{ asset('images/Dashboard/icon-library.png') }}" alt="Icon Library" /> Library</a>
                </nav>
            </div>
            <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Profile/icon-logout.png') }}" alt="Icon LogOut" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div></div>
                <div class="top-right-icons">
                    <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                    <button class="icon-button"><i class="fa-solid fa-comment-dots"></i></button>
                    <img src="{{ $user->profile_photo ? asset('storage/profile_photos/'.$user->profile_photo) : asset('images/Profile/profile-dashboard1.jpg') }}"
                         alt="Profile"
                         class="profile-image" />
                </div>
            </header>

            <section class="profile-container">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="profile-box">
                    <div class="profile-form-section">
                        <h2 class="profile-title">Profile Saya</h2>
                        <p class="profile-subtitle">Atur dan amankan akun anda</p>

                        <form class="profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}" />
                                <i class="fa-solid fa-pen edit-icon"></i>
                                @error('fullname')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" />
                                <i class="fa-solid fa-pen edit-icon"></i>
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" />
                                <i class="fa-solid fa-pen edit-icon"></i>
                                @error('phone')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group password-group">
                                <label for="password">Password (Biarkan kosong jika tidak ingin mengubah)</label>
                                <input type="password" id="password" name="password" />
                                <i class="fa-solid fa-pen edit-icon"></i>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="radio-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Laki-Laki" {{ old('gender', $user->gender) == 'Laki-Laki' ? 'checked' : '' }} /> Laki-Laki
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'checked' : '' }} /> Perempuan
                                    </label>
                                </div>
                                @error('gender')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="save-button">Simpan</button>
                        </form>
                    </div>

                    <div class="profile-photo-section">
                        <img src="{{ $user->profile_photo ? asset('storage/profile_photos/'.$user->profile_photo) : asset('images/Profile/profile-dashboard1.jpg') }}"
                             class="profile-photo"
                             alt="Foto Profil"
                             id="profile-photo-preview">

                        <input type="file" id="profile_photo" name="profile_photo" style="display: none;" accept="image/*">
                        <button type="button" class="upload-button" onclick="document.getElementById('profile_photo').click()">Pilih foto</button>

                        @error('profile_photo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.getElementById('profile_photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-photo-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
