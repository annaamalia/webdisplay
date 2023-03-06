@extends('layouts.app')
@section('content')  
<div class="container">
    <div class="row">
<div class="col-md-12">
    <form action="{{route('umum.invoice.store')}}" method="POST">
            <div class="row">
                    <h1>Identitas</h1>
                </div>
        <div class="row">
            
            <div class="form-group">
                    <label for="usr">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                        <label for="usr">No Hp:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                      </div>
                      <div class="form-group">
                            <label for="usr">Email : </label>
                            <input type="email" class="form-control" id="email" name="email">
                          </div>
          </div>
          <div class="row">
              <h1>Pilih Rekening</h1>
          </div>
          <div class="row">
              <div class="radio">
                  <label><input type="radio" name="rekening" value="Mandiri 16161261">Mandiri 16161261</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="rekening" value="BCA 5135125151">BCA 5135125151</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-sm btn-orange">Submit</button>
            </div>
    </form>
       
        </div>
    </div>
  </div>
  
@endsection

@section('js')
<script>
       
      
              $(document).ready(function(){
               
                
              })
      </script>
    
    
@endsection