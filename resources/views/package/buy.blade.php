@extends('layouts.app', ['title' => __('Buy Package')])
@section('title','Buy Package')
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' => '',
        'class' => '',
        'backgroundClass' => 'bg-green'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Buy Package') }}</h3>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                            <span class="alert-inner--text"><strong>Ops !</strong> {{ $error }}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <script src="https://js.stripe.com/v3/"></script>


                        </div>

                        <div class="row">
                            @foreach($packages as $package)
                                <div style="margin-bottom: 5px" class="col-xl-6 col-lg-12">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ $package->package_name }}
                                                        <span class="badge badge-pill badge-success">{{ $package->plugin_name }}</span>
                                                    </h5>
                                                    <span class="h2 font-weight-bold mb-0">${{ $package->package_price}}</span>
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

                                            <p>{{ $package->package_description }}</p>


                                            <form action="{{ route('buyPackage') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="package_id" value="{{$package->id}}">
                                                @if($package->package_price == 0)
                                                    <button type="submit"
                                                            class="btn btn-primary">{{ __('Take it for free') }}</button>
                                                @else

                                                    <script
                                                            src="https://checkout.stripe.com/checkout.js"
                                                            class="stripe-button"
                                                            data-key="{{ get_settings('stripe_publishable_key') }}"
                                                            data-amount="{{ $package->package_price * 100 }}"
                                                            data-name="{{ Auth::user()->name }}"
                                                            data-description="{{ $package->package_description }}"
                                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                            data-locale="auto">
                                                    </script>
                                                @endif
                                            </form>
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
@section('js')
    <script>
        $(function () {
            $(".stripe-button-el").replaceWith('<button type="submit" class="btn btn-success"><i class="ni ni-bag-17"> </i> Buy This Package</button>');
        });
    </script>
@endsection

