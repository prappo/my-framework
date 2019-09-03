@extends('layouts.app', ['title' => __('Package List')])
@section('title','Create Package')
@section('content')
    @include('users.partials.header', [
        'title' => __('Features List'),
        'description' => 'Create Package from plugin',
        'class' => '',
        'backgroundClass' => 'bg-green'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Features List (Plugins)') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach(plugins() as $plugin)
                                @if(isset($plugin['core']))
                                    @if($plugin['core'] == 1)

                                    @endif
                                @else
                                    <div style="width: 18rem;margin: 5px">

                                        <div class="card card-stats mb-4 mb-lg-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title  text-muted mb-0">{{ $plugin['name'] }}</h5>

                                                    </div>
                                                    <div class="col-auto">
                                                        @if($plugin['active'] == 1)
                                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                                <i class="ni ni-app"></i>
                                                            </div>
                                                        @else
                                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                                <i class="ni ni-app"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                    @if($plugin['active'] == 1)
                                                        <span class="text-success mr-2"><i
                                                                    class="fa fa-dot-circle"></i> Enabled</span>
                                                    @else
                                                        <span class="text-danger mr-2"><i
                                                                    class="fa fa-dot-circle"></i> Disabled</span>
                                                    @endif
                                                    <span class="text-nowrap"><a
                                                                href="{{ url('/packages/add') }}/{{$plugin['name']}}"
                                                                class="btn btn-primary pull-right text-white btn-sm"><i
                                                                    class="fa fa-plus"></i> Create Package</a></span>
                                                </p>
                                            </div>
                                        </div>


                                    </div>

                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection