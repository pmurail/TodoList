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
                <label for="user_id">Utilisateur</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                    <option value="">Sélectionnez un utilisateur</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                @foreach($tags as $tag)
                    <div class="form-check">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input">
                        <label class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-primary">
                Créer l'article
            </button>
        </form>
    </div>
@endsection
