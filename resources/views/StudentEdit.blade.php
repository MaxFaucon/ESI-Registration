@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">    
@endsection
@section('title','Edit Student') 
@section('content')
    <form action ="{{ route('StudentUpdate', ['id' => $student->id]) }}" method="post">
        @csrf
        <label for="nom">Nom de l'étudiant: </label>
        <input type="text" name="nom" value="{{$student->nom}}"><br>
        <label for="prenom">Prénom de l'étudiant: </label>
        <input type="text" name="prenom" value="{{$student->prenom}}"><br>
        <label for="num_telephone">Numéro de téléphone de l'étudiant: </label>
        <input type="text" name="num_telephone" value="{{$student->num_telephone}}" max="10"><br>
        <label for="opt">Option l'étudiant: </label>
        <select name='opt'>
            <option value='G' {{ $student->opt == "G" ? 'selected' : '' }}>Gestion</option>
            <option value='R' {{ $student->opt == "R" ? 'selected' : '' }} >Réseau</option>
            <option value='I' {{ $student->opt == "I" ? 'selected' : '' }} >Industriel</option>
        </select>
        <label for="bloc">Année académique l'étudiant: </label>
        <select name='bloc'>
            <option value="1" {{ $student->bloc == "1" ? 'selected' : '' }}>1</option>
            <option value="2" {{ $student->bloc == "2" ? 'selected' : '' }}>2</option>
            <option value="3" {{ $student->bloc == "3" ? 'selected' : '' }}>3</option>
        </select>
        
        <input type="submit" value="Submit">
    </form>
@endsection