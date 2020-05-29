
<nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top" style="border-bottom: 5px solid rgb(142, 21, 55);">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Laravel') }} -->
            <!-- LOGO -->
            <img src="{{asset('storage/pics/logo.png')}}" style="height:50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            @auth
                    @if( Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link">PRODUCT CREATE</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">PRODUCT LIST</a>
                    </li>
                    

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset('storage/pics/'.Auth::user()->image)}}" class="rounded-circle mr-1" height="30px" width="30px">{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('home')}}">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{route('profile.index')}}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Sign In</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">Đăng ký</a>
                    </li> -->
                @endauth
            </ul>
        </div>
    </div>
</nav>