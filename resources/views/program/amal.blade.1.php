@extends('layouts.app')

@section('content')
  <section class="candy-wrapper">
    <div style="padding-top: 3em;">
      <div class="container">
        <form action="{{route('umum.donatur.store')}}" method="POST">
        @csrf
        <div id="main_area" class="col-md-8">
          <div class="row">
            <h1>Jumlah yang di amalkan</h1>
            <input type="number" class="form-control" name="jumlah">
          </div>
          <div class="row">
              <h1>Identitas</h1>
              <h5>Nama : </h5>
              <input type="text" class="form-control" name="nama">
              <h5>Nomor Hp : </h5>
              <input type="text" class="form-control" name="nomorhp">
            </div>
            <div class="row">
                <h1>Pilih Rekening</h1>
                <div class="radio">
                    <label><input type="radio" name="rekening" value="Mandiri 16161261">Mandiri 16161261</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="rekening" value="BCA 5135125151">BCA 5135125151</label>
                  </div>
              </div>
              <div class="row">
                  <button type="input" class="btn btn-sm btn-orange">Amal</button>
              </div>
        </div>
        <input type="hidden" name="program" value="{{$id}}">
      </form>
      </div>
    </div>
  </section>
  @endsection

