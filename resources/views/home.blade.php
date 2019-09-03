@extends('layouts.app', ['class' => 'bg-green'])
@section('title','Dashboard')
@section('content')

    <div class="container">
        <br><br><br>
        {!!  get_settings('dashboard_content')  !!}
    </div>

@endsection
