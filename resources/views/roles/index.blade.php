@extends('back_layouts.app')


@section('content')
<div class="card p-4 mb-0">
    <h3 class="d-flex align-items-center justify-content-between flex-wrap">
        Role Management

        @can('role-create')
            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>
       @endcan
    </h3>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-secondary mr-3" href="{{ route('roles.show',$role->id) }}">Show</a>
            {{-- @can('role-edit') --}}
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            {{-- @endcan
            @can('role-delete') --}}
                {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    <button class="btn btn-danger" value="Submit" onclick="return confirm('Are you sure?')">Delete</button>
                {!! Form::close() !!} --}}
            {{-- @endcan --}}
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}
</div>
@endsection


