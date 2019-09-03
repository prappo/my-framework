<?php
try{
$menuList = Menu::getByName('dashboard')

?>
@foreach($menuList as $menu)

    @if( $menu['child'] )
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="#navbar-{{ $menu['id'] }}" data-toggle="collapse" role="button"
                >
                    <i class="fa fa-{{ $menu['class'] }}"></i>
                    <span class="nav-link-text">{{ $menu['label'] }}</span>
                </a>

                <div class="collapse" id="navbar-{{ $menu['id'] }}">
                    <ul class="nav nav-sm flex-column">
                        @foreach( $menu['child'] as $child )
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $child['link'] }}">
                                    <i class="fa fa-{{ $child['class'] }}"></i> {{ $child['label'] }}
                                </a>
                            </li>
                        @endforeach



                    </ul>
                </div>
            </li>


        </ul>

    @else


        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ $menu['link'] }}">
                    <i class="{{ $menu['class'] }} text-primary"></i> {{ $menu['label'] }}
                </a>
            </li>


        </ul>



    @endif

@endforeach
<?php
}catch (\Exception $exception) {

}
?>

