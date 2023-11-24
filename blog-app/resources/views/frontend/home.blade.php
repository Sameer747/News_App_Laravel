    @extends('frontend.layouts.master')
    @section('content')
        <!-- Tranding news  carousel-->
        @include('frontend.home-page-components.trending-news')
        <!-- End Tranding news carousel -->

        <!-- Hero Slider News -->
        @include('frontend.home-page-components.hero-slider')
        <!-- End Hero Slider News -->

        {{-- Ad Banner Start --}}
        <div class="large_add_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="large_add_banner_img">
                            <img src="images/placeholder_large.jpg" alt="adds">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ad Banner End --}}

        <!-- Popular news category -->
        @include('frontend.home-page-components.main-news')
        <!-- End Popular news category -->
    @endsection
