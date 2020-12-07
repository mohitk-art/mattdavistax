@extends('back_layouts.app')
@section('content')


    <div class="card p-3 mb-0">
   
    <div class="form-row">

        <div class="col-md-12 text-center mb-3">
        <img class="profile-avtar border" src="../assets/img/faces/face-3.jpg" alt="...">
        </div>

        <div class="col-md-6 mb-3">
            <label>Name</label>
            <div class="text">{{$user->name}}</div>
        </div>

        <div class="col-md-6 mb-3">
            <label>Email</label>
            <div class="text">{{$user->email}}</div>
        </div>

        <div class="col-md-6 mb-3">
            <label>Mobile</label>
            <div class="text">{{$user->phone}}</div>
        </div>

        <div class="col-md-6 mb-3">
            <label>Role</label>
            <div class="text">{{$role_name}}</div>
        </div>
    </div>
            
        
        <!-- <div class="button-container mr-auto ml-auto">
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-google-plus-square"></i>
            </button>
        </div> -->
  
</div>


@endsection
