@extends('back_layouts.app')
@section('title', '| Update Permission')
@section('content')

<div class='card mb-0 p-4'>
    <h4>Update {{$permission->name}}</h4>
    
    @include('error_message')
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    
    <div class="mt-4 text-right">
        <a class="btn btn-secondary mr-3" href="{{ URL::previous() }}"> Back</a>
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
    </div>

    

    {{ Form::close() }}
</div>
@endsection
