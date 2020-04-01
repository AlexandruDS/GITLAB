<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')
</head>
<body data-ng-controller="SessionsController as vm">

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
            <h2>{{$helper::getTextValue($texts, 'MY_SESSIONS_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'MY_SESSIONS_TITLE')}}</li>
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
                            @if(Request()->user->is_coach)
                                <div class="row">
                                    <div class="col-md-9">
                                        <h2>Sesiunile mele - ca profesor</h2>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button class="tnit-btn-style_v2 btn-event"
                                                data-ng-click="vm.openCreateSessionModal()">
                                            Creare sesiune
                                        </button>
                                    </div>
                                </div>

                                @if(count($coachSessions) > 0)
                                    <div class="row" style="margin-top: 20px;">
                                        @foreach($coachSessions as $session)
                                            <div class="col-md-4" style="margin-bottom: 25px;">
                                                <div style="padding: 10px; border:solid 1px lightblue; border-radius:5px;min-height: 400px;">
                                                    <img style="width: 100%" src="data:image/png;base64,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"/>
                                                    <h4 class="text-center"><strong>{{$session->title}}</strong></h4>
                                                    <a href="sesiunile-mele/{{$session->id}}"
                                                       class="btn btn-block">Editare</a>
                                                    @if($session->start_url)
                                                        <button class="btn btn-blue btn-block" style="margin-bottom: 10px;">Opreste</button>
                                                        <a target="_blank" href="{{$session->start_url}}"
                                                           class="btn btn-primary btn-block">Intra</a>
                                                    @else
                                                        <button class="btn btn-success btn-block" style="margin-top: 30px;"
                                                                data-ng-click="vm.startSession({{$session->id}})">
                                                            Pornire sesiune
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-muted text-lg text-center">Nu ai nicio sesiune ca si profesor!
                                    </div>
                                @endif
                                <hr>
                            @endif

                            <div class="row">
                                <div class="col-md-9">
                                    <h2>Sesiunile mele
                                        @if(Request()->user->is_coach)
                                            - ca student
                                        @endif
                                    </h2>
                                </div>
                            </div>
                            @if(count($studentSessions) > 0)
                                <div class="row" style="margin-top: 20px;">
                                    @foreach($studentSessions as $session)
                                        <div class="col-md-4" style="margin-bottom: 25px;">
                                            <div style="padding: 10px; border:solid 1px lightblue; border-radius:5px;min-height: 360px;">
                                                <img style="width: 100%" src="data:image/png;base64,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"/>
                                                <h4 class="text-center"><strong>{{$session->title}}</strong></h4>
                                                <a href="sesiunile-mele/{{$session->id}}"
                                                   class="btn btn-block">Vezi</a>
                                                @if($session->join_url)
                                                    <a target="_blank" href="/{{$session->join_url}}"
                                                       class="btn btn-primary btn-block">Intra</a>
                                                @else
                                                    <div class="text-muted text-center">Nu a inceput</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-muted text-lg text-center">Nu ai nicio sesiune ca si student!
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
    @include('modals.create-session')

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


<script type="text/javascript">
    angular.module('app')
        .controller('SessionsController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;


                vm.openCreateSessionModal = openCreateSessionModal;
                vm.startSession = startSession;
                //  vm.createSession = createSession;

                activate();

                function activate() {
                }

                function startSession(sessionId) {
                    return $http({
                        method: "GET",
                        url: "ajax/sessions/" + sessionId + '/start',
                        params: {}
                    })
                        .then(function (response) {
                            toaster.success('Pornire sesiune', 'Sesiune pornita cu success');
                            var session = response.data;
                            setTimeout(function () {
                                console.log(session);
                                $window.open(session.start_url);
                            }, 1000);

                        }).catch(function (error) {
                            //    toaster.error('Eroare incarcare user!', 'Incarcare user');
                        });
                }

                function openCreateSessionModal() {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'create-session.html',
                        controller: 'CreateSessionController',
                        controllerAs: 'vm',
                        size: 'lg',
                        resolve: {
                            user: function () {
                                return null
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                    }, function () {
                    });

                }


            }
        ])
    ;
</script>
</body>
</html>