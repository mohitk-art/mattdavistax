@extends('back_layouts.app')
@section('title', '| Permissions')
@section('content')

    <div class="card p-4 mb-0">

    <h3 class="d-flex align-items-center justify-content-between">
    Permissions Management
    {{-- <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a> --}}
    <!-- <a href="{{ route('roles.index') }}" class="btn btn-success pull-right role_btn">Roles</a> -->
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success pull-right permission_btn">Add Permission</a>
    </h3>

    <div class="table-responsive">
        <table class="table table-bordered mb-0">
                <tr>
                    <th class="table_label">No</th>
                    <th class="table_label">Permissions</th>
                    <th class="table_label" width="200">Action</th>
                </tr>
            <tbody>
                <?php $i=0;?>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary mr-2">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}

                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span class="listing_cls">{{ $permissions->onEachSide(5)->links() }}

        </span>

    </div>
    
    </div>


@endsection
