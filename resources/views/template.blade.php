@include('head')
<body>
    <div>
        <div class="d-flex justify-content-between px-5 py-3 shadow">
            <a href="/en/index" class="py-2 text-decoration-none text-black px-3 fw-bold">Amazing E-Grocery</a>
            <div class="d-flex py-2">
                @if(auth()->check())
                    <a href="{{ route('home') }}" class="text-decoration-none text-black px-3 fw-semibold">Home</a>
                    <a href="{{ route('cart') }}" class="text-decoration-none text-black px-3 fw-semibold">Cart</a>
                    <a href="{{ route('profile') }}" class="text-decoration-none text-black px-3 fw-semibold">Profile</a>
                    @if(Auth::user()->role_id == 2)
                        <a href="{{ route('account_maintenance' )}}" class="text-decoration-none text-black px-3 fw-semibold">Account Maintenance</a>
                    @endif
                @endif
            </div>

            <div class="d-flex">
                @if ( auth()->check() )
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-navbar fw-semibold" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->first_name}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
                @else
                    <a href="{{ route('login_form') }}" class="text-decoration-none text-black fw-bold py-2 px-3">Login</a>
                    <a href="{{ route('register_form') }}" class="text-decoration-none text-white bg-primary fw-bold px-3 py-2 mx-3 rounded-pill shadow-sm">Register</a>
                @endif
            </div>
        </div>
        <div>
            @yield('content')
        </div>
        <div class="d-flex justify-content-center py-2 shadow">
            <p>&copy; Amazing E-Grocery 2023</p>
        </div>
    </div>
</body>
</html>
