@extends('back_layouts.app')
@section('title', '| Create Permission')
@section('content')

<div class='card mb-0 p-5'>
  @include('error_message')
    <h4> Create New Permission</h4>
    
    {{ Form::open(array('url' => 'permissions')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control form_name')) }}
    </div>
    @if(!$roles->isEmpty())
        <h3>Assign Permission to Roles</h3>
        @foreach ($roles as $role)
            <div class="mb-2">
            {{ Form::checkbox('roles[]',  $role->id ) }}
            <span class="ml-4">{{$role->name}}</span>
            </div>
        @endforeach
    @endif
    

    <div class="mt-4 text-right">
    <a class="btn btn-secondary mr-3" href="{{ URL::previous() }}"> Back</a>
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
    
</div>

@endsection
