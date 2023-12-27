@extends('layout')

@section('titre', 'Liste des articles')

@section('contenu')
    <div class="">
        <div class="row">
            <h1 class="col-8">Liste des Articles</h1>
            <div class="col-4 text-right">
                <a type="button" class="btn btn-primary mr-2" href="{{ route('posts.createPost') }}">Ajouter un article</a>
            </div>
        </div>

        @foreach($posts as $post)
            <div class="col-4">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">{{$post['title']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{($post['created_at'])->format('d/m/y')}}</h6>
                        <p class="card-text">Description de l'utilisateur</p>
                        <a type="button" class="btn btn-primary" href={{"posts/".$post['id']}}>Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection


