@extends('layouts.app')

@section('content')
<section class="amal">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-3">
          <div class="sidebar">
            <div class="sidebarlist">

              <h4 class="text-center"><i class="fa fa-sort-amount-asc"></i> Urutkan</h4>
              <button type="submit" class="btn btn-custom-inverse w-100">TERAPKAN</button>
              <br><br>
              
              <a class="w-100" data-toggle="collapse" data-target="#kategori" aria-expanded="true" aria-controls="kategori">
                <b>Kategori</b>
                <i class="float-right fa" aria-hidden="true"></i>
              </a>
              <div id="kategori" class="ml-4 collapse show">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Pembangunan
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Pergerakan
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Pemberdayaan
                  </label>
                </div>
              </div>  
              <a class="w-100" data-toggle="collapse" data-target="#wilayah" aria-expanded="true" aria-controls="wilayah">
                <b>Wilayah</b>
                <i class="float-right fa" aria-hidden="true"></i>
              </a>
              <div id="wilayah" class="ml-4 collapse show displayscroll">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Nasional
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">DKI Jakarta
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Jawa Barat
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Jawa Timur
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">Banten
                  </label>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>

        <div class="col-md-9 listcard">
          <h2>Sedekah Bawa Berkah Untuk Semua</h2>
          <h3>#SedekahBerkah</h3>

          <div class="d-flex">
            <div class="p-2">Daftar Program <b>1 - 9</b> dari <b>200</b></div>
            <div class="ml-auto p-2">
              <div class="col-auto">
                <select class="custom-select mr-sm-2">
                  <option selected disabled>Urutkan</option>
                  <option value="paling sesuai">Paling sesuai</option>
                  <option value="terpopuler">Terpopuler</option>
                  <option value="hampir berhasil">Hampur berhasil</option>
                  <option value="kurang dana">Kurang dana</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <form method="GET">
          <div class="input-group">
            <input type="text" class="form-control" name="cari" value="{{$cari}}" placeholder="Aku ingin beramal...">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary" type="button">
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
      </div>
    </div>
  </section>


      <script>
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })
      </script>

  @endsection

