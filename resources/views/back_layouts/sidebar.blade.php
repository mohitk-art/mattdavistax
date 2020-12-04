<div class="sidebar" data-color="purple" data-image="{{ url('assets/img/sidebar-5.jpg')}}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/dashboard')}}" class="simple-text">
            <!---For Show User Type-->

                @role('admin')
                 Admin Dashboard
                @endrole

                @role('staff')
                     Staff Dashboard
                @endrole

                @role('accountant')
                     Accountant Dashboard
                @endrole

                @role('customer')
                    Customer Dashboard
                @endrole

            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ url('/') }}">
                    <i class="pe-7s-home"></i>
                    <p>Home </p>
                </a>
            </li>

            @can('permissions')
            <li class="{{ (request()->is('permissions')) ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Permissions</p>
                </a>
            </li>
            @endcan


            @can('roles')
            <li class="{{ (request()->is('roles')) ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Roles</p>
                </a>
            </li>
            @endcan

            @can('users')
            <li class="{{ (request()->is('users')) ? 'active' : '' }}">
                <a href="{{url('users')}}">
                        <i class="pe-7s-user"></i>
                        <p>customer</p>
                    </a>
            </li>
            @endcan

            @can('blogs')
            <li class="{{ (request()->is('blogs')) ? 'active' : '' }}">
                <a href="{{ route('blogs.index') }}">
                    <i class="pe-7s-science"></i>
                    <p>Blogs</p>
                </a>
            </li>
            @endcan

            @can('taxs')
                <li class="{{ (request()->is('tax')) ? 'active' : '' }}">
                    @role('customer')
                        <a href="{{ url('tax',Auth::user()->id) }}">
                            <i class="pe-7s-map-marker"></i><p>Tax</p>
                        </a>
                    @endrole
                </li>
            @endcan

            <li>
            <a href="{{url('chat')}}">
                    <i class="pe-7s-bell"></i>
                    <p>Chat</p>
                </a>
            </li>


                {{-- <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li> --}}


            <li class="active-pro">
                <a href="{{ route('logout') }}">
                    <i class="pe-7s-rocket"></i>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <p onclick="event.preventDefault();
                    this.closest('form').submit();">Log Out</p>
                    </form>
                </a>
            </li>
        </ul>
    </div>
</div>
