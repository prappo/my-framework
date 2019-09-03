@extends('layouts.app', ['title' => __('Software Settings')])
@section('title',__('Software Settings'))
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' => '',
        'class' => '',
        'backgroundClass' => 'bg-yellow'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0"><i class="fa fa-cog"></i> {{ __('Settings fields') }}</h3>
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

                        <form method="post" action="{{ route('updateSettings') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="ni ni-app"></i></span>
                                            </div>
                                            <input name="software_name"
                                                   class="form-control form-control-alternative"
                                                   value="{{ get_settings('software_name') }}"
                                                   placeholder="Software Name"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fa fa-edit"></i></span>
                                            </div>
                                            <input name="footer_text"
                                                   class="form-control form-control-alternative"
                                                   value="{{ get_settings('footer_text') }}"
                                                   placeholder="Footer Text"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fab fa-stripe"></i></span>
                                            </div>
                                            <input name="stripe_publishable_key"
                                                   class="form-control form-control-alternative"
                                                   value="{{ get_settings('stripe_publishable_key') }}"
                                                   placeholder="Stripe Publishable Key"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fab fa-stripe"></i></span>
                                            </div>
                                            <input name="stripe_secret_key"
                                                   class="form-control form-control-alternative"
                                                   value="{{ get_settings('stripe_secret_key') }}"
                                                   placeholder="Stripe Secret Key"
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Save</button>
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