@extends('layouts.body')

@section('title', 'Akun saya')

@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Form Edit profile
                        </div>
                        <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form method="post" action="{{ route('users.update',$users->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="Whatsapp">Whatsapp</label>
                                <input id="Whatsapp" class="form-control" type="number" name="whatsapp" value="{{ $users->whatsapp }}" >
                            </div>
                            <div class="form-group">
                                <label for="faceboook">Faceboook</label>
                                <input id="faceboook" class="form-control" type="text" name="facebook" value="{{ $users->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input id="instagram" class="form-control" type="text" name="instagram" value="{{ $users->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input id="twitter" class="form-control" type="text" name="twitter" value="{{ $users->twitter }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Update Profile">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection