<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/css/dashAdmin.css">
    <style>
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .alert-danger ul li {
            margin-bottom: 7px;
        }
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">{{ Auth::user()->username }}</span>
                    </a>
                </li>

                <li>
                    <a href="/admin">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/agenda_kota">
                        <span class="icon">
                            <ion-icon name="business-outline"></ion-icon>
                        </span>
                        <span class="title">Agenda Kota</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/pengaduan">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Pengaduan</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/komentar">
                        <span class="icon">
                            <ion-icon name="chatbubbles"></ion-icon>
                        </span>
                        <span class="title">Komentar</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/akun_admin">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Admin Akun</span>
                    </a>
                </li>

                <li>
                    <a href="/logout">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <form action="/admin/akun_admin" method="GET">
                        <label>
                            <input type="text" name="search" placeholder="Search here" value="{{ request('search') }}">
                            <ion-icon name="search-outline"></ion-icon>
                            <button type="submit" style="display: none"></button>
                        </label>
                    </form>
                </div>
            </div>

            <!-- ======================= form ================== -->
            <div class="form-createAcc">
                <form action="/admin/akun_admin/store" method="POST">
                    <span class="btn-back"><a href="/admin/akun_admin" style="text-decoration: none; color: white; padding: 5px 16px; background-color: black; font-size: 10px;">Back</a></span>
                    <h1 style="margin-bottom: 30px; text-align: center;">Create Account
                    </h1>
                    @csrf
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter Username" required>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                    <select id="tipe_user" name="tipe_user" required>
                        <option value="" disabled selected>Select User Type</option>
                        <option value="user" {{ old('tipe_user') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('tipe_user') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <button type="submit">Create</button>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="/js/admin.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add the 'visible' class to the form container to trigger the animation
            document.querySelector('.form-createAcc').classList.add('visible');
        });
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
