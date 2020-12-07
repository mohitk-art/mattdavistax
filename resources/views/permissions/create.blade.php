@extends('back_layouts.app')
@section('title', '| Create Permission')
@section('content')

<div class='card p-4 mb-0'>
  @include('error_message')
    <h3> Create New Permission</h3>
    
    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control form_name')) }}
        </div>
        @if(!$roles->isEmpty())
            <h4>Assign Permission to Roles</h4>

            @foreach ($roles as $role)
                <label class="checks-control">
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{$role->name}}
                </label>
            @endforeach
            
        @endif

        <div class="text-right">
    <a class="btn btn-primary mr-2" href="{{ URL::previous() }}"> Back</a>
    {{ Form::submit('Save', array('class' => 'btn btn-primary w-auto')) }}
    {{ Form::close() }}
        </div>

    </div>
    </div>
</div>

@endsection
