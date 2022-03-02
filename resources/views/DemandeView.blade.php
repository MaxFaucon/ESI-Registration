@extends('layouts.app')

@section("head")
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    
@endsection
@section('title','Demande de CAVP') 
@section('content')
    <p>Demande CAVP</p>
    <br>
    {{$demande->demande}}
    <form action ="{{ route('retour', ['id' => $demande->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="reponse">Reponse</label>
            <textarea class="form-control" name="reponse" placeholder="Déposez votre reponse ici" required></textarea> 
        </div>           
            <button type="submit">Envoyer</button>
    </form>           
@endsection