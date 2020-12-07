@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1 class="mb-3">{{ str_limit($blog_details->title, $limit = 30, $end = '....') }}</h1>
        <!-- <p></p> -->

        <div class="blog-breadcrumb">
          <a href="{{url('/')}}">Home</a>
          <a href="{{url('/blogs_list')}}">Blogs</a>
          <a>{{ str_limit($blog_details->title, $limit = 30, $end = '....') }}</a>
        </div>
    </div>
</section>


<div class="container py-5">
    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="shadow">

              @if($blog_details->image != null)
              <div class="img-div">
                <img class="w-100" src="{{url('images',$blog_details->image)}}" />
              </div>
              @endif

              <div class="p-3">
                <h2 class="blogs_title">{{$blog_details->title}}</h2>
                <div class="mb-3">
                  <i class="fa fa-calendar mr-2"></i>
                  4 Dec 2020
                  <i class="fa fa-user ml-3 mr-2"></i> Nishant
                </div>
                <div class="desc">
                {{$blog_details->description}}
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-3">
          <div class="shadow">
            <h4 class="bg-dark text-white mb-0 px-3 py-2">Resent Blogs</h4>

            <div class="blog-links px-3 pb-3 pt-2">
              <a class="border-bottom text-truncate">COVID-19... Working from home....</a>
              <a class="border-bottom text-truncate">COVID-19... Working from home....</a>
              <a class="border-bottom text-truncate">COVID-19... Working from home....</a>
            </div>
          </div>
        </div>
    </div>
</div>


@endsection
