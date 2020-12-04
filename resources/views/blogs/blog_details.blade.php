@extends('fornt_layouts.app')

@section('content')

<br><br><br>

<div class="blog-container">

  <div class="blog-header">

    <?php
    if($blog_details->image == null)
    {
        ?>
        <div  class="blog-cover" style="background: url({{url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/17779/yosemite-3.jpg')}})">
        <?php
        }else{
            ?>
        <div class="blog-cover" style="background: url({{url('images',$blog_details->image)}});">
     <?php
    }
    ?>



      {{-- <div class="blog-author">
        <h3>Russ Beye</h3>
      </div> --}}
    </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">{{$blog_details->title}}</a></h1>
    </div>
    <div class="blog-summary">
    <p>{{$blog_details->description}}</p>
    </div>
  </div>
    <hr />
  {{-- <div class="blog-footer">
    <ul>
      <li class="published-date">2 days ago</li>
      <li class="comments"><i class="fa fa-comment-o ft-icon" aria-hidden="true"></i><span class="numero">4</span></li>
      <li class="shares"><i class="fa fa-star-o ft-icon" aria-hidden="true"></i><span class="numero">1</span></li>
    </ul>
  </div> --}}

</div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    body {
  background: #e5ded8;
  box-sizing: border-box;
}

.blog-container {
  background: #fff;
  border-radius: 5px;
    box-shadow: rgb(8 6 9 / 32%) 0 2px 8px -4px;
  font-weight: 100;
  margin: 48px auto;
  width: 50rem;
}


.blog-container a {
  color: #4d4dff;
  text-decoration: none;
  transition: .25s ease;
}
.blog-container a:hover {
    color: #492439 !important;
}
.ft-icon {
    font-size: 24px !important;
    color: red;
}


.blog-cover {

  background-size: cover;
  border-radius: 5px 5px 0 0;
  height: 15rem;
  box-shadow: inset hsla(0, 0, 0, .2) 0 64px 64px 16px;
}
.blog-author,
.blog-author--no-cover {
    margin: 0 auto;
    padding-top: 11.125rem;
    width: 95%;
}
.blog-author h3::before,
.blog-author--no-cover h3::before {
  background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/17779/russ.jpeg");
  background-size: cover;
  border-radius: 50%;
  content: " ";
  display: inline-block;
  height: 32px;
  margin-right: .5rem;
  position: relative;
  top: 8px;
  width: 32px;
}
.blog-author h3 {
    color: #ffffff;
    font-size: 20px;
}
.blog-author--no-cover h3 {
  color: lighten(#333, 40%);
  font-weight: 100;
}
.blog-title {
    margin-top: 10px;
}
li.published-date {
    border: 1px solid #ccc;
    padding: 0px 6px !important;
}

.blog-body {
    margin: 0 auto;
    width: 100%;
    padding: 0px 1rem;
}
.video-body {
  height: 100%;
  width: 100%;
}
.blog-title h1 a {
  color: #333;
  font-weight: 100;
}
.blog-summary p {
  color: lighten(#333, 10%);
}
.blog-tags ul {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  list-style: none;
  padding-left: 0;
}
.blog-tags li + li {
  margin-left: .5rem;
}
.blog-tags a {
  border: 1px solid lighten(#333, 40%);
  border-radius: 3px;
  color: lighten(#333, 40%);
  font-size: .75rem;
  height: 1.5rem;
  line-height: 1.5rem;
  letter-spacing: 1px;
  padding: 0 .5rem;
  text-align: center;
  text-transform: uppercase;
  white-space: nowrap;
  width: 5rem;
}


.blog-footer {
  border-top: 1px solid lighten(#333, 70%);
  margin: 0 auto;
  padding-bottom: .125rem;
  width: 80%;
}
.blog-footer ul {
  list-style: none;
  display: flex;
  flex: row wrap;
  justify-content: flex-end;
  padding-left: 0;
}
.blog-footer li:first-child {
  margin-right: auto;
}
.blog-footer li + li {
  margin-left: .5rem;
}
.blog-footer li {
  color: lighten(#333, 40%);
  font-size: .75rem;
  height: 1.5rem;
  letter-spacing: 1px;
  line-height: 1.5rem;
  text-align: center;
  text-transform: uppercase;
  position: relative;
  white-space: nowrap;
}
.comments {
  margin-right: 1rem;
}
.published-date {
  border: 1px solid lighten(#333, 40%);
  border-radius: 3px;
  padding: 0 .5rem;
}
.numero {
    position: relative;
    top: -0.1rem;
    left: 6px;
}

.icon-star,
.icon-bubble {
  fill: lighten(#333, 40%);
  height:24px;
  margin-right: .5rem;
  transition: .25s ease;
  width: 24px;
}
  .icon-star,
.icon-bubble:hover {
    fill: #ff4d4d;
  }

  @media screen and (min-width: 480px) {
    width: 28rem;
  }
  @media screen and (min-width: 767px) {
    width: 40rem;
  }
  @media screen and (min-width: 959px) {
    width: 50rem;
  }
</style>

@endsection
