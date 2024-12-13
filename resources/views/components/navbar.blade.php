<!-- resources/views/components/navbar.blade.php -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Aura</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Pagina Principal<br></a></li>
                <li><a href="{{ route('noticias.store') }}">Noticias</a></li>

                <li><a href="team.html">Team</a></li>
                <li><a href="{{ route('admin.index') }}">Ingresar Noticias</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesion </a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
