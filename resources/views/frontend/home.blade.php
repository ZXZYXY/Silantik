@extends('frontend.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- slider -->
    <div class="fullwidthbanner-container">
        <div id="revolution-slider">
            <ul>
                <li data-transition="fade" data-slotamount="10" data-masterspeed="300"
                    data-thumb="images-slider/thumbs/thumb1.jpg">
                    <!--  BACKGROUND IMAGE -->
                    <img src="images-slider/wide1.jpg" alt="" />
                    <div class="tp-caption big-white sfb" data-x="0" data-y="100" data-speed="300" data-start="800"
                        data-easing="easeOutExpo">
                        <strong>Shared</strong> Hosting
                    </div>

                    <div class="tp-caption med-white sfb" data-x="0" data-y="150" data-speed="300" data-start="1000"
                        data-easing="easeOutExpo">
                        Our Most Powerfull Hosting Package Ever
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="200" data-speed="300" data-start="1200"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>Multi Core Processor Intel Xeon
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="230" data-speed="300" data-start="1400"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>10TB Hardisk Space & Unlimited Domain
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="260" data-speed="300" data-start="1600"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>24/7 Support Staff Available
                    </div>

                    <div class="tp-caption small-white sfr" data-x="0" data-y="300" data-speed="300" data-start="1800"
                        data-easing="easeOutExpo">
                        <a href="#" class="btn btn-large btn-primary">Purchase Now</a>
                    </div>

                    <div class="tp-caption small-white lfb" data-x="480" data-y="center" data-speed="1000"
                        data-start="2000" data-easing="easeOutExpo">
                        <img src="images-slider/server.png" alt="" />
                    </div>
                </li>

                <li data-transition="fade" data-slotamount="10" data-masterspeed="300"
                    data-thumb="images-slider/thumbs/thumb1.jpg">
                    <!--  BACKGROUND IMAGE -->
                    <img src="images-slider/wide3.jpg" alt="" />
                    <div class="tp-caption big-white sfb" data-x="0" data-y="100" data-speed="300" data-start="800"
                        data-easing="easeOutExpo">
                        <strong>Dedicated</strong> Support
                    </div>

                    <div class="tp-caption med-white sfb" data-x="0" data-y="150" data-speed="300" data-start="1000"
                        data-easing="easeOutExpo">
                        Our Most Helpfull Support Staff Ever
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="200" data-speed="300" data-start="1200"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>Professional and Dedicated Support
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="230" data-speed="300" data-start="1400"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>You Can Contact Us by Phone or Email
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="260" data-speed="300" data-start="1600"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>24/7 Support Staff Available
                    </div>

                    <div class="tp-caption small-white sfr" data-x="0" data-y="300" data-speed="300"
                        data-start="1800" data-easing="easeOutExpo">
                        <a href="#" class="btn btn-large btn-primary">Contact Us Now</a>
                    </div>

                    <div class="tp-caption small-white lfb" data-x="480" data-y="center" data-speed="1000"
                        data-start="2000" data-easing="easeOutExpo">
                        <img src="images-slider/women.png" alt="" />
                    </div>
                </li>

                <li data-transition="fade" data-slotamount="10" data-masterspeed="300"
                    data-thumb="images-slider/thumbs/thumb1.jpg">
                    <!--  BACKGROUND IMAGE -->
                    <img src="images-slider/wide2.jpg" alt="" />
                    <div class="tp-caption big-white sfb" data-x="0" data-y="100" data-speed="300"
                        data-start="800" data-easing="easeOutExpo">
                        <strong>Virtual</strong> Servers
                    </div>

                    <div class="tp-caption med-white sfb" data-x="0" data-y="150" data-speed="300"
                        data-start="1000" data-easing="easeOutExpo">
                        Our Most Powerfull Hosting Package Ever
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="200" data-speed="300" data-start="1200"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>Multi Core Processor Intel Xeon
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="230" data-speed="300" data-start="1400"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>10TB Hardisk Space & Unlimited Domain
                    </div>

                    <div class="tp-caption sfl" data-x="0" data-y="260" data-speed="300" data-start="1600"
                        data-easing="easeOutExpo">
                        <i class="fa fa-check"></i>24/7 Support Staff Available
                    </div>

                    <div class="tp-caption small-white sfr" data-x="0" data-y="300" data-speed="300"
                        data-start="1800" data-easing="easeOutExpo">
                        <a href="#" class="btn btn-large btn-primary">Purchase Now</a>
                    </div>

                    <div class="tp-caption small-white lfb" data-x="480" data-y="center" data-speed="1000"
                        data-start="2000" data-easing="easeOutExpo">
                        <img src="images-slider/server.png" alt="" />
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!-- slider close -->


    <!-- call to action -->
    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3>We are Truehost. The most trusted and dedicated <span class="id-color">hosting</span>
                        provider.</h3>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-extra-large btn-primary">Purchase Now!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- call to action close -->


    <!-- content begin -->
    <div id="content" class="no-bottom">
        <div class="container">
            <div class="row">
                <!-- feature box begin -->
                <div class="feature-box-small-icon col-md-4">
                    <div class="inner">
                        <i class="fa fa-rocket circle"></i>
                        <div class="text">
                            <h3>High Performance</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon col-md-4">
                    <div class="inner">
                        <i class="fa fa-bars circle"></i>
                        <div class="text">
                            <h3>Reliable Hardware</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

                <!-- feature box begin -->
                <div class="feature-box-small-icon col-md-4">
                    <div class="inner">
                        <i class="fa fa-thumbs-up circle"></i>
                        <div class="text">
                            <h3>Dedicated Support</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo.
                        </div>
                    </div>
                </div>
                <!-- feature box close -->

            </div>

            <hr>



            <!-- logo carousel -->
            <div class="flexslider logo-carousel no-control">
                <ul class="slides">
                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/1.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/2.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/3.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/4.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/5.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/6.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/7.png" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="col-md-2">
                            <img src="images/logo/8.png" alt="">
                        </div>
                    </li>


                </ul>
            </div>
        </div>
        <!-- logo carousel close -->

        <section id="testimonial-full" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="flexslider testi-slider">
                        <ul class="slides">
                            <li>
                                <blockquote>"I had been using themeforest for many years and I can say that your
                                    level of support is the best so far."<span>Propelfolio</span></blockquote>
                            </li>
                            <li>
                                <blockquote>"Fantastic... and thanks for the help, really, I really appreciate the
                                    service and concern."<span>Enigma</span></blockquote>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- content close -->
@endsection
