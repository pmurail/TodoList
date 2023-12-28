@extends('layout')

@section('titre', 'Page de detail')

@section('contenu')
    <div class="col-4">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title">{{$category['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $category['created_at']}}</h6>
                <form action="{{ route('categories.updateCategory', ['id' => $category['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control @error("name") is-invalid @enderror" id="name"
                               name="name"
                               value="{{ old('name', $category->name) }}">
                        @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                <form action="{{ route('categories.deleteCategory', ['id' => $category['id']]) }}" method="post" class="vstack gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
