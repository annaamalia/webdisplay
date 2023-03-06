@extends('layouts.app')
@section('content')
    
<div class="bgyellow">
  
    <section class="kalkulator-zakat space-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 kalkulator">
            <ul class="nav nav-pills mb-2 mt-2" id="pills-tab" role="tablist" style="border: 0;">
              <li class="col-md-4" style="padding: 0;">
                <a class="w-100 btn btn-custom active" id="pills-profesi-tab" data-toggle="pill" href="#pills-profesi" role="tab" aria-controls="pills-profesi" aria-selected="true" onclick="hideKetA()"><i class="fa fa-building-o"></i> Profesi</a>
              </li>
              <li class="col-md-4" style="padding: 0;">
                <a class="w-100 btn btn-custom" id="pills-usaha-tab" data-toggle="pill" href="#pills-usaha" role="tab" aria-controls="pills-usaha" aria-selected="false" onclick="hideKetB()"><i class="fa fa-briefcase"></i> Usaha</a>
              </li>
              <li class="col-md-4" style="padding: 0;">
                <a class="w-100 btn btn-custom" id="pills-simpanan-tab" data-toggle="pill" href="#pills-simpanan" role="tab" aria-controls="pills-simpanan" aria-selected="false" onclick="hideKetC()"><i class="fa fa-credit-card"></i> Maal</a>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
  
              <div class="tab-pane fade show active" id="pills-profesi" role="tabpanel" aria-labelledby="pills-profesi-tab">
                <div class="row">
                  
                <div class="col-sm-12">
                  
                  <div class="form-row">
                    <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons" id="per">
                      <label class="btn btn-pilihan active">
                        <input type="radio" name="options" id="bulanan" value="bulanan" autocomplete="off" checked> Bulanan
                      </label>
                      <label class="btn btn-pilihan">
                        <input type="radio" name="options" id="tahunan" value="tahunan" autocomplete="off"> Tahunan
                      </label>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="a" type="text" class="form-control uang" placeholder="Pendapatan perbulan (wajib)" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah pendapatan bruto/kotor yang didapat dalam satu bulan">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="b" type="text" class="form-control uang" placeholder="Pendapatan lain (jika ada)" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah pendapatan bruto/kotor lain yang didapat dalam satu bulan">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="c" type="text" class="form-control uang" placeholder="Hutang/Cicilan (jika ada)" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah hutang/cicilan untuk kebutuhan primer (sandang,pangan,papan)">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <button class="btn btn-custom-inverse w-100" id="hitungzakatprofesi">Hitung</button>
                    </div>
                  </div>

                </div>


                </div>

              </div>

              <div class="tab-pane fade" id="pills-usaha" role="tabpanel" aria-labelledby="pills-usaha-tab">
                <div class="row">
                  
                <div class="col-sm-12">
                  
                  <div class="form-row">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="e" type="text" class="form-control uang" placeholder="Modal Setahun" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah modal yang dibutuhkan untuk menjalankan usaha selama satu tahun">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="f" type="text" class="form-control uang" placeholder="Keuntungan Setahun" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah keuntungan total yang didapat selama setahun (Jika mengalami keuntungan)">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="g" type="text" class="form-control uang" placeholder="Hutang/Kerugian Setahun" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah kerugian total yang dialami selama setahun (Jika mengalami kerugian)">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="h" type="text" class="form-control uang" placeholder="Hutang Jatuh Tempo" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah hutang usaha yang jatuh tempo pada tahun tersebut">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="i" type="text" class="form-control uang" placeholder="Piutang Dagang" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah piutang yang dimiliki dan jatuh tempo pada tahun tersebut">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <button class="btn btn-custom-inverse w-100" id="hitungzakatusaha">Hitung</button>
                    </div>
                  </div>

                </div>


                </div>
              </div>

              <div class="tab-pane fade" id="pills-simpanan" role="tabpanel" aria-labelledby="pills-simpanan-tab">
                <div class="row">
                  
                <div class="col-sm-12">
                  
                  <div class="form-row">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Gram</span>
                      </div>
                      <input id="o" type="text" class="form-control" placeholder="Berat Emas yang dimiliki" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah berat emas yang dimiliki dalam gram">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Gram</span>
                      </div>
                      <input id="p" type="text" class="form-control" placeholder="Berat Perak yang dimiliki" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah berat perak yang dimiliki dalam gram">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="q" type="text" class="form-control uang" placeholder="Nilai Tabungan/Deposito/Giro" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah simpanan uang (tabungan, deposito, dll) yang dimiliki baik non-cash maupun cash">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="r" type="text" class="form-control uang" placeholder="Nilai Surat Berharga" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah nilai surat berharga (saham, obligasi, cek, giro, dll) yang dimiliki">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input id="s" type="text" class="form-control uang" placeholder="Nilai Properti dan Kendaraan" aria-describedby="basic-addon">
                      <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Jumlah nilai properti dan kendaraan yang tidak digunakan untuk sehari-hari">
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-info"></i></span>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <button class="btn btn-custom-inverse w-100" id="hitungzakatsimpanan">Hitung</button>
                    </div>

                  </div>

                </div>


                </div>
              </div>

            </div>
          </div>

                <div class="col-md-6 keta">
                  <center>
                    <div class="pengertiana">
                      <h1 class="font-weight-bold">Ayo Berzakat!</h1>
                      <h3>Zakat sucikan hartamu</h3>
                      <h5><b>Zakat Profesi</b> adalah zakat yang
                          dikeluarkan dari penghasilan
                          <b>profesi</b> bila telah mencapai nisab</h5>
                    </div>
                    <div class="wajibZakat dis-none">
                      <h2><strong>Wajib Zakat Profesimu</strong></h2>
                      <h2>Rp. <span id="profesiHasil"></span></h2>
                      <a href="#"><button class="btn btn-custom-inverse" id="btnzakatprofesi">Tunaikan Zakat</button></a>                      
                    </div>
                    <div class="belumWajibZakat dis-none">
                      <center>
                        <h4>Kamu masih belum wajib zakat, tapi beramal pasti masih bisa!</h4>
                        <a href="{{route('umum.program.amalall')}}"><button class="btn btn-custom-inverse">Beramal Sekarang</button></a>
                      </center>
                    </div>
                  </center>
                </div>

                <div class="col-md-6 ketb dis-none">
                  <center>
                    <div class="pengertianb">
                      <h1 class="font-weight-bold">Ayo Berzakat!</h1>
                      <h3>Zakat sucikan hartamu</h3>
                      <h5><b>Zakat Usaha</b> adalah zakat yang
                          dikeluarkan dari <b>hasil usaha</b> bila
                          telah mencapai nisab
                      </h5>
                    </div>
                    <div class="wajibZakatb dis-none">
                      <h2><strong>Wajib Zakat Usahamu</strong></h2>
                      <h2>Rp. <span id="usahaHasil"></span></h2>
                      <a href="#"><button class="btn btn-custom-inverse" id="btnzakatusaha">Tunaikan Zakat</button></a>
                    </div>
                    <div class="belumWajibZakatb dis-none">
                      <center>
                        <h4>Kamu masih belum wajib zakat, tapi beramal pasti masih bisa!</h4>
                        <a href="{{route('umum.program.amalall')}}"><button class="btn btn-custom-inverse">Beramal Sekarang</button></a>
                      </center>
                    </div>
                  </center>
                </div>


                <div class="col-md-6 ketc dis-none">
                  <center>
                    <div class="pengertianc">
                      <h1 class="font-weight-bold">Ayo Berzakat!</h1>
                      <h3>Zakat Maal</h3>
                      <h5><b>Zakat Maal</b> adalah zakat yang dikeluarkan dari harta simpanan bila telah mencapai nisab
                      </h5>
                    </div>
                    <div class="wajibZakatc dis-none">
                      <h2><strong>Wajib Zakat Hartamu</strong></h2>
                      <h2>Rp. <span id="simpananHasil"></span></h2>
                      <a href="#"><button class="btn btn-custom-inverse" id="btnzakatharta">Tunaikan Zakat</button></a>
                    </div>
                    <div class="belumWajibZakatc dis-none">
                      <center>
                        <h4>Kamu masih belum wajib zakat, tapi beramal pasti masih bisa!</h4>
                        <a href="{{route('umum.program.amalall')}}"><button class="btn btn-custom-inverse">Beramal Sekarang</button></a>
                      </center>
                    </div>
                  </center>
                </div>
        </div>
      </div>
    </section>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="tunaikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <center>
            <h5 class="modal-title" id="exampleModalLongTitle">Tunaikan Zakat</h5>
              </center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <center>
            <h3>Ayo berzakat!</h3>
            <h5>Zakat sucikan hartamu</h5>
              </center>
            <hr>
            <table class="table table-striped table-hover table-sm table-bordered">
              <tbody>
                <tr>
                  <th scope="row">Zakat Profesi</th>
                  <td id="zakatprofesimodal">Rp. 1.000.000</td>
                  <td><a href="#" id="btnzakatprofesi_hapus" title="Hapus"><i class="fa fa-trash fa-lg"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">Zakat Usaha</th>
                  <td id="zakatusahamodal">Rp. 1.000.000</td>
                  <td><a href="#" id="btnzakatusaha_hapus" title="Hapus"><i class="fa fa-trash fa-lg"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">Zakat Maal</th>
                  <td id="zakathartamodal">Rp. 1.000.000</td>
                  <td><a href="#" id="btnzakatharta_hapus" title="Hapus"><i class="fa fa-trash fa-lg"></i></a></td>
                </tr>
              </tbody>
            </table>
            <hr>
            <center>
            <h4>Total Wajib Zakat</h4>
            <h4 id="jumlahwajibzakat">Rp. 3.000.000</h4>
            <br><br>
            Selesai hitung? <br>
            <div class="d-block w-100">
	            @if ($program)
	            <a href="{{route('umum.program.show', ['id' => $program->id])}}" class="btn btn-custom-inverse">Kembali Ke Program {{$program->title}}</a>
	            @else
	              <a href="{{route('umum.program.zakatall')}}" class="btn btn-custom-inverse">Pilih Program</a>
	            @endif
            </div>
          
            </center>
          </div>
          <div class="modal-footer kustom-kalkulator">
              <center>
            <button type="button" class="btn btn-custom" data-dismiss="modal">Ubah/Tambah Zakat</button>
              </center>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('js')
      <script>
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })
      </script>
      <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
      <script>
              
              
                
              
        function hideKetA() {
          $('.keta').removeClass('dis-none');
          $('.ketb').addClass('dis-none');
          $('.ketc').addClass('dis-none');
        }
      function hideKetB() {
          $('.ketb').removeClass('dis-none');
          $('.keta').addClass('dis-none');
          $('.ketc').addClass('dis-none');
        }
      function hideKetC() {
          $('.ketc').removeClass('dis-none');
          $('.ketb').addClass('dis-none');
          $('.keta').addClass('dis-none');
        }
$(document).ready(function(){
  function nitik(x) {
          var parts = x.toString().split(".");
          parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g,".");
          return parts.join(",");
          }

                  // Format mata uang.
                  $( '.uang' ).mask('000.000.000.000', {reverse: true});                 

                  $('#btnzakatprofesi').click(function(e) {
                    updatezakat('zakatprofesi', $(this).data('jumlah'));
                  })

                  $('#btnzakatusaha').click(function(e) {
                    updatezakat('zakatusaha', $(this).data('jumlah'));
                  })

                  $('#btnzakatharta').click(function(e) {
                    updatezakat('zakatharta', $(this).data('jumlah'));
                  })        

                   $('#btnzakatprofesi_hapus').click(function(e) {
                    $('#btnzakatprofesi').data("jumlah", 0);
                    $('#btnzakatprofesi').click();
                  })

                   $('#btnzakatusaha_hapus').click(function(e) {
                    $('#btnzakatusaha').data("jumlah", 0);
                    $('#btnzakatusaha').click();
                  })

                   $('#btnzakatharta_hapus').click(function(e) {
                    $('#btnzakatharta').data("jumlah", 0);
                    $('#btnzakatharta').click();
                  })

                  function updatezakat(jenis, jumlah) {
                    $.post( "{{route('umum.tambahzakat')}}", { jenis, jumlah} )
                    .done(function(data) {
                      getsemuazakat();
                    });
                  }

                   function getsemuazakat() {
                    $.get( "{{route('umum.semuazakat')}}" )
                    .done(function(data) {
                      if(data.data.zakatprofesi === null) {
                        data.data.zakatprofesi = 0;
                      }
                      if(data.data.zakatusaha === null) {
                        data.data.zakatusaha = 0;
                      }
                      if(data.data.zakatharta === null) {
                        data.data.zakatharta = 0;
                      }
                      var jumlahzakat = data.data.zakatprofesi + data.data.zakatusaha + data.data.zakatharta;

                        $('#zakatprofesimodal').html('Rp. ' + nitik(data.data.zakatprofesi));
                        $('#zakatusahamodal').html('Rp. ' + nitik(data.data.zakatusaha));
                        $('#zakathartamodal').html('Rp. ' + nitik(data.data.zakatharta));
                        $('#jumlahwajibzakat').html('Rp. ' + nitik(jumlahzakat));
                        $('#tunaikan').modal('show');

                    });
                    
                  }

    
     
        nishab          = 6239404;
      nishabSimpanan  = 49121245;

      hargaEmas       = 577897;
      hargaPerak      = 7341;//Get

      $('#hitungzakatprofesi').click(function(e) {
        if (document.getElementById('bulanan').checked) {
            periodenya = document.getElementById('bulanan').value;
          }else if (document.getElementById('tahunan').checked) {
            periodenya = document.getElementById('tahunan').value;
          }
          var aa = $('#a').val();
          if (aa == "") {aa = "0"}
          a = parseInt(aa.split('.').join(""));
          var bb = $('#b').val();
          if (bb == "") {bb = "0"}
          b = parseInt(bb.split('.').join(""));
          var cc = $('#c').val();
          if (cc == "") {cc = "0"}
          c = parseInt(cc.split('.').join(""));

          var profesi   = a + b - c;
          if (periodenya == "tahunan") {
            profesinya = profesi * 12;
          } else {
            profesinya = profesi;
          }
          profesiZakat  = 0.025 * profesinya;
          profesiZakat = Math.ceil(Math.ceil(profesiZakat)/1000)*1000;
          
        if (profesi >= nishab) {
          $('.wajibZakat').removeClass('dis-none');
          $('.belumWajibZakat').addClass('dis-none');
          $('.pengertiana').addClass('dis-none');
          $('#profesiHasil').html(nitik(profesiZakat));
          $('#btnzakatprofesi').data("jumlah", profesiZakat);
        } 
          else {
          $('.pengertiana').addClass('dis-none');
          $('.belumWajibZakat').removeClass('dis-none');
          $('.wajibZakat').addClass('dis-none');
        } 
      })



      $('#hitungzakatusaha').click(function(e) {

          var ee = $('#e').val();
          if (ee == "") {ee = "0"}
          e = parseInt(ee.split('.').join(""));
          var ff = $('#f').val();
          if (ff == "") {ff = "0"}
          f = parseInt(ff.split('.').join(""));
          var gg = $('#g').val();
          if (gg == "") {gg = "0"}
          g = parseInt(gg.split('.').join(""));
          var hh = $('#h').val();
          if (hh == "") {hh = "0"}
          h = parseInt(hh.split('.').join(""));
          var ii = $('#i').val();
          if (ii == "") {ii = "0"}
          i = parseInt(ii.split('.').join(""));


          var usaha     = (e + f + i) - (g + h);
          usahaZakat    = 0.025 * usaha;
          usahaZakat = Math.ceil(Math.ceil(usahaZakat)/1000)*1000;
        if (usaha >= nishab) {
          $('.pengertianb').addClass('dis-none');
          $('.wajibZakatb').removeClass('dis-none');
          $('.belumWajibZakatb').addClass('dis-none');
          $('#usahaHasil').html(nitik(usahaZakat));
          $('#btnzakatusaha').data("jumlah", usahaZakat);
        } 
          else {
          $('.pengertianb').addClass('dis-none');
          $('.belumWajibZakatb').removeClass('dis-none');
          $('.wajibZakatb').addClass('dis-none');
        } 
      })

      

        $('#hitungzakatsimpanan').click(function(e) {    
          var oo = $('#o').val();
          if (oo == "") {oo = "0"}
          o = parseInt(oo.split('.').join(""));
          var pp = $('#p').val();
          if (pp == "") {pp = "0"}
          p = parseInt(pp.split('.').join(""));
          var qq = $('#q').val();
          if (qq == "") {qq = "0"}
          q = parseInt(qq.split('.').join(""));
          var rr = $('#r').val();
          if (rr == "") {rr = "0"}
          r = parseInt(rr.split('.').join(""));
          var ss = $('#s').val();
          if (ss == "") {ss = "0"}
          s = parseInt(ss.split('.').join(""));


          var simpanan     = ((o * hargaEmas) + (p * hargaPerak) + q + r + s);
          simpananZakat    = 0.025 * simpanan;
          simpananZakat = Math.ceil(Math.ceil(simpananZakat)/1000)*1000
        if (simpanan >= nishabSimpanan) {
          
          $('.pengertianc').addClass('dis-none');
          $('.wajibZakatc').removeClass('dis-none');
          $('.belumWajibZakatc').addClass('dis-none');
          $('#simpananHasil').html(nitik(simpananZakat));
          $('#btnzakatharta').data("jumlah", simpananZakat);
        } 
          else {
          $('.pengertianc').addClass('dis-none');
          $('.belumWajibZakatc').removeClass('dis-none');
          $('.wajibZakatc').addClass('dis-none');
        } 
      });
    })
      </script>
    
@endsection