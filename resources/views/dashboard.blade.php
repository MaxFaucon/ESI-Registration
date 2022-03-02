@extends('layouts.app')

@section("head")
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section("title","Dashboard secrétaire") 
@section("content")
<div id="centre">
    <div class = 'stat'>
        
    </div>
    <table class = "listeStd">
        <tr>
            <th class="nom">Nom Prénom</th>
            <th>Inscrit</th>
            <th>Editer</th> 
            <th>Supprimer</th>    
            <th>CAVP</th>         
        </tr>
            @foreach ($students as $std)
            <tr>
                <td><a href="/dashboard/{{$std->id}}">{{$std->nom}} ({{$std->prenom}})</a></td>
                <td>
                    @if($std->inscrit === null || $std->inscrit == '0')
                        <button onclick="window.location='{{ route('accept', $std->id) }}'">Accepter</button>
                        <button type="button" data-toggle="modal" data-target="#deleteModal">Refuser</button>

                <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Détails du refus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" id="registerForm" action="{{ route('pae.refuse') }}">
                        @csrf
                        <div class="modal-body">
                            <textarea id="refuseMessage" class="form-control" name="message" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            
                            {!! Form::hidden('id', $std->id) !!}
                            <button type="submit" class="btn btn-success" >Send</button>
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                    @endif
                </td>
                <td>
                    <a href="/dashboard/StudentEdit/{{$std->id}}">Editer</a>
                </td>
                <td>
                    <button onclick="window.location='{{ route('delet', $std->id) }}'">Supprimer</button>
                </td>
                <td>
                    @if($std->cavp == '0')
                        <p>NON</p>
                    @else
                        <a href="/dashboard/{{$std->id}}/cavp">OUI</a>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
</div>
@endsection