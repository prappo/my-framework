@extends('layouts.app', ['title' => __('User Profile')])
@section('title','Plugins')
@section('content')
    @include('users.partials.header', [
        'title' => 'Plugins',
        'description' => __('Installed plugin list '),
        'class' => '',
        'backgroundClass' => 'bg-warning'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Plugin List') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach($errors as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif


                        </div>


                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( plugins() as $plugin)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">

                                                <div class="media-body">
                                                    <a data-toggle="modal" data-target="#id_{{ $plugin['name'] }}"
                                                       href="#">
                                                        <span class="mb-0 text-sm">{{ $plugin['name'] }}</span></a>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                              @if(isset($plugin['core']))
                                                  @if($plugin['core'] != 1)
                                                      @if($plugin['active'] == 1)
                                                          <i class="bg-success"></i> Enabled
                                                      @else
                                                          <i class="bg-warning"></i> Disabled
                                                      @endif
                                                      @else
                                                      <kbd>Core plugin</kbd>
                                                  @endif
                                              @else
                                                  @if($plugin['active'] == 1)
                                                      <i class="bg-success"></i> Enabled
                                                  @else
                                                      <i class="bg-warning"></i> Disabled
                                                  @endif
                                              @endif


                                            </span>
                                        </td>
                                        <td>

                                            @if(isset($plugin['core']))
                                                @if($plugin['core'] != 1)
                                                    @if($plugin['active'] != 1)
                                                        <a href="{{url('/plugin/enable')}}/{{$plugin['name']}}"
                                                           style="color: white"
                                                           class="btn btn-success btn-sm">Enable</a>
                                                    @endif

                                                    @if($plugin['active'] == 1)
                                                        <a href="{{url('/plugin/disable')}}/{{$plugin['name']}}"
                                                           style="color: white"
                                                           class="btn btn-primary btn-sm">Disable</a>
                                                    @endif
                                                @endif
                                            @else
                                                @if($plugin['active'] != 1)
                                                    <a href="{{url('/plugin/enable')}}/{{$plugin['name']}}"
                                                       style="color: white"
                                                       class="btn btn-success btn-sm">Enable</a>
                                                @endif

                                                @if($plugin['active'] == 1)
                                                    <a href="{{url('/plugin/disable')}}/{{$plugin['name']}}"
                                                       style="color: white"
                                                       class="btn btn-primary btn-sm">Disable</a>
                                                @endif
                                            @endif


                                            {{--@if($plugin['active'] != 1)--}}
                                            {{--<a href="{{url('/plugin/delete')}}/{{$plugin['name']}}"--}}
                                            {{--style="color: white"--}}
                                            {{--class="btn btn-warning btn-sm">Delete</a>--}}
                                            {{--@endif--}}


                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Plugin modals --}}
        @foreach( plugins() as $plugin)
            <div class="modal fade" id="id_{{ $plugin['name'] }}" tabindex="-1" role="dialog"
                 aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">


                        <div class="modal-body">

                            <div class="py-3 text-center">
                                <i class="fa fa-puzzle-piece"></i>
                                <h4 class="heading mt-4">{{ $plugin['name'] }}</h4>
                                <p>{!! $plugin['description'] !!}</p>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-link text-white ml-auto"
                                    data-dismiss="modal">Close
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        @include('layouts.footers.auth')
    </div>
@endsection