@extends('layout')

@section('titre', 'Page d\'accueil')

@section('contenu')
    <div class="container">
        <form action="/contact" method="post" class="vstack gap-2">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control @error("nom") is-invalid @enderror" id="nom" name="nom"
                       value="{{ old('nom') }}">
                @error("nom")
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
                <label for="date">Date</label>
                <input type="date" id="date" class="form-control @error("date") is-invalid @enderror"
                       name="date">{{ old('date') }}</input>
                @error("date")
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
