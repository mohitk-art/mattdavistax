@extends('back_layouts.app')
@section('title', '| Create Permission')
@section('content')
<div class="content">
    <div class="container-fluid">
<div class='col-md-12'>
  @include('error_message')
    <h4> Create New Permission</h4>
    <br>
    {{ Form::open(array('url' => 'permissions')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control form_name')) }}
    </div><br>
    @if(!$roles->isEmpty())
        <h3>Assign Permission to Roles</h3>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
    @endif
    <br>
    <a class="btn btn-primary" href="{{ URL::previous() }}"> Back</a>
    {{ Form::submit('Save', array('class' => 'btn btn-primary custom_cls')) }}
    {{ Form::close() }}
</div>
    </div></div>
@endsection
