@extends('layout')

@section('titre', 'Ajout d\'une categorie')

@section('contenu')
    <div class="container">
        <form action="{{ route('categories.createCategory') }}" method="post" class="vstack gap-2">
            @csrf
            <div class="form-group">
                <label for="title">Nom de la categorie</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary">
                Créer le tag
            </button>
        </form>
    </div>
@endsection
