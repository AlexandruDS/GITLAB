<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')
</head>
<body data-ng-controller="AdminController as vm">

<!--Wrapper Content Start-->
<div class="tnit-wrapper">

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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!--Inner Video Outer Start-->
                        <div class="tnit-video-inner-outer tnit-blog-inner-outer">
                            @include('admin.partials.menu')

                            @if(Request()->user->is_coach)


                                <div style="padding: 30px; min-height: 300px;" class="text-center">
                                    <h1><i class="fa fa-gears"></i> Administrare plaforma</h1>
                                    <p>Foloseste meniul de sus pentru administrare.</p>
                                </div>

                                <hr>
                            @endif
                        </div><!--Inner Video Outer End-->

                    </div>
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
        .controller('AdminController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
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