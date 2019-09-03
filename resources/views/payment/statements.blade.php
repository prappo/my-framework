@extends('layouts.app', ['title' => __('Statements')])
@section('title',__('Statements'))
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
                            <h3 class="mb-0">{{ __('Statements') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Package</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Receipt URL</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statements as $statement)
                                    <tr>
                                        <th scope="row">
                                            @if(\App\Package::where('id',$statement->package_id)->value('package_name') == "")
                                                <span class="badge badge-warning">Package not available</span>
                                            @else
                                                <span class="badge badge-success"> {{ \App\Package::where('id',$statement->package_id)->value('package_name') }}</span>
                                            @endif
                                        </th>
                                        <td>
                                            {{ $statement->transaction_id }}
                                        </td>
                                        <td>
                                            <a href="{{ $statement->receipt_url }}" target="_blank">Click here</a>
                                        </td>
                                        <td>
                                            {{ $statement->amount }}
                                        </td>
                                        <td>
                                            {{ $statement->created_at }}
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

        @include('layouts.footers.auth')
    </div>
@endsection