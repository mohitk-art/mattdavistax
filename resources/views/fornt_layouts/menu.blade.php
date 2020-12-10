<div class="top_banner">
    <div class="top_header_agile_info_w3ls">
      <nav class="navbar navbar-default navbar-expand-lg navbar-dark">
            <div class="navbar-header d-flex align-items-center justify-content-between">
                
                <a class="navbar-brand" href="{{url('/')}}"><img src="https://www.mattdavistaxservice.com/uploads/1/2/9/9/129999372/published/matt-davis-tax-service-logo.jpg?1576013841" style="height: 55px"></a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <div id="m_nav_container" class="m_nav wthree_bg ml-auto">
                    <nav class="menu menu--sebastian">
                        <ul id="m_nav_list" class="m_nav menu__list">
                            <li class="m_nav_item" id="m_nav_item_1"> <a href="{{url('/')}}" class="link link--kumya"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                            <li class="m_nav_item" id="m_nav_item_1"> <a href="{{url('/guarantee')}}" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i>Guarantee</a></li>

                            <li class="m_nav_item" id="moble_nav_item_3"> <a href="{{url('/services')}}" class="link link--kumya"><i class="fa fa-server" aria-hidden="true"></i>Service</a></li>
                            <li class="m_nav_item" id="moble_nav_item_4"> <a href="{{ url('/blogs_list') }}" class="link link--kumya"><i class="fa fa-list-alt" aria-hidden="true"></i>Blogs</a></li>

                            <li class="m_nav_item" id="moble_nav_item_4"> <a href="{{ url('/contact_us') }}" class="link link--kumya"><i class="fa fa-comments" aria-hidden="true"></i>Contact Us</a></li>


                              @if (Route::has('login'))
                                  @auth
                                  <li class="m_nav_item" id="moble_nav_item_4"> <a href="{{url('dashboard')}}" class="link link--kumya"><i class="fa fa-sign-in" aria-hidden="true"></i>Dashboard</a></li>
                                  @else
                                  <li class="m_nav_item" id="moble_nav_item_4"> <a href="{{route('login')}}" class="link link--kumya"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>

                                      @if (Route::has('register'))
                                      <li class="m_nav_item" id="moble_nav_item_4"> <a href="{{route('register')}}" class="link link--kumya"><i class="fa fa-user-plus aria-hidden="true"></i><span>Register</a></li>
                                      @endif
                                  @endif
                              </div>
                          @endif

                        </ul>
                    </nav>
                </div>

                </nav>
            </div>
    </div>
