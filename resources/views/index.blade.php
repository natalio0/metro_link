<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  tial-scale=1.0">
    <title>MetroLink</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <!-- icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         .komen-user {
            display: flex;
            gap: 20px;
            margin: auto;
            width: 80%;
            margin-top: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }


        .comment-card {
            border-radius: 25px;
            max-height: 100%;
            padding: 10px;
            background-color: #f9f9f9;
            flex: 1 1 calc(25% - 20px); /* Satu div akan mengambil 1/4 dari lebar container */
            max-width: calc(25% - 20px);
            box-sizing: border-box;
            overflow: hidden; /* Mengatasi overflow */
            word-wrap: break-word; /* Memastikan kata panjang dipotong */
            height: 170px;
        }

        .comment-card .username {
            font-weight: bold;
        }

        .comment-card .email {
            color: #454545;
            margin-bottom: 5px;
        }

        .comment-card .content {
            color: #454545;
            font-size: 12px;
            margin-left: 0px;
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
            <h1>MetroLink Kota Masa Depan!</h1>
            <p>Kota nyaman hidup aman!</p>
            <div class="dropdown">
                <form id="cityForm">
                <input type="text" id="cityInput" placeholder="Cari Service Kami">
                </form>
            <div class="dropdown-content" id="cityDropdown">
                <a href="/metrolink/#informasi">Informasi Kota</a>
                <a href="/metrolink/service/ajukan_kendala">Pengaduan Masalah</a>
                <a href="/metrolink/agenda_kota">Agenda Kota</a>
                <a href="/metrolink/service/berikan_penilaian">Rating</a>
                <!-- Add more cities here -->
            </div>
        </div>
    </div>
    </div>
    <div class="about">
        <div class="left">
            <h3>About Us</h3>
            <h2>Recognize more about our company</h2>
        </div>
        <div class="right">
            <p>MetroLink adalah aplikasi berbasis WebApps yang dirancang untuk membantu masyarakat, pemerintah kota, dan stakeholder terkait dalam mengelola kota dengan cara yang aman, tangguh, dan berkelanjutan.</p>
            <button class="btn-yellow"><a href="about_us.html">About Us</a></button>
        </div>

    </div>
    <div id="informasi" class="slideshow-container">

        <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
            <video width="100%" controls>
                <source src="/assets/vid.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
            <div class="mySlides fade">
                <img src="/assets/slide1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="/assets/slide2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="/assets/slide3.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
    </div>
    <br><br><br>
    <div class="about">
        <div class="left">
            <h3>Information</h3>
            <h2>Informasi Kota</h2>
        </div>
        <div class="right">
            <p><b>Surabaya</b> merupakan sebuah daerah yang menjadi Ibu Kota Provinsi Jawa Timur. Surabaya memiliki hari jadi pada tanggal 31 Mei 1293. Kota Surabaya juga menjadi kota metropolitan terbesar di Provinsi Jawa Timur.<br><br> Selain itu, Kota Surabaya juga merupakan kota terbesar di Indonesia setelah Jakarta. Kota ini menjadi pusat bisnis, perdagangan, industri, dan pendidikan di wilayah Jawa Timur.</p>
        </div>
    </div>
    <br><br><br>
    <div class="gallery">
        <h3>Our Gallery</h3>
        <h2>Explore Our Experience</h2>
        <div class="row">
            <div class="gallery-col">
                <img src="/assets/surabaya.jpg">
                <div class="layer">
                    <h4>Tambaksari</h4>
                </div>
            </div>
            <div class="gallery-col">
                <img src="/assets/malang.jpg">
                <div class="layer">
                    <h4>Wonokromo</h4>
                </div>
            </div>
            <div class="gallery-col">
                <img src="/assets/jakarta.jpg">
                <div class="layer">
                    <h4>Wiyung</h4>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    {{-- <div class="gallery">
        <h3>Event</h3>
        <h2>Upcoming Event</h2>
    </div> --}}

    {{-- <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>No</th>
                <th>Event</th>
                <th>Date</th>
                <th>Conference</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>International Conference on Humanities</td>
                <td>Mon, 29 - Tue, 30 Apr 2024</td>
                <td>Bussines Service</td>
            </tr>
            <tr>
                <td>2</td>
                <td>World Conference on Science Engineering and Technology</td>
                <td>Wed, 15 - Thu, 16 May 2024</td>
                <td>Science and Research</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Indonesia International Food Expo (IIFEX)</td>
                <td>Thu, 27 - Sun, 30 Jun 2024</td>
                <td>Food & Beverage</td>
            </tr>
            <tr>
                <td>4</td>
                <td>East Pack Surabaya</td>
                <td>Thu, 27 - Sun, 30 Jun 2024 4</td>
                <td>Packing</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Surabaya Printing Expo</td>
                <td>Thu, 04 - Sun, 07 Jul 2024</td>
                <td>Printing</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Manufacturing Surabaya</td>
                <td>Wed, 17 - Sat, 20 Jul 2024</td>
                <td>Engineering Industrial</td>
            </tr>
            <tbody>
        </table>
    </div> --}}

    <h3 style="display: flex;justify-content: center; margin-top:60px">help us to always grow</h3>
    <h1 style="display: flex;justify-content: center;">Comment</h1>
    <div class="komen-user">
            @foreach($comments as $comment)
            <div class="comment-card">
                <div class="username">{{ $comment->username }}</div>
                <div class="email">{{ $comment->email }}</div>
                <div class="content">{{ $comment->komentar }}</div>
            </div>
            @endforeach
    </div>


    <br>
    <div class="cta-content">
        <div class="cta">
            <h1>Mari bersama bangun kota lebih nyaman dan berkelanjutan!</h1>
            <a href="/metrolink/service/ajukan_kendala" class="btn">Aduan Kendala</a>

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
                    <p>Muhammad Ghaisan</p>
                    <p>Ittishal Tsaqif</p>
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
                        <li><a href="/logout">Logout</a></li>
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
</body>

<script src="/js/script.js"></script>
</html>
