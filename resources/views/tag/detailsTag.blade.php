@extends('layout')

@section('titre', 'Page de detail')

@section('contenu')
    <div class="col-4">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title">{{$tag['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $tag['created_at']}}</h6>
                <p class="card-text">Description de l'article</p>
                <form action="{{ route('tags.updateTag', ['id' => $tag['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control @error("name") is-invalid @enderror" id="name"
                               name="name"
                               value="{{ old('name', $tag->name) }}">
                        @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                <form action="{{ route('tags.deleteTag', ['id' => $tag['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
