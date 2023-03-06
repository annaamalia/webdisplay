<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Author" content="Amalbox">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/components/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/components/WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="assets/components/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/components/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css" >

    <title>AmalBox</title>
  </head>
  <body>
    <div class="giftunggu"></div>
    <nav class="navbar fixed-top navbar-light bg-light opaque">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/assets/img/logo-brand.png" alt=""></a>
            <div class="btnzakatamal btnhead mr-auto">
              <a href="{{route('umum.program.zakatall')}}" title=""><button class="p2 btn btn-custom" type="button">Zakat</button></a>
              <a href="{{route('umum.program.amalall')}}" ><button class="p2 btn btn-custom" type="button">Amal</button></a>
            </div>
            <a href="{{route('umum.cart.show')}}" title="Kotak Amal">
                <div class="kotakamal">
                  {{CartHelper::getCart()->isiCart()->count()}}
                </div>
              </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar top-bar"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>
            </button>

        <div class="collapse navbar-collapse text-center" id="navbarsExample04">
            <div class="btnzakatamal btncol">
              <a href="{{route('umum.program.zakatall')}}" title=""><button class="p2 btn btn-custom" type="button">Zakat</button></a>
              <a href="{{route('umum.program.amalall')}}" ><button class="p2 btn btn-custom" type="button">Amal</button></a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang ZIS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://partner.amalbox.org">Galang Amal</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <section class="banner">
      <div class="container">
        <div class="row align-items-center h-full">
          <div class="tengah col-lg-8 offset-lg-2">
            <h3 class="text-center">TEBAR AMAL RAIH BERKAH</h3>
            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center p-4">
                      <p>
                        “Dan pada harta benda mereka ada hak untuk orang miskin yang meminta dan orang miskin yang tidak meminta.” (Q.S. Adz-Dzariyat : 19)
                      </p>
                    </div>
                    <div class="carousel-item text-center p-4">
                        <p>"Ambillah zakat dari sebagian harta mereka, dengan zakat itu kamu membersihkan dan mensucikan mereka, dan mendoalah untuk mereka. Sesungguhnya doa kamu itu (menjadi) ketenteraman jiwa bagi mereka. Dan Allah Maha Mendengar lagi Maha Mengetahui."(QS. At-Tawbah [9]:103)</p>
                    </div>
                        <div class="carousel-item text-center p-4">
                        <p>"Perumpamaan (nafkah yang dikeluarkan oleh) orang-orang yang menafkahkan hartanya di jalan Allah adalah serupa dengan sebutir benih yang menumbuhkan tujuh bulir, pada tiap-tiap bulir seratus biji.  Allah melipat gandakan (ganjaran) bagi siapa yang Dia kehendaki. Dan Allah Maha Luas (karuniaNya) lagi Maha Mengetahui. "(QS. Al Baqarah [2]: 261)</p>
                    </div>

                        <div class="carousel-item text-center p-4">
                        <p>"Orang-orang yang menafkahkan hartanya di malam dan siang hari secara tersembunyi dan terang-terangan, maka mereka mendapat pahala di sisi Tuhannya. Tidak ada kekhawatiran terhadap mereka dan tidak (pula) mereka bersedih hati. "(QS. Al Baqarah [2]: 274)</p>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <center>
              <a href="{{route('umum.kalkulatorzakat')}}" title="Hitung Zakat"><button type="button" class="btn btn-custom wow fadeInLeft">Hitung Zakat Sekarang</button></a>
              <a href="{{route('umum.program.amalall')}}" title="Hitung Zakat"> <button type="button" class="btn btn-custom wow fadeInRight">Beramal Sekarang</button></a>
            </center>
          </div>
        </div>
      </div>
    </section>

    <div style="background-color: #307184;">

      <div class="container">
        <div class="row pt-5 pb-5">
          <div class="col-md-12 mt-5">
            <img src="assets/img/logo-glow.png" class="gambartengah" style="max-width: 120px;">
            <p class="text-center mt-3 px24" style="color: #fff">
              AmalBox merupakan platform online yang memudahkan masyarakat untuk beramal melalui berbagai pilihan program yang terseleksi, serta menggalang amal untuk mewujudkan inisiatif dan project sosial dalam ekosistem Islam.
            </p>

            <div class="container">
              <div class="row pt-2 pb-5 justify-content-center">
                <a href="/about" title="Tentang AmalBox">
                  <button type="button" class="btn btnsec btn-custom-white wow pulse">Tentang AmalBox</button>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="garis">
        <span></span>
        <img src="assets/img/kotak.png">
    </div>

    <section class="programzakat space-section">
      <div class="container">
        <h2 class="text-center mb-3">Program Zakat</h2>


        <div class="owl-carousel owl-carousel3 owl-theme">


            @foreach ($programs as $program)
          <div class="item">
            <div class="">
              <div class="card">
                <a href="{{route('umum.program.show', $program->id)}}" title="">
                  <div class="card-image">
                    <img class="img-fluid" src="{{url($program->gambar_cover)}}" alt="Card image cap">
                  </div>
                </a>
                <span class="align-self-end tag"><a href="#">{{$program->category->category_name}}</a></span>
                <div class="progress align-self-center">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{$program->jumlahdonasipersen()}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="card-info">
                  <span class="text-left">
                    Terkumpul <br>
                    <b>Rp {{number_format($program->jumlahdonasi(), 0,',','.')}}</b>
                  </span>
                  <span class="text-right ml-auto">
                    <b>{{$program->jumlahdonasipersen()}}%</b> Progress <br>
                    <b>{{$program->waktuTersisa()}}</b> Hari Lagi
                  </span>
                </div>
                <div class="card-body">
                  <div class="card-title ">
                    <a href="{{route('umum.program.show', $program->id)}}">
                      <h4 class="align-middle text-center">{{$program->title}} </h4>
                    </a>
                  </div>
                  <p class="card-text">{{$program->short_description}}</p>
                  <a href="{{route('umum.program.show', $program->id)}}" class="btn btn-custom w-100 mb-3">AMAL SEKARANG</a>
                  <div class="uploader d-flex justify-content-between">
                    <div class="p2 d-flex align-flex-center">
                      <span class="">
                      <img src="{{url($program->pembuat->profile_picture)}}" class="rounded-circle">
                      </span>
                      <span class="d-flex">
                        <a href="#" class="align-flex-center align-self-center">{{$program->pembuat->name}}</a>
                      </span>
                    </div>
                    <div class="line-card p2 d-flex align-self-center">
                    </div>
                    <div class="p2 d-flex">
                      <span class="icon-map d-flex">
                      <i class="fa fa-map-marker fa-2x align-self-center"></i>
                    </span>
                    <span class="lokasi d-flex">
                      <a href="#" class="justify-content-right align-self-center">{{$program->location}}</a>
                    </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>

      <div class="container">
        <div class="row padding-top-5 justify-content-center">
          <a href="{{route('umum.kalkulatorzakat')}}" title="Hitung Zakat"><button type="button" class="btn btnsec btn-custom wow pulse">Hitung Zakat Sekarang</button></a>
        </div>
      </div>
    </section>

    <div class="garis">
        <span></span>
        <img src="assets/img/kotak.png">
    </div>

    <section  class="programamal space-section" >
      <div class="container">
        <h2 class="text-center mb-3">Program Amal</h2>


        <div class="owl-carousel owl-carousel3 owl-theme">

            @foreach ($amals as $program)
            <div class="item">
              <div class="">
                <div class="card">
                  <a href="{{route('umum.program.show', $program->id)}}" title="">
                    <div class="card-image">
                      <img class="img-fluid" src="{{url($program->gambar_cover)}}" alt="Card image cap">
                    </div>
                  </a>
                  <span class="align-self-end tag"><a href="#">{{$program->category->category_name}}</a></span>
                  <div class="progress align-self-center">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$program->jumlahdonasipersen()}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-info">
                    <span class="text-left">
                      Terkumpul <br>
                      <b>Rp {{number_format($program->jumlahdonasi(), 0,',','.')}}</b>
                    </span>
                    <span class="text-right ml-auto">
                      <b>{{$program->jumlahdonasipersen()}}%</b> Progress <br>
                      <b>{{$program->waktuTersisa()}}</b> Hari Lagi
                    </span>
                  </div>
                  <div class="card-body">
                    <div class="card-title ">
                      <a href="{{route('umum.program.show', $program->id)}}">
                        <h4 class="align-middle text-center">{{$program->title}} </h4>
                      </a>
                    </div>
                    <p class="card-text">{{$program->short_description}}</p>
                    <a href="{{route('umum.program.show', $program->id)}}" class="btn btn-custom w-100 mb-3">AMAL SEKARANG</a>
                    <div class="uploader d-flex justify-content-between">
                      <div class="p2 d-flex align-flex-center">
                        <span class="">
                        <img src="{{ url($program->pembuat->profile_picture) }}" class="rounded-circle">
                        </span>
                        <span class="d-flex">
                          <a href="#" class="align-flex-center align-self-center">{{$program->pembuat->name}}</a>
                        </span>
                      </div>
                      <div class="line-card p2 d-flex align-self-center">
                      </div>
                      <div class="p2 d-flex">
                        <span class="icon-map d-flex">
                        <i class="fa fa-map-marker fa-2x align-self-center"></i>
                      </span>
                      <span class="lokasi d-flex">
                        <a href="#" class="justify-content-right align-self-center">{{$program->location}}</a>
                      </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach

        </div>

        <div class="row padding-top-5 justify-content-center">
          <a href="{{route('umum.program.amalall')}}" class="btn btnsec btn-custom wow pulse">Program Lainnya</a>
        </div>
      </div>
    </section>

    <div class="garis">
        <span></span>
        <img src="assets/img/kotak.png">
    </div>


    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 footer-about wow fadeInUp">
              <img class="logo-footer" src="assets/img/logo.png" alt="logo-footer" data-at2x="assets/img/logo.png">
              <p>
                  AmalBox merupakan marketplace untuk beramal yang berkomitmen dalam membantu menggalang dan menyalurkan amal
              </p>
              <p><a href="#">Our Team</a></p>
                  </div>
            <div class="col-md-4 offset-md-5 footer-contact wow fadeInDown">
              <h3>Contact</h3>
              <p><i class="fa fa-map-marker"></i> Jl. Pahlawan Revolusi No.41 Jakarta</p>
              <p><i class="fa fa-phone"></i> Phone: 021 2208 6938</p>
              <p><i class="fa fa-envelope"></i> Email: <a href="mailto:hello@amalbox.org">info@amalbox.org</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="d-flex">
            <div class="p2 footer-copyright">
              Copyright &copy; 2018 - Amalbox
            </div>
            <div class="ml-auto p2 footer-social">
              <a href="http://facebook.com/amalboxorg" target="_blank"><i class="fa fa-facebook-f"></i></a>
              <a href="http://twitter.com/amalboxorg" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="http://instagram.com/amalboxorg" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/components/WOW-master/dist/wow.min.js"></script>
    <script src="assets/components/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <script src="assets/components/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(window).scroll(function() {
      if($(this).scrollTop() > 50)
      {
          $('.navbar').removeClass('opaque');
          $('.btnhead').removeClass('dis-none');
      } else {
          $('.navbar').addClass('opaque');
      }
      });

    </script>
    <script>
      $('.owl-carousel2').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayTimeout:4000,
        autoplayHoverPause:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    })
    </script>
    <script>
      $('.owl-carousel3').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
    </script>
  </body>
</html>
