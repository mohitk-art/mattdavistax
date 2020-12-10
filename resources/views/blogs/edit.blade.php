@extends('back_layouts.app')

@section('content')
<div class="card p-4 mb-0">
    <h3>
        Edit blog
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

    <form action="{{ route('blogs.update',$blog->id) }}" class="form-row" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        
                    <div class="col-md-6 mb-4">
                        <label>Blog Images</label>

                        <div class="mb-3">
                            <label class="btn btn-primary">
                                <input type="file" name="file" class="d-none" id="profile-img">
                                Upload Image
                            </label>
                        </div>

                        @if($blog->image != null)
                            <img src="{{ url('/public/images/',$blog->image) }}" class="blog-thumbnail" id="profile-img-tag" />
                        @else
                            <img src="{{ url('/public/images/No-image-available-2.jpg') }}" class="blog-thumbnail" id="profile-img-tag" />
                        @endif
                            
                    </div>
                
            <div class="col-md-12 mb-4">
                <label>Title:</label>
                <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
            </div>
            <div class="col-md-12 mb-4">
                <label>Description:</label>
                <textarea class="form-control" style="height:150px" name="description">{{ $blog->description }}</textarea>
            </div>

            <div class="text-right col-md-12">
            <a class="btn btn-secondary mr-2" href="{{ route('blogs.index') }}"> Back</a>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        

    </form>
    </div>
@endsection
