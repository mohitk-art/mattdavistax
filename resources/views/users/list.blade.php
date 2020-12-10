@extends('back_layouts.app')
@section('content')

<div class="card p-4 mb-0">


            <h3 class="d-flex align-items-center justify-content-between flex-wrap">
                    @role('admin')
                       User List
                    @else
                   Customer List
                    @endrole
                <a class="btn btn-primary" href="{{url('add_user',base64_encode('0'))}}"> Create New User</a>
            </h3>

    <div class="mb-3 text-right">
    <form action="{{url('search_customer')}}" class="search-form" method="POST">
                            <!-- <select class="form-control" id="search_type" name="search_type">
                                <option value="name">Name</option>
                                <option value="email">Email</option>
                                <option value="phone">Phone Number</option>
                                <option value="ssn">SSN</option>
                            </select> -->
                
                            <input type="search" class="form-control mr-2" id="gsearch" name="gsearch" placeholder="Search" style="padding: 10px;" required>
                            <input type="submit" class="btn btn-primary">
                        
                        </form>
    </div>


                    @include('error_message')
                   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            <tbody>
                                <?php $i = 0; ?>
                                @if($users != null)
                                @foreach ($users as $user)
                                <tr>
                                <td>{{++$i}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @foreach($user['roles'] as $rolename)
                                             {{$rolename->name}}
                                         @endforeach
                                    </td>
                                    <td><a  class="btn btn-secondary mr-2" href="{{url('show_user',base64_encode($user->id))}}"">Show</a>
                                    <a href="{{url('add_user',base64_encode($user->id))}}" class="btn btn-primary mr-2" >Edit </a>
                                     @foreach($user['roles'] as $rolename)
                                        @if($rolename->name == 'customer')
                                            <a href="{{url('tax',base64_encode($user->id))}}" class="btn btn-secondary">Fill Tax Details</a>
                                        @endif
                                     @endforeach
                                </td>
                                </tr>
                                <span class="listing_cls">{{ $users->links() }}
                                @endforeach
                                @else
                                    <div class="no_text_value">No Data Found</div>
                                @endif

                            </tbody>
                        </table>
                    </div>
               
    </div>

@endsection
