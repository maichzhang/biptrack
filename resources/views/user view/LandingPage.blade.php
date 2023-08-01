<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Home - Cek Bipol</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="images/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    /* Mobile-first CSS (applies to all screen sizes) */
    .logo img {
      max-width: 100px;
    }

    #navbar ul li {
      margin: 5px;
    }

    /* Media query for iPhone XR (max-width: 414px) */
    @media (max-width: 414px) {
      .logo img {
        max-width: 100px;
      }

      #navbar ul {
        display: none;
        flex-direction: column;
        align-items: center;
        background-color: #f8f9fa; /* Background color for the menu */
        position: absolute;
        top: 60px; /* Adjust this value to position the menu below the header */
        left: 0;
        width: 100%;
      }

      #navbar.active ul {
        display: flex;
      }

      #navbar ul li {
        margin: 10px;
        font-size: 14px;
      }

      /* Adjust the size of the map container for smaller screens */
      #map {
        height: 300px;
      }

      /* Modify the section-title for smaller screens */
      .section-title {
        text-align: center;
        font-size: 24px;
      }

      /* Adjust the size and spacing of the team members for smaller screens */
  
      /* Modify the button size for smaller screens */
      .getstarted {
        font-size: 16px;
        padding: 10px 20px;
      }

      /* Modify other elements' styles for smaller screens here */
    }
  </style>
</head>
</head>

<body>
 
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      
    </div>
  </section>

  <!-- ======= Header ======= -->
  
  <header id="header" class="d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{ route('user view.landingpage.store') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo bipol"></a>CEK BIPOL</h1>
  
     
    
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('user view.landingpage.store') }}">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
          <li><a class="nav-link scrollto" href="#forum">Forum</a></li>
          {{-- <li><a class="getstarted " href="{{ route('user') }}">Lacak Sekarang</a></li> --}}
          <li><a class="getstarted scrollto" href="#pilihan">Lacak Sekarang</a></li>
       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= map Section ======= -->
  <section id="hero">
    <div id="map" style="height: 500px; width: 100%;"></div>
    
  </section><!-- End Hero -->

  <main id="main">
    
 
      <section id="pilihan" class="row justify-content-center">
        <div class="col-md-5 col-divider">
          <h1>PILIH DAN LACAK LOKASI BIS</h1>
          <div class="btn-pilih">
            <div class="dropdown">
              <button class="dropdown-toggle" onclick="toggleDropdown('dropdown-menu-1')">BIS POLITEKNIK</button>
              <div class="dropdown-menu" id="dropdown-menu-1">
                <a href="{{ route('user') }}">BIS (B 7006 EPA)</a>
                <a href="{{ route('userbis2') }}">BIS (B 7005 EPA)</a>
                <a href="{{ route('userbis3') }}">BIS (B 7013 EPA)</a>
              </div>
            </div>
            
            <div class="dropdown">
              <button class="dropdown-toggle" onclick="toggleDropdown('dropdown-menu-2')">BIS KARYAWAN</button>
              <div class="dropdown-menu" id="dropdown-menu-2">
                <a href="{{ route('userBK') }}">BIS (B 7014 EPA)</a>
                <a href="{{ route('userBK2') }}">BIS (B 7003 EUA)</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-5">
          <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="news-content" id="news-content-0">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="images/bus.png" alt="Gambar Berita 1" class="news-image">
                    </div>
                    <div class="col-md-6 mt-20">
                      <h2>RUTE PERJALANAN BIS</h2>
                      <ul class="news-text">

                  
                          <li>LAPANGAN PNJ</li>
                          <li>HALTE PNJ</li>
                          <li>HALTE VOKASI</li>
                          <li>HALTE FT UI</li>
                          <li>HALTE FMIPA</li>
                          <li>HALTE FIK</li>
                          <li>HALTE FKM</li>
                          <li>HALTE RIK</li>
                          <li>HALTE POCIN / BALAIRUNG</li>
                          <li>HALTE FH</li>
                          <li>TUGU MAKARA UI</li>
                          <li>HALTE STASIUN UI</li>
                          <li>GERBATAMA UI</li>
                      </ul>
                     
                      <span class="read-more" onclick="toggleReadMore('news-content-0')">Read more</span>
                    </div>
                  </div>
                </div>
              </div>
           
             <!-- Second news item -->
            <div class="carousel-item">
              <div class="news-content" id="news-content-1">
                <div class="row">
                  <div class="col-md-4">
                    <img src="images/logo.png" alt="Gambar Berita 2" class="news-image">
                  </div>
                  <div class="col-md-6 mt-20">
                    <h2>Judul Berita 2</h2>
                    <p class="news-text">
                      Berita 2: Sed euismod eu ipsum eu luctus. Vestibulum auctor, nisl ut lacinia consectetur, neque justo pellentesque arcu, nec sollicitudin est mauris at ex. Suspendisse vel fringilla quam.
                    </p>
                    <span class="read-more" onclick="toggleReadMore('news-content-1')">Read more</span>
                  </div>
                </div>
              </div>
            </div>
            <ol class="carousel-indicators">
              <li data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#newsCarousel" data-bs-slide-to="1"></li>
             
            </ol>
          </div>
        </div>
      </section>
    </main><!-- End #main -->

    {{-- <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">
        <div class="section-title">
          <h2>MANUSIA-MANUSIA HEBAT</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

  </div> --}}
  {{-- </div> --}}
         

    {{-- </section><!-- End Team Section --> --}}

 
    <h2 class="text">TINGGALKAN PESAN KESANMU:</h2>
    
  <section id="forum">
   
  <div class="layout-comment">
  <div class="section">
    
        <form action="{{ route('user view.landingpage.store') }}" method="post">
            @csrf
            <input type="text" name="nama" placeholder="masukkan namamu" required> <br>
            <textarea name="konten" placeholder="tulis komentarmu disini..." rows="6" cols="60" required></textarea> <br>
            <button type="submit">Tambah Komentar</button>
        </form>
        
  </div>
  <div class="section" >
    <div class="section">
        <!-- Tampilkan komentar -->
        @php
            $comments = $comments->sortByDesc('created_at');
        @endphp
        @foreach($comments as $comment)
            <div class="col">
                <strong>{{ $comment->nama }}</strong>
                {{ $comment->konten }} <br>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
  </div>
  </section>
 
  



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>CekBipol</h3>
      <p>Pantau perjalananmu dengan mudah dan hemat lebih banyak waktu </p>
      <div class="copyright">
        &copy; Copyright <strong><span>CekBipol</span></strong>. All Rights Reserved
      </div>

       
      </div>
    </div>
  </footer><!-- End Footer -->

   
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <!-- Link ke Bootstrap JavaScript (jQuery harus disertakan sebelum Bootstrap.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBayHgz7p5Mmk0mjHNc4sg6obkiYsNBgRw&callback=initMap" async defer></script>
  
  
  <script>

  var map;
  function initMap() {

  map = new google.maps.Map(document.getElementById('map'), {
  zoom: 15,
  center: { lat: -6.360223889596034, lng: 106.82727514888026 }

  });

  //MENCARI RUTE DARI MARKER KE MARKER
   // Tambahkan marker di titik awal dan titik akhir
   var markerStart = new google.maps.Marker({
                position: { lat: -6.371381, lng: 106.823999 },
                map: map,
                title: 'Titik Awal'
            });

            var markerEnd = new google.maps.Marker({
                position: { lat: -6.353507, lng: 106.831953 },
                map: map,
                title: 'Titik Akhir'
            });
          
          /*  // Tambahkan InfoWindow untuk marker titik awal
            var infoWindowStart = new google.maps.InfoWindow({
                content: 'LAP PNJ'
            });

            markerStart.addListener('click', function () {
                infoWindowStart.open(map, markerStart);
            });

            // Tambahkan InfoWindow untuk marker titik akhir
            var infoWindowEnd = new google.maps.InfoWindow({
                content: 'GERBATAMA UI'
            });

            markerEnd.addListener('click', function () {
                infoWindowEnd.open(map, markerEnd);
            });
        
        */
            // Buat objek DirectionsService dan DirectionsRenderer
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                polylineOptions: {
                    strokeColor: '#eb3d34', // Ubah warna rute menjadi biru
                    strokeWeight: 5 // Ketebalan garis rute
                }
            });

            // Buat permintaan rute dari titik awal ke titik akhir
            var request = {
                origin: markerStart.getPosition(),
                destination: markerEnd.getPosition(),
                travelMode: google.maps.TravelMode.DRIVING
            };

            // Menampilkan rute pertama (dari titik awal ke titik akhir)
            directionsService.route(request, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                }
            });

            // Menambahkan rute kembali (dari titik akhir ke titik awal)
            var requestBack = {
                origin: markerEnd.getPosition(),
                destination: markerStart.getPosition(),
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(requestBack, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    var directionsRendererBack = new google.maps.DirectionsRenderer({
                        map: map,
                        polylineOptions: {
                            strokeColor: '#34cdeb',
                            strokeWeight: 5
                        }
                    });
                    directionsRendererBack.setDirections(result);
                }
            })
  
}

// Fungsi untuk menampilkan berita dengan ID tertentu
function showNews(newsId) {
    var newsContents = document.getElementsByClassName("news-content");
    for (var i = 0; i < newsContents.length; i++) {
      newsContents[i].classList.remove("active");
    }
    var selectedNews = document.getElementById(newsId);
    selectedNews.classList.add("active");
    toggleReadMore(newsId);
  }

  // Inisialisasi carousel
  var carouselItems = document.getElementsByClassName("carousel-item");
  if (carouselItems.length > 0) {
    carouselItems[0].classList.add("active"); // Tampilkan berita pertama saat halaman dimuat
  }

function toggleReadMore(newsId) {
    var newsContent = document.getElementById(newsId);
    if (newsContent.classList.contains("show-more")) {
      newsContent.classList.remove("show-more");
    } else {
      newsContent.classList.add("show-more");
    }
  }

//button dropdown bus poltek
function toggleDropdown(menuId) {
    var dropdownMenu = document.getElementById(menuId);
    dropdownMenu.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.getElementsByClassName("dropdown-menu");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
// samapai sini


</script>
</body>

</html>