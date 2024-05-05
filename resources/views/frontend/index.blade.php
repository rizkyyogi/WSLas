<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Workshop Information</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/logo.jpeg')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('index/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('index/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('index/assets/css/style.css')}}" rel="stylesheet">
  
</head>

<body>
  

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="#slider"><img src="{{asset('images/logo.jpeg')}}
      "alt="" widht="" height=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#slider">Home</a></li>
          <li><a class="nav-link scrollto" href="#product">Product</a></li>
	        <!-- <li><a class="nav-link scrollto" href="{{route('frontend.proyek')}}">Project</a></li> -->
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

	<!-- Start Slider Code -->
    <section id="slider" class="carousel slide" data-bs-ride="carousel" style="background-color: #37517e; padding-bottom: 0px">
      <div class="carousel-inner">
      @foreach($slide as $key => $item)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2500">
        <img src="{{ asset('images/slide/' . $item->gambar) }}" class="d-block" style="width: 100%; height: 550px;" alt="Slide {{ $key + 1 }}">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>{{$item->name}}</h5> -->
          <!-- Tambahkan keterangan tambahan atau konten di sini -->
        </div>
      </div>
    @endforeach
      </div>
  <button class="carousel-control-prev" data-bs-target="carousel-item" type="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Sebelumnya</span>
  </button>
  <button class="carousel-control-next" data-bs-target="carousel-item" type="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Selanjutnya</span>
  </button>
    </section>

    <!-- End Slider -->

  <main id="main">
    <!-- ======= Product Section ======= -->
    <section id="product" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Product</h2>
        </div>

      <div class="d-flex justify-content-evenly row row-cols-1 row-cols-md-3 g-4">
        @foreach($produk as $item)
        <div class="col" data-aos="zoom-in" data-aos-delay="100">
          <div class="card h-100">
          <img src="{{ asset('images/produk/' . $item->foto_produk) }}" class="card-img-top" alt="{{ $item->nama_produk }}">
            <div class="card-body">
              <center>
              <h4 class="card-title" style="text-transform:uppercase; font-weight:bold;">{{$item->nama_produk}}</h4>
              <p class="card-text">{{$item->description}}</p>
              </center>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section><!-- End Product Section -->

    <!-- ======= Data Project Section ======= -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <!-- <li data-filter="*" class="filter-active">All</li> -->
          <!-- <li data-filter=".filter-pager">Pager</li>
          <li data-filter=".filter-kanopi">Kanopi</li>
          <li data-filter=".filter-tralis">Tralis</li> -->
        </ul>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($porto as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->kategori }}">
                <div class="portfolio-img"><img src="{{ asset('images/porto/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_produk }}"></div>
                <!-- Gantilah 'path/ke/gambar/' dengan path sesuai dengan tempat penyimpanan gambar Anda -->
                <div class="portfolio-info">
                    <h4>{{ $item->nama }}</h4>
                    <!-- <p>{{ $item->gambar }}</p> -->
                    <a href="{{ asset('images/porto/' . $item->gambar) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $item->nama }}"><i class="bx bx-zoom-in"></i></a>
                </div>
            </div>
            @endforeach


      </div>
    </section>
    <!-- End Portfolio Section -->
  </main>
<!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

	<div class="section-title">
          <h2>Contact</h2>
        </div>
		
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Location</h3>
            <p>
              Jl. Raya Pengasinan Rt 05/02 No.50 <br>
              Kel. pengasinan, Kec.Sawangan <br>
              Kota Depok <br><br>
              <strong>Phone:</strong> +62 857-7551-3434<br>
              <strong>Email:</strong> info.workshop-mm@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3></h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.728126208661!2d106.7520698788424!3d-6.42896311736526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e9fc92129ffb%3A0x241dc42bf7f3fdfd!2sBengkel%20Las%20Mas%20Sumary!5e0!3m2!1sid!2sid!4v1693455643891!5m2!1sid!2sid" width="100%" height="250" style="border-radius:7%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>My Social Media</h4>
            
            <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Workshop Mas Mari</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('index/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('index/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('index/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('index/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('index/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('index/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('index/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('index/assets/js/main.js')}}"></script>
  <style>
    .row > .column {
        padding: 0 8px;
      }

      .row:after {
        content: "";
        display: table;
        clear: both;
      }

      /* Create four equal columns that floats next to eachother */
      .column {
        float: left;
        width: 25%;
      }

      /* Modal (latar belakang) */
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        max-width: 70%; /* Sesuaikan lebar maksimum sesuai kebutuhan */
        max-height: 70%; /* Sesuaikan tinggi maksimum sesuai kebutuhan */
        overflow: auto;
        background-color: black;
      }

      /* Konten Modal */
      .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 100%;
      }

/* The Close Button */
.close {
  color: red;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer; /* Menjadikan kursor menjadi tangan saat mengarahkan ke tombol "Close" */
  z-index: 2; /* Tambahkan z-index untuk menampilkan tombol di atas modal */
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
}

      /* Hide the slides by default */
      .mySlides {
        display: none;
      }

      /* Next & previous buttons */
      .prev,
      .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover,
      .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* Caption text */
      .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
      }

      img.demo {
        opacity: 0.6;
      }

      .active,
      .demo:hover {
        opacity: 1;
      }

      img.hover-shadow {
        transition: 0.3s;
      }

      .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

  </style>
<script>
// Open the Modal
// function openModal() {
//   document.getElementById("myModal").style.display = "block";
// }

// // Close the Modal
// function closeModal() {
//     var modal = document.getElementById("myModal");
//     modal.style.display = "none";
// }

// var slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("demo");
//   var captionText = document.getElementById("caption");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
//   captionText.innerHTML = dots[slideIndex-1].alt;
// }
// Fungsi untuk membuka modal
function openModal(index) {
    document.getElementById('myModal' + index).style.display = 'block';
}

// Fungsi untuk menutup modal
function closeModal(index) {
    document.getElementById('myModal' + index).style.display = 'none';
}

// Fungsi untuk menggeser gambar dalam galeri
function plusSlides(n, index) {
    showSlides(slideIndex[index] += n, index);
}

// Fungsi untuk menampilkan gambar tertentu dalam galeri
function currentSlide(n, index) {
    showSlides(slideIndex[index] = n, index);
}

// Inisialisasi indeks slide untuk setiap galeri
var slideIndex = [];

// Fungsi untuk menampilkan gambar pada indeks tertentu dalam galeri
function showSlides(n, index) {
    var i;
    var slides = document.getElementsByClassName('mySlides' + index);
    var captionText = document.getElementById('caption' + index);

    if (n > slides.length) {
        slideIndex[index] = 1;
    }
    if (n < 1) {
        slideIndex[index] = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slides[slideIndex[index] - 1].style.display = 'block';
    captionText.innerHTML = slides[slideIndex[index] - 1].getElementsByTagName('img')[0].alt;
}

// Menampilkan gambar pertama pada setiap galeri saat modal pertama kali dibuka
@foreach($proyek as $index => $item)
showSlides(1, {{ $index }});
@endforeach


</script>

</body>

</html>
