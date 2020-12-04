@extends('back_layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." style="width: 100%; height: 148px;">
        </div>
        <div class="card-body">
            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                <h5 class="title"><b>First Name :-</b> {{$user->name}}<br>
                    <b>Email :- </b>{{$user->email}}<br>
                    <b> Mobile :-</b> {{$user->phone}}<br>
                    <b>Role :-</b> {{$role_name}}<br>
                </h5>
                </a>
            </div>
        </div>
        <hr>
        <div class="button-container mr-auto ml-auto">
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
                <i class="fa fa-google-plus-square"></i>
            </button>
        </div>
    </div>
</div>

</div>
    </div>
</div>

@endsection
