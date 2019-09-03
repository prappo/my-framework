<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <b class="logo-dark" alt="logo">{{ get_settings('software_name') }}</b>
                <b class="logo-light" alt="logo">{{ get_settings('software_name') }}</b>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <nav class="nav nav-navbar">

                <?php
                try{
                $menuList = Menu::getByName('header')

                ?>
                @foreach($menuList as $menu)
                    <a class="nav-link" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                @endforeach
                <?php
                }catch (\Exception $exception) {

                }
                ?>
            </nav>
        </section>

        <a class="btn btn-sm btn-round btn-dark" href="{{ url('/login') }}">Login</a> |
        <a class="btn btn-sm btn-round btn-dark" href="{{ url('/register') }}">Register</a>

    </div>
</nav><!-- /.navbar -->


<!-- Header -->
<header class="header text-white pt-12 pb-10" style="background-image: linear-gradient(-45deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <h1 class="display-4">{{ get_settings('theme_basic_header_title') }}</h1>
        <p class="lead-2 mt-6">{{ get_settings('theme_basic_header_description') }}</p>
    </div>
</header><!-- /.header -->

