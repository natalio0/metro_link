<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetroLink</title>
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/agendaKota.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .dokumentasi-category{
        margin: 50px 0px 0px 0px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        font-size: 45px;
        color: #000000;
        }
    </style>

</head>

<body>
    <div class="all">
        <header>
            <a href="#" class="logo">
                <img src="/assets/logo-01.png">
            </a>
            <ul class="nav-list">
                <li><a href="/metrolink">Home</a></li>
                <li><a href="/metrolink/service">Service</a></li>
                <li><a href="/metrolink/agenda_kota">Agenda Kota</a></li>
                <li><a href="/metrolink/peta_bencana">Peta Bencana</a></li>
                <li><a href="/metrolink/about_us">About Us</a></li>
                <li><a href="/metrolink/galery">Gallery</a></li>
                </ul>
            <li><a href="/logout" style="background-color: #a60000;border-radius: 40px; color: white;padding: 8px 20px; font-size: 15px;font-weight: 600;border-bottom: 2px solid transparent; transition: all .55s ease;">Logout</a></li>
            <div class="bx bx-menu" id="menu-icon"></div>
        </header>

    <div class="container">
        <div class="content">
            <h1>AGENDA KOTA</h1>
            <p>Menghubungkan Informasi Kota, Kesadaran Bencana, dan Keterlibatan Komunitas!</p>
            <a href="/metrolink">Home</a>
            <span>/ Agenda kota</span>
        </div>
    </div>

    <div class="table-wrapper">
        <div class="ajukan_agenda">
            <a href="/metrolink/agenda_kota/create">Ajukan Agenda</a>
        </div>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penyelenggara</th>
                    <th>Nama Event</th>
                    <th>Kategori</th>
                    <th>Deskripsi Event</th>
                    <th>Tanggal Pelaksanaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendaKotas as $agendaKota)
                <tr>
                    <td>{{ $agendaKota->id }}</td>
                    <td>{{ $agendaKota->Nama_Penyelenggara }}</td>
                    <td>{{ $agendaKota->Nama_Event }}</td>
                    <td>{{ $agendaKota->kategori }}</td> <!-- Menampilkan kategori -->
                    <td>{{ $agendaKota->Deskripsi_Event }}</td>
                    <td>{{ $agendaKota->Tanggal_Pelaksanaan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="cta-content">
        <div class="cta">
            <h1>ADA KELUHAN? SAMPAIKAN KELUHAN ANDA DISINI</h1>
            <a href="/metrolink/service" class="btn">Service</a>

        </div>
    </div>
    <div class="scroll-up">
        <a href="#"><i class="ri-arrow-up-s-fill"></i></a>
    </div>
    <footer>
        <div class="footer-content">
            <div class="row">
                <div class="col">
                    <img src="/assets/logo-01.png" class="logo">
                    <p>Surabaya merupakan sebuah daerah yang menjadi Ibu Kota Provinsi Jawa Timur. Surabaya memiliki hari jadi pada tanggal 31 Mei 1293. Kota Surabaya juga menjadi kota metropolitan terbesar di Provinsi Jawa Timur.</p>
                </div>
                <div class="col">
                    <h3>Teams</h3>
                    <p>Ahmad Hazli</p>
                    <p>Arya Arief</p>
                    <p>Friand Jacnus</p>
                    <p class="email-id">metrolink@outlook.com</p>
                    <h4>Telkom University Surabaya</h4>
                </div>
                <div class="col">
                    <h3>Links</h3>
                    <ul>
                        <li><a href="/metrolink">Home</a></li>
                        <li><a href="/metrolink/service">Service</a></li>
                        <li><a href="/metrolink/agenda_kota">Agenda Kota</a></li>
                        <li><a href="/metrolink/about_us">About Us</a></li>
                        <li><a href="/metrolink/galery">Gallery</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Newsletter</h3>
                    <form>
                        <i class="fa fa-envelope-o"></i>
                        <input type="email" id="" placeholder="Enter your email id">
                        <button type="submit"><i class="fa fa-arrow-right"></i></button>
                    </form>
                    <div class="social-icons">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-whatsapp"></i>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copy-right">Student of Telkom University Surabaya © 2024 - All Rights Reserved</p>
        </div>
    </footer>
    </div>

    <script src="/js/scriptSShow.js"></script>

</body>
</html>
