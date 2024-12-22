<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/dashAdmin.css">
</head>
<body>
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
                    <a href="">
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

        <div class="main">
                <div class="form-editAcc hidden">
                    <h1 style="margin-bottom: 20px;text-align: center;">Edit Data</h1>
                    <form action="/admin/akun_admin/update/{{ $user->id }}" method="POST">
                        @csrf
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="{{ $user->username }}" required placeholder="Enter your username">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" required placeholder="Enter your email">

                        <label for="tipe_user">Tipe User:</label>
                        <select id="tipe_user" name="tipe_user" required>
                            <option value="user" {{ $user->tipe_user == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->tipe_user == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>

                        <button type="submit">Update</button>
                    </form>
                </div>
        </div>

    </div>
    <script src="/js/admin.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen form-editAcc
        var formEditAcc = document.querySelector(".form-editAcc");

        // Tambahkan kelas "visible" setelah elemen dimuat
        formEditAcc.classList.add("visible");
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
