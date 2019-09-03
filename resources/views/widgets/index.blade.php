@extends('layouts.app', ['title' => __('Widgets')])
@section('title','Widgets')
@section('content')
    @include('users.partials.header', [
        'title' => '',
        'description' => '',
        'class' => '',
        'backgroundClass' => 'bg-red'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Widgets') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">{{__('Shortcodes')}}</th>
                                    <th scope="col">{{__('Description')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td>
                                        <b>[packages]</b>
                                    </td>

                                    <td>
                                        Display available packages to buy
                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <b>[login]</b>
                                    </td>

                                    <td>
                                        Display login form for Default theme
                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <b>[registration]</b>
                                    </td>

                                    <td>
                                        Display registration form for default theme
                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <b>[notice]</b>
                                    </td>

                                    <td>
                                        Show notice . Use : <kbd>[notice design='success' text='your important
                                            notice']</kbd> . <br>
                                        Available design : 'success','danger','warning','default'
                                    </td>

                                </tr>

                                <tr>
                                    <td><b>[row]</b></td>
                                    <td>This is layout system for your pages grid view. <br>
                                        Use : <kbd>[row] your content [/row]</kbd>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>[column]</b></td>
                                    <td>This is layout system for your pages grid view. <br>
                                        Use : <kbd>[column] your content [/column]</kbd> <br>
                                        More Example : <br>

                                        <pre style="color: white">
                                            [row]
                                            [column] Column 1 content [/column]
                                            [column] Column 2 content [/column]
                                            [/row]

                                        </pre>


                                    </td>
                                </tr>

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