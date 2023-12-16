@extends('layout')

@section('titre', 'Ajout d\'un user')

@section('contenu')
    <div class="container">
        <form action="/users/add" method="post" class="vstack gap-2">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}">
                @error("name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error("email") is-invalid @enderror" id="email" name="email"
                       value="{{ old('email') }}">
                @error("email")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="date" class="form-control @error("password") is-invalid @enderror"
                       name="password">{{ old('password') }}</input>
                @error("password")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary">
                Créer
            </button>
        </form>
    </div>
@endsection
