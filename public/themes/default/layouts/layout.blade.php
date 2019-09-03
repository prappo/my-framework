<!DOCTYPE html>
<html lang="en">

<head>
    {!! meta_init() !!}


    <title>{{ get_settings('theme_title') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    @styles()

</head>

<body>
@partial('header')

<main>
    <section class="section section-lg bg-gradient-default">
        <div class="container">
            @content()
        </div>

    </section>

</main>

@partial('footer')

@scripts()
</body>

</html>
