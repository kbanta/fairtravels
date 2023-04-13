<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form> -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        @if ($notifications->isNotEmpty())
                        <span class="notification">{{ auth()->user()->unreadNotifications->count() }}</span>
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    @foreach ($notifications as $notification)
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="javascript:void(0)">{{ $notification->data['message'] }}</a>
                    </div>
                    @endforeach
                    @else
                    <p>No notifications.</p>
                    @endif
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="logout">
                        <i class="fa fa-sign-out"></i>
                        logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- <a class="nav-link" href="javascript:void(0)">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a> -->
                </li>
            </ul>
        </div>
    </div>
</nav>
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
            // location.reload();
            location.href =
                "http://127.0.0.1:8000";
        }, 3000);
    });
</script>