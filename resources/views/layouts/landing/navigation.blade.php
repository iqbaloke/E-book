<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welocme') }}">E-Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request()->is('/') ? 'active' : '' }}" href="{{ route('welocme') }}">Home
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request()->is('category-all') ? 'active' : '' }}"
                        href="{{ route('categorylanding') }}">Catgeory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request()->is('cart') ? 'active' : '' }}"
                        href="{{ route('cartlanding') }}">cart</a>
                </li>
                @role('super admin|admin|writer')
                <li class="nav-item">
                    <a class="nav-link {{ Request()->is('become-a-creator') ? 'active' : '' }}"
                        href="{{ route('becomeacreator') }}">Become a Creator</a>
                </li>
                @endrole
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">about</a>
                </li>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i> {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">profile</a>
                        @hasanyrole('super admin|admin')
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Admin</a>
                        @endhasanyrole
                        @role('writer')
                        <a class="dropdown-item" href="{{ route('becomeacreator') }}">become a creators</a>
                        @endrole
                        <a class="dropdown-item" href="{{ route('dashboardcreator') }}">dashboard</a>
                        <a class="dropdown-item" href="#">setting</a>
                        @role('creator|super admin|admin')
                        <a class="dropdown-item" href="#">income</a>
                        <a class="dropdown-item" href="#">upload</a>
                        @endrole
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
