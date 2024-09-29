<header>

    {{-- left side --}}
    <div class="container-fluid d-flex text-bg-primary p-4 justify-content-between align-content-center">

        <div>
            <a class="fs-2 " href="{{ route('home') }}" target="_blank">Vai al sito</a>
        </div>

        {{-- right side --}}
        <div>
            <ul class="navbar">
                @guest
                    <li class="nav-item me-3"><a href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}">Registrati</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home') }}">Home</a>
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
</header>
