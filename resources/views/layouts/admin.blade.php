<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
        <header class="app-header navbar">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item pr-2 d-none d-lg-block d-xl-block">
                    <span class="badge badge-primary text-white p-2">{{ Auth::user()->first_name }}</span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="true">
                    <img src="{{ asset('images/user-logued.svg') }}" alt="Loguearse">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rounded-lg mr-2 mt-3">
                        <div class="dropdown-header text-center">
                            <strong class="h4 text-dark">My account</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <img src="{{ asset('images/exit.svg') }}" alt="cerrar sesión" class="mr-2">
                        Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </header>
        <input type="hidden" id="uId" value="<?php echo auth()->user()->id; ?>">
        <div class="app-body" id="app" v-on:scroll.passive="onScroll">
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav">
                    </ul>
                </nav>
                <button class="sidebar-minimizer brand-minimizer text-white" type="button">
                    <span id="btn-cerrar">Close</span>
                </button>
            </div>
            <!-- Main content -->
            <main class="main bg-white pb-3">
                @yield('content')
            </main>
            <!-- /.main -->
        </div>
        @include('partials.footer_admin')
    </body>
</html>