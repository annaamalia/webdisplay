@extends('layouts.app')

@section('content')
<section class="detail">
  <div class="container">
    <div class="row">
      <div class="col-md-8 konten" id="konten">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @php
              $i = 1;
            @endphp
            @foreach ($program->images as $image)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @php
            $i++;
            @endphp
            @endforeach
          </ol>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100" src="{{url($program->gambar_cover)}}" alt="First slide">
                </div> 
            @foreach ($program->images as $image)
            <div class="carousel-item ">
              <img class="d-block w-100" src="{{url($image->path)}}" alt="First slide">
            </div>            
            @endforeach        
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <nav class="tab">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="true">Detail</a>
          <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>
          <a class="nav-item nav-link" id="nav-donatur-tab" data-toggle="tab" href="#nav-donatur" role="tab" aria-controls="nav-donatur" aria-selected="false">Donatur</a>
          <a class="nav-item nav-link" id="nav-pesan-tab" data-toggle="tab" href="#nav-pesan" role="tab" aria-controls="nav-pesan" aria-selected="false">Pesan</a>
        </div>
        </nav>

        <div class="konten-detail">
          <div class="tab-content" id="nav-tabContent">

              <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                <h2 class="text-center">{{$program->title}}</h2>
                {!!$program->detail!!}
              </div>

              <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                @foreach ($program->programinfo()->orderby('created_at')->get() as $item)                    
                <div class="updatecard">
                <h3>{{$item->title}}</h3>
                {{$item->created_at}}
                  <hr>
                  <br>
                  {!!$item->detail!!}
                </div>   
                @endforeach         
              </div>

              <div class="tab-pane fade" id="nav-donatur" role="tabpanel" aria-labelledby="nav-donatur-tab">
                
                @foreach ($program->donasilunas as $donatur)
                  
            
                <div class="d-flex path donatur">
                  <div class="p-2"><img src="{{url('assets/img/icon.png')}}"></div>
                  <div class="p-2">@if ($donatur->anonim == 1)
                    Anonim
                    @else
                    {{$donatur->invoice->user->name}}
                  @endif  <br> <span>{{$donatur->created_at}}</span></div>
                  <div class="ml-auto p-2"><h5>Rp. {{number_format($donatur->value, 0,',','.')}}</h5></div>
                </div>
                
                @endforeach
              </div>
              <div class="tab-pane fade" id="nav-pesan" role="tabpanel" aria-labelledby="nav-pesan-tab">
                <h3 class="text-center">Kirimkan pesan kepada <b>Lorem ipsum</b></h3>
                <form>
                  <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="name" class="form-control" id="namaLengkap">
                  </div>
                  <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control" id="perihal">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea name="" class="form-control" id="pesan" rows="6"></textarea>
                  </div>
                  <button type="submit" class="btn btn-custom-inverse w-100">KIRIM PESAN</button>
                </form>
              </div>
            </div>
        </div>

      </div>

          <div class="col-lg-3 custom-sidebar abs-bawah">
            <div class="sidebar">
              <h4 class="text-center">{{$program->title}}</h4>
              <br>
              <center>
              <span class="tag"><a href="#">{{$program->category->category_name}}</a></span>    
              </center>
              <div class="zakatsekarang">
                <form method="POST" id="formtambahdonasi" action="{{route('umum.tambahprogram')}}">
                  @csrf
                  @if($program->category->jenis() != App\Models\Category::ZAKAT || CartHelper::getJumlahWajibZakat() != 0)
                  <fieldset >
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="hidden" name="id" value="{{$program->id}}">
                    <input type="text" autocomplete="off" class="form-control" step="1000" min="0" id="jumlahdonasi" name="jumlah">
                  </div>
                  <div class="slidecontainer">
                      @if ($program->category->jenis() == App\Models\Category::ZAKAT)
                    <input type="range" min="0" max="{{CartHelper::getJumlahWajibZakat() - CartHelper::getJumlahZakatTersalurkan() + CartHelper::getJumlahTersalurkanByProgram($program)}}" value="0" class="slider" id="myRange">
                   
                    Jumlah zakat yang belum tersalurkan sebesar : Rp {{number_format(CartHelper::getJumlahWajibZakat() - CartHelper::getJumlahZakatTersalurkan() + CartHelper::getJumlahTersalurkanByProgram($program), 0,',','.')}}
                    @endif
                    @if(CartHelper::getJumlahTersalurkanByProgram($program)) 
                    <br>Yang akan tersalurkan pada program ini : {{number_format(CartHelper::getJumlahTersalurkanByProgram($program))}}
                    @endif
                  </div><br>
                  <textarea name="comment" class="form-control mb-3" rows="3" placeholder="Tulis doa/pesan/support-mu disini..."></textarea>
                  <button type="submit" class="btn btn-custom-inverse w-100">
                      @if ($program->category->jenis() == App\Models\Category::ZAKAT)
                      ZAKAT
                      @else 
                      AMAL
                      @endif
                       SEKARANG
                  </button>
                 
                  </fieldset>
                  @endif
                
                </form>
                @if($program->category->jenis() == App\Models\Category::ZAKAT && CartHelper::getJumlahWajibZakat() == 0) 
                <a href="{{route('umum.kalkulatorzakat', ['id' => $program->id])}}"><button class="btn btn-custom-inverse w-100">Hitung Zakat</button></a>
                @endif
              </div>
              <h4 class="text-center">Terkumpul</h4>
              <h4 class="text-center"> Rp. {{$program->jumlahdonasi(true)}} </h4>
              <br>
              <div class="progress w-100">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$program->jumlahdonasipersen()}}" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
              </div>
              <div class="d-flex">
                <div class="p-2">dari Rp. {{$program->targetDonation(true)}} <br> {{$program->waktuTersisa()}} Hari lagi</div>
                <div class="ml-auto p-2">{{$program->jumlahdonasipersen()}}%</div>
              </div><br>  
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
              <div class="share">
                Bagikan <br>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode('mamat.id')}}" target="_blank"><img src="{{url('assets/img/facebook.png')}}"></a>
                <a href="https://wa.me/?text={{urlencode(route('umum.program.show', [$program->id]))}}" target="_blank"><img src="{{url('assets/img/whatsapp.png')}}"></a>
                <a href="https://twitter.com/share?text=share&url=https://mamat.id" target="_blank"><img src="{{url('assets/img/twitter.png')}}"></a>
                <a href="https://social-plugins.line.me/lineit/share?url={{urlencode('https://mamat.id')}}" target="_blank"><img src="{{url('assets/img/line.png')}}"></a>              
              </div>
            </div>
          </div>
<!--
      <div class="col-md-4">
        <div class="sidebar">
          <h4 class="text-center">{{$program->title}}</h4>
          <br>
          <center>      
          <span class="tag"><a href="#">{{$program->category->category_name}}</a></span>              
          </center>
          <div class="zakatsekarang">
            <form method="POST" action="{{route('umum.tambahprogram')}}">
              @csrf
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
              <input type="hidden" name="id" value="{{$program->id}}">
                <input type="number" class="form-control" id="value" name="jumlah">
               
              </div>
              Dalam Ribuan
              <div class="slidecontainer">
                  @if ($program->category->jenis() == App\Models\Category::ZAKAT)
                <input type="range" min="0" max="{{CartHelper::getJumlahWajibZakat() - CartHelper::getJumlahZakatTersalurkan()}}" value="0" class="slider" id="myRange">
                @endif
              </div><br>
              <button type="submit" class="btn btn-custom-inverse w-100">
                @if ($program->category->jenis() == App\Models\Category::ZAKAT)
                ZAKAT
                @else 
                AMAL
                @endif
                 SEKARANG
              </button>
            </form>
          </div>
          <h4 class="text-center">Terkumpul</h4>
          <h4 class="text-center"> Rp {{number_format($program->jumlahdonasi(), 0,',','.')}} </h4>
          <br>
          <div class="progress w-100">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$program->jumlahdonasipersen()}}" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
          </div>
          <div class="d-flex">
            <div class="p-2">dari Rp. {{number_format($program->target_donation, 0,',','.')}} <br> {{$program->waktuTersisa()}} Hari lagi</div>
            <div class="ml-auto p-2">{{$program->jumlahdonasipersen()}}%</div>
          </div><br>  
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
          <div class="share">
            Bagikan <br>
            <a href="#"><img src="{{url('assets/img/facebook.png')}}"></a>
            <a href="#"><img src="{{url('assets/img/whatsapp.png')}}"></a>
            <a href="#"><img src="{{url('assets/img/twitter.png')}}"></a>
            <a href="#"><img src="{{url('assets/img/line.png')}}"></a>
          </div>
        </div>
      </div>
    -->
    </div>
  </div>
</section>


<div class="myAlert-minimal alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Kesalahan!</strong> Jumlah Donasi Minimal Rp 10.000
</div>
<div class="myAlert-ribuan alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Kesalahan!</strong> Mohon masukan angka dengan kelipatan ribuan.
</div>

  @endsection

  @section('js')
      <script>
           autonumericrp = {
    digitGroupSeparator        : '.',
    decimalCharacter           : ',',
    decimalPlaces              : 0
};
      var jumlahdonasi = new AutoNumeric('#jumlahdonasi', autonumericrp);
    @if($program->category->jenis()  == App\Models\Category::ZAKAT )
      var slider = document.getElementById("myRange");
    slider.step = "1000"
    var output = document.getElementById("jumlahdonasi");
    output.value = slider.value;

    slider.oninput = function() {
      jumlahdonasi.set(this.value);
    }
    @endif
     
      $('#formtambahdonasi').submit(function(e) {
        if(jumlahdonasi.get() < 10000) {
          $(".myAlert-minimal").show();
          setTimeout(function(){
            $(".myAlert-minimal").hide(); 
          }, 4000);
          e.preventDefault();
        }

        else if((jumlahdonasi.get() % 1000) != 0) {
          $(".myAlert-ribuan").show();
          setTimeout(function(){
            $(".myAlert-ribuan").hide(); 
          }, 4000);
          e.preventDefault();
        }
        
      })

    </script>

  @endsection

