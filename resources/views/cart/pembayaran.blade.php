@extends('layouts.app')
@section('content')  
@include('partials.css')

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