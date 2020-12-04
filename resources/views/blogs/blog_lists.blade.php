@extends('fornt_layouts.app')

@section('content')

<br><br><br><br><br><br><br><br>
<div class="container my-5">
  <div class="border-bottom pb-3 px-2 d-flex justify-content-between">
    <div class="d-flex align-items-center">

      <a href="#" style="color: #492439 !important; font-size: 20px;" class="text-capitalize font-weight-bold mb-0">Latest Blog</a>
    </div>
    {{-- <a href="#" class="text-dark">See All</a> --}}
  </div>
  <div class="row">

    @foreach ($blogs as $blog)

    <a href="{{url('blog_details',$blog->id)}}">
    <div class="col-md-4 p-4">
      <div class="border" style="box-shadow: 0 0  20px #eee;">
        {{-- <div class="d-flex p-3 align-items-center">
          <a href="#"><img src="https://avatars0.githubusercontent.com/u/39916324?s=460&u=602ca47fcce463981a2511a21148236f304ec934&v=4" class="mr-3 rounded-circle" width="50px" alt=""></a>
          <div class="mt-2">
            <a href="#" class="d-block text-dark" style="line-height: .8; font-weight: 600;">Zakir Hussain</a>
            <small>5 min ago | in <a href="#" style="color: #492439 !important;">Weeding</a></small>
          </div>
        </div> --}}
        @if($blog->image != null)
        <img class="w-100" src="{{ url('images/',$blog->image) }}" alt="">
        @else
        <img class="w-100" src="https://images.pexels.com/photos/1153369/pexels-photo-1153369.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        @endif
        <div class="px-3 py-4">
        <a href="#" class="d-block"><h5 class="text-dark h6" style="font-weight: 600;">{{ str_limit($blog->title, $limit = 30, $end = '....') }}</h5></a>
          <small class="text-secondary">{{ str_limit($blog->description , $limit = 50, $end = '....') }}</small>
        </div>
      </div>
    </div>
</a>
    @endforeach

  </div>
</div>
<style>
    body {
  background: #e5ded8;
  box-sizing: border-box;
}
</style>

@endsection
