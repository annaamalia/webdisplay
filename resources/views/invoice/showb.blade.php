@extends('layouts.app')
@section('content')  
<section class="step">
    <ul class="nav nav-pills nav-wizard justify-content-center">
      <li class="nav-item">
        <a class="nav-link checked" href="#">Kotak Amal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link checked" href="#">Metode Pembayaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link checked" href="#">Identitas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Selesai</a>
      </li>
    </ul>
  </section>  

  <section class="selesai">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-center">
            
            @if ($invoice->status == 2)
            <div class="p-2"><h2><i class="fa fa-check-square-o"></i></h2></div>
            <div class="p-2"><h2>Selesai</h2></div>
            @else
            <div class="p-2"><h2><i class="fa fa-square-o"></i></h2></div>
            <div class="p-2"><h2>Selangkah lagi</h2></div>
            @endif
          </div>
         
          @if ($invoice->status == 2)
          <h3 class="text-center">Terima Kasih!</h3>
          <p class="text-center">Kamu sudah tunaikan. </p>
          @else
          <p class="text-center">Ikuti langkah pembayaran berikut untuk menyelesaikan transaksi</p>
          @endif
          
          
          <div class="box">


  <div class="container py-2">
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-amalbox">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Program</h4>
                  <p class="card-text">
                    
                  </p>
                  <h2>
                    Rp. {{substr($invoice->uniq,0,-3)}}.<span class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Harap masukan jumlah transfer sesuai dengan nominal diatas">{{substr($invoice->uniq,-3)}}</span>,00
                  </h2>
                  <button class="btn btn-sm btn-custom" type="button" data-target="#t2_details" data-toggle="collapse">Tampilkan <i class="fa fa-angle-down"></i></button>
                  <div class="collapse" id="t2_details">
                    <table class="table table-striped table-hover table-sm table-bordered">
                      <tbody>
                          @php
                            $no = 0;
                          @endphp
                          @foreach ($invoice->program_donatur as $item)
                          @php
                              $no++;
                          @endphp
                        <tr>
                          <th scope="row">{{$no}}</th>
                        <td><b>{{$item->program->title}}</b></td>
                          <td>{{$item->program->pembuat->name}}</td>
                          <td>{{$item->program->location}}</td>
                          <td>                            
                            <span class="tag"><a href="#" title="Fakir Miskin">{{$item->program->category->category_name}}</a></span>
                          </td>
                          <td>{{$item->value}}</td>
                        </tr>    
                        
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 3 -->
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-amalbox">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Transfer</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <span class="bank"><img src="{{url('assets/img/'.strtolower($rekening[0]).'.png')}}" width="160"></span>
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="norek" id="norek" readonly class="norek" value="{{$rekening[1]}}">
                      <button onclick="copy()" class="btn btn-custom"> Salin</button>
                      <br><h5>{{$rekening[2]}}</h5>
                    </div>
                  </div>
                <h6 class="text-center">Maksimal transfer pada <b>{{$waktu->toFormattedDateString()}}</b> pukul <b>{{$waktu->toTimeString()}} WIB</b></h6>
                  
                @if ($invoice->status == 2)
                <h2 class="text-center" id="waktuberakhir" style="display: none;"></h2>
                <h2 class="text-center">Dana sudah kami terima.</h2>
                @else
                <h2 class="text-center" id="waktuberakhir"></h2>
                @endif
                
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 4 -->
  @if ($invoice->status != 2)
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-amalbox">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Upload Bukti</h4>
                  @if ($invoice->bukti_transfer)
                      Bukti Transfer Sudah Kami Terima
                  @endif
              <form method="POST" action="{{route('umum.invoice.uploadbukti',[$invoice->id, $token])}}" enctype="multipart/form-data">
                @csrf
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="bukti" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <button  class="btn btn-custom"> Upload</button>
                </form>
                  <h6 class="text-center mt-3"><b>Opsional</b> (Untuk mempercepat transaksi diproses) <br> Jika tidak, akan tetap diproses sesuai ketentuan</h6>
              </div>
          </div>
      </div>
  </div>
  @endif
  <!--/row-->
</div>
            
            {{-- <div class="d-flex">
              <div class="p-2">
                <a href="identitas.html" title="Kembali ke Program" class="btn btn-custom"><i class="fa fa-angle-left"></i> Sebelumnya</a>
              </div>
            </div> --}}

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
<script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
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
  
        document.getElementById("waktuberakhir").innerHTML = days + " : " + hours + " : "
        + minutes + " : " + seconds;
  
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
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