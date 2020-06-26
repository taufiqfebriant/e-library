@csrf

<div class="card-body">
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                placeholder="Judul" value="{{ old('title', $book->title) }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="synopsis" class="col-sm-2 col-form-label">Sinopsis</label>
        <div class="col-sm-10">
            <textarea name="synopsis" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis"
                placeholder="Sinopsis">{{ old('synopsis', $book->synopsis) }}</textarea>
            @error('synopsis')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="cover" class="col-sm-2 col-form-label">Sampul <small>(opsional)</small></label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('cover') is-invalid @enderror" id="cover"
                        name="cover">
                    <label class="custom-file-label" for="cover">Pilih file</label>
                </div>
            </div>
            @if ($book->cover)
                <a href="{{ asset("storage/{$book->cover}") }}" class="small float-right mt-2" data-toggle="lightbox">Lihat sampul aktif</a>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="author_id" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
            <select class="form-control select2bs4 @error('author_id') is-invalid @enderror" name="author_id[]"
                id="author_id" data-placeholder="Penulis" multiple="multiple" style="width: 100%">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ in_array($author->id, old('author_id', ($errors->has('author_id') ? [] : $book->authors->pluck('id')->toArray()))) ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <select class="form-control select2bs4 w-100 @error('category_id') is-invalid @enderror" name="category_id"
                id="category_id" style="width: 100%">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id) === $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="publisher_id" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <select class="form-control select2bs4 w-100 @error('publisher_id') is-invalid @enderror"
                name="publisher_id" id="publisher_id" style="width: 100%">
                @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}"
                    {{ old('publisher_id', $book->publisher_id) === $publisher->id ? 'selected' : '' }}>
                    {{ $publisher->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">File</label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file">
                <label class="custom-file-label" for="file">Pilih file</label>
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @if ($book->file)
                <a href="{{ $book->readPath() }}" target="_blank" class="small float-right mt-2">Lihat file aktif</a>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="preview" class="col-sm-2 col-form-label">Cuplikan</label>
        <div class="col-sm-10">
            <div class="input-group @error('preview') is-invalid @enderror">
                <input type="number" class="form-control" name="preview" placeholder="Jumlah halaman cuplikan" aria-label="Jumlah halaman cuplikan" aria-describedby="preview-addon" value="{{ old('preview', $book->preview) }}" min="0">
                <div class="input-group-append">
                    <span class="input-group-text" id="preview-addon">halaman</span>
                </div>
            </div>
            @error('preview')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label for="featured" class="col-sm-2 col-form-label">Tampilkan sebagai buku unggulan</small></label>
        <div class="col-sm-10">
            <select name="featured" id="featured" class="form-control @error('featured') is-invalid @enderror">
                <option value="0" {{ old('featured', $book->featured) ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ old('featured', $book->featured) ? 'selected' : '' }}>Ya</option>
            </select>
            @error('featured')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <a href="{{ route('admin.books.index') }}" class="btn btn-default">Batal</a>
    <button type="submit" class="btn btn-primary float-right">
        {{ Route::current()->getName() === 'admin.books.create' ? 'Tambah' : 'Ubah' }}
    </button>
</div>
<!-- /.card-footer -->