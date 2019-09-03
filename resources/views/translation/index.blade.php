@extends('layouts.app', ['title' => __('Translation')])
@section('title',__('Translation Manager'))
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
                            <h3 class="mb-0">{{ __('Translation manager') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <iframe onload="this.style.height=(this.contentDocument.body.scrollHeight + 15) + 'px';" src="{{url('/trans')}}" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection