@extends('back_layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-lg-6"><br><label>
                        Blog Images</label><input type="file" name="file" class="form-control" id="profile-img">
                        </div>
                        <div class="col-lg-6">
                            @if($blog->image != null)
                            <img src="{{ url('images/',$blog->image) }}" class="img-thumbnail" id="profile-img-tag"  style="height:300px !important">
                            @else
                            <img src="{{ url('images/No-image-available-2.jpg') }}" class="img-thumbnail" id="profile-img-tag"  style="height:300px !important">
                            @endif
                               {{-- <img src="{{ url('images/No-image-available-2.jpg') }}" class="img-thumbnail" id="profile-img-tag" width="200" style="height:150px !important"> --}}


                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description">{{ $blog->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    </div></div>
@endsection
