<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')

</head>
<body>

<!--Wrapper Content Start-->
<div class="tnit-wrapper">

    <!--Popup Overlay Outer Start-->
    <div class="tnit-popup-outer">
        <!-- Modal Box Start-->
        <div class="modal fade tnit-modal-outer" id="tnit-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="top">
                            <h5 class="modal-title"><a href="#">New to site?</a> Creat an Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h3>Register</h3>
                    </div>
                    <div class="modal-body">
                        <!--Modal Form Start-->
                        <form method="get" class="tnit-modal-form">
                            <div class="inner-holder">
                                <label>Username</label>
                                <input type="text">
                            </div>
                            <div class="inner-holder">
                                <label>Email</label>
                                <input type="email">
                            </div>
                            <div class="inner-holder">
                                <label>Password</label>
                                <input type="password">
                            </div>
                            <div class="inner-holder">
                                <button class="btn-register" type="submit">Register</button>
                            </div>
                        </form><!--Modal Form End-->
                    </div>

                </div>
            </div>
        </div><!-- Modal Box End-->
    </div><!--Popup Overlay Outer End-->

    @include('partials.menu')

    <!--Inner Banner Content Start-->
    <div class="tnit-inner-banner">
        <div class="container">
            <h2>{{$helper::getTextValue($texts, 'ABOUT_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a></li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'ABOUT_TITLE')}}</li>
            </ul><!--BreadCrumb Listed End-->
        </div>
    </div><!--Inner Banner Content End-->

    <!--Main Content Start-->
    <div class="tnit-main-content">
        <!--About Section Start-->
        <section class="tnit-about-section_v2">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <!--About Thumb Start-->
                        <figure class="tnit-about-thumb">
                            <img style="width: 100%; -webkit-transform: scaleX(-1); transform: scaleX(-1); margin-left: 26px;
    margin-left: 26px;
    margin-top: 128px;
    border-radius: 20px;
    border: solid 1px aliceblue;

" src="images/banner-man-img-v2.png" alt="">
                        </figure><!--About Thumb End-->
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!--About Text Start-->
                        <div class="tnit-about-text" style="padding-top: 50px;">
                            <h2>{{$helper::getTextValue($texts, 'ABOUT_TITLE2')}}</h2>
                            <p><strong>“ {{$helper::getTextValue($texts, 'HOME_SECTION2_SLOGAN')}}
                                    ”</strong>
                                {{$helper::getTextValue($texts, 'ABOUT_SECTION1_TEXT1')}}

                            </p>
                            <p><strong>{{$helper::getTextValue($texts, 'ABOUT_SECTION1_TITLE2')}}

                                </strong>
                                {{$helper::getTextValue($texts, 'ABOUT_SECTION1_TEXT2')}}


                            </p>

                        </div><!--About Text End-->
                        <div class="row tnit-social-row_v2" style="padding-bottom: 20px;">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <!--Socail Box Start-->
                                <div class="tnit-social-box">
                                    <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                                    <div class="tnit-text">
                                        <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                        <strong class="tnit-social-counter" style="display: inline-block;">100</strong>
                                        <span style="font-weight: bold;">%</span><br>
                                        {{--                                    {{$helper::getTextValue($texts, 'HOME_SUBSCRIBER_NUMBER')}}--}}
                                        <span>
                                    <strong>{{$helper::getTextValue($texts, 'QUALITITES_FIRST_WORD1')}}</strong> {{$helper::getTextValue($texts, 'QUALITITES_SECOND_WORD1')}}
                                            {{--{{$helper::getTextValue($texts, 'HOME_SUBSCRIBER_TEXT')}}--}}
                                </span>
                                    </div>
                                </div><!--Socail Box End-->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <!--Socail Box Start-->
                                <div class="tnit-social-box">
                                    <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i></a>
                                    <div class="tnit-text">
                                        <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                        <strong class="tnit-social-counter" style="display: inline-block;">50</strong>
                                        <span style="font-weight: bold;">%</span><br>
                                        <span><strong>{{$helper::getTextValue($texts, 'QUALITITES_FIRST_WORD2')}}</strong> {{$helper::getTextValue($texts, 'QUALITITES_SECOND_WORD2')}}</span>
                                    </div>
                                </div><!--Socail Box End-->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <!--Socail Box Start-->
                                <div class="tnit-social-box">
                                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i></a>
                                    <div class="tnit-text">
                                        <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                        <strong class="tnit-social-counter" style="display: inline-block;">70</strong>
                                        <span style="font-weight: bold;">%</span><br>
                                        <span><strong>{{$helper::getTextValue($texts, 'QUALITITES_FIRST_WORD3')}}</strong> {{$helper::getTextValue($texts, 'QUALITITES_SECOND_WORD3')}}</span>
                                    </div>
                                </div><!--Socail Box End-->
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <!--Socail Box Start-->
                                <div class="tnit-social-box">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                    <div class="tnit-text">
                                        <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                        <strong class="tnit-social-counter" style="display: inline-block;">70</strong>
                                        <span style="font-weight: bold;">%</span><br>
                                        <span><strong>{{$helper::getTextValue($texts, 'QUALITITES_FIRST_WORD4')}}</strong> {{$helper::getTextValue($texts, 'QUALITITES_SECOND_WORD4')}}</span>
                                    </div>
                                </div><!--Socail Box End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--About Section End-->

        <!--Qualities Section Start-->
        <section class="tnit-qualities-section pd-tb70">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <!--Qualities Text Start-->
                        <div class="tnit-qualities-text">
                            <h2>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_TITLE')}}</h2>
                            <p>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CONTENT')}}</p>
                            <ul class="tnit-qualities-listed">
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD1')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT1')}}
                                </li>
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD2')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT2')}}
                                </li>
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD3')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT3')}}
                                </li>
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD4')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT4')}}
                                </li>
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD5')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT5')}}
                                </li>
                                <li>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_WORD6')}}<br>
                                    {{$helper::getTextValue($texts, 'ABOUT_SECTION2_TEXT6')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!--Skill Outer Start-->
                        <div class="tnit-skill-outer">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--Skill Item Start-->
                                    <div class="tnit-skill-item">
                                        <div class="tnit-progress-bar position" data-percent="{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE1_NUMBER')}}" data-duration="2000"
                                             data-color="#ccc,#22527a"></div>
                                        <div class="tnit-text">
                                            <h4>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE1_TEXT')}}</h4>
                                        </div>
                                    </div><!--Skill Item End-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--Skill Item Start-->
                                    <div class="tnit-skill-item">
                                        <div class="tnit-progress-bar position" data-percent="{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE2_NUMBER')}}" data-duration="1000"
                                             data-color="#ccc,#22527a"></div>
                                        <div class="tnit-text">
                                            <h4>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE2_TEXT')}}</h4>
                                        </div>
                                    </div><!--Skill Item End-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--Skill Item Start-->
                                    <div class="tnit-skill-item">
                                        <div class="tnit-progress-bar position" data-percent="{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE3_NUMBER')}}" data-duration="2000"
                                             data-color="#ccc,#22527a"></div>
                                        <div class="tnit-text">
                                            <h4>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE3_TEXT')}}</h4>
                                        </div>
                                    </div><!--Skill Item End-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--Skill Item Start-->
                                    <div class="tnit-skill-item">
                                        <div class="tnit-progress-bar position" data-percent="{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE4_NUMBER')}}" data-duration="2000"
                                             data-color="#ccc,#22527a"></div>
                                        <div class="tnit-text">
                                            <h4>{{$helper::getTextValue($texts, 'ABOUT_SECTION2_CIRCLE4_TEXT')}}</h4>
                                        </div>
                                    </div><!--Skill Item End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--Qualities Section End-->

        <!--Testimonial Section Start-->
        <section class="tnit-testimonial-section tnit-scaletop pd-tb70">
            <div class="container">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>{{$helper::getTextValue($texts, 'ABOUT_SECTION3_TITLE')}}</h2>
                </div><!--Heading Outer End-->
                <!--Testimonial Slider Start-->
                <div id="tnit-testimonial-slider" class="owl-carousel">
                @foreach($testimonials as $testimonial)
                    <!--Testimonial Item Start-->
                        <figure class="tnit-testimonial-item">
                            <img src="{{$testimonial->image}}" alt="" style="min-height: 275px; border-radius: 15px;">
                            <figcaption class="tnit-caption">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                <p>{{$testimonial->content}}</p>
                                <h4>{{$testimonial->name}}</h4>
                                <span class="name">{{$testimonial->role}}</span>
                            </figcaption>
                        </figure><!--Testimonial Item End-->
                        <!--Testimonial Item Start-->
                    @endforeach


                </div><!--Testimonial Slider End-->
            </div>
        </section><!--Testimonial Section End-->

        <!--Certification Section Start-->
        <section class="tnit-certificate-section pd-t70">
            <div class="container">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>{{$helper::getTextValue($texts, 'ABOUT_MY_CERTIFICATIONS')}}</h2>
                </div><!--Heading Outer End-->
                <div class="row">
                    @foreach($certifications as $certification)
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <!--Certificate Item Start-->
                            <div class="certificate-item">
                                <a href="images/{{$certification->image}}" data-lightbox="certifications" data-title="{{$certification->title}}">
                                    <img style="height: 180px; padding: 5px; border: solid 1px lightgray; border-radius: 5px;"
                                         src="images/{{$certification->image}}" alt="">
                                </a>



                            </div><!--Certificate Item End-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!--Certification Section End-->

    </div><!--Main Content End-->

    @include('partials.footer')

</div><!--Wrapper Content End-->

<!--JQuery Files Start-->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/video-player.js"></script>
<script src="js/jQuery-plugin-progressbar.js"></script>
<script src="js/script.js"></script>

</body>
</html>