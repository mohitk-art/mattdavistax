@extends('back_layouts.app')

@section('content')
<div class="card p-4 mb-0">

    <h3>
        Show Blog
    </h3>    
                
            

    <div class="form-row">    
        <div class="col-lg-6 mb-4">
            <label>Blog Images</label>
            <div class="image-div">
                @if($blog->image != null)
                    <img src="{{ url('/public/images/',$blog->image) }}" class="blog-thumbnail" id="profile-img-tag" />
                @else
                    <img src="{{ url('/public/images/No-image-available-2.jpg') }}" class="blog-thumbnail" id="profile-img-tag" />
                @endif
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <label>Title:</label>
            <div class="text">{{ $blog->title }}</div>
        </div>

        <div class="col-md-12 mb-4">    
            <label>Description:</label>
            <div class="text">{{ $blog->description }}</div>
        </div>

        <div class="col-md-12 text-right">
        <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
        </div>
    </div>

</div>
@endsection
