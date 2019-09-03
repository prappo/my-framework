@extends('layouts.app', ['title' => __('Themes')])
@section('title','Themes')
@section('content')
    @include('users.partials.header', [
        'title' => __('Themes'),
        'description' => __('Choose your favorite theme for site'),
        'class' => '',
        'backgroundClass' => 'bg-red'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Themes') }}</h3>
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
                            </div>
                        </div>
                        <div class="row">
                            @foreach(themes() as $theme)
                                <div style="margin-bottom:5px" class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        @if(isset($theme['preview']))
                                            <img class="card-img-top"
                                                 src="{{ $theme['preview']  }}"
                                                 alt="Card image cap">
                                        @else
                                            <img class="card-img-top"
                                                 src="{{ url('/images/theme_thumb.png') }}"
                                                 alt="Card image cap">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $theme['name'] }}</h5>
                                            <h5><i class="fa fa-user"></i> Author <span
                                                        class="badge badge-primary"> {{ $theme['author'] }}</span></h5>
                                            <h5><i class="fa fa-globe"></i> URL <span
                                                        class="badge badge-primary"> {{ $theme['web'] }}</span></h5>
                                            <p class="card-text">{{ $theme['description'] }}</p>
                                            <a href="{{ url('/theme/active') }}/{{ $theme['slug'] }}"
                                               class="btn btn-success">Active</a>
                                            <a target="_blank" href="{{ url('/theme/preview') }}/{{ $theme['slug'] }}"
                                               class="btn btn-primary">Preview</a>
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