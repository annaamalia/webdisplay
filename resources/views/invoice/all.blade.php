@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <div class="row">
                  
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Jumlah</th>
                                <th>Status</th>    
                                <th>Detail</th>  
                                <th>Bukti Transfer</th>                              
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($invoice as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                                <td>{{$item->uniq}}</td>
                            <td>{{$item->getStatus()}}</td>
                               
                                <td>
                                    @foreach ($item->program_donatur as $itema)
                                        {{$itema->program->title}} : {{$itema->program->category->jenis()}} : {{$itema->value}}
                                    <br>
                                    @endforeach

                                </td>
                            <td>
                               
                                @if ($item->bukti_transfer)
                                <a href="{{url($item->bukti_transfer)}}" class="btn btn-primary" >lihat</a>
                                @endif
                            </td>
                                <td>{{$item->created_at}}</td>
                                <td> 
                                    @if ($item->status != App\Models\Invoice::STATUS_KONFIRMASI)
                                        <a href="{{route('invoice.konfirmasi', $item->id)}}" class="btn btn-primary" >Konfirmasi</a>
                                @endif</td>
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