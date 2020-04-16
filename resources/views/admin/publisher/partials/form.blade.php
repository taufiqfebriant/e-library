@csrf

<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" value="{{ old('name', $publisher->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <a href="{{ route('admin.publishers.index') }}" class="btn btn-default">Batal</a>
    <button type="submit" class="btn btn-primary float-right">
        {{ Route::current()->getName() === 'admin.publishers.create' ? 'Tambah' : 'Ubah' }}
    </button>
</div>
<!-- /.card-footer -->