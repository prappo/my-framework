@extends('layouts.app', ['title' => __('Menu')])
@section('title',__('Menu Manager'))
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' => '',
        'class' => '',
        'backgroundClass' => 'bg-red'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Menu manager') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">




                            {!! Menu::render() !!}




                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@section('js')
    {!! Menu::scripts() !!}
@endsection
