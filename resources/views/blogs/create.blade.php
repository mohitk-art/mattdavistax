@extends('back_layouts.app')

@section('content')
<div class="card p-4 mb-0">

    <h3>
        Add New Blog
    </h3>
      

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('blogs.store') }}" class="form-row" method="POST" enctype="multipart/form-data">
    @csrf

     
        
            <div class="col-md-6 mb-4">
                <label>Blog Images</label>
                
                <div class="mb-3">
                <label class="btn btn-primary">
                    <input type="file" name="file" class="d-none" id="profile-img">
                    Upload Image
                </label>
                </div>
                <img src="{{ url('public/images/No-image-available-2.jpg') }}" class="blog-thumbnail" id="profile-img-tag">
            </div>
                
                
      
            <div class="col-md-12 mb-4">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" maxlength="150">
            </div>
        
        <div class="col-md-12 mb-4">
            <label>Description:</label>
            <textarea class="form-control" style="height:150px" name="description" maxlength="1000"></textarea>
        </div>

        <div class="col-md-12 text-right">
        <a class="btn btn-secondary mr-2" href="{{ route('blogs.index') }}">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

</form>

</div>
@endsection

@section('script')

<script type="text/javascript">
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
