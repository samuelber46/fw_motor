<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>FW Motors | {{ Route::currentRouteName() }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="icon" href="{{ asset('favicon.ico') }}" />
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ url('images') }}/logo.svg" width="200px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                href="{{ url('home') }}"><i class="material-icons">explore</i>Explore</a>
            </li>
            @Auth
              @if (Auth::user()->is_admin)
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'motor') ? 'active' : '' }}"
                    href="{{ url('motor') }}"><i class="material-icons">two_wheeler</i>Motor</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center {{ Route::currentRouteName() === 'checkout' ? 'active' : '' }}"
                    href="{{ url('checkout') }}"><i class="material-icons">shopping_cart</i>Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center {{ Route::currentRouteName() === 'account' ? 'active' : '' }}"
                    href="{{ url('account') }}"><i class="material-icons">person</i>Account</a>
                </li>
              @endif
            @endauth
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center {{ Route::currentRouteName() === 'about' ? 'active' : '' }}"
                href="{{ url('about') }}"><i class="material-icons">groups</i> About Us</a>
            </li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
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
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Hai, {{ Auth::user()->name }}!
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      @yield('content')
    </main>
  </div>
  @include('sweetalert::alert')
</body>
<footer>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#00B768" fill-opacity="1"
      d="M0,224L40,224C80,224,160,224,240,202.7C320,181,400,139,480,154.7C560,171,640,245,720,272C800,299,880,277,960,256C1040,235,1120,213,1200,213.3C1280,213,1360,235,1400,245.3L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
    </path>
  </svg>
</footer>

</html>
