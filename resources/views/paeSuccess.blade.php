@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/pae.css') }}">
@endsection
@section("title","Votre PAE")
@section("content")
<div id="centre">
    <h1>Votre PAE</h1>
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
</div>

@endsection