@extends('layouts.app', ['title' => __('Front Page')])
@section('title','Front Page')
@section('content')
    @include('users.partials.header', [
        'title' => 'Theme Using : '. Theme::info('name'),
        'description' =>'Theme Details : '. Theme::info('description'),
        'class' => '',
        'backgroundClass' => 'bg-green'

    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="mb-0">{{ __('Landing Page') }}</h3>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('themes') }}" class="btn btn-danger"><i class="fa fa-paint-brush"></i> Select Theme</a>
                                <a target="_blank" class="btn btn-default" href="{{ url('/') }}"><i
                                            class="fa fa-eye"></i> Preview</a>
                                <a href="{{ url('/theme/settings') }}/{{ Theme::info('slug') }}"
                                        class="btn btn-info"><i class="fa fa-cogs"></i> Settings</a>
                            </div>
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
                        <form method="post" action="{{ route('updateFront') }}">
                            @csrf
                            <textarea id="summernote" name="front_content">
                                {{ get_settings('front_content') }}
                            </textarea>
                            <br>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@section('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <style>
        #summernote {
            border: none;
        }
    </style>
@endsection

@section('js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'https://api.github.com/emojis',
                async: false
            }).then(function (data) {
                window.emojis = Object.keys(data);
                window.emojiUrls = data;
            });
            ;

            var HelloButton = function (context) {
                var ui = $.summernote.ui;

                // create button
                var button = ui.button({
                    contents: '<i class="fa fa-child"/> Hello',
                    tooltip: 'hello',
                    click: function () {
                        // invoke insertText method with 'hello' on editor module.
                        context.invoke('editor.insertText', 'hello');
                    }
                });

                return button.render();   // return button as jquery object
            }

            $('#summernote').summernote({
                height: 500,
                placeholder: 'type starting with : and any alphabet',
                hint: {

                    match: /:([\-+\w]+)$/,
                    search: function (keyword, callback) {
                        callback($.grep(emojis, function (item) {
                            return item.indexOf(keyword) === 0;
                        }));
                    },
                    template: function (item) {
                        var content = emojiUrls[item];
                        return '<img src="' + content + '" width="20" /> :' + item + ':';
                    },
                    content: function (item) {
                        var url = emojiUrls[item];
                        if (url) {
                            return $('<img />').attr('src', url).css('width', 20)[0];
                        }
                        return '';
                    }
                }
            });
        });
    </script>
@endsection