@foreach($data as $menu)
    @if($menu['active'] == 1)
        @if(isset($menu['adminSidebar']))

            @if(isset($menu['adminSidebar']))
                @foreach($menu['adminSidebar'] as $sidebar)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($sidebar[2]) }}">
                            <i class="{{ $sidebar[1] }}"></i> {{ $sidebar[0] }}
                        </a>
                    </li>

                @endforeach

            @endif

        @endif

    @endif

@endforeach