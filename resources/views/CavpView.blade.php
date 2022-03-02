@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
    
@endsection
@section('title','Demande de CAVP') 
@section('content')   
    <form action ="{{ route('envoyer', ['id' => $student->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="demande">Demande</label>
            <textarea class="form-control" name="demande" placeholder="Déposez votre demande ici" required></textarea> 
        </div>           
            <button type="submit">Envoyer</button>
    </form>   
@endsection