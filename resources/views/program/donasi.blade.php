@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <div class="row">
                  
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($donatur as $item)
                            <tr>
                            <td>{{$item->invoice->user->name}}</td>
                                <td>{{$item->value}}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            
            
        </div>
    </div>
@endsection

@section('js')
    <script>       
            $(document).ready(function() {
                $('#example').DataTable();
            } );        
    </script>
@endsection