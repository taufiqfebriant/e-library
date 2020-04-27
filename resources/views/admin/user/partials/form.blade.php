@csrf

<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" value="{{ old('name', $user->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email', $user->email) }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Hak akses</label>
        <div class="col-sm-10">
            @foreach ($roles as $role)
                <div class="form-check pl-0">
                    <input type="checkbox" name="roles[]" id="role{{ $loop->iteration }}" value="{{ $role->id }}"
                    @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                    <label for="role{{ $loop->iteration }}">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
    <button type="submit" class="btn btn-primary float-right">
        {{ Route::current()->getName() === 'admin.users.create' ? 'Tambah' : 'Ubah' }}
    </button>
</div>