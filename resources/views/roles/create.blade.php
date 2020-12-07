@extends('back_layouts.app')

@section('content')

<div class="card p-4 mb-0">
    <h3 class="d-flex align-items-center justify-content-between">
        Create New Role
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
    </h3>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

        <div class="form-group">
            <label>Name:</label>
            {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
        </div>
 
        <div class="form-group">
            <label>Permission:</label>
            
            <div class="form-row">
            @foreach($permission as $value)
            <label class="checks-control col-md-3">
                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}
            </label>
            @endforeach
            </div>
        </div>
 
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
{!! Form::close() !!}
</div>

@endsection

