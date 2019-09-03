<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
                <h1 style="color:white"><b>{{ get_settings('software_name') }}</b></h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('/') }}">
                                <h1><b>{{ get_settings('software_name') }}</b></h1>
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <?php
                    try{
                    $menuList = Menu::getByName('header')

                    ?>
                    @foreach($menuList as $menu)
                        <li class="nav-item dropdown">
                            <a href="{{ $menu['link'] }}" class="nav-link" data-toggle="dropdown" href="#"
                               role="button">
                                <i class="ni ni-collection d-lg-none"></i>
                                <span class="nav-link-inner--text">{{ $menu['label'] }}</span>
                            </a>
                            @if( $menu['child'] )
                                <div class="dropdown-menu">
                                    @foreach( $menu['child'] as $child )
                                        <a href="{{ $child['link'] }}" class="dropdown-item">{{ $child['label'] }}</a>
                                    @endforeach

                                </div>
                            @endif
                        </li>
                    @endforeach
                    <?php
                    }catch (\Exception $exception) {

                    }
                    ?>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ get_settings('theme_default_facebook') }}"
                           target="_blank"
                           data-toggle="tooltip" title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ get_settings('theme_default_instagram') }}"
                           target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ get_settings('theme_default_twitter') }}"
                           target="_blank"
                           data-toggle="tooltip" title="Follow us on Twitter">
                            <i class="fa fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    @if(!isInstalled())
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{ url('/install') }}" target="_blank"
                               class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-cloud-download mr-2"></i>
                </span>
                                <span class="nav-link-inner--text">Install Now</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon"
                               href="{{ url('/login') }}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-icon"
                               href="{{ url('/register') }}">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>