@extends('layouts.admin')

@section('content')

<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <div class="row">
                  <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered nowrap" >
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Target Donasi</th>
                                <th>Terkumpul </th>
                                <th>Terkumpul (%)</th>
                                <th>Sisa Hari</th>
                                <th>Terbit</th>
                                <th>Lokasi</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Oleh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($programs as $item)
                            <tr>
                            <td>{{$item->title}}</td>
                                <td>{{$item->target_donation}}</td>
                                <td>{{$item->jumlahdonasi()}}</td>
                                <td>{{$item->jumlahdonasipersen()}}</td>   
                                <td>{{$item->waktuTersisa()}}</td>
                                @if ($item->status == App\Models\Program::STATUS_PUBLISH)                                    
                                <td>Terbit <a href="{{route('program.unpublish', $item->id)}}" class="btn btn-danger" >Unpublish</a></td> 

                                @else
                                <td>Tidak Terbit <a href="{{route('program.publish', $item->id)}}" class="btn btn-primary" >Publish</a></td> 

                                @endif
                                <td>{{$item->location}}</td>       
                                <td>{{$item->category->jenis()}}</td>  
                                <td>{{$item->category->category_name}}</td> 
                                <td>{{$item->pembuat->name}}</td>                       
                                <td> <a href="{{route('programinfo.index', $item->id)}}" class="btn btn-primary" >Perkembangan</a> 
                                    <a href="{{route('program.donasi', $item->id)}}" class="btn btn-primary" >List Donasi</a>
                                    <a href="{{route('program.destroy', $item->id)}}" class="btn btn-primary" >Hapus</a>
                                    <a href="{{route('program.edit', $item->id)}}" class="btn btn-primary" >Edit</a></td>
                               
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