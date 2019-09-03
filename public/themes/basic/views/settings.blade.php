<main>
    <section class="section section-shaped section-lg">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container pt-lg-md">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card bg-secondary shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Theme Settings</small>
                            </div>
                            <div class="row">

                                @if(session('success'))
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                            <span class="alert-inner--text"><strong>{{ session('success') }}</strong></span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <form action="{{ route('updateThemeSettings') }}" method="post" role="form">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_title"
                                               placeholder="Title" type="text"
                                               value="{{ get_settings('theme_title') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_default_facebook"
                                               placeholder="Facebook Link" type="text"
                                               value="{{ get_settings('theme_default_facebook') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_default_twitter"
                                               placeholder="Twitter Link" type="text"
                                               value="{{ get_settings('theme_default_twitter') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_default_instagram"
                                               placeholder="Instagram Link" type="text"
                                               value="{{ get_settings('theme_default_instagram') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_basic_header_title"
                                               placeholder="Footer Title" type="text"
                                               value="{{ get_settings('theme_basic_header_title') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" name="theme_basic_header_description"
                                               placeholder="Footer Description" type="text"
                                               value="{{ get_settings('theme_basic_header_description') }}">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>