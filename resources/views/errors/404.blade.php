@extends('layouts.app', ['class' => 'bg-gradient-primary'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">:(</h1>
                        <h1 class="text-white">404</h1>
                        <h3 class="text-white">{{ __('Sorry The page you are looking for is not foun') }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
