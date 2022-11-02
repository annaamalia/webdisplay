@include('master.index')

    <p class="h3 font-weight-light text-capitalize text-center">
        <td>{{ $part->model }}</td>
    </p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <div style="max-height: 650px; overflow:hidden;">                                       
                                <img src="{{ asset('storage/' . $part->gambar) }}">
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@section('script')
    @include('part.script')
@endsection