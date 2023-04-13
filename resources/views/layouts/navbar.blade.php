<header class="header_area" id="header">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('temp/img/core-img/ft_logo5.png')}}" alt="" width="200" height="auto"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                    <!-- Nav -->
                    <div class="collapse navbar-collapse" id="dorneNav">
                        <ul class="navbar-nav mr-auto" id="dorneMenu">
                        </ul>
                        <!-- Search btn -->
                        <div class="dorne-search-btn">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Signin btn -->
                        <div class="dorne-signin-btn">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Visa Assistance</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dorne-search-btn">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                        @guest
                        @if (Route::has('register'))
                        <div class="dorne-search-btn">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register <span class=" sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                        @endif
                        @if (Route::has('login'))
                        <div class="dorne-add-listings-btn">
                            <a href="#" class="btn dorne-btn" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </div>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a href="#" class="btn dorne-btn" id="logout"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                            <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> -->

                            <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a> -->

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
                    </li>
                    @endguest
                    <!-- Add listings btn -->
            </div>
            </nav>
        </div>
    </div>
    </div>
</header>
@include('auth.login')
@include('auth.register')
<script>
    $("#logout").on("click", function() {
        Swal.fire({
            title: 'Logout?',
            text: "leave this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Account has been logged out',
                    showConfirmButton: false,
                    timer: false
                });
                $('#logout-form').submit()
            }
        });
        setTimeout(function() {
            location.reload();
        }, 3000);
    });
</script>