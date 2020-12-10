@extends('back_layouts.app')
@section('content')

<div class="card p-4 mb-0">
    <h3 class="card-title">Edit Profile</h3>

    @if($user != null)
            <form action="{{url('update_user',$user->id)}}" method="Post">
    @else
        <form action="{{url('add_user')}}" method="Post">
    @endif

    @csrf

    <div class="form-group">
    <label>Full Name</label>
    <input type="text" class="form-control" name="name" required value="{{$user ? $user->name : ''}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" required value="{{$user ? $user->email : ''}}" {{$user ? 'readonly' : ''}}>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control"  name="password" required >
    </div>


    <div class="form-group">
        <label >Phone Number</label>
        <input type="number" class="form-control" name="phone" required value="{{$user ? $user->phone : ''}}">
    </div>

    <div class="form-group">
        <label>Role</label>
            <select class="form-control" id="roles" name="roles" required>
            <option>--Select Role--</option>
                @foreach ($roles as $role)
                <option value="{{$role->name}}"  style="text-transform:uppercase" {{$user ? $role_name== $role->name ? 'selected="selected' : '' : ''}}>{{$role->name}}</option>
                @endforeach
            </select>
    </div>

    
    <div class="text-right">
    @if($user != null)
    <a href="{{url('tax',$user->id)}}" class="btn btn-success mr-2">Fill Tax Details</a>
    @endif
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
    
    </form>
</div>
                


@endsection
