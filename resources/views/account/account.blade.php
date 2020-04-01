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
                            <h5 class="modal-title"><a href="#">New to site?</a> Create an Account</h5>
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
            <h2>{{$helper::getTextValue($texts, 'MY_ACCOUNT_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'MY_ACCOUNT_TITLE')}}</li>
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
                                <h2>{{$helper::getTextValue($texts, 'MY_ACCOUNT_TITLE')}}</h2>
                            </div><!--Heading Outer End-->
                            @if(Request()->user->is_coach)
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 account-home-icon">
                                    <a href="./{{($languageCode == 'ro') ? 'setari-cont' : 'setari-cont' }}">
                                        <i class="fa fa-user fa-3x"></i><br> Setari cont</a>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 account-home-icon">
                                        <a href="./{{($languageCode == 'ro') ? 'sesiunile-mele' : 'my-sessions' }}"><i
                                                    class="fa fa-list fa-3x"></i><br> Sesiunile mele</a>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 account-home-icon">
                                        <a href="./{{($languageCode == 'ro') ? 'documentele-mele' : 'my-documentes' }}">
                                            <i class="fa fa-files-o fa-3x"></i><br> Documentele mele</a>
                                    </div>

                                    @if(Request()->user->is_admin)
                                        <div class="col-md-7 col-sm-12 col-xs-12 account-home-icon"
                                             style="width: 521px;">
                                            <a href="./{{($languageCode == 'ro') ? 'admin' : 'admin' }}">
                                                <i class="fa fa-gears fa-3x"></i><br> Administrare platforma</a>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 account-home-icon"
                                             data-ng-click="app.logout()"
                                             style="background: darkred !important; margin-left: none; cursor:pointer ">
                                            <i class="fa fa-exclamation fa-3x"></i><br> Logout
                                        </div>
                                    @else
                                        <div class="col-md-12 col-sm-12 col-xs-12 account-home-icon"
                                             data-ng-click="app.logout()"
                                             style="background: darkred !important; margin-left: none; cursor:pointer ">
                                            <i class="fa fa-exclamation fa-3x"></i><br> Logout
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 account-home-icon">
                                        <i class="fa fa-user fa-3x"></i><br> Setari cont
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 account-home-icon">
                                        <a href="./{{($languageCode == 'ro') ? 'sesiunile-mele' : 'my-sessions' }}"><i
                                                    class="fa fa-list fa-3x"></i><br> Sesiunile mele</a>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 account-home-icon"
                                         data-ng-click="app.logout()"
                                         style="background: darkred !important; margin-left: none; cursor:pointer ">
                                        <i class="fa fa-exclamation fa-3x"></i><br> Logout
                                    </div>
                                </div>
                            @endif


                        </div><!--Inner Video Outer End-->

                    </div>
                    @include('partials.right-pane-account')
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