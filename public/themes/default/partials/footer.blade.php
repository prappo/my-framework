<footer class="footer has-cards">

    <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-6">
                <h3 class="text-primary font-weight-light mb-2">{{ get_settings('theme_default_footer_title') }}</h3>
                <h4 class="mb-0 font-weight-light">{{ get_settings('theme_default_footer_details') }}</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <a target="_blank" href="{{ get_settings('theme_default_twitter') }}"
                   class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="Follow us">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="{{ get_settings('theme_default_facebook') }}"
                   class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="Like us">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a target="_blank" href="{{ get_settings('theme_default_instagram') }}"
                   class="btn btn-neutral btn-icon-only btn-instagram btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="follow us">
                    <i class="fa fa-instagram"></i>
                </a>


            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    {!!  get_settings('footer_text') !!}
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <?php try{
                    $menuList = Menu::getByName('footer')

                    ?>
                    @foreach($menuList as $menu)
                        <li class="nav-item">
                            <a href="{{ $menu['link'] }}" class="nav-link" target="_blank">{{ $menu['label'] }}</a>
                        </li>
                    @endforeach
                    <?php
                    }
                    catch (\Exception $exception) {

                    }

                    ?>

                </ul>
            </div>
        </div>
    </div>
</footer>