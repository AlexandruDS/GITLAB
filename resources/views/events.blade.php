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
                        <h3>Login</h3>
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
            <h2>{{$helper::getTextValue($texts, 'EVENTS_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a></li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'BREADCRUMB_EVENTS')}}</li>
            </ul><!--BreadCrumb Listed End-->
        </div>
    </div><!--Inner Banner Content End-->

    <!--Main Content Start-->
    <div class="tnit-main-content">
        <!--Event Section Start-->
        <section class="tnit-event-section pd-tb70">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <!--Heading Outer start-->
                        <div class="tnit-heading-outer">
                            <h2>{{$helper::getTextValue($texts, 'EVENTS_TITLE')}}</h2>
                        </div><!--Heading Outer End-->

                        <!--Event Listed Start-->
                        <ul class="tnit-even-listed">
                        @foreach($events as $event)
                            <!--Event Listed Start-->
                                <ul class="tnit-even-listed">
                                    <!--Even Item Start-->
                                    <li class="tnit-event-item" style="position: relative">
                                        <img class="hidden-xs hidden-sm" src="{{$event->image_small}}" style="max-width: 220px; border-radius: 0px; position: absolute; right: 0px; top:0px; height: 99.9%; padding: 10px;"/>
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
                                                    <span><i class="fa fa-map-signs" aria-hidden="true"></i> {{$event->content}}</span>
                                                </div>
                                            </div>
                                            {{--<div class="col-md-3 col-sm-3 col-xs-12">
                                                <a href="event.html" class="tnit-btn-style1">View Event</a>
                                            </div>--}}
                                        </div>
                                    </li><!--Even Item End-->

                                </ul><!--Event Listed End-->
                            @endforeach
                        </ul><!--Event Listed End-->
{{--

                        <!--Pagination Row Start-->
                        <div class="tnit-pagination-row pd-t70">
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    <li class="page-item active"><a class="page-link" href="#">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!--Pagination Row End-->
--}}

                    </div>
                    @include('partials.right-pane')
                </div>
            </div>
        </section><!--Event Section End-->

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