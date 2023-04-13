<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('darkdash/assets/img/sidebar-2.jpg')}}">
    <div class="logo">
        <center>
            <a class="navbar-brand" href="{{ url('admin/dashboard') }}"><img src="{{asset('temp/img/core-img/ft_logo5.png')}}" alt="" width="130"></a>
        </center>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : ''}}">
                <a class="nav-link " href="{{url('admin/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('admin/home') }}" target="_blank">
                    <i class="material-icons">flight</i>
                    <p>My Site</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/profile') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <div class="logo"></div>
            <li class="nav-item ">
                <a class="nav-link" href="./tables.html">
                    <i class="material-icons">content_paste</i>
                    <p>Bookings</p>
                </a>
            </li>
        </ul>
    </div>
</div>