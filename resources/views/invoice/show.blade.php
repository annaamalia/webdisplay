@extends('layouts.app')
@section('content')  

  <script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-SAeKuttaPAztfA9M"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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

.timeout{
  margin-bottom: 50px;
  margin-left: 20%;
  margin-right: 20%;
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
          <li role="presentation" id="navmetodepembayaran" class="visited"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-credit-card"></i>
            <p>Pembayaran</p>
            </a></li>
          <li role="presentation" id="navidentitas" class="visited"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-user-o"></i>
            <p>Identitas</p>
            </a></li>
          <li role="presentation" id="navselesai" class="@if ($invoice->status == 2) visited @else active @endif"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-check-square-o"></i>
            <p>Selesai</p>
            </a></li>
        </ul>
    </div>
  </div>
</section>
<section class="timeout">
  <h2 class="text-center" id="waktuhabis"></h2>
   <a href="/" class="btn btn-custom-inverse mt-4 w-100">Kembali Ke Home</a>
</section>  


  <section class="selesai">  
            <div class="container mt-5 mb-5">
                  <h3 class="text-center">
                      @if ($invoice->status == 2)
                    <i class="fa fa-check-square-o"></i> Selesai
                    @else
                    <i class="fa fa-check-square-o"></i>  Selangkah lagi untuk beramal
                    @endif
                   </h3>
              <div class="row">
                <div class="col-md-12" style="background-color: #F8F9FA; border-radius: 1em; padding: 1em 2em;">
                  <ul class="timeline">
                    <li>
                      <h5>Nomor Invoice</h5>
                      <div class="row mt-3 mb-2">
                        <div class="col-md-12">
                          <h2><mark>#{{$invoice->nomor_invoice}}</mark></h2>
                        </div>
                      </div>
                    </li>
                    <li>
                      <h5>Program</h5>

                      @if($rekening[0]!="Midtrans")
                      <h3>Rp. {{number_format(substr($invoice->uniq,0,-3),0,",",".")}}.<span style="color:#f44336;">{{substr($invoice->uniq,-3)}}</span>,00 <button class="btn btn-custom submit-button"> <i class="fa fa-clone"></i> Salin</button></h3>
                      @else
                      <h3>Rp. {{number_format(substr($invoice->value+4000,0,-3),0,",",".")}}.<span style="color:#f44336;">{{"000"}}</span>,00 <button class="btn btn-custom submit-button"> <i class="fa fa-clone"></i> Salin</button></h3>
                      @endif


                      @if($invoice->status != 2)
                      <p><span style="color: #d50000;">Harap memasukan nominal uang sesuai dengan angka 3 digit terakhir diatas</span> <br>
                      *Tiga digit dana sebagai kode unik akan disalurkan kembali ke program yang sudah dipilih</p>
                      @endif
                      <div class="row-fluid summary">
                        <div class="span1">
                            <button class="btnProgram btn btn-custom ml-auto d-block" data-toggle="collapse" data-target="#intro">- Tutup</button>
                        </div>
                      </div>
                      <div class="row-fluid summary">
                          <div id="intro" class="collapse show">

                                      <table class="table table-striped table-hover table-sm table-bordered mt-3">
                                        <tbody>
                                           @php
                                               $i = 0;
                                           @endphp
                                           @foreach ($invoice->program_donatur as $item)                    
                                            @php
                                                $i++;
                                            @endphp
                                          <tr>
                                     
                                           <th scope="row">{{$i}}</th>
                    <td><b>{{$item->program->title}} </b> <span class="display-500 tag @if($item->program->category->jenis() == App\Models\Category::ZAKAT)tag-zakat @endif"><a href="#" title="Pergerakan">{{$item->program->category->jenis()}}</a></span> 
                    @if($item->comment!="")
                      <i data-toggle="tooltip" data-placement="top" title="{{$item->comment}}" class="fa fa-commenting-o fa-lg"></i> 
                      @endif
                    </td>
                    <td class="display-500">{{$item->program->pembuat->name}}</td>
                    <td class="display-500">{{$item->program->location}}</td>
                                            <td>Rp. {{number_format($item->value, 0,',','.')}}</td>
                                          </tr>
                                          @endforeach              
                                        </tbody>
                                      </table>
                          </div>
                      </div>
                    </li>
                    @if ($invoice->status != 2)
                    <li>
                      <h5>Transfer</h5>
                      <div class="row mt-3 mb-2">
                        <div class="col-md-4">
                        <img src="{{url('assets/img/')}}/{{strtolower( $rekening[0])}}.png" class="w-100 pb-4 pl-4 pr-3">
                        </div>
                        <div class="col-md-8">
                          <h2>{{$rekening[1]}} <button class="btn btn-custom submit-button"> <i class="fa fa-clone"></i> Salin</button></h2>
                          <p>{{$rekening[2]}}</p>
                        </div>
                      </div>
                       @if($rekening[0]!="Midtrans")
                      <h5 class="text-center">Maksimal transfer pada <b>{{$waktu->toFormattedDateString()}}</b> pukul <b>{{$waktu->toTimeString()}} WIB</b></h5>
                      <h2 class="text-center" id="waktuberakhir"></h2>
                      @endif
                    </li>
                    @if($rekening[0]!="Midtrans")
                    <li id="buktitransfer">
                      <h5>Upload Bukti Transfer</h5>
                      <center>
                          @if ($invoice->bukti_transfer)
                          <h3 class="text-center">Bukti Transfer Sudah Di Terima</h3>
                          <div class="invoice-thumbnail">
                            <img src="{{url($invoice->bukti_transfer)}}"/>
                          </div>
                      @endif
                      <form method="POST" action="{{route('umum.invoice.uploadbukti',[$invoice->id, $token])}}" enctype="multipart/form-data">
                          @csrf
                        <input type="file" name="bukti" class="btn btn-dashed btn-custom w-100">
                        <br>
                        <p><b>Opsional</b> (untuk mempercepat transaksi diproses) <br> Jika tidak, akan tetap diproses sesuai ketentuan.</p>
                        <a href="#" title="">
                          <button class="btn btn-custom pl-5 pr-5">Upload</button>
                        </a>
                      </form>
                      </center>
                    </li>
                    @endif
                    @endif
                  </ul>
                  <a href="/" class="btn btn-custom-inverse mt-4 w-100">Kembali Ke Home</a>
                </div>
              </div>
            </div>
          </section>

 
@endsection
@section('js')
<script>

    $(document).ready(function(){
    
    @if($rekening[0]=="Midtrans")
                   
                    snapShow();

    @endif
                

      function snapShow(){
                          $(this).attr("disabled", "disabled");
                          $.ajax({
                            url: '{{route('midtrans.snap')}}?id={{$id}}&token={{$token}}',
                            cache: false,
                            success: function(data) {
                              //location = data;
                              console.log('token = '+data);
                              
                              var resultType = document.getElementById('result-type');
                              var resultData = document.getElementById('result-data');
                              function changeResult(type,data){
                                $("#result-type").val(type);
                                $("#result-data").val(JSON.stringify(data));
                                //resultType.innerHTML = type;
                                //resultData.innerHTML = JSON.stringify(data);
                              }
                              snap.pay(data, {
                                
                                onSuccess: function(result){
                                  changeResult('success', result);
                                  console.log(result.status_message);
                                  console.log(result);
                                  $("#payment-form").submit();
                                },
                                onPending: function(result){
                                  changeResult('pending', result);
                                  console.log(result.status_message);
                                  $("#payment-form").submit();
                                },
                                onError: function(result){
                                  changeResult('error', result);
                                  console.log(result.status_message);
                                  $("#payment-form").submit();
                                }
                              });
                            }
                          });
              }
     }); 
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
<script>
  $('.btnProgram').click(function(){
    $(this).text(function(i,old){
        return old=='+ Tampilkan' ?  '- Tutup' : '+ Tampilkan';
    });
});
</script>
      <script>
  
        function copy() {
          var copyText = document.getElementById("norek");
          copyText.select();
          document.execCommand("copy");
          alert("Telah disalin: " + copyText.value);
        }
      </script>
  
      <script>
      var countDownDate = new Date("{{$waktu->toFormattedDateString()}} {{$waktu->toTimeString()}}").getTime();
  
      var x = setInterval(function() {
  
        var now = new Date().getTime();
  
        var distance = countDownDate - now;
  
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
        document.getElementById("waktuberakhir").innerHTML =  hours + " : "
        + minutes + " : " + seconds;
  
        if (distance < 0) {
          clearInterval(x);
          $("#waktuberakhir").html("Masa Pembayaran Habis");
          $("#waktuhabis").html("Masa Pembayaran Habis");
          $("#buktitransfer").hide();
          $(".selesai").hide();
          $(".timeout").show();
        }
        else{
         $(".timeout").hide(); 
        }
      }, 1000);
      @if ($invoice->status != 2)
      setInterval(function(){ 
          
        

                 $.get( "{{route('umum.invoice.cek',[$invoice->id, $token])}}", function( data ) {
                if(data.status == 1) {
                  location.reload();
                }
                }); }, 10000);
        @endif
      </script>
    
@endsection