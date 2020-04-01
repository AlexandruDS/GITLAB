<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    @include('partials.header')
</head>
<body>
<!--Wrapper Content Start-->
<div class="tnit-wrapper">
@include('partials.menu')


<!--Banner Content Start-->
    <div class="tnit-banner">
        <!--Banner Slider Start-->
        <div id="tnit-banner-slider" class="owl-carousel">
            <!--Banner Slider Item-->
            <div class="slider-item">
                <img src="images/banner-img-01.jpg" alt="">
                <!--Banner Slider Caption Start-->
                <div class="banner-caption">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="top-text">
                                    <h2>{{$helper::getTextValue($texts, 'HOME_BANNER_H1')}}</h2>
                                    <h4>{{$helper::getTextValue($texts, 'HOME_BANNER_H2_1')}}
                                        <span>{{$helper::getTextValue($texts, 'HOME_BANNER_H2_2')}}</span></h4>
                                    <a href="{{($languageCode == 'ro') ? 'contact' : 'contact-us'}}?message=appointment"
                                       class="btn-appiontment">{{$helper::getTextValue($texts, 'HOME_BANNER_BUTTON')}}</a>



                                </div>
                            </div>
                            <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-6 col-sm-offset-5">
                                <div class="banner-man-img">
                                    <img src="images/banner-man-img.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!--  <img src="images/banner-man-img.png" alt=""> -->
                    </div>
                </div><!--Banner Slider Caption End-->
            </div><!--Banner Slider End-->
            <!--Banner Slider Item-->
            <div class="slider-item">
                <img src="images/banner-img-01.jpg" alt="">
                <!--Banner Slider Caption Start-->
                <div class="banner-caption">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="top-text">
                                    <h2>Michle addams</h2>
                                    <h4>Motivational <span>Speaker</span></h4>
                                    <a href="#" class="btn-appiontment">Make An Appointment</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-7 col-xs-6 col-md-offset-6 col-sm-offset-5">
                                <div class="banner-man-img">
                                    <img src="images/banner-man-img.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--Banner Slider Caption End-->
            </div><!--Banner Slider End-->
        </div><!--Banner Slider End-->


        <!--Social Row Start-->
        <div class="tnit-social-row">
            <div class="container">
                <marquee style="position: relative;
    top: -22px;
    border-bottom: solid 1px lightgray;
    padding-bottom: 9px;">

                    @foreach($quotes as $quote)
                        {{$quote['text_' . $languageCode]}}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach</marquee>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <!--Socail Box Start-->
                        <div class="tnit-social-box">
                            <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                            <div class="tnit-text">
                                <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                <strong class="tnit-social-counter" style="display: inline-block;">
                                    {{$helper::getTextValue($texts, 'QUALITITES_NUMBER1')}}
                                </strong>
                                <span style="font-weight: bold;">%</span><br>
                                <span>
                                    {{$helper::getTextValue($texts, 'QUALITITES_TITLE1')}}
                                    {{--{{$helper::getTextValue($texts, 'HOME_SUBSCRIBER_TEXT')}}--}}
                                </span>
                            </div>
                        </div><!--Socail Box End-->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <!--Socail Box Start-->
                        <div class="tnit-social-box">
                            <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i></a>
                            <div class="tnit-text">
                                <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                <strong class="tnit-social-counter"
                                        style="display: inline-block;">{{$helper::getTextValue($texts, 'QUALITITES_NUMBER2')}}</strong>
                                <span style="font-weight: bold;">%</span><br>
                                <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE2')}}</span>
                            </div>
                        </div><!--Socail Box End-->
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <!--Socail Box Start-->
                        <div class="tnit-social-box">
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i></a>
                            <div class="tnit-text">
                                <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                <strong class="tnit-social-counter"
                                        style="display: inline-block;">{{$helper::getTextValue($texts, 'QUALITITES_NUMBER3')}}</strong>
                                <span style="font-weight: bold;">%</span><br>
                                <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE3')}}</span>
                            </div>
                        </div><!--Socail Box End-->
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <!--Socail Box Start-->
                        <div class="tnit-social-box">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                            <div class="tnit-text">
                                <span style="font-weight: bold;">{{$helper::getTextValue($texts, 'QUALITITES_UP_TO')}}</span>
                                <strong class="tnit-social-counter"
                                        style="display: inline-block;">{{$helper::getTextValue($texts, 'QUALITITES_NUMBER4')}}</strong>
                                <span style="font-weight: bold;">%</span><br>
                                <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE4')}}</span>
                            </div>
                        </div><!--Socail Box End-->
                    </div>

                </div>
            </div>
        </div><!--Social Row End-->
    </div><!--Banner Content End-->




    <!--Main Content Start-->
    <div class="tnit-main-content">
    <div class="container" style="border-bottom: solid 1px lightgray;">
    <img src="images/banner-thumb.png" style="cursor: pointer; width:100%; padding-top: 10px;" onclick="$('#tnit-112').modal('show');
"/>
    </div>
        <div class="text-center" style="
    height: 130px;
    padding: 17px;
    position: relative;
    display: none;
    background: lightgray;
">
            
            <img class="logo_fonduri" src="images/logo_fonduri.svg" alt="">
            <div>Pentru informatii detaliate despre celelalte programe cofinantate de Uniunea Europeana, va invitam sa
                vizitati <a href="http://www.fonduri-ue.ro" target="_blank">www.fonduri-ue.ro</a></div>
        </div>

        <!--About Section Start-->
        <section class="tnit-about-section">
            <div class="container tnit-container-after">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <!--About Thumb Start-->
                        <figure class="tnit-about-video">
                            <img src="images/banner-man-img-v2.png" alt="" style="
    border-radius: 6px;
    border: solid 1px lightgray;
">
                            {{--
                            <figcaption class="tnit-caption">
                                <a href="https://www.youtube.com/watch?v=_T_WnP9M1yw" class="btn-play">
                                    <!-- <i class="fa fa-play-circle-o" aria-hidden="true"></i> -->
                                    <span class="icon-play-button icomoon"></span>
                                </a>
                                <div id="tnit-videoPlayer-outer">
                                    <div class="tnit-videoplay-inner"></div>
                                </div>
                            </figcaption>--}}
                        </figure><!--About Thumb End-->


                    </div>
                    <div class="col-md-8 col-sm-7">
                        <!--About Text Start-->
                        <div class="tnit-about-text">
                            <h2>
                                {{$helper::getTextValue($texts, 'HOME_SECTION2_1')}}
                                <br> {{$helper::getTextValue($texts, 'HOME_SECTION2_2')}}</h2>
                            <p><strong>“ {{$helper::getTextValue($texts, 'HOME_SECTION2_SLOGAN')}}
                                    ”</strong>{{$helper::getTextValue($texts, 'ABOUT_SHORT_TEXT')}}</p>
                            <a href="./{{($languageCode == 'ro') ? 'despre-noi' : 'about-us' }}"
                               class="tnit-btn-readmore">{{$helper::getTextValue($texts, 'HOME_SECTION2_MORE')}}</a>
                        </div><!--About Text End-->
                    </div>
                </div>
            </div>
        </section><!--About Section End-->

        <!--Features Section Start-->
        <section class="tnit-features-section pd-tb70">
            <div class="container tnit-container-before">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>{{$helper::getTextValue($texts, 'HOME_SECTION3_1')}}</h2>
                </div><!--Heading Outer End-->
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12" style="min-height: 152px;">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item">
                                    <span class="icon-box">
                                        <i class="icomoon icon-time-management-clock" aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX1_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX1_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 152px;">
                                    <span class="icon-box">
                                        <i class="icomoon icon-businessman" aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX2_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX2_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 152px;">
                                    <span class="icon-box">
                                        <i class="icomoon icon-group" aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX3_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX3_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 152px;">
                                    <span class="icon-box">
                                        <i class="icomoon icon-political-candidate-speech" aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX4_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX4_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 152px;">
                                    <span class="icon-box">
                                        <i class="icomoon icon-people" aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX5_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX5_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 152px;">
                                    <span class="icon-box">
                                        <i class="icomoon icon-man-talking-by-mic-on-a-presentation"
                                           aria-hidden="true"></i>
                                    </span>
                            <h4>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX6_TITLE')}}</h4>
                            <p>{{$helper::getTextValue($texts, 'HOME_SECTION3_BOX6_CONTENT')}}</p>
                        </div><!--Feature Item End-->
                    </div>
                </div>
            </div>
        </section><!--Features Section End-->

        <!--Video Section Start-->
        <section class="tnit-video-section pd-tb70" style="min-height: 350px;
}">
            <div class="container tnit-container-before">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>Video</h2>
                </div><!--Heading Outer End-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <h4 class="text-center" style="font-size: 31px;
    line-height: 44px;
    font-weight: 300;
    color: #353744;
    margin: 0 0 38px; ">
                            {{$helper::getTextValue($texts, 'HOME_SECTION_COURSES_TITLE')}}
                            <br>
                            <br>
                            <div class="row">

                                @foreach($videos as $video)

                                    <div class="col-md-4">
                                        <img style="margin: 10px; margin-bottom: 20px; border: solid 1px lightgrey; border-radius: 3px; padding: 4px; width: 100%"
                                             src="{{$video['snippet']['thumbnails']['high']['url']}}"/>
                                    </div>
                                @endforeach
                            </div>
                            @if(sizeof($videos) == 0)

                                <strong> {{$helper::getTextValue($texts, 'HOME_SECTION_COURSES_SOON')}}</strong>
                            @endif
                        </h4>
                    </div>

                    {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                         <!--Video Item Start-->
                         <div class="tnit-video-item">
                             <figure class="video-thumb">
                                 <img src="images/features-img-01.jpg" alt="">
                                 <figcaption class="tnit-caption">
                                     <div class="bottom-text">
                                         <a class="icon-box" href="video.html">
                                             <i class="fa fa-play-circle" aria-hidden="true"></i>
                                         </a>
                                         <!--Meta Listed Start-->
                                         <ul class="tnit-meta-listed">
                                             <li><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> 12 Jun, 2017
                                             </li>
                                             <li><i class="fa fa-comments-o" aria-hidden="true"></i> 3</li>
                                         </ul><!--Meta Listed End-->
                                     </div>
                                 </figcaption>
                             </figure>
                             <div class="tnit-text-outer">
                                 <h4><a href="video.html">How To Make Better Life</a></h4>
                             </div>
                         </div><!--Video Item End-->
                     </div>--}}
                </div>
            </div>
        </section><!--Video Section End-->


        <!--Video Section Start-->
        <section class="tnit-video-section pd-tb70" style="min-height: 350px;
    background: #f7f7f7;
}">
            <div class="container tnit-container-before">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>{{$helper::getTextValue($texts, 'HOME_SECTION_COURSES_HEAD')}}</h2>
                </div><!--Heading Outer End-->
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12" style="min-height: 152px;">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 210px">
                                    <span class="icon-box">
                                        <i class="fa fa-user"></i>
                                    </span>
                            <h3>{{$helper::getTextValue($texts, 'HOME_COURSES_BOX1_TITLE')}}</h3>
                            <p>{!! $helper::getTextValue($texts, 'HOME_COURSES_BOX1_CONTENT') !!}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 210px;">
                                    <span class="icon-box">
                                        <i class="fa fa-handshake-o"></i>
                                    </span>
                            <h3>{{$helper::getTextValue($texts, 'HOME_COURSES_BOX2_TITLE')}}</h3>
                            <p>{!! $helper::getTextValue($texts, 'HOME_COURSES_BOX2_CONTENT') !!}</p>
                        </div><!--Feature Item End-->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--Feature Item Start-->
                        <div class="tnit-feature-item" style="min-height: 210px;">
                                    <span class="icon-box">
                                        <i class="fa fa-users"></i>
                                    </span>
                            <h3>{{$helper::getTextValue($texts, 'HOME_COURSES_BOX3_TITLE')}}</h3>
                            <p style="">{!! $helper::getTextValue($texts, 'HOME_COURSES_BOX3_CONTENT') !!}</p>
                        </div><!--Feature Item End-->
                    </div>
                </div>
            </div>
        </section><!--Video Section End-->

    {{--
    <!--Facts Section Start-->
    <section class="tnit-facts-section">
        <div class="container">
            <!--Facts Inner Outer Start-->
            <div class="facts-inner-outer">
                <ul class="tnit-facts-listed">
                    <li class="facts-item">
                        <i style="color: gold" class="icomoon icon-trophy-cup-silhouette" aria-hidden="true"></i>
                        <div class="tnit-text">
                            <strong class="tnit-counter">72</strong>
                            <span>Total Awards</span>
                        </div>
                    </li>
                    <li class="facts-item">
                        <i class="icomoon icon-group-1" aria-hidden="true"></i>
                        <div class="tnit-text">
                            <strong class="tnit-counter">1,200</strong>
                            <span>Motivated clients </span>
                        </div>
                    </li>
                    <li class="facts-item">
                        <i class="icomoon icon-microphone-black-shape" aria-hidden="true"></i>
                        <div class="tnit-text">
                            <strong class="tnit-counter">114</strong>
                            <span>attended workshops</span>
                        </div>
                    </li>
                    <li class="facts-item">
                        <i class="icomoon icon-books-stack" aria-hidden="true"></i>
                        <div class="tnit-text">
                            <strong class="tnit-counter">26</strong>
                            <span>written books</span>
                        </div>
                    </li>
                </ul>
            </div><!--Facts Inner Outer End-->
        </div>
    </section><!--Facts Section End-->
    --}}

    @if($helper::getTextValue($texts, 'ENABLE_ONLINE_SESSIONS')== 1)
        <!--Courses Section Start-->
            <section class="tnit-courses-section pd-tb70">
                <div class="container tnit-container-before">
                    <!--Heading Outer start-->
                    <div class="tnit-heading-outer">
                        <h2>{{$helper::getTextValue($texts, 'GENERAL_SESSIONS')}}</h2>
                    </div><!--Heading Outer End-->
                    <div class="row">
                        <div class="col-md-3 co-sm-6 col-xs-12">
                            <!--Courses Item Start-->
                            <div class="tnit-courses-item">
                                <figure class="tnit-thumb">
                                    <img src="images/courses-img-01.jpg" alt="">
                                    <!--Courses Caption Start-->
                                    <figcaption class="tnit-caption">
                                        <a href="courses.html" class="tnit-btn-style1">Join Class</a>
                                    </figcaption><!--Courses Caption End-->
                                </figure>
                                <div class="tnit-text">
                                    <div class="top-holder">
                                        <img src="images/courses-sm-img-01.jpg" alt="">
                                        <h5>Riky Anderson <span class="free">Free</span></h5>
                                    </div>
                                    <strong><a href="courses.html">Fusce aliquam risus</a></strong>
                                    <div class="bottom-holder">
                                            <span class="tnit-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                        <span class="users">
                                                <i class="fa fa-users" aria-hidden="true"></i> 152
                                            </span>
                                    </div>
                                </div>
                            </div><!--Courses Item End-->
                        </div>
                        <div class="col-md-3 co-sm-6 col-xs-12">
                            <!--Courses Item Start-->
                            <div class="tnit-courses-item">
                                <figure class="tnit-thumb">
                                    <img src="images/courses-img-02.jpg" alt="">
                                    <!--Courses Caption Start-->
                                    <figcaption class="tnit-caption">
                                        <a href="courses.html" class="tnit-btn-style1">Join Class</a>
                                    </figcaption><!--Courses Caption End-->
                                </figure>
                                <div class="tnit-text">
                                    <div class="top-holder">
                                        <img src="images/courses-sm-img-02.jpg" alt="">
                                        <h5>Alina Billinson <span>$1400</span></h5>
                                    </div>
                                    <strong><a href="courses.html">Nunc maximus metus</a></strong>
                                    <div class="bottom-holder">
                                            <span class="tnit-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                        <span class="users">
                                                <i class="fa fa-users" aria-hidden="true"></i> 152
                                            </span>
                                    </div>
                                </div>
                            </div><!--Courses Item End-->
                        </div>
                        <div class="col-md-3 co-sm-6 col-xs-12">
                            <!--Courses Item Start-->
                            <div class="tnit-courses-item">
                                <figure class="tnit-thumb">
                                    <img src="images/courses-img-03.jpg" alt="">
                                    <!--Courses Caption Start-->
                                    <figcaption class="tnit-caption">
                                        <a href="courses.html" class="tnit-btn-style1">Join Class</a>
                                    </figcaption><!--Courses Caption End-->
                                </figure>
                                <div class="tnit-text">
                                    <div class="top-holder">
                                        <img src="images/courses-sm-img-03.jpg" alt="">
                                        <h5>Andrew Smith <span class="free">Free</span></h5>
                                    </div>
                                    <strong><a href="courses.html">Sed sed ante sit amet</a></strong>
                                    <div class="bottom-holder">
                                            <span class="tnit-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                        <span class="users">
                                                <i class="fa fa-users" aria-hidden="true"></i> 152
                                            </span>
                                    </div>
                                </div>
                            </div><!--Courses Item End-->
                        </div>
                        <div class="col-md-3 co-sm-6 col-xs-12">
                            <!--Courses Item Start-->
                            <div class="tnit-courses-item">
                                <figure class="tnit-thumb">
                                    <img src="images/courses-img-04.jpg" alt="">
                                    <!--Courses Caption Start-->
                                    <figcaption class="tnit-caption">
                                        <a href="courses.html" class="tnit-btn-style1">Join Class</a>
                                    </figcaption><!--Courses Caption End-->
                                </figure>
                                <div class="tnit-text">
                                    <div class="top-holder">
                                        <img src="images/courses-sm-img-04.jpg" alt="">
                                        <h5>Nathan Rock <span>$179</span></h5>
                                    </div>
                                    <strong><a href="courses.html">Curabitur at metus biben</a></strong>
                                    <div class="bottom-holder">
                                            <span class="tnit-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                        <span class="users">
                                                <i class="fa fa-users" aria-hidden="true"></i> 152
                                            </span>
                                    </div>
                                </div>
                            </div><!--Courses Item End-->
                        </div>
                    </div>
                </div>
            </section><!--Courses Section End-->
    @endif

    <!--Section Start-->
        <section class="tnit-section pd-tb70">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <!--Heading Outer start-->
                        <div class="tnit-heading-outer">
                            <h3>{{$helper::getTextValue($texts, 'HOME_EVENTS_TITLE')}}</h3>
                        </div><!--Heading Outer End-->

                    @foreach($events as $event)
                        <!--Event Listed Start-->
                            <ul class="tnit-even-listed">
                                <!--Even Item Start-->
                                <li class="tnit-event-item">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <div class="date-box">
                                                <span>{{explode(" ",$event->day_and_month)[0]}}</span>
                                                {{explode(" ", $event->day_and_month)[1]}}
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="tnit-text">
                                                <h4>{{$event->title}}</h4>
                                                <span><i class="fa fa-map-signs"
                                                         aria-hidden="true"></i> {{$event->content}}</span>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-3 col-sm-3 col-xs-12">
                                            <a href="event.html" class="tnit-btn-style1">View Event</a>
                                        </div>--}}
                                    </div>
                                </li><!--Even Item End-->

                            </ul><!--Event Listed End-->
                        @endforeach
                        <a href="./{{($languageCode == 'ro') ? 'evenimente' : 'events' }}"
                           class="tnit-btn-style_v2 btn-event">{{$helper::getTextValue($texts, 'HOME_EVENTS_BUTTON')}}</a>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!--Heading Outer start-->
                        <div class="tnit-heading-outer">
                            <h3>{{$helper::getTextValue($texts, 'HOME_TESTIMONIALS_TITLE')}}</h3>
                        </div><!--Heading Outer End-->
                        <!--Tweets Box Start-->
                        <div class="tnit-tweetes-box">
                            <!--Tweets Listed start-->
                            <ul class="tnit-tweets-listed">
                            @foreach($testimonials as $testimonial)
                                <!--Tweet Item Start-->
                                    <li class="tweet-item">
                                        <div class="top">
                                            <i class="fa  fa-file-o" aria-hidden="true"></i>
                                            <h5>{{$testimonial->name}}
                                                <span>{{date("d.m.Y", strtotime($testimonial->created_at))}}</span></h5>
                                            <a href="#" class="user">{{"@" . $testimonial->mentor}}</a>
                                        </div>
                                        <div class="bottom">
                                            <p><strong>{{$testimonial->keyword}}</strong> {{$testimonial->content}} </p>
                                            <a href="#" class="link"> {{$testimonial->tags}}</a>
                                            <ul class="tnit-meta-listed">
                                                <li>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                    {{$testimonial->likes}}
                                                </li>
                                            </ul>
                                        </div>
                                    </li><!--Tweet Item End-->
                                @endforeach
                            </ul><!--Tweets Listed End-->
                        </div><!--Tweets Box End-->
                    </div>
                </div>
            </div>
        </section><!--Section End-->


    @if(count($latestArticles) > 0)
        <!--Blog Section Start-->
            <section class="tnit-blog-section pd-tb70">
                <div class="container tnit-container-before">
                    <!--Heading Outer start-->
                    <div class="tnit-heading-outer">
                        <h2>{{$helper::getTextValue($texts, 'HOME_LATEST_ARTICLES')}}</h2>
                    </div><!--Heading Outer End-->
                    <!--Blog Slider Start-->
                    <div id="tnit-blog-slider" class="owl-carousel">
                    @foreach($latestArticles as $article)
                        <!--Owl Item Start-->
                            <div class="item">
                                <!--Blog Item Start-->
                                <div class="tnit-blog-item">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <!--Blog Thumb Start-->
                                            <figure class="tnit-thumb">
                                                <img src="{{$article->image}}" alt="" style="min-height: 220px">
                                                <figcaption class="tnit-caption">
                                                    <div class="date-box">
                                                        <span>{{date("d", strtotime($article->created_at))}}</span>
                                                        {{ date("M", strtotime($article->created_at))}}
                                                    </div>
                                                </figcaption>
                                            </figure><!--Blog Thumb End-->
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <!--Blog Text Start-->
                                            <div class="tnit-text">
                                                <h4>
                                                    @if(!$article->external_url)
                                                    <a href="./{{($languageCode == 'ro') ? 'noutati' : 'news' }}/{{$article->url}}">{{$article->title}}</a>
                                                    @else
                                                        <a target="_blank" href="{{$article->external_url}}">{{$article->title}}</a>

                                                    @endif
                                                </h4>
                                                <!--Meta Listed Start-->
                                                <ul class="tnit-meta-listed tnit-meta-listed2">
                                                    <li>{{$helper::getTextValue($texts, 'ARTICLES_BY')}}
                                                        <strong>{{$article->user->first_name}} {{$article->user->last_name}}</strong>
                                                    </li>
                                                    <li>{{$helper::getTextValue($texts, 'ARTICLES_IN')}}
                                                        <strong> {{($languageCode == 'ro') ? $article->category->name_ro : $article->category->name_en }}</strong>
                                                    </li>
                                                </ul><!--Meta Listed End-->
                                                <p>{{$article->abstract}}</p>
                                            </div><!--Blog Text End-->
                                        </div>
                                    </div>
                                </div><!--Blog Item End-->
                            </div><!--Owl Item End-->
                        @endforeach
                    </div><!--Blog Slider End-->
                </div>
            </section><!--Blog Section End-->
    @endif


    <!--Partners Section start-->
        <section class="tnit-partners-section pd-tb70">
            <div class="container">
                <!--Heading Outer start-->
                <div class="tnit-heading-outer">
                    <h2>{{$helper::getTextValue($texts, 'HOME_PARTNERS')}}</h2>
                </div><!--Heading Outer End-->
                <!--Partners Slider Start-->
                <div id="tnit-partners-slider" class="owl-carousel">
                @foreach($partners as $partner)
                    <!--Partners Item Start-->
                        <div class="item">
                            <a href="{{$partner->url}}"><img src="{{$partner->image}}" alt=""></a>
                        </div><!--Partners Item End-->
                    @endforeach

                </div><!--Partners Slider end-->
            </div>
        </section><!--Partners Section End-->

    </div><!--Main Content End-->


 <!--Popup Overlay Outer Start-->
    <div class="tnit-popup-outer" id="tnit-112-outer">
        <!-- Modal Box Start-->
        <div class="modal fade tnit-modal-outer" id="tnit-112" tabindex="-1" role="dialog" aria-hidden="true" style>
            <div class="modal-dialog" role="document" style="  width: 1000px;  margin: 0 auto; " >
                <div class="modal-content">
                    <div class="modal-body">
                       <img src="images/banner-1.png" style="width:1000px;" />
                    </div>

                </div>
            </div>
        </div><!-- Modal Box End-->
    </div><!--Popup Overlay Outer End-->



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
<script src="js/jquery.scrollbar.js"></script>
<script src="js/video-player.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>