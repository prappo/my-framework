{{--<ul class="{{ config('language.flags.ul_class') }}">--}}
{{--@foreach (language()->allowed() as $code => $name)--}}
{{--<li class="{{ config('language.flags.li_class') }}">--}}
{{--<a href="{{ language()->back($code) }}">--}}
{{--<img src="{{ asset('vendor/akaunting/language/src/Resources/assets/img/flags/'. language()->country($code) .'.png') }}" alt="{{ $name }}" width="{{ config('language.flags.width') }}" /> &nbsp; {{ $name }}--}}
{{--</a>--}}
{{--</li>--}}
{{--@endforeach--}}
{{--</ul>--}}




@foreach (language()->allowed() as $code => $name)
    <li class="nav-item {{ config('language.flags.li_class') }}">
        <a class="nav-link" href="{{ language()->back($code) }}">
            <img src="{{ asset('images/flags/'. language()->country($code) .'.png') }}"
                 alt="{{ $name }}" width="{{ config('language.flags.width') }}"/> &nbsp; {{ $name }}
        </a>
    </li>

@endforeach
