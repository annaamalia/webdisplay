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
    background: #3BABA3;
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
    color: #3BABA3;
}
.process-model li.active a,
.process-model li.active a:hover,
.process-model li.active a:focus,
.process-model li.visited a,
.process-model li.visited a:hover,
.process-model li.visited a:focus {
    color: #3BABA3;
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
    border-color: #3BABA3;
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
          <li role="presentation" class="active"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>
            <p>Kotak Amal</p>
            </a></li>
          <li role="presentation"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-credit-card"></i>
            <p>Pembayaran</p>
            </a></li>
          <li role="presentation"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-user-o"></i>
            <p>Identitas</p>
            </a></li>
          <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-check-square-o"></i>
            <p>Selesai</p>
            </a></li>
        </ul>
    </div>
  </div>
</section>
  <div style="min-height: 600px;">
    
  <section class="kotakamal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex justify-content-center">
              <div class="p-2"><img src="assets/img/kotak.png" width="40" alt=""></div>
              <div class="p-2"><h2>Isi Kotak Amal & Zakat</h2></div>
            </div>
            <div class="box">
              <div class="table-responsive">
                <table class="table table-striped table-hover table-sm table-bordered">
                  <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($isicart as $item)                    
                    @php
                        $i++;
                    @endphp
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td><b>{{$item->program->title}} </b> <span class="tag @if($item->program->category->jenis() == App\Models\Category::ZAKAT)tag-zakat @endif"><a href="#" title="Pergerakan">{{$item->program->category->jenis()}}</a></span> 
                      @if($item->comment!="")
                        <i data-toggle="tooltip" data-placement="top" title="{{$item->comment}}" class="fa fa-commenting-o fa-lg"></i> 
                        @endif
                      </td>
                      <td>{{$item->program->pembuat->name}}</td>
                      <td>{{$item->program->location}}</td>
                      <td>
                        <span class="tag"><a href="#" title="{{$item->program->category->subjenis()}}">{{$item->program->category->subjenis()}}</a></span>
                      </td>
                      <td>Rp. {{number_format($item->value, 0,',','.')}}</td>
                      <td><a href="{{route('umum.destroyprogram', ['id' => $item->id])}}" title="Hapus"><i class="fa fa-trash fa-lg"></i></a></td>
                    </tr>               
                    @endforeach
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="kotakamal">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="d-flex flex-row align-content-center justify-content-around text-center">
                  <div class="p-2"><img src="assets/img/iconamal.png" height="120" alt=""></div>
                  <div class="p-2"><h4>Total Amal</h4><h2>Rp. {{number_format(CartHelper::getJumlahAmalTersalurkan(), 0,',','.')}}</h2><a href="{{route('umum.program.amalall')}}" class="btn btn-custom w-100">Tambah Amal</a><br>&nbsp;</div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div class="d-flex flex-row align-content-center justify-content-around text-center">
                  <div class="p-2"><img src="assets/img/iconzakat.png" height="120" alt=""></div>
                  <div class="p-2"><h4>Total Zakat</h4><h2>Rp. {{number_format(CartHelper::getJumlahZakatTersalurkan(), 0,',','.')}}</h2><a href="{{route('umum.program.zakatall')}}" class="btn btn-custom w-100">Tambah Zakat</a><br>Wajib Zakat <b>Rp. {{number_format(CartHelper::getJumlahWajibZakat(), 0,',','.')}}</b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <section class="kotakamal">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
          <br>
            <h4 class="text-center">Total amal dan zakat yang akan disalurkan</h4>
            <h3 class="font-weight-bold text-center">Rp. {{number_format(CartHelper::getJumlahTersalurkan(), 0,',','.')}}</h3><br>       
            <div class="d-flex flex-wrap">
              <div class="ml-auto p-2">
                <div class="p-2">
                  @if (CartHelper::getJumlahTersalurkan() != 0)                  
                  <a href="{{route('umum.cart.pembayaran')}}" id="btnselanjutnya" title="Selanjutnya" class="btn btn-custom-inverse">Selanjutnya <i class="fa fa-angle-right"></i></a>
                  @endif
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <div class="myAlert-zakat-kurant alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Perhatian!</strong> Mohon tambahkan program zakat untuk menunaikan zakat sisa zakat anda sebesar Rp.{{number_format(CartHelper::getJumlahWajibZakat() - CartHelper::getJumlahZakatTersalurkan(), 0,',','.')}}
    </div>

  </div>
  
@endsection

@section('js')
<script>
       $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
      $('#btnselanjutnya').click(function(e) {
       @if( CartHelper::getJumlahWajibZakat() - CartHelper::getJumlahZakatTersalurkan() != 0)
       e.preventDefault();
       $(".myAlert-zakat-kurant").show();
          setTimeout(function(){
            $(".myAlert-minimal").hide(); 
          }, 4000);

       @endif
       
       
      });
              
      </script>
    
    
@endsection