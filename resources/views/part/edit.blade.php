@include('master.index')

    <div class="container-fluid shadow bg-grey">
        <div class="row m-3">
            <div class="col-2">
                <div class="row border-bottom">
                    <h5>Input Data Display</h5>
                </div>
                <div class="row">
                    <form class="{{ route('form.update', $part->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" id="id" name="id" value="{{ $part->id }}">
                        <br>
                        <div class="form-group">
                            <label for="kode" class="text-light">Kode</label>
                            <input type="text" id="kode" name="kode" class="form-control"
                                value="{{ $part->kode }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="namagambar" class="text-light">Nama Gambar</label>
                            <input type="text" id="namagambar" name="namagambar" class="form-control"
                                value="{{ $part->namagambar }}" autocomplete="off" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="gambar" class="text-light">Gambar</label>
                            <input type="text" id="gambar" name="gambar" class="form-control"
                                value="{{ $part->gambar }}" autocomplete="off" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="gambar" class="text-light">Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="form-control"
                                value="{{ $part->gambar }}" autocomplete="off" required>
                        </div>                        
                        <div class="form-group">
                            <label for="model" class="text-light">Model</label>
                            <input type="text" id="model" name="model" class="form-control"
                                value="{{ $part->model }}" autocomplete="off" required>
                        </div>
                        <div class="form-group flex-button-group mt-4">
                            <button type="reset" class="btn btn-danger text-uppercase w-50">Reset</button>
                            <button type="submit" class="btn btn-success text-uppercase w-50">Save</button>
                        </div>                            
                    </form>
                </div>
            </div>
            <div class="col-10">
                <div id="id" name="id" value="{{ $part->id }}">
                    <div style="max-height: 650px; overflow:hidden;">                                       
                        <img src="{{ asset('storage/' . $part->gambar) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
