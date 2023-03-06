@extends('layouts.admin')

@section('content')

<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-12">           
                <div class="row">
                <a href="{{route('programinfo.create', $id)}}" class="btn btn-info">Tambah Info</i></a>
                  <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered nowrap" >
                        <thead>
                            <tr>
                                <th>Judul</th>                                
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($programinfos as $item)
                            <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->created_at}}</td>
                                
                               
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
                </div>
            
            
        </div>
    </div>

@endsection

@section('js')
    <script>       
            $(document).ready(function() {
                $('#example').DataTable({
                    "scrollX": true
                });
            } );        
    </script>
@endsection