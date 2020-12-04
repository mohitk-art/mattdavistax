@extends('back_layouts.app')
@section('title', '| Update Permission')
@section('content')
<div class="content">
    <div class="container-fluid">
<div class='col-md-12'>
    <h4>Update {{$permission->name}}</h4>
    <br>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    <a class="btn btn-primary" href="{{ URL::previous() }}"> Back</a>

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
    </div></div>
@endsection
