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
                <a href="{{ $book->file('cover') }}" class="small float-right mt-2" data-toggle="lightbox">Lihat sampul aktif</a>
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
        <label for="pages" class="col-sm-2 col-form-label">Jumlah Halaman</label>
        <div class="col-sm-10">
            <input type="number" min="0" name="pages" class="form-control @error('pages') is-invalid @enderror"
                id="pages" value="{{ old('pages', $book->pages) }}">
            @error('pages')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="preview" class="col-sm-2 col-form-label">Cuplikan <small>(opsional)</small></label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('preview') is-invalid @enderror" id="preview"
                        name="preview">
                    <label class="custom-file-label" for="preview">Pilih file</label>
                </div>
            </div>
            @if ($book->preview)
                <a href="{{ route('admin.books.preview', compact('book')) }}" target="_blank" class="small float-right mt-2">Lihat cuplikan aktif</a>
            @endif
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