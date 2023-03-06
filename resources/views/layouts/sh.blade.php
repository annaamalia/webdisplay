<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
      <title>Testcase_achmadadam_id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Achmad Adam Azzuri">

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/custom.css">
<link rel="icon" type="x-icon/icon" href="{{url('img/logo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css'>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container space-navbar">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="{{url('img/logo.png')}}"></a>
      </div>
      <div class="navbar-header" style="float: right;">
          <div class="navbar-brand">
            <button type="button" class="btn btn-sm tutup">GALANG DANA</button>
            <a data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2"><i class="fa fa-search"></i></a>
            <a href="#">Masuk</a> atau <a href="#">Daftar</a>
          </div>
      </div>
          
      <div class="collapse navbar-collapse" id="navbar-collapse-2">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="#">Program</a></li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sedekah<b class="caret"></b></a>
            <ul class="dropdown-menu multi-level">
              <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Zakat</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Zakat Penghasilan</a></li>
                  <li><a href="#">Zakat Perdagangan</a></li>
                  <li><a href="#">Zakat Emas</a></li>
                  <li><a href="#">Zakat Simpanan</a></li>
                </ul>
              </li>
              <li><a href="#">Fidyah</a></li>
              <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Infaq</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Mari berinfaq</a></li>
                  <li><a href="#">Icard</a></li>
                </ul>
              </li>
              <li><a href="#">Wakaf</a></li>
            </ul>
          </li>
          <li><a href="#">Ramadhan</a></li>
          <li><a href="#">Superqurban</a></li>
          <li class="tampil"><a href="#" style="color: orange;">Galang Dana</a></li>
        </ul>
      </div>

      <div class="collapse nav navbar-nav nav-collapse space-search" id="nav-collapse2">
        <div style="width: 100%; padding: 0 10%;">
          <center><input type="text" name="Cari" style="width: 90%; float: left;" class="form-control">
          <a  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2" style="float: left; width: 10%;"><i class="fa fa-close fa-lg" style="color: orange;"></i></a></center>
        </div>        
      </div>

    </div>
  </nav>
  
</div>
  <div class="space-header"></div>
  @yield('content')
  

<hr style="border-color: #999">
<div class="container" style="padding: 2em 0">
  <div class="row">
    <h3 class="text-center" style="font-family: 'Opensans', sans-serif;"><b>PROGRAM TERKAIT</b></h3><br><br>

      <div class="col-md-10 col-md-offset-1">
        <div class="carousel slide carousel-program" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel2">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#">
                  <div class="atas" style="background-image: url('/image/c1.jpg');">
                    <div class="tag">
                      PENDIDIKAN
                    </div>
                    <div class="lokasi">
                      <i class="fa fa-map-marker"></i> Kamboja, Kamboja
                    </div>
                  </div>
                  <div class="tengah">
                    <div class="judul">
                      BANGUN MADRASAH UNTUK MUSLIM KAMBOJA
                    </div>
                    <p>Kamboja merupakan rumah bagi sebagian minoritas Muslim yang berjumlah kurang dari 5% dari keseluruhan total populasi </p>
                  </div>
                  <div class="bawah w-100">
                    <div class="kiri w-70">
                      <img src="/image/p1.png" style="float: left;" alt="">
                      &nbsp;&nbsp;Banana Pirates - IPB
                      <br> &nbsp; <i class="fa fa-star"> </i> 5
                    </div>
                    <div class="kanan w-30 text-right">
                      <i class="fa fa-clock-o" style="color: #777"></i> 2 Bulan
                      <br>  <span style="color: #EF652F"> Rp. 44.977.794 </span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#">
                  <div class="atas" style="background-image: url('/image/c2.jpg');">
                    <div class="tag">
                      PENDIDIKAN
                    </div>
                    <div class="lokasi">
                      <i class="fa fa-map-marker"></i> Medan
                    </div>
                  </div>
                  <div class="tengah">
                    <div class="judul">
                      HADIRKAN TEMPAT TINGGAL PENGHAFAL QURAN BERSAMA USTADZAH OKI SETIANA DEWI
                    </div>
                    <p>Maskanul Huffadz adalah lembaga pendidikan Rumah Tahfidz (penghafal Quran) khusus untuk akhwat (muslimah)</p>
                  </div>
                  <div class="bawah w-100">
                    <div class="kiri w-70">
                      <img src="/image/p2.png" style="float: left;" alt="">
                      &nbsp;&nbsp;Oki Setiana Dewi
                      <br> &nbsp; <i class="fa fa-star"> </i> 5
                    </div>
                    <div class="kanan w-30 text-right">
                      <i class="fa fa-clock-o" style="color: #777"></i> 1 Bulan
                      <br>  <span style="color: #EF652F"> Rp. 41.303.579</span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#">
                  <div class="atas" style="background-image: url('/image/c3.jpg');">
                    <div class="tag">
                      PENDIDIKAN
                    </div>
                    <div class="lokasi">
                      <i class="fa fa-map-marker"></i> Nasional, Nasional
                    </div>
                  </div>
                  <div class="tengah">
                    <div class="judul">
                      BANTU IMAM SHAMSI ALI MENDIRIKAN PESANTREN DI AMERIKA
                    </div>
                    <p>"Kami berusaha untuk membangun sebuah pondok pesantren di Amerika serikat, kenapa pondok pesantren? Ada beberapa</p>
                  </div>
                  <div class="bawah w-100">
                    <div class="kiri w-70">
                      <img src="/image/p3.png" style="float: left;" alt="">
                      &nbsp;&nbsp;Imam Shamsi Ali
                      <br> &nbsp; <i class="fa fa-star"> </i> 0
                    </div>
                    <div class="kanan w-30 text-right">
                      <i class="fa fa-clock-o" style="color: #777"></i> 2 Bulan
                      <br>  <span style="color: #EF652F"> Rp. 20.676.892</span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width:2%">
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel2" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="right carousel-control" href="#myCarousel2" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
      </div>      

    </div>
</div>

<div class="bgwhite">
  <div class="container">
    <div class="row" style="padding: 2.5em 0;">
      <div class="col-md-3" style="color: #777; top: -10px;">
        <span style="font-size: 26px;font-weight: bold;">KABAR BERBAGI</span><br>  
        <span style="font-size: 12px;"> Temukan Kabar Berbagi di Sharing Happiness </span>
      </div>
      <div class="col-md-3">
        <input type="name" name="name" class="form-control" placeholder="Nama">
      </div>
      <div class="col-md-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="col-md-3">
        <button class="btn btn-orange w-100">LANGGANAN</button>
      </div>
    </div>
  </div>
</div>

<div class="container footer" style="color: #777;font-family: 'Open Sans', sans-serif; font-size: 13px;">
  <div class="row">
    <div class="col-md-2">
      <h4>SHARINGHAPPINESS.ORG</h4>
      Website donasi online yang memfasilitasi berbagai program sosial dan kemanusiaan agar semakin banyak orang yang bisa berbagi bahagia
    </div>
    <div class="col-md-2 p50">
      <h4>KENALI KAMI</h4>
      <a href="#">Syarat & Ketentuan</a> <br>
      <a href="#">Tentang Kami</a> <br>
      <a href="#">Kebijakan Privasi</a> <br>
      <a href="#">Hubungi Kami</a> <br>
      <a href="#">Tim Kami</a>
    </div>
    <div class="col-md-2 p50">
      <h4>DONASI</h4>
      <a href="#">Cara Donasi</a> <br>
      <a href="#">Happiness Story</a> <br>
      <a href="#">FAQ</a>
    </div>
    <div class="col-md-2 p50">
      <h4>PROGRAM</h4>
      <a href="#">Program</a> <br>
      <a href="#">Zakat</a> <br>
      <a href="#">Fidyah</a> <br>
      <a href="#">Infaq</a> <br>
      <a href="#">Wakaf</a> <br>
      <a href="#">Ramadhan</a> <br>
    </div>
    <div class="col-md-2">
      <h4>PEMBAYARAN</h4>
      <img src="/image/pembayaran.png" class="img-responsive" style="max-width: 120px;" alt="">
    </div>
    <div class="col-md-2">
      <h4>IKUTI KAMI <span>
        <a href="#" title=""><i class="fa fa-facebook-square"></i></a>
        <a href="#" title=""><i class="fa fa-twitter"></i></a>
        <a href="#" title=""><i class="fa fa-instagram"></i></a>
      </span> </h4>
      <a href="#" title="">
        <img src="/image/playstore.png" class="img-responsive" alt="">
      </a>
    </div>
  </div>
</div>

<hr>

<div class="bgwhite">
  <div class="container text-center" style="font-size: 12px;font-family: 'OpenSans', sans-serif; color: #777; padding: 1em;">
      <div class="row">
          <div class="col-md-2">
            &copy; 2018 Rumah Zakat
          </div>
          <div class="col-md-3">
            Sharing Happiness All Reserved Rumah Zakat
          </div>
          <div class="col-md-3">
            Jl. Batu Kencana No. 6 - Buah Batu Bandung
          </div>
          <div class="col-md-2">
            0227332407
          </div>
          <div class="col-md-2">
            info@sharinghappiness.org
          </div>
      </div>  
  </div>  
</div>

<div id="mybutton">
  <button class="feedback">Feedback</button>
</div>

</body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src='https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/custom.js"></script>
    @yield('js')
</html>
