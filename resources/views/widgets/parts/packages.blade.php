<style>
    .container {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }

    .card-deck .card {
        min-width: 220px;
    }

    .border-top { border-top: 1px solid #e5e5e5; }
    .border-bottom { border-bottom: 1px solid #e5e5e5; }

    .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

</style>
<div class="container">
    <div class="mb-3 card-deck text-center">
        @foreach(\App\Package::all() as $package)
            <div class="card mb-3 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@if($package->package_price == 0) Free @else Premium @endif</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">${{ $package->package_price }}
                        <small class="text-muted">/ {{ $package->duration }} days</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><h4>{{ $package->package_name }}</h4></li>
                        <li>{{ $package->package_description }}</li>

                    </ul>
                    @if($package->package_price == 0)
                        <a href="{{ url('/package/buy') }}" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</a>
                    @else
                        <a href="{{ url('/package/buy') }}" class="btn btn-lg btn-block btn-primary">Buy</a>
                    @endif

                </div>
            </div>
        @endforeach


    </div>


</div>