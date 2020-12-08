@extends('back_layouts.app')
@section('content')

<div class="card p-4 mb-0">

    <h3 class="d-flex align-items-center justify-content-between">
        User List
        <a class="btn btn-success create_user" href="{{url('add_user','0')}}"> Create New User</a>
    </h3>
         
    @include('error_message')
                    
    <div class="table-responsive">
        <table class="table table-bordered">
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- <th>Role</th> -->
                <th style="width:300px">Action</th>
            <tbody>
                <?php $i = 0; ?>
            @foreach ($users as $user)


                <tr>
                <td>{{++$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    {{-- <td>{{$user->roleDetails['name']}}</td> --}}
                    <td><a  class="btn btn-info mr-2" href="{{url('show_user',$user->id)}}"">Show</a>
                    <a href="{{url('add_user',$user->id)}}" class="btn btn-primary mr-2" >Edit </a>
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
    </div>
                
            

</div>



@endsection
