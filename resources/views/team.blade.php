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
                            </form>
                            <!--Modal Form End-->
                        </div>

                    </div>
                </div>
            </div><!-- Modal Box End-->
        </div>
        <!--Popup Overlay Outer End-->

        @include('partials.menu')

        <!--Inner Banner Content Start-->
        <div class="tnit-inner-banner">
            <div class="container">
                <h2>{{($languageCode == 'ro') ? 'ECHIPA NOASTRA' : 'OUR TEAM' }}</h2>
                <!--BreadCrumb Listed Start-->
                <ul class="breadcrumb tnit-breadcrumb-holder">
                    <li class="breadcrumb-item"><a href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{($languageCode == 'ro') ? 'ECHIPA NOASTRA' : 'OUR TEAM' }}</li>
                </ul>
                <!--BreadCrumb Listed End-->
            </div>
        </div>
        <!--Inner Banner Content End-->




        <!--Main Content Start-->

        <div class="tnit-main-content">
            <section class="tnit-about-section_v2">
                <div class="container" style="padding: 10px">
                    <div class="panel-group" id="accordion">

                        @foreach($users as $user)
                        @if($user->is_coach == 1)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$user->id}}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <figure class="tnit-about-thumb">
                                                    <img style="width: 100%; border-top-right-radius: 20px; border-bottom-right-radius: 20px;border: solid 1px aliceblue;     border: solid 1px darkgrey; max-width: 128px; border-radius: 50%;
    padding: 4px; background: white; " src="{{ route('image.displayImage', $user->image ) }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-10">
                                                <h3>{!! $user->first_name!!} {!! $user->last_name!!}</h3>
                                                <small>{!!($languageCode == 'ro') ? $user->abstract_ro : $user->abstract_en !!}</small>
                                            </div>
                                    </a><br>
                                    
                                </h4>
                            </div>
                        </div>
                        <div id="collapse{{$user->id}}" class="panel-body panel-collapse collapse in" style="border: solid 1px lightgray;     border: solid 1px lightgray;
    margin-bottom: 36px !important;
    border-top: 0px;
    border-radius: 0px;">
                            {!!($languageCode == 'ro') ? $user->description_ro : $user->description_en !!}
                        </div>
                        @endif
                        @endforeach
                    </div>
            </section>
        </div>
    </div>


    </div>
    <!--Main Content End-->

    @include('partials.footer')

    </div>
    <!--Wrapper Content End-->

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