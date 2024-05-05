@extends('layouts.app')

@section('tabel')
<section class="section">
    <div class="section-header">
        <h1>{{$title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('proyek.index')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Proyek</div>
            <div class="breadcrumb-item">{{$title}}</div>
        </div>
    </div>
    <section class="product-container">
        <!-- left side -->
        <div class="img-card">
        <img src="{{ asset('images/proyek/' . $data->galeri1) }}" alt="" id="featured-image">
            <!-- small img -->
            <div class="small-Card">
                <img src="{{ asset('images/proyek/' . $data->galeri1) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri2) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri3) }}" alt="" class="small-Img">
                <!-- <img src="{{ asset('images/proyek/' . $data->galeri5) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri6) }}" alt="" class="small-Img"> -->
            </div>
            <!-- <div class="small-Card">
                <img src="{{ asset('images/proyek/' . $data->galeri7) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri8) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri9) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri10) }}" alt="" class="small-Img">
            </div> -->
        </div>
        <!-- Right side -->
        <div class="product-info">
            <h3>{{$data->nama_proyek}}</h3>
            <h5>Harga Jual: {{'Rp.' . number_format(floatval($data->harga_jual), 0, ',', '.')}}</h5>
            <div>
                <div class="delivery">
                    <p>TYPE</p> <p>KETERANGAN</p>
                </div>
                <hr>
                <div class="delivery">
                    <p>Nama Proyek</p> 
                    <p>{{$data ->nama_proyek}}</p> 
                </div>
                <div class="delivery">
                    <p>Produk</p> 
                    <p>{{$data->produk->nama_produk}}</p> 
                </div>
                <div class="delivery">
                    <p>Nama Pelanggan</p> 
                    <p>{{$data->nama_pelanggan}}</p> 
                </div>
                <div class="delivery">
                    <p>No.Telp</p> 
                    <p>{{$data->telp}}</p> 
                </div>
                <div class="delivery">
                    <p>Lokasi</p> 
                    <p>{{$data->lokasi}}</p> 
                </div>
                <div class="delivery">
                    <p>Harga Jual</p> 
                    <p>Rp {{ number_format($data->harga_jual, 0, ',', '.') }}</p>
                </div>
                <div class="delivery">
                    <p>Modal</p> 
                    <p>Rp {{ number_format($data->modal, 0, ',', '.') }}</p>
                </div>
                <div class="delivery">
                    <p>Keuntungan</p> 
                    <p>Rp {{ number_format($data->keuntungan, 0, ',', '.') }}</p>
                </div>
                <div class="delivery">
                    <p>Deskripsi</p> 
                    <p>{{$data->detail}}</p> 
                </div>
            </div>
        </div>
    </section>
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

</section>
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

<script>
    function previewimage()
    {
        const image = document.querySelector('#photo');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent){
            imgPreview.src=oFREvent.target.result;
        }

    }
</script>
<style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 30px;
}

header {
  margin-bottom: 20px;
}

.product-container {
  display: flex;
  justify-content: start;
  align-items: start;
  gap: 40px;
}

/* .img-card{
    width: 40%;
} */

.img-card img {
  width: 100%;
  flex-shrink: 0;
  border-radius: 4px;
  height: 520px;
  object-fit: cover;
}

.small-Card {
  display: flex;
  justify-content: start;
  align-items: center;
  margin-top: 15px;
  gap: 12px;
}

.small-Card img {
  width: 104px;
  height: 104px;
  border-radius: 4px;
  cursor: pointer;
}

.small-Card img:active {
  border: 1px solid #17696a;
}

.sm-card {
  border: 2px solid darkred;
}

.product-info{
  width: 60%;
}
.product-info h3 {
  font-size: 32px;
  font-family: Lato;
  font-weight: 600;
  line-height: 130%;
}

.product-info h5 {
  font-size: 24px;
  font-family: Lato;
  font-weight: 500;
  line-height: 130%;
  color: #ff4242;
  margin: 6px 0;
}

.product-info del {
  color: #a9a9a9;
}

.product-info p {
  color: #424551;
  margin: 15px 0;
  width: 70%;
}

.sizes p {
  font-size: 22px;
  color: black;
}

.size-option {
  width: 200px;
  height: 30px;
  margin-bottom: 15px;
  padding: 5px;
}

.quantity input {
  width: 51px;
  height: 33px;
  margin-bottom: 15px;
  padding: 6px;
}

button {
  background: #17696a;
  border-radius: 4px;
  padding: 10px 37px;
  border: none;
  color: white;
  font-weight: 600;
}

button:hover {
  background: #ff4242;
  transition: ease-in 0.4s;
}

.delivery {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 70%;
  color: #787a80;
  font-size: 12px;
  font-family: Lato;
  line-height: 150%;
  letter-spacing: 1px;
}

hr {
  color: #787a80;
  width: 58%;
  opacity: 0.67;
}

.pagination {
    color: #787a80;
    margin: 15px 0;
    cursor: pointer;
}

@media screen and (max-width: 576px) {
  .product-container{
    flex-direction: column;
  }
  .small-Card img{
    width: 80px;
  }
  .product-info{
    width: 100%;
  }
  echo "# product-details-page-html-css-js" >> README.md
  .product-info p{
    width: 100%;
  }

  .delivery{
    width: 100%;
  }

  hr{
    width: 100%;
  }
}
</style>

<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<script>

let featuedImg = document.getElementById('featured-image');
let smallImgs = document.getElementsByClassName('small-Img');

smallImgs[0].addEventListener('click', () => {
    featuedImg.src = smallImgs[0].src;
    smallImgs[0].classList.add('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[1].addEventListener('click', () => {
    featuedImg.src = smallImgs[1].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.add('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[2].addEventListener('click', () => {
    featuedImg.src = smallImgs[2].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.add('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[3].addEventListener('click', () => {
    featuedImg.src = smallImgs[3].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.add('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[4].addEventListener('click', () => {
    featuedImg.src = smallImgs[4].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.add('sm-card')
})



    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

        setTimeout(showSlides, 2000); // Ubah angka ini (dalam milidetik) sesuai dengan kebutuhan Anda
    }
</script>




@endsection