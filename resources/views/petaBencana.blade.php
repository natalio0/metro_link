<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetroLink</title>
    <link rel="stylesheet" href="/css/service.css">
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <!-- icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
        #map { height: 70vh; }
        .dokumentasi-category{
        margin: 50px 0px 0px 0px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        font-size: 45px;
        color: #000000;
        }

        /* Style untuk tabel di perangkat besar */
.fl-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 1em;
    font-family: 'Arial', sans-serif;
    text-align: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.fl-table th, .fl-table td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
}

.fl-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.fl-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.fl-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.fl-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

/* Responsif untuk perangkat dengan lebar kurang dari 600px */
@media (max-width: 600px) {
    .fl-table thead {
        display: none;
    }

    .fl-table, .fl-table tbody, .fl-table tr, .fl-table td {
        display: block;
        width: 100%;
    }

    .fl-table tr {
        margin-bottom: 15px;
    }

    .fl-table td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    .fl-table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-weight: bold;
        text-align: left;
        background-color: #f8f8f8;
        border-right: 1px solid #dddddd;
        box-shadow: inset 1px 0 0 #dddddd;
    }

    .fl-table td:last-child {
        border-bottom: 2px solid #009879;
    }
}

/* Style tambahan untuk tampilan lebih menarik */
.fl-table {
    border-radius: 10px;
    overflow: hidden;
}

.fl-table tbody tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}

.table-wrapper {
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.1);
    overflow-x: auto; /* Tambahkan overflow-x: auto; untuk menangani konten yang melebihi lebar halaman */
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td,
.fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
    word-wrap: break-word;
}

.fl-table thead th {
    color: #ffffff;
    background: #333;
}

.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #ff9e0d;
}

.fl-table tr:nth-child(even) {
    background: #f8f8f8;
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
            <h1>Peta Bencana</h1>
            <p>Hindari segera musibah yang ada!</p>
            <a href="/metrolink">Home</a>
            <span>/ <a href="/metrolink/peta">Peta Bencana</a></span>
        </div>
    </div>
    <section class="Ttgkami">
        <h2 class="dokumentasi-category">Peta</h2>
        <div class="line"></div>
    </section>
    <div id="map"></div>
    <section class="Ttgkami">
        <h2 class="dokumentasi-category">Detail Informasi</h2>
        <div class="line"></div>
    </section>
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Daerah</th>
                <th>Kendala Bencana</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Komplek Tugu Pahlawan</td>
                <td>Gempa Bumi</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Dokter Sutomo</td>
                <td>Banjir</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dokter Sutomo</td>
                <td>Banjir</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Darmo</td>
                <td>Banjir</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Wonokromo</td>
                <td>Tanah Longor</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Semolowaru</td>
                <td>Banjir</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Bendul Merisi</td>
                <td>Kebakaran</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Sidosermo</td>
                <td>Gempa Bumi</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Sawonggaling</td>
                <td>Gempa Bumi</td>
            </tr>
        </tbody>
    </table>

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
                        <input class="footer-email" type="email" id="" placeholder="Enter your email id">
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

    <script src="/js/script.js"></script>
    <script>
        const map = L.map('map');
        // Initializes map

        map.setView([-2.5489, 118.0149], 5);
        // Sets initial coordinates to Indonesia and zoom level

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        // Sets map data source and associates with map

        let marker, circle, zoomed;

        navigator.geolocation.watchPosition(success, error);

        function success(pos) {

            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;
            const accuracy = pos.coords.accuracy;

            if (marker) {
                map.removeLayer(marker);
                map.removeLayer(circle);
            }
            // Removes any existing marker and circule (new ones about to be set)

            marker = L.marker([lat, lng]).addTo(map);
            circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);
            // Adds marker to the map and a circle for accuracy

            if (!zoomed) {
                zoomed = map.fitBounds(circle.getBounds());
            }
            // Set zoom to boundaries of accuracy circle

            map.setView([lat, lng]);
            // Set map focus to current user position

        }

        function error(err) {

            if (err.code === 1) {
                alert("Please allow geolocation access");
            } else {
                alert("Cannot get current location");
            }

        }

        // Contoh data bencana alam (koordinat dan jenis)
        const disasters = [
            { lat: -7.245973, lng: 112.737647, type: 'Gempa Bumi', location: 'Komplek Tugu pahlawan' },
            { lat: -7.281206, lng: 112.734103, type: 'Banjir', location: 'Dokter Sutomo' },
            { lat: -7.291854, lng: 112.726494, type: 'Banjir', location: 'Darmo' },
            { lat: -7.310605, lng: 112.734364, type: 'Tanah Longsor', location: 'Wonokromo' },
            { lat: -7.317194, lng: 112.742062, type: 'Banjir', location: 'Semolowaru' },
            { lat: -7.309387, lng: 112.740137, type: 'Kebakaran', location: 'Bendul Merisi' },
            { lat: -7.314277, lng: 112.752456, type: 'Gempa Bumi', location: 'Sidosermo' },
            { lat: -7.297647, lng: 112.732368, type: 'Kebakaran Hutan', location: 'Sawonggaling' },
            // Silakan tambahkan lebih banyak data bencana alam di Surabaya di sini sesuai kebutuhan
        ];


        // Loop melalui setiap bencana alam dan tambahkan marker ke peta
        disasters.forEach(disaster => {
            const { lat, lng, type, location } = disaster;
            const iconUrl = getIconUrlByType(type); // fungsi untuk mendapatkan URL ikon berdasarkan jenis bencana
            const icon = L.icon({
                iconUrl,
                iconSize: [32, 32],
                iconAnchor: [16, 32],
            });
            const marker = L.marker([lat, lng], { icon }).addTo(map);

            // Tambahkan pop-up dengan informasi yang sudah diubah
            marker.bindPopup(`<b>Daerah :</b> ${location}<br><b>Jenis Bencana:</b> ${type}`);

            // Tambahkan event listener untuk menampilkan informasi saat klik
            marker.on('click', function (e) {
                this.openPopup();
            });
        });


        // Fungsi untuk mendapatkan URL ikon berdasarkan jenis bencana
        function getIconUrlByType(type) {
            // Tentukan URL ikon berdasarkan jenis bencana
            switch (type) {
                case 'Gempa Bumi':
                    return '/assets/Earthquake.png';
                case 'Banjir':
                    return '/assets/Flood.png';
                default:
                    return '/assets/default.png';
            }
        }
    </script>

</body>
</html>
