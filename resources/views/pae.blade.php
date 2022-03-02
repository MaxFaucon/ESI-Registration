@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/pae.css') }}">
@endsection
@section("title","Creation du PAE")
@section("content")
<div id="centre">
    <h1>Creation du PAE</h1>
    <form action="{{ route('pae.ajout') }}" method='post'>
        @csrf
        <input type="text" name="userId" value="{{Auth::id()}}" hidden>
        <table>
            <tr>
              <th>Cours</th>
              <th>Heures</th>
              <th>Crédits</th>
              <th>Option</th>
              <th>Quadrimestre</th>
              <th>Validé</th>
              <th>Sélection</th>              
            </tr>
            @foreach ($courses as $cour)
            <tr>
                <td>{{$cour->title}} ({{$cour->acronym}})</td>
                <td>{{$cour->hours}}</td>
                <td>{{$cour->ects}}</td>
                <td>{{$cour->opt}}</td>
                <td>{{$cour->quad}}</td>
                <td>
                @if($cour->Validate === null || $cour->Validate == '0')
                    Non
                @else
                    Oui     
                @endif
                </td>
                <td>
                    @if($cour->Validate === null || $cour->Validate == '0')
                        @switch($student->bloc)
                            @case(1)
                                @if($cour->quad <= 2)
                                    <input type="checkbox" checked="checked" name="courses[]" value="{{$cour->acronym}}" onclick="return false;">
                                    <span class="checkmark"></span>
                                @else
                                    <input type="checkbox" checked="checked" name="courses[]">
                                    <span class="checkmark"></span>
                                @endif
                                @break
                            @case(2)
                                @if($cour->quad > 2 && $cour->quad <= 4)
                                    <input type="checkbox" checked="checked" name="courses[]" value="{{$cour->acronym}}" onclick="return false;">
                                    <span class="checkmark"></span>
                                @else
                                    <input type="checkbox" checked="checked" name="courses[]">
                                    <span class="checkmark"></span>
                                @endif
                                @break
                            @case(3)
                                @if($cour->quad > 4 && $cour->quad <= 6)
                                    <input type="checkbox" checked="checked" name="courses[]" value="{{$cour->acronym}}" onclick="return false;">
                                    <span class="checkmark"></span>
                                @else
                                    <input type="checkbox" checked="checked" name="courses[]">
                                    <span class="checkmark"></span>
                                @endif
                                @break
                            @default
                                <span>Votre numéro de bloc est invalide.</span>
                        @endswitch
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        <input type="submit">
    </form>
</div>

<script>
    $( document ).ready(function() {
        
    });
</script>
@endsection