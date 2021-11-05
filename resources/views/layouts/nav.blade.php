<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <img style="max-width: 50px;padding:5px;" src="{{ asset('images/logo.png') }}" alt="">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li><a class="nav-link" href="{{ route('home') }}">Map</a></li>
                <li><a class="nav-link" href="{{ route('counties.index') }}">Counties</a></li>
                <li><a class="nav-link" href="{{ route('tip-categories.index') }}">Tip Categories</a></li>
                <li><a class="nav-link" href="{{ route('tips.index') }}">Tips</a></li>
                <li><a class="nav-link" href="{{ route('users') }}">{!! trans('laravelusers::app.nav.users') !!}</a></li>
                
                @if (Request::is('users'))
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a data-toggle="tooltip" title="Logout" style="color: #922409;" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        
                            <i class="fa fa-sign-out-alt"></i>
                        
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a style="color: #922409;" class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                
            @endif
                @endguest
                @if (Request::is('users'))
                     
                    
                @endif
            </ul>
        </div>
    </div>
</nav>
