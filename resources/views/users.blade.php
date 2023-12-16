@extends('layout')

@section('titre', 'Page d\'accueil')

@section('contenu')
    <div class="">
        <div class="row">
            <h1 class="col-12">Liste des Utilisateurs</h1>

            @foreach($users as $user)
                <div class="col-4">
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title">{{$user['name']}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $user['email']}}</h6>
                            <p class="card-text">Description de l'utilisateur</p>
                            <a type="button" class="btn btn-primary" href={{"users/".$user['id']}}>Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


