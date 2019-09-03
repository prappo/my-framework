@foreach($data as $menu)
    @if($menu['active'] == 1)
        @if(isset($menu['sidebar']))
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="#{{ $menu['alias'] }}" data-toggle="collapse" role="button"
                    >
                        <i class="{{ $menu['icon'] ?? 'fa fa-cog' }}"></i>
                        <span class="nav-link-text">{{ $menu['name'] }}</span>
                    </a>

                    <div class="collapse" id="{{ $menu['alias'] }}">
                        <ul class="nav nav-sm flex-column">
                            @if(isset($menu['sidebar']))
                                @foreach($menu['sidebar'] as $sidebar)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url($sidebar[2]) }}">
                                            <i class="{{ $sidebar[1] }}"></i> {{ $sidebar[0] }}
                                        </a>
                                    </li>

                                @endforeach

                            @endif

                            <?php
                            try{
                            $menuList = Menu::getByName($menu['name'])

                            ?>
                            @foreach($menuList as $menu)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $menu['link'] }}"><i
                                                class="{{ $menu['class'] }}"></i>{{ $menu['label'] }}</a>
                                </li>
                            @endforeach
                            <?php
                            }catch (\Exception $exception) {

                            }
                            ?>

                        </ul>
                    </div>
                </li>

            </ul>
        @endif

    @endif

@endforeach