<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            {{--<img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">--}}
            @if(get_settings('software_name') == "") Software Name @else {{ get_settings('software_name') }} @endif
        </a>
        <!-- User -->
    @include('layouts.parts.userMobileNav')
    <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            @if(get_settings('software_name') == "") Software
                            Name @else {{ get_settings('software_name') }} @endif
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                           placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-shop text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>


            </ul>


            {!!  getSidebarFromPlugin() !!}

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buyPackage') }}">
                        <i class="ni ni-cart text-success"></i> {{ __('Buy Packages') }}
                    </a>
                </li>


            </ul>

            @include('parts.menu')
        <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Settings</h6>

            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-language" data-toggle="collapse" role="button"
                    >
                        <i class="fa fa-language"></i>
                        <span class="nav-link-text">{{ __('Language Settings') }}</span>
                    </a>

                    <div class="collapse" id="navbar-language">
                        <ul class="nav nav-sm flex-column">
                            @include('vendor.language.flags')

                        </ul>
                    </div>
                </li>


            </ul>

            <!-- Navigation -->
            @if(Auth::user()->type == 'admin')
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Admin Options</h6>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                        >
                            <i class="fa fa-key" style="color: #172b4d;"></i>
                            <span class="nav-link-text" style="color: #172b4d;">{{ __('Admin Settings') }}</span>
                        </a>

                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile.edit') }}">
                                        <i class="fa fa-user"></i> {{ __('User profile') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">
                                        <i class="fa fa-users"></i> {{ __('User Management') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('plugins') }}"><i class="fa fa-puzzle-piece"></i>
                                        {{ __('Plugins') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('themes') }}"><i class="fa fa-paint-brush"></i>
                                        {{ __('Themes') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('menu') }}"><i class="fa fa-list"></i>
                                        {{ __('Menu') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-cog"></i>
                                        {{ __('Settings') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('config') }}"><i class="fa fa-cogs"></i>
                                        {{ __('Config') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/translate') }}"><i class="fa fa-language"></i>
                                        {{ __('Translation') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('backup') }}"><i class="fa fa-download"></i>
                                        {{ __('Backup') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('widgets') }}"><i class="ni ni-atom"></i>
                                        {{ __('Widgets') }}
                                    </a>
                                </li>

                                {!!  getAdminSidebarFromPlugin() !!}
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-package" data-toggle="collapse" role="button"
                        >
                            <i class="ni ni-app"></i>
                            <span class="nav-link-text">{{ __('Package Settings') }}</span>
                        </a>

                        <div class="collapse" id="navbar-package">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/packages/add') }}">
                                        <i class="ni ni-fat-add"></i> {{ __('Add Package') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/packages') }}">
                                        <i class="ni ni-bag-17"></i> {{ __('Packages') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-page" data-toggle="collapse" role="button"
                        >
                            <i class="fa fa-file"></i>
                            <span class="nav-link-text">{{ __('Page Settings') }}</span>
                        </a>

                        <div class="collapse" id="navbar-page">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/page/front') }}">
                                        <i class="fa fa-file"></i> {{ __('Front Page') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/page/dashboard') }}">
                                        <i class="fa fa-file"></i> {{ __('User Page') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>

            @endif
        </div>
    </div>
</nav>
