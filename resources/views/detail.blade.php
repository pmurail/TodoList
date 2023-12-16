@extends('layout')

@section('titre', 'Page de detail')

@section('contenu')
<div class="col-4">
    <div class="card m-2">
        <div class="card-body">
            <h5 class="card-title">{{$user['name']}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $user['email']}}</h6>
            <p class="card-text">Description de l'utilisateur</p>
            <form action="{{ route('users.updateUser', ['id' => $user['id']]) }}" method="post" class="vstack gap-2">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name"
                           value="{{ old('name', $user->name) }}">
                    @error("name")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error("email") is-invalid @enderror" id="email" name="email"
                           value="{{ old('email', $user->email) }}">
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
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
            <form action="{{ route('users.deleteUser', ['id' => $user['id']]) }}" method="post" class="vstack gap-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
