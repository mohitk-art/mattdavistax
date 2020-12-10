@extends('back_layouts.app')
@section('content')


    <div class="card p-5 mb-0">

    <div class="">
        <form method="Post" class="form-row" action="{{url('update_user',Auth::user()->id)}}" enctype="multipart/form-data">
        
        <div class="col-md-12 text-center mb-3">
        @if(Auth::user()->id == $user->id)
        <h1><center>My Profile</center></h1>
        @endif
            @if($user->profile_photo_path == null)
                <img class="profile-avtar border" src="{{ url('public/assets/img/faces/face-3.jpg') }}" alt="..." id="profile-img-tag">
            @else
                <img class="profile-avtar border" src="{{ url('public/profile_images',$user->profile_photo_path) }}" alt="..." id="profile-img-tag">
            @endif

            <div class="mt-3">
            <label id="profile-img" class="btn btn-primary" style="display:none">
                <input type="file" name="file"  style="display: none">

                Upload Imgage
            </label>
            </div>
        </div>
       
        <div class="col-md-6 mb-3">
            <label>Name</label>
            <div class="text" id="nameid">{{$user->name}}</div>
            <input class="form-control" value="{{$user->name}}" name="name" id="nametxt" style="display: none">
        </div>

        <div class="col-md-6 mb-3">
            <label>Email</label>
            <div class="text">{{$user->email}}</div>
        </div>

        <div class="col-md-6 mb-3">
            <label>Mobile</label>
            <div class="text" id="phoneid">{{$user->phone}}</div>
            <input class="form-control" value="{{$user->phone}}" name="phone" id="phonetxt" style="display: none">
        </div>

        <div class="col-md-6 mb-3">
            <label>Role</label>
            <div class="text">{{$role_name}}</div>
        </div>

        <div class="col-md-12 text-right mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            @if(Auth::user()->id == $user->id)
                <a id="editBtn" onClick="editBtn()" class="btn btn-primary ml-2">Edit</a>
            @endif


            
            <input type="submit" id="submitbtn" name="Submit" value="Submit" style="display: none" class="btn btn-primary ml-2">
        </div>
    </div>

</form>
</div>


@endsection

@section('script')
<script type="text/javascript">
function editBtn(){
    $("#nametxt").show();
    $("#phonetxt").show();
    $('#submitbtn').show();
    $('#profile-img').show();

    $("#nameid").hide();
    $("#phoneid").hide();
}


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });

</script>

@endsection
