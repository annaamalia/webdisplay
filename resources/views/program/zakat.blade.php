@extends('layouts.app')
@section('content')
<section class="amal">
 
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-3">
            <div class="sidebar">
              <div class="sidebarlist">
                
                <form id="filterasli" method="GET">
                <h4 class="text-center"><i class="fa fa-filter"></i> Filter</h4>
                <button type="submit" class="btn btn-custom-inverse w-100">TERAPKAN</button>
                <br><br>              
                <a class="w-100" data-toggle="collapse" data-target="#asnaf" aria-expanded="true" aria-controls="asnaf">
                  <b>Kategori Program</b>
                  <i class="float-right fa" aria-hidden="true"></i>
                </a>
                <div id="asnaf" class="ml-4 collapse show">
                  @foreach ($category as $item)   
                  <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" name="category[]" value="{{$item->id}}" class="form-check-input" value="" @if(in_array($item->id, $filter['category'])) checked @endif >{{$item->category_name}}
                    </label>
                  </div>
                  @endforeach
                </div>         
                {{-- <a class="w-100" data-toggle="collapse" data-target="#wilayah" aria-expanded="true" aria-controls="wilayah">
                  <b>Wilayah</b>
                  <i class="float-right fa" aria-hidden="true"></i>
                </a>
                <div id="wilayah" class="ml-4 collapse show">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" value="">Lorem
                    </label>
                  </div>
                </div> --}}
                <br>
              </form>
              </div>
              @if ($jenis == \App\Models\Category::ZAKAT)
              <h5 class="text-center">Ingin Cepat?</h5>
              <a href="#" title="">
                <button class="btn btn-custom-inverse w-100" data-toggle="modal" data-target="#salurkanotomatis">SALURKAN OTOMATIS</button>
              </a>
              

              <!-- Modal -->
              <div class="modal fade" id="salurkanotomatis" tabindex="-1" role="dialog" aria-labelledby="salurkanotomatisLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Salurkan Otomatis</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('umum.salurkanotomatis')}}" method="post" accept-charset="utf-8" class="mt-4">
                    <div class="modal-body">
                        @if(CartHelper::getJumlahWajibZakat() != 0) 
                      <h5>Zakat sucikan hartamu</h5>
                      Pilih lembaga amil
                     
                    
                        <div class="custom-control d-block custom-radio">
                          <input type="radio" class="custom-control-input" value="10" id="salurkan1" name="programid" required>
                          <label class="custom-control-label" for="salurkan1"><img src="assets/img/baznas.png"></label>
                        </div>
                        
                        <div class="custom-control d-block custom-radio">
                          <input type="radio" class="custom-control-input" value="11" id="salurkan2" name="programid" required>
                          <label class="custom-control-label" for="salurkan2"><img src="assets/img/lazismu.png"></label>
                        </div>
                        
                        <div class="custom-control d-block custom-radio">
                          <input type="radio" class="custom-control-input" value="3" id="salurkan3" name="programid" required>
                          <label class="custom-control-label" for="salurkan3"><img src="assets/img/dompetdhuafa.png"></label>
                        </div>
                      </fieldset>
                      @endif
                                
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Tutup</button>
                      @if(CartHelper::getJumlahWajibZakat() != 0)
                      <button type="submit" class="btn btn-custom-inverse">Selanjutnya</button>
                      @else
                    <a href="{{route('umum.kalkulatorzakat')}}" class="btn btn-custom-inverse"> Hitung Zakat Terlebih Dahulu</a>
                      @endif
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <p class="text-center">
                Zakat kamu akan disalurkan pada program pilihan
              </p>
              @endif
            </div>
          </div>

          <div class="col-md-9 listcard">
            @if ($jenis == \App\Models\Category::ZAKAT)
            <h2>Zakat Sucikan Harta, Membangun Umat</h2>
            <h3>#ZakatHebat</h3>
            @else
            <h2>Sedekah Bawa Berkah Untuk Semua</h2>
            <h3>#SedekahBerkah</h3>
            @endif
            
            <form id="filter" method="GET">
            <div class="d-flex">
            <div class="p-2">Daftar Program <b>1 - {{$jumlah}}</b> dari <b>{{$jumlah}}</b></div>
              <div class="ml-auto p-2">
                <div class="col-auto">
                  <select id="selecfilter" class="custom-select mr-sm-2" name="urutkan">
                
                   <option value="sesuai" selected>Paling sesuai</option>
                    <option value="terpopuler" @if($filter['urutkan'] == 'terpopuler') selected @endif >Terpopuler</option>
                    <option value="hampir_berhasil" @if($filter['urutkan'] == 'hampir_berhasil') selected @endif >Hampir berhasil</option>
                    <option value="kurang_dana" @if($filter['urutkan'] == 'kurang_dana') selected @endif >Kurang dana</option>
                    <option value="hampir_berakhir" @if($filter['urutkan'] == 'hampir_berakhir') selected @endif >Hampir Berakhir</option>
                  </select>
                </div>
              </div>
            </div>
            <br>
            
            <div class="input-group">
                <input type="text" class="form-control" name="cari" value="{{$filter['cari']}}" placeholder="Aku ingin beramal...">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
            <br>

            @foreach ($programs as $program)   
            <div class="col-lg-4">
              <div class="card">
                <a href="{{route('umum.program.show', $program->id)}}" title="">
                  <div class="card-image">
                    <img class="img-fluid" src="{{url($program->gambar_cover)}}" alt="Card image cap">
                  </div>
                </a>
                <span class="align-self-end tag"><a href="{{route('umum.program.show', $program->id)}}">{{$program->category->category_name}}</a></span>
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
                      <h4 class="align-middle text-center">{{$program->title}}</h4>
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
          <div class="container">
            <nav class="d-block w-100 mt-4">
                <center>
              {{$programs->appends(request()->input())->links()  }}             
            </center>
                
            </nav>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('js')
<script>
  $('#filterasli').submit(function(e) {
    //e.preventDefault();
    
    $('#filter :input').not(':submit, select').clone().hide().appendTo('#filterasli');
    $('<input />').attr('type', 'hidden')
          .attr('name', "urutkan")
          .attr('value', $('#selecfilter option:selected').val())
          .appendTo('#filterasli');
  })
  $('#selecfilter').change(function(e) {
    $('#filterasli').submit();
  });

  $('#filter').submit(function(e) {
    e.preventDefault();
    $('#filterasli').submit();
  })
</script>
@endsection