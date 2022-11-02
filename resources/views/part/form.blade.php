@include('master.index')

    <div class="container-fluid">
        <div class="row">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-grey">
                        <div class="modal-header dark">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bg-grey">
                            <form class="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-2">
                                    <label for="kode" class="text-light">Kode</label>
                                    <input type="text" id="kode" name="kode" class="form-control" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="namagambar" class="text-light">Nama Gambar</label>
                                    <input type="text" id="namagambar" name="namagambar" class="form-control" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required>    
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="model" class="text-light">Model</label>
                                    <input type="text" id="model" name="model" class="form-control" required>
                                </div>
                                <div class="form-group flex-button-group mt-4">
                                    <button type="reset" class="btn btn-danger text-uppercase w-50">Reset</button>
                                    <button type="submit" class="btn btn-success text-uppercase w-50">Save</button>
                                </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="d-flex justify-content-between"
                    style="padding-left: 15px;padding-right: 15px; padding-bottom: 15px;">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        Add Data
                    </button>
                    <button type="back" class="btn btn-success" id="detail-button"
                        onclick="history.back(-1)">Back</button>
                </div>
                <div class="table-wrapper table-with-filter table-dark">
                    <div class="table-toolbar flex-between" style="padding-bottom: 1rem">
                        <h4>List Data Display</h4>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama Gambar</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Modal</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Updated</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($part as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->namagambar }}</td>
                                        <td>{{ $item->gambar }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('form.show', $item->id) }}"
                                                    method="get">
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-transparent text-white"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('form.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-transparent text-white"
                                                        onclick="return confirm('Are You Sure?')" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>