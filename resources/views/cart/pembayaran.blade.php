@extends('layouts.app')
@section('content')  
<style type="text/css" media="screen">
  .design-process-section .text-align-center {
    line-height: 25px;
    margin-bottom: 12px;
}
.design-process-content {
    border: 1px solid #e9e9e9;
    position: relative;
    padding: 16px 34% 30px 30px;
}
.design-process-content img {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    max-height: 100%;
}
.design-process-content h3 {
    margin-bottom: 16px;
}
.design-process-content p {
    line-height: 26px;
    margin-bottom: 12px;
}
.process-model {
    list-style: none;
    padding: 0;
    position: relative;
    max-width: 600px;
    margin: 20px auto 26px;
    border: none;
    z-index: 0;
}
.process-model li::after {
    background: #e5e5e5 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    display: block;
    height: 4px;
    margin: 0 auto;
    position: absolute;
    right: 50px;
    top: 33px;
    width: 80%;
    z-index: -1;
}
.process-model li.visited::after {
    background: #57b87b;
}
.process-model li:last-child::after {
    width: 0;
}
.process-model li {
    display: inline-block;
    width: 25%;
    text-align: center;
    float: none;
}
.nav-tabs.process-model > li.active > a, .nav-tabs.process-model > li.active > a:hover, .nav-tabs.process-model > li.active > a:focus, .process-model li a:hover, .process-model li a:focus {
    border: none;
    background: transparent;

}
.process-model li a {
    padding: 0;
    border: none;
    color: #606060;
}
.process-model li.active,
.process-model li.visited {
    color: #57b87b;
}
.process-model li.active a,
.process-model li.active a:hover,
.process-model li.active a:focus,
.process-model li.visited a,
.process-model li.visited a:hover,
.process-model li.visited a:focus {
    color: #57b87b;
}
.process-model li.active p,
.process-model li.visited p {
    font-weight: 600;
}
.process-model li i {
    display: block;
    height: 68px;
    width: 68px;
    text-align: center;
    margin: 0 auto;
    background: #f5f6f7;
    border: 2px solid #e5e5e5;
    line-height: 65px;
    font-size: 30px;
    border-radius: 50%;
}
.process-model li.active i, .process-model li.visited i  {
    background: #fff;
    border-color: #57b87b;
}
.process-model li p {
    font-size: 14px;
    margin-top: 11px;
}
.process-model.contact-us-tab li.visited a, .process-model.contact-us-tab li.visited p {
    color: #606060!important;
    font-weight: normal
}
.process-model.contact-us-tab li::after  {
    display: none; 
}
.process-model.contact-us-tab li.visited i {
    border-color: #e5e5e5; 
}



@media screen and (max-width: 560px) {
  .more-icon-preocess.process-model li span {
        font-size: 23px;
        height: 50px;
        line-height: 46px;
        width: 50px;
    }
    .more-icon-preocess.process-model li::after {
        top: 24px;
    }
}
@media screen and (max-width: 380px) { 
    .process-model li i {
      width: 40px;
      height: 40px;
      line-height: 35px;
      font-size: 20px;
    }
}
</style>
  <section class="design-process-section" id="process-tab">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
          <li role="presentation" class="visited"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>
            <p>Kotak Amal</p>
            </a></li>
          <li role="presentation" id="navmetodepembayaran" class="active"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-credit-card"></i>
            <p>Pembayaran</p>
            </a></li>
          <li role="presentation" id="navidentitas"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-user-o"></i>
            <p>Identitas</p>
            </a></li>
          <li role="presentation" id="navselesai"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-check-square-o"></i>
            <p>Selesai</p>
            </a></li>
        </ul>
    </div>
  </div>
</section>  
    <form method="POST" id="formnya" action="{{route('umum.invoice.store')}}">
      <div style="min-height: 600px;">
      <section class="metodepembayaran">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex justify-content-center">
                <div class="p-2"><h2><i class="fa fa-credit-card-alt"></i></h2></div>
                <div class="p-2"><h2>Pilih Metode Pembayaran</h2></div>
              </div>
              <div class="box">
                <h4>Transfer Melalui</h4>
                  <div class="mleft-40">
            
                    @foreach (App\Models\Invoice::METODE_PEMBAYARAN as $key => $value )
                                @if ($key == 2)
                                <div class="custom-control d-block custom-radio">
                                  <input type="radio" class="custom-control-input" value="{{$key}}" id="{{$value[0]}}" name="rekening" required>
                                <label class="custom-control-label" for="{{$value[0]}}">

                                <h5>Bank lainnya via</h5><img src="{{url('assets/img/')}}/{{strtolower( $value[0])}}.png">
                                <button type="reset" class="btn btn-custom ml-2" data-toggle="infomidtrans" data-placement="right" title="Akan dikenakan biaya transfer sebesar Rp. 4.000, lebih murah dibandingkan transfer antar bank pada umumnya (± Rp. 6.500)"><i class="fa fa-info"></i></button></label>
                                </div>   
                                @else
                                <div class="custom-control d-block custom-radio">
                                  <input type="radio" class="custom-control-input" value="{{$key}}" id="{{$value[0]}}" name="rekening" required>
                                <label class="custom-control-label" for="{{$value[0]}}"><img src="{{url('assets/img/')}}/{{strtolower( $value[0])}}.png"></label>
                                </div>
                                @endif
                               
                                @endforeach   
                                
                  </div>
  
                <div class="d-flex">
                  <div class="p-2">
                  <a href="{{route('umum.cart.show')}}" title="Kembali ke Program" class="btn btn-custom"><i class="fa fa-angle-left"></i> Sebelumnya</a>
                  </div>
                  <div class="ml-auto p-2">
                    <div class="p-2">
                      <button id="nextidentitas" title="Selanjutnya" class="btn btn-custom-inverse">Selanjutnya <i class="fa fa-angle-right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="identitas" style="display: none;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex justify-content-center">
                    <div class="p-2"><h2><i class="fa fa-user-o"></i></h2></div>
                    <div class="p-2"><h2>Masukan identitas</h2></div>
                  </div>
                  <div class="box">
                   
                      <div class="form-group">
                        <label for="nama">Nama Lengkap/Organisasi</label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Masukan Nama Lengkap/Organisasi" autofocus required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Masukan email">
                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan menyebarkan email anda.</small>
                      </div>
                      <div class="form-group">
                        <label for="nohp">Nomor Handphone</label>
                        <input type="number" class="form-control" id="nohp" required name="nomorhp" placeholder="Masukan Nomor Handphone Contoh : 081234567890">
                      </div>
                      <div class="form-check">
                        <input type="checkbox" name="anonim" value="true" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Beramal Sebagai Anonim <button class="btn btn-custom ml-2" data-toggle="infoanonim" data-placement="right" title="Nama anda akan ditampilkan sebagai Anonim pada daftar donatur program yang anda pilih"><i class="fa fa-info"></i></button></label>
                      </div>
                   <br>
                    <hr class="hijau">
                    <div class="d-flex">
                      <div class="p-2">
                        <button title="Kembali ke Program" id="prevmetodepembayaran" class="btn btn-custom"><i class="fa fa-angle-left"></i> Sebelumnya</button>
                      </div>
                      <div class="ml-auto p-2">
                        <div class="p-2">
                          <button title="Selanjutnya" id="nextselesai" class="btn btn-custom-inverse">Selanjutnya <i class="fa fa-angle-right"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      <section class="selesai" style="display: none;">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <center>
                    <img src="/assets/img/loading.gif" alt="">
                    <h4>Sedang membuat invoice...</h4>
                  </center>
                </div>
              </div>
            </div>
          </section>
        </div>
          </form>          
@endsection

@section('js')
<script>
       
      
              $(document).ready(function(){
               $('#nextselesai').click(function(e) {
                 
                   $('.identitas').hide();
                   $('#navidentitas').removeClass('active');
                   $('#navidentitas').addClass('visited');
                   $('#navselesai').addClass('active');
                   $('.selesai').show();
                   
               })
               $('#nextidentitas').click(function(e) {          
                e.preventDefault(); 
                if($('#formnya').serialize().includes('rekening') === false) {
                  alert('Pilih rekening');
                  return;
                }
                $('.metodepembayaran').hide();
                $('#navmetodepembayaran').removeClass('active');
                $('#navmetodepembayaran').addClass('visited');
                $('#navidentitas').addClass('active');
                $('.identitas').show();       
               })
               $('#prevmetodepembayaran').click(function(e) {
                   e.preventDefault();
                   $('.metodepembayaran').show();
                   $('#navmetodepembayaran').addClass('active');
                   $('#navmetodepembayaran').removeClass('visited');
                   $('#navidentitas').removeClass('active');
                   $('.identitas').hide();
               })

    

                $("form input").on("invalid", function() {
                  //find tab id           
                  var element = $(this).closest('section').index();
                  //goto tab id
                  console.log(element);
                });
                
              })

              
      </script>
    
<script>
var notificationTimer = 3000;

$('.submit-button').on('click', function () {
  $('.notification-alert').addClass('notification-alert--shown');
  setTimeout(function () {
    $('.notification-alert').removeClass('notification-alert--shown');
  }, notificationTimer)
});
</script>
<script>
  $('.btnProgram').click(function(){
    $(this).text(function(i,old){
        return old=='+ Tampilkan' ?  '- Tutup' : '+ Tampilkan';
    });
});
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Sep 30, 2018 15:37:25").getTime();

var x = setInterval(function() {

    var now = new Date().getTime();
    
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("waktuTransfer").innerHTML = days + " hari " + hours + " jam "
    + minutes + " menit " + seconds + " detik ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
<script>
  $(document).ready(function(){
      $('[data-toggle="infomidtrans"]').tooltip();   
  });
  $(document).ready(function(){
      $('[data-toggle="infoanonim"]').tooltip();   
  });
</script>





    
@endsection