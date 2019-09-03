@extends('layouts.app', ['title' => __('Buy Package')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('Here you can buy package'),
        'class' => '',
        'backgroundClass' => 'bg-red'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Payment') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payment') }}" method="POST">
                            @csrf
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_mGJ3EaQn79oQskFaGjgXmTRW"
                                    data-amount="999"
                                    data-name="Prappo Islam Prince"
                                    data-description="Example charge"
                                    data-image="{{ url('/images/plugin.png') }}"
                                    data-locale="auto">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
