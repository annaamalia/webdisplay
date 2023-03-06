<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Author" content="Amalbox">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/assets/img/icon.png">
    <link rel="stylesheet" href="/assets/components/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/components/WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="/assets/css/style.css" >
    
  </head>
  <body>
    <div class="giftunggu"></div>
    <nav class="navbar fixed-top navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/assets/img/logo-brand.png" alt=""></a>
            <div class="btnzakatamal btnhead mr-auto">
              <a href="{{route('umum.program.zakatall')}}" title=""><button class="p2 btn btn-custom" type="button">Zakat</button></a>
              <a href="{{route('umum.program.amalall')}}" ><button class="p2 btn btn-custom" type="button">Amal</button></a>
            </div>
            <a href="{{route('umum.cart.show')}}" title="Kotak Amal">
              <div class="kotakamal">
                @{{CartHelper::getCart()->isiCart()->count()}}
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

    <span class="spaceheader"></span>
    @yield('content')
    
    
    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 footer-about wow fadeInUp">
            <img class="logo-footer" src="/assets/img/logo.png" alt="logo-footer" data-at2x="assets/img/logo.png">
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

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.mask.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/components/WOW-master/dist/wow.min.js"></script>
    <script src="/assets/components/bootstrap-4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script src="/assets/js/custom.js"></script>
       

@yield('js')
</body>
</html>