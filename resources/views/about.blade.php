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
  <body style="background-color: #307184">
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
                {{ App\Helpers\CartHelper::getCart()->isiCart()->count() }}
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

      <div class="container pt-5 pb-3">
        <div class="row pt-5 pb-1">
          <div class="col-md-12 mt-5">
            <img src="assets/img/logo-glow.png" class="gambartengah" style="max-width: 120px;">
            <p class="text-center mt-3 px24" style="color: #fff">
              AmalBox merupakan platform online yang memudahkan masyarakat untuk beramal melalui berbagai pilihan program yang terseleksi, serta menggalang amal untuk mewujudkan inisiatif dan project sosial dalam ekosistem Islam.
            </p>
		    <div class="garis mt-4">
		        <span></span>
		        <img src="assets/img/kotak.png" style="background-color: #307184">
		    </div>
          </div>
        </div>
      </div>

      <div  style="background-color: #E6F2F2">
      	<div class="container">

      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">THE POTENTIAL</h2>
      				<div class="text-center">
      					<h4>Potential of Zakat Indonesia Rp 286 Trillion <br>
      					Collected ZIS 2016 Rp 5 Trillion (Realization 1.7%) <br>
      					Distributed ZIS 2016 Rp 2.9 Trillion (Distribution 58.42%)</h4>
      				</div>
      				<img src="assets/img/info2.png" class="w-100" alt="" style="max-width: 900px;margin: 0 auto;display: block;">
      			</div>
      		</div>

		    <div class="garis">
		        <span></span>
		        <img src="assets/img/kotak.png">
		    </div>

      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">The World Giving Index Ranking</h2>
      				<img src="assets/img/info3.png" class="w-100 pt-3 pb-3" alt="" style="max-width: 900px;margin: 0 auto;display: block;">
      			</div>
      		</div>

		    <div class="garis">
		        <span></span>
		        <img src="assets/img/kotak.png">
		    </div>

      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">THE PROCESS</h2>
      				<h4 class="text-center"><i>"Wadah Berkumpulnya Amal Kebaikan"</i></h4>
      				<img src="assets/img/info5.png" class="w-100 pt-4 pb-5" alt="" style="max-width: 900px;margin: 0 auto;display: block;">
      				<h4 class="text-center">
      					Program zakat atau inisiatif sosial Partners akan berpotensi menerima dana amal melalui berbagai jenis sumber, mulai dari dana individu, dana kelompok, hingga dana korporasi.
      				</h4>
      				<p>
      					<table border="0">
      						<tr>
      							<td>Sahabat Amal &nbsp;</td>
      							<td>= &nbsp;</td>
      							<td>Donatur/Muzakki</td>
      						</tr>
      						<tr>
      							<td>Partner</td>
      							<td>=</td>
      							<td>Lembaga Amil Zakat / Inisiator Sosial</td>
      						</tr>
      						<tr>
      							<td>Mustahik</td>
      							<td>=</td>
      							<td>Penerima Zakat, Infaq, Shadaqah</td>
      						</tr>
      					</table>
      				</p>
      			</div>
      		</div>

		    <div class="garis">
		        <span></span>
		        <img src="assets/img/kotak.png">
		    </div>

      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">Categories of Focus</h2>
      				<img src="assets/img/info1.png" class="w-100 pt-3 pb-3" alt="">
      				<h4 class="text-center pl-2 pr-2">Sahabat Amal dapat memilih langsung program berdasarkan kategori dan fokus pada program yang sesuai dengan keinginan.</h4>
      			</div>
      		</div>

		    <div class="garis">
		        <span></span>
		        <img src="assets/img/kotak.png">
		    </div>
      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">Verified Programs</h2>
      				<img src="assets/img/info4.png" class="w-100 pt-5 pb-5" alt="" style="max-width: 900px;margin: 0 auto;display: block;">
      				<h4 class="text-center">
      					Program yang masuk akan diseleksi dan diverifikasi demi kenyamanan Sahabat Amal dalam beramal dan berzakat.
      				</h4>
      			</div>
      		</div>

		    <div class="garis">
		        <span></span>
		        <img src="assets/img/kotak.png">
		    </div>

      		<div class="row">
      			<div class="col-md-12 pt-5 pb-5">
      				<h2 class="text-center">Hanya 5 menit!</h2>
      				<img src="assets/img/info6.png" class="d-block w-100 pt-5 pb-5" alt="" style="max-width: 700px;margin: 0 auto;">
      				<h4 class="text-center pb-2">
      					Beramal ke seluruh penjuru dunia <br> Dimana saja dan kapan saja
      				</h4>

		            <center>
		              <a href="{{route('umum.kalkulatorzakat')}}" title="Hitung Zakat"><button type="button" style="font-size: 22px;" class="btn btn-custom wow fadeInLeft m-1">Hitung Zakat Sekarang</button></a>
		              <a href="{{route('umum.program.amalall')}}" title="Hitung Zakat"> <button type="button" style="font-size: 22px;" class="btn btn-custom wow fadeInRight m-1">Beramal Sekarang</button></a>
		            </center>
      			</div>
      		</div>
      	</div>
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
  </body>
</html>
