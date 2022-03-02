@extends('layouts.app')

@section("head")    
    <link rel="stylesheet" href="{{ asset('css/pae.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inscriptionVisiteur.css') }}">
@endsection
@section('title','Dashboard secrétaire') 
@section('content')   
    <h1> {{$student->nom}} {{$student->prenom}} - {{$student->id}}</h1>
    <p><b>Numéro de téléphone : </b> {{$student->num_telephone}}</p>
    <p><b>Option : </b>
        @switch($student->opt)
            @case('G')   
                Gestion         
                @break
            @case('R')
                Réseau
                @break
            @case('I')
                Industrielle
                @break
            @default
                <span>Cette option n existe pas.</span>
        @endswitch
    </p>
    <p><b>Année académique: </b> bloc {{$student->bloc}}</p>

    <h3>PAE : </h3>
    <table>
        <tr>
            <th>Cours</th>
            <th>Validé</th>
        </tr>
        @foreach ($courses as $cour)
        <tr>
            <td>{{$cour->acronym}}</td>
            <td>
                @if($cour->Validate === null || $cour->Validate == '0')
                    Non
                @else
                    Oui     
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <p>Liens Drive : <a target="_blank" href="https://drive.google.com/drive/folders/{{$studentFolder}}">Google Drive</a> </p>
    <form action="/dashboard/StudentEdit/{{$student->id}}" method="get">
        <button type="submit">Edit</button>
    </form>

@endsection