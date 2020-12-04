@extends('back_layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"><br>
                    <div class="pull-right" style="    margin-right: 2%;">
                     <a class="btn btn-success create_user" href="{{url('add_user','0')}}"> Create New User</a>
                    </div>

                    @include('error_message')
                    <div class="header">
                        <h4 class="title">User List</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-bordered">
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            <tbody>
                                <?php $i = 0; ?>
                            @foreach ($users as $user)


                                <tr>
                                <td>{{++$i}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    {{-- <td>{{$user->roleDetails['name']}}</td> --}}
                                    <td><a  class="btn btn-info" href="{{url('show_user',$user->id)}}"">Show</a>
                                    <a href="{{url('add_user',$user->id)}}" class="btn btn-primary" >Edit </a>
                                     @foreach($user['roles'] as $rolename)
                                        @if($rolename->name == 'customer')
                                            <a href="{{url('tax',$user->id)}}" class="btn btn-success">Fill Tax Details</a>
                                        @endif
                                     @endforeach

                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span class="listing_cls">{{ $users->onEachSide(5)->links() }}

                            <br><br><br>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
