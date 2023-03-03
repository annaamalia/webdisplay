<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Author" content="Amalbox">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets/img/icon.png">
    <link rel="stylesheet" href="/assets/components/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/components/WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="/assets/components/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/components/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/style.css" >

    <title>Amalbox</title>
  </head>
  <body>
    <div class="giftunggu"></div>
    <nav class="navbar fixed-top navbar-light bg-light opaque">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="/assets/img/logo-brand.png" alt=""></a>
            <div class="btnzakatamal btnhead mr-auto dis-none">
              <a href="{{route('umum.kalkulatorzakat')}}" title="Hitung Zakat">
                <button class="p2 btn btn-custom" type="button">Zakat</button>
              </a>
              <button class="p2 btn btn-custom" type="button">Amal</button>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar top-bar"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>       
            </button>

        <div class="collapse navbar-collapse text-center" id="navbarsExample04">
            <div class="btnzakatamal btncol">
            <a href="{{route('umum.kalkulatorzakat')}}" title=""><button class="p2 btn btn-custom" type="button">Zakat</button></a>
              <button class="p2 btn btn-custom" type="button">Amal</button>
            </div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang ZIS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Galang Amal</a>
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
                        <p>lorem ipsum (imagine longer text)</p>
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
              <a href="{{route('umum.program.amalall')}}"><button type="button" class="btn btn-custom wow fadeInRight">Beramal Sekarang</button>
            </center>
          </div>
        </div>
      </div>
    </section>

    <section class="programzakat space-section">
      <div class="container">
        <h2 class="text-center mb-3">Program Zakat Tersedia</h2>
        <div id="myCarouselCard" class="carousel slide multi" data-ride="carousel">
          <div class="carousel-inner carousel-inner-multi carousel-inner-multi1 row w-100 mx-auto">
            @php
            $i = 0;
            @endphp
            @foreach ($programs as $program)
            @php
                $i++;
            @endphp
            @if ($i > 6)
                @php
                    break;
                @endphp
            @endif
            <div class="carousel-item col-lg-4 @if ($i == 1)
                active
            @endif">
              <div class="card">
                <a href="{{route('umum.program.show', $program->id)}}" title="">
                  <div class="card-image">
                  <img class="img-fluid" src="{{url($program->gambar_cover)}}" alt="Card image cap">
                  </div>
                </a>
                <span class="align-self-end tag"><a href="">{{$program->category->category_name}}</a></span>
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
                <p class="card-text">{{substr(strip_tags($program->detail), 0, 122)}}</p>
                  <div class="uploader d-flex justify-content-between">
                    <div class="p2 d-flex align-flex-center">
                      <span class="">
                      <img src="{{url($program->pembuat->profile_picture)}}" class="rounded-circle">
                      </span>
                      <span class="d-flex">
                        <a href="#" class="align-flex-center align-self-center">{{$program->pembuat->name}} <i class="fa fa-check-circle"></i></a>
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
            @endforeach  
          </div>

          <a class="carousel-control-prev" href="#myCarouselCard" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarouselCard" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <div class="container">
        <div id="myCarouselLogo" class="carousel slide logo" data-ride="carousel">
          <div class="carousel-inner carousel-inner-logo row w-100 mx-auto">

            <div class="carousel-item col-lg-2 active">
              <img src="/assets/img/baznas.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/bmh.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/dompetdhuafa.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/lazismu.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/nucare.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/rumahzakat.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/baznas.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/bmh.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/dompetdhuafa.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/lazismu.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/nucare.png" alt="" class="img-fluid mx-auto d-block">
            </div>
            <div class="carousel-item col-lg-2">
              <img src="/assets/img/rumahzakat.png" alt="" class="img-fluid mx-auto d-block">
            </div>
          
          </div>
        
          <a class="carousel-control-prev" href="#myCarouselLogo" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarouselLogo" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row padding-top-5 justify-content-center">
          <a href="{{route('umum.kalkulatorzakat')}}" title="Hitung Zakat"><button type="button" class="btn btnsec btn-custom wow pulse">Hitung Zakat Sekarang</button></a>
        </div>
      </div>
    </section>

    <div class="garis">
        <span></span>
        <img src="/assets/img/kotak.png">
    </div>

    <section  class="programamal space-section" >
      <div class="container">
        <h2 class="text-center mb-3">Program Amal Tersedia</h2>
        <div id="myCarouselCard2" class="carousel slide multi" data-ride="carousel">
          <div class="carousel-inner carousel-inner-multi carousel-inner-multi2 row w-100 mx-auto">

            
                       
            @php
            $i = 0;
            @endphp
            @foreach ($amals as $program)
            @php
                $i++;
            @endphp
            @if ($i > 6)
                @php
                    break;
                @endphp
            @endif
            <div class="carousel-item col-lg-4 @if ($i == 1)
                active
            @endif">
              <div class="card">
                <a href="{{route('umum.program.show', $program->id)}}" title="">
                  <div class="card-image">
                  <img class="img-fluid" src="{{url($program->gambar_cover)}}" alt="Card image cap">
                  </div>
                </a>
                <span class="align-self-end tag"><a href="">{{$program->category->category_name}}</a></span>
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
                <p class="card-text">{{substr(strip_tags($program->detail), 0, 122)}}</p>
                  <div class="uploader d-flex justify-content-between">
                    <div class="p2 d-flex align-flex-center">
                      <span class="">
                      <img src="{{url($program->pembuat->profile_picture)}}" class="rounded-circle">
                      </span>
                      <span class="d-flex">
                        <a href="#" class="align-flex-center align-self-center">{{$program->pembuat->name}} <i class="fa fa-check-circle"></i></a>
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
            @endforeach  
            

          </div>

          <a class="carousel-control-prev" href="#myCarouselCard2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarouselCard2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row padding-top-5 justify-content-center">
        <a href="{{route('umum.program.amalall')}}"><button type="button" class="btn btnsec btn-custom wow pulse">Program Lainnya</button></a>
        </div>
      </div>
    </section> 
    
    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 footer-about wow fadeInUp">
              <img class="logo-footer" src="/assets/img/logo.png" alt="logo-footer" data-at2x="/assets/img/logo.png">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
              </p>
              <p><a href="#">Our Team</a></p>
                  </div>
            <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
              <h3>Contact</h3>
                  <p><i class="fa fa-map-marker"></i> Klender, Jakarta Timur</p>
                  <p><i class="fa fa-phone"></i> Phone: 0212121212121</p>
                  <p><i class="fa fa-envelope"></i> Email: <a href="mailto:hello@amalbox.org">hello@amalbox.org</a></p>
                  </div>
                  <div class="col-md-4 footer-links wow fadeInUp">
                    <div class="row">
                      <div class="col">
                        <h3>Links</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p><a class="scroll-link" href="#top-content">Home</a></p>
                        <p><a href="#">Features</a></p>
                        <p><a href="#">How it works</a></p>
                        <p><a href="#">Our clients</a></p>
                      </div>
                      <div class="col-md-6">
                        <p><a href="#">Plans &amp; pricing</a></p>
                        <p><a href="#">Affiliates</a></p>
                        <p><a href="#">Terms</a></p>
                      </div>
                    </div>
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
              <a href="#"><i class="fa fa-facebook-f"></i></a> 
              <a href="#"><i class="fa fa-twitter"></i></a>  
              <a href="#"><i class="fa fa-instagram"></i></a> 
            </div>
          </div>
        </div>
      </div>
    </footer> 

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/components/WOW-master/dist/wow.min.js"></script>
    <script src="/assets/components/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script>
        $(window).scroll(function() {
      if($(this).scrollTop() > 50)
      {
          $('.navbar').removeClass('opaque');
          $('.btnhead').removeClass('dis-none');
      } else {
          $('.navbar').addClass('opaque');
          $('.btnhead').addClass('dis-none');
      }
      }); 

    </script>
  </body>
</html>