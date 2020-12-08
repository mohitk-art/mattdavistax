@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Latest Blogs</h1>
        <p>We offer options to fit your busy schedule!</p>
    </div>
</section>

<div class="container py-5">

      <div class="row">
            <div class="col-md-9 blogs order-1 order-sm-0">
            @foreach ($blogs as $blog)
            <div class="row m-0 Blogsection">
              <div class="col-md-6 p-0">
                <a href="{{url('blog_details',$blog->id)}}" class="d-block position-relative newshover hover-cursor">
                  @if($blog->image != null)
                  <img src="{{ url('images/',$blog->image) }}" class="position-absolute h-100 w-100" />
                  @else
                  <img src="{{url('images/No-image-available-2.jpg')}}" class="position-absolute h-100 w-100" />
                  @endif
                </a>
              </div>

              <div class="col-md-6 p-5">
                <a href="{{url('blog_details',$blog->id)}}" class="h3 d-block text-uppercase font-weight-bold hover-cursor">{{ str_limit($blog->title, $limit = 30, $end = '....') }}</a>
                <div class="mb-3">
                  <i class="fa fa-calendar mr-2"></i>
                  4 Dec 2020
                  <i class="fa fa-user ml-3 mr-2"></i> Nishant
                </div>
                <span>
                {{ str_limit($blog->description , $limit = 50, $end = '....') }}
                </span><br/>
                <a href="{{url('blog_details',$blog->id)}}" class="readmore mt-3 hover-cursor">Read More</a>
              </div>
            </div>
            @endforeach

          </div>

          <div class="col-md-3">
            <form class="search-flex search-flex-sm mb-4">
                <input type="text" class="form-control" name="search" placeholder="Search Name" />
                <button class="btn1"><i class="fa fa-search"></i></button>
            </form>


              <h4 class="wgt-title mb-3">Recent Blogs</h4>
                    
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link px-0" href="#">COVID-19... Working from home....</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-0" href="#">COVID-19... Working from home....</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-0" href="#">COVID-19... Working from home....</a>
                </li>
              </ul>

        </div>

      </div>
</div>

@endsection
