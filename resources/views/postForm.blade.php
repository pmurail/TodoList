@extends('layout')

@section('titre', 'Ajout d\'un article')

@section('contenu')
    <div class="container">
        <form action="{{ route('posts.createPost') }}" method="post" class="vstack gap-2">
            @csrf
            <div class="form-group">
                <label for="title">Titre de l'article</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenu de l'article</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                          rows="4" required>{{ old('content') }}</textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">ID de la catégorie</label>
                <input type="text" class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                       name="category_id" value="{{ old('category_id') }}" required>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary">
                Créer l'article
            </button>
        </form>
    </div>
@endsection
