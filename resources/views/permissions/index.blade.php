@extends('back_layouts.app')
@section('title', '| Permissions')
@section('content')
<div class="col-md-10 col-md-offset-1">
    <h3>Permissions Management
    {{-- <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a> --}}
    <a href="{{ route('roles.index') }}" class="btn btn-success pull-right role_btn">Roles</a>
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success pull-right permission_btn">Add Permission</a>
    </h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered">
                <tr>
                    <th class="table_label">No</th>
                    <th class="table_label">Permissions</th>
                    <th class="table_label">Action</th>
                </tr>
            <tbody>
                <?php $i=0;?>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}&nbsp;
                    &nbsp;

                    <button class="btn btn-danger" value="Submit" onclick="return confirm('Are you sure?')">Delete</button>
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
