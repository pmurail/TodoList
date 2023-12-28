@extends('layout')

@section('titre', 'Page de detail')

@section('contenu')
    <div class="col-4">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title">{{$post['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post['created_at']}}</h6>
                <form action="{{ route('posts.updatePost', ['id' => $post['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('PATCH')
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
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                <form action="{{ route('posts.deletePost', ['id' => $post['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
