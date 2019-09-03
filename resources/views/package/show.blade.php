@extends('layouts.app', ['title' => __('Packages')])
@section('title','Package List')
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' =>'',
        'class' => '',
        'backgroundClass' => 'bg-red'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Package List') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($packages as $package)
                                <div style="margin-bottom: 5px" class="col-xl-6 col-lg-12">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ $package->package_name }}
                                                        <span class="badge badge-pill badge-success">${{ $package->package_price }}</span>
                                                    </h5>
                                                    <span class="h2 font-weight-bold mb-0">{{ $package->plugin_name }}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                        <i class="ni ni-app"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-success mr-2"><i
                                                            class="fa fa-calendar-alt"></i> {{ $package->duration }}
                                                    days</span>
                                                <span class="text-nowrap">

                                                    <a style="color:white" href="{{ url('/packages/edit') }}/{{$package->id}}"
                                                            class="btn btn-primary btn-sm"> Edit</a>
                                                    <a style="color:white" href="{{ url('/packages/delete') }}/{{$package->id}}"
                                                       class="btn btn-danger btn-sm">Delete</a>


                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection