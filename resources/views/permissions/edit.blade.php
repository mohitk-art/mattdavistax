@extends('back_layouts.app')
@section('title', '| Update Permission')
@section('content')

<div class='card p-4 mb-0'>
    <h3>Update {{$permission->name}}</h3>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    
    <div class="text-right">
        <a class="btn btn-primary mr-3" href="{{ URL::previous() }}"> Back</a>
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
    </div>

    {{ Form::close() }}
    
</div>
@endsection
