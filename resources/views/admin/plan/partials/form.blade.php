@csrf

<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Nama" value="{{ old('name', $plan->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi" rows="4">{{ old('description', $plan->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" min="0" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga" value="{{ old('price', $plan->price) }}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <a href="{{ route('admin.plans.index') }}" class="btn btn-default">Batal</a>
    <button type="submit" class="btn btn-primary float-right">
        {{ Route::current()->getName() === 'admin.plans.create' ? 'Tambah' : 'Ubah' }}
    </button>
</div>
<!-- /.card-footer -->