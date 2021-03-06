@extends('back_layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card custom_card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        @if($user != null)
                             <form action="{{url('update_user',$user->id)}}" method="Post">
                        @else
                            <form action="{{url('add_user')}}" method="Post">
                        @endif

                        @csrf

                            <div class="row">
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name" required value="{{$user ? $user->name : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required value="{{$user ? $user->email : ''}}" {{$user ? 'readonly' : ''}}>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password"  name="password" required >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label >Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Phone" name="phone" required value="{{$user ? $user->phone : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Role</label>
                                            <select class="form-control" id="roles" name="roles" required>
                                            <option>--Select Role--</option>
                                             @foreach ($roles as $role)
                                              <option value="{{$role->name}}"  style="text-transform:uppercase" {{$user ? $role_name== $role->name ? 'selected="selected' : '' : ''}}>{{$role->name}}</option>
                                             @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Home Address" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" name="city">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code" name="zip_code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="about_us"></textarea>
                                    </div>
                                </div>
                            </div> --}}
                            @if($user != null)
                            <a href="{{url('tax',$user->id)}}" class="btn btn-success">Fill Tax Details</a>
                            @endif

                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
