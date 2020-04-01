<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <div class="tnit-inner-banner tnit-banner-image_v2">
        <div class="container">
            <h2>{{$helper::getTextValue($texts, 'SERVICES_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'SERVICES_TITLE')}}</li>
            </ul><!--BreadCrumb Listed End-->
        </div>
    </div><!--Inner Banner Content End-->

    <!--Main Content Start-->
    <div class="tnit-main-content">
        <!--Video Section Start-->
        <section class="tnit-blog-section tnit-blog-section_v2 pd-tb70">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <!--Inner Video Outer Start-->
                        <div class="tnit-video-inner-outer tnit-blog-inner-outer">
                            <!--Heading Outer start-->
                            <div class="tnit-heading-outer">
                                <h2>{{$helper::getTextValue($texts, 'SERVICES_TITLE2')}}</h2>
                            </div><!--Heading Outer End-->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                @foreach($services as $service)
                                    <!--Blog Item Start-->
                                        <div class="tnit-blog-item tnit-blog-item_v2">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-5 col-xs-12">
                                                    <!--Blog Thumb Start-->
                                                    <figure class="tnit-thumb">
                                                        <img src="{{ route('image.displayImage', $service->image ) }}" alt="">
                                                        
                                                        @if($service->created_at)
                                                            <figcaption class="tnit-caption">
                                                                <div class="date-box">
                                                                    <span>{{date("d", strtotime($service->created_at))}}</span>
                                                                    {{ date("M", strtotime($service->created_at))}}
                                                                </div>
                                                            </figcaption>
                                                        @endif
                                                    </figure><!--Blog Thumb End-->
                                                </div>

                                                <div class="col-md-8 col-sm-7 col-xs-12"
                                                     style="margin-bottom: 20px;">
                                                    <!--Blog Text Start-->
                                                    <div class="tnit-text">
                                                        <h4>
                                                            <a href="./{{($languageCode == 'ro') ? 'servicii' : 'services' }}/{{$service->url}}">{{$service->title}}</a>
                                                        </h4>
                                                        <p>{!! $service->content_short !!} </p>
                                                        @if($service->more)
                                                            <p>
                                                                <a href="./{{($languageCode == 'ro') ? 'servicii' : 'services' }}/{{$service->url}}">
                                                                    {{($languageCode == 'ro') ? 'Vezi mai mult' : 'View more'}}
                                                                </a></p>
                                                        @endif
                                                        @if(($service->buy_one_link || $service->buy_five_link))
                                                            <div class="row"
                                                                 style=" margin-right: 0px;">
                                                                @if($service->buy_one_link)
                                                                    <div class="col-md-<?= ($service->buy_one_link && $service->buy_five_link) ? 6 : 12  ?>">
                                                                        <a target="_blank"
                                                                           style="width:100%;  padding-left: 20px; padding-right: 20px;"
                                                                           href="{{$service->buy_one_link}}"
                                                                           class="tnit-btn-style1">{{$service->buy_one_text}}</a>
                                                                    </div>
                                                                @endif
                                                                @if($service->buy_five_link)
                                                                    <div class="col-md-<?= ($service->buy_one_link && $service->buy_five_link) ? 6 : 12  ?>">
                                                                        <a target="_blank"
                                                                           style="width:100%; padding-left: 20px; padding-right: 20px;"
                                                                           href="{{$service->buy_five_link}}"
                                                                           class="tnit-btn-style1">{{$service->buy_five_text}}</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div><!--Blog Text End-->
                                                </div>

                                            </div>
                                        </div><!--Blog Item End-->
                                    @endforeach
                                </div>
                            </div>
                            {{--
                                <!--Pagination Row Start-->
                                <div class="tnit-pagination-row">
                                    <nav aria-label="navigation">
                                        <ul class="pagination">
                                            <li class="page-item active"><a class="page-link" href="#">
                                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                </a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div><!--Pagination Row End-->
                                --}}
                        </div><!--Inner Video Outer End-->

                    </div>
                    @include('partials.right-pane')
                </div>
            </div>
        </section><!--Video Section End-->

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
<script src="js/jquery.scrollbar.js"></script>
<script src="js/video-player.js"></script>
<script src="js/jquery.circliful.js"></script>
<script src="js/script.js"></script>

</body>
</html>