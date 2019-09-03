@extends('layouts.app', ['title' => __('Create Package')])
@section('title',__('Create Package'))
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' => '',
        'class' => '',
        'backgroundClass' => 'bg-purple'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Create a Package for') }} <b>{{ $name }}</b></h3>
                        </div>
                    </div>
                    <div class="card-body">

                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text"><strong>Success!</strong> {{ session('success') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif

                        @if($errors->any())

                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fa fa-times-circle"></i></span>
                                    <span class="alert-inner--text"><strong>Error!</strong> {{ $error }} </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            @endforeach

                        @endif

                        <form method="post" action="{{ route('createPackage') }}">
                            @csrf
                            <input type="hidden" name="plugin_name" value="{{ $name }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-star"></i></span>
                                            </div>
                                            <input name="package_name" value="{{ old('package_name') }}" class="form-control" placeholder="Package Name"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                            </div>
                                            <input name="package_description" class="form-control"
                                                   placeholder="Package Description" value="{{ old('package_description') }}" type="text">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                                            </div>
                                            <input value="{{ old('package_price') }}" name="package_price" class="form-control" placeholder="Price"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input value="{{ old('duration') }}" name="duration" class="form-control" placeholder="Duration"
                                                   type="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Days</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-icon btn-3 btn-primary" type="submit">
                                        <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>

                                        <span class="btn-inner--text">Create Package</span>

                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
