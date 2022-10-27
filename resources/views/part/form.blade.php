<div class="card mx-10 my-5">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-grey">
                <div class="modal-header dark">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Part</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-grey">
                    <form class="{{ route('form.store') }}" method="post">
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
                            <label for="nam_gambar" class="text-light">Nama Gambar</label>
                            <input type="text" id="namagambar" name="namagambar" class="form-control" required>
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
</div>
