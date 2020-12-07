@extends('back_layouts.app')


@section('content')

<div class="card p-4 mb-0">

    <h3 class="d-flex align-items-center justify-content-between">
        Edit Role
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


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

        <div class="form-group">
            <label>Name:</label>
            {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control','readonly')) !!}
        </div>
    
        <div class="form-group">
            <label>Permission:</label>
            
            <div class="form-row">
            @foreach($permission as $value)
                <label class="col-md-3 checks-control">
                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
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
