<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="{{ url('/') }}">{{ get_settings('software_name') }}</a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="{{ get_settings('theme_default_facebook') }}"><i
                                class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="{{ get_settings('theme_default_twitter') }}"><i
                                class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="{{ get_settings('theme_default_instagram') }}"><i
                                class="fa fa-instagram"></i></a>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">

                    <?php
                    try{
                    $menuList = Menu::getByName('footer')

                    ?>
                    @foreach($menuList as $menu)

                        <a class="nav-link" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                    @endforeach
                    <?php
                    }catch (\Exception $exception) {

                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->
