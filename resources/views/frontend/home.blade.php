@extends('frontend.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- start home banner area -->
    <div id="home" class="home-banner-area banner-type-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="banner-content">
                        <h1>Best Digital Marketing Service For You</h1>
                        <p>
                            No more Search. World's No. 1 IT Solution Center for your better security. Loo car boot
                            bodge smashing I up the duff!
                        </p>
                        <div class="cta-btn">
                            <a href="../../Solit-html/index.html" class="btn btn-solid">Try for free</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="banner-image">
                        <img src="assets/img/banner/banner_2.png" alt="banner" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end sero section-->

    <!-- start top feature section -->
    <section class="top-feature-section ptb-100 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-title">
                        <span class="subtitle">top features</span>
                        <h2>What We Provide For Your Successful Business</h2>
                    </div>
                    <div class="feature-text-blc">
                        <p>
                            If you’re searching for talented tech minds who are dedicated to their work, we are a
                            perfect fit. We are a dynamic software development company based in the USA. Solit workers
                            have been working on various
                            large-scale &amp; complex projects. Solit has over 30 years of experience, always meeting
                            clients.
                        </p>
                    </div>
                    <div class="cta-btn">
                        <a href="about.html" class="btn btn-solid">Read more <i class="envy envy-right-arrow"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-cloud-computing1"></i>
                                    <h3 class="mt-3">market research</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-code2"></i>
                                    <h3 class="mt-3">It <br> computing</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-global"></i>
                                    <h3 class="mt-3">SEO Optimization</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-server"></i>
                                    <h3 class="mt-3">Data <br> Analitics</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img src="assets/img/resource/circle_shape.png" alt="circle" />
            <span class="dot-1"></span>
            <span class="dot-2"></span>
            <span class="dot-3"></span>
            <span class="dot-4"></span>
            <span class="dot-5"></span>
        </div>
    </section>
    <!-- end feature section -->

    <!-- Start Partner Area -->
    <div class="partner-area ptb-50">
        <div class="container">
            <div class="partner-slider owl-carousel">
                <div class="partner-item">
                    <img src="assets/img/partner/partner_1.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="assets/img/partner/partner_2.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_2.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="assets/img/partner/partner_3.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_3.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="assets/img/partner/partner_4.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_4.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="assets/img/partner/partner_5.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_5.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="assets/img/partner/partner_6.png" alt="image" />
                    <img src="assets/img/partner/partner_hover_6.png" alt="partner" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->



    <!-- start newsletter section -->
    <section class="newsletter-section ptb-100">
        <div class="container">
            <div class="section-title title-light">
                <span class="subtitle">get action</span>
                <h2>Get A Quote Right Now</h2>
                <p>Does any industry face a more complex audience journey and marketing sales process than B2B
                    technology. Does any industry face a more complex audience.</p>
            </div>
            <form class="newsletter-form" data-bs-toggle="validator">
                <div class="input-group">
                    <input class="form-control" placeholder="E-mail address" type="text" name="EMAIL" required=""
                        autocomplete="off" />
                    <div class="cta-btn">
                        <button class="btn btn-solid" type="submit">
                            Subscribe
                            <i class="envy envy-right-arrow"></i>
                        </button>
                    </div>
                </div>
                <div id="validator-newsletter" class="form-result"></div>
            </form>
        </div>
    </section>
    <!-- end newsletter section -->
@endsection
