@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))

<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>

@elseif ($message = Session::get('fail'))

<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>

@endif

<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th>Status</th>
   <th width="280px">Action</th>
 </tr>

 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
      @if($registration->contains(function($r) use($user){ return $r->id == $user->id;}))
        <label class="badge badge-success" disable>registration requested</button>
      @endif
    </td>
    <td>
      <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
      @if(auth()->user()->id != $user->id)
        @if(!$registration->contains(function($r) use($user){ return $r->id == $user->id;}))
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @else
          <button class="btn btn-danger" data-placement="tooltip" data-placement="top" title="check status column" disabled>Delete</button>
        @endif
      @endif
    </td>
  </tr>
 @endforeach
 
</table>
{!! $data->render() !!}
<p class="text-center text-primary"><small>www.esi-bru.be</small></p>
@endsection
