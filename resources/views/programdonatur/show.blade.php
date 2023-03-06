@extends('layouts.sh')

@section('content')
  <section class="candy-wrapper">
    <div style="padding-top: 3em;">
      <div class="container">
        <form action="{{route('umum.donatur.store')}}" method="POST">
        @csrf
        <div id="main_area" class="col-md-8">
          <div class="row">
            <h1>Jumlah yang di amalkan</h1>
          <h3>Rp {{$donatur->value}}</h3>
          </div>
          <div class="row">
              <h1>Transfer ke rekening</h1>
              <h3>{{$donatur->rekening}}</h3>
            </div>            
        </div>
        
      </form>
      </div>
    </div>
  </section>
  @endsection

