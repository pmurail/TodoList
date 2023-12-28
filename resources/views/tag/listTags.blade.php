@extends('layout')

@section('titre', 'Liste des tags')

@section('contenu')
    <div class="">
        <div class="row">
            <h1 class="col-8">Liste des Tags</h1>
            <div class="col-4 text-right">
                <a type="button" class="btn btn-primary mr-2" href="{{ route('tags.createTag') }}">Ajouter un tag</a>
            </div>
        </div>

        @foreach($tags as $tag)
            <div class="col-4">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">{{$tag['name']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $tag['created_at']}}</h6>
                        <a type="button" class="btn btn-primary" href={{"tags/".$tag['id']}}>Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection


