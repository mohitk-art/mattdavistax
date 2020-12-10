@extends('back_layouts.app')


@section('content')

<div class="card p-4 mb-0">
    
    <h3>
        Show Role
    </h3>
    
            
        
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>

        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }}</label>
                @endforeach
            @endif
        </div>

        <div class="mt-4 text-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>

</div>
@endsection
