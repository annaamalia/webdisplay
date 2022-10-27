<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Web Display</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Display</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-3 my-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 mb-3">
        <h5 class="text-center">Display Roll A</h5>
    </div>

    <div class="card">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <img src="{{ asset('images/' . $part->gambar) }}">
                                    {{-- <img src="images/<?= $part['gambar'] ?>" class="image-center" style="width: 100%;"> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@section('script')
    @include('part.script')
@endsection

{{-- form input display --}}
{{-- <header>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-grey">
                <div class="modal-header dark">
                    <h5 class="modal-title" id="exampleModalLabel">Data Part</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-grey">
                    <form class="{{ route('') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id" class="text-light">Id</label>
                            <input type="text" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kode" class="text-light">Kode</label>
                            <input type="text" id="kode" name="kode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_gambar" class="text-light">Nama Gambar</label>
                            <input type="text" id="nama_gambar" name="nama_gambar" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Post Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>                    
                        <div class="form-group">
                            <label for="gambar" class="text-light">Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model" class="text-light">Model</label>
                            <input type="text" id="model" name="model" class="form-control" required>
                        </div>
                        <div class="form-group flex-button-group my-2">
                            <button type="reset" class="btn btn-reset text-uppercase w-50">Reset</button>
                            <button type="submit" class="btn btn-logout text-uppercase w-50">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header> --}}
