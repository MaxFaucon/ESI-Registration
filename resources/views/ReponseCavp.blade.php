@extends('layouts.app')

@section("head")

    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
    
@endsection
@section('title','Demande de CAVP') 
@section('content')
<h1>Reponse de la CAVP</h1>
<br>
    {{$repCavp}}
@endsection