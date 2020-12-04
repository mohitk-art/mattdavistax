@extends('back_layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-lg-6"><br><label>
                    Blog Images</label>
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

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $blog->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $blog->description }}
            </div>
        </div>
    </div>
    </div></div>
@endsection
