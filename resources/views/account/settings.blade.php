<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')
</head>
<body data-ng-controller="SettingsController as vm">

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
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'MY_ACCOUNT_SETTINGS')}}</li>
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
                                <h2>{{$helper::getTextValue($texts, 'MY_ACCOUNT_SETTINGS')}}</h2>
                            </div><!--Heading Outer End-->
                            <!--Modal Form Start-->
                            <form method="get" class="tnit-modal-form">
                                <div class="inner-holder">
                                    <label>Nume</label>
                                    <input data-ng-model="vm.user.last_name" type="text">
                                </div>
                                <div class="inner-holder">
                                    <label>Prenume</label>
                                    <input data-ng-model="vm.user.first_name" type="text">
                                </div>     <div class="inner-holder">
                                    <label>Prenume</label>
                                    <input data-ng-model="vm.user.first_name" type="text">
                                </div>
                                <div class="inner-holder">
                                    <label>Email</label>
                                    <input type="email" data-ng-model="vm.user.email" disabled="disabled">
                                </div>
                                <hr>
                                <div class="inner-holder">
                                    <label>Parola noua</label>
                                    <input data-ng-model="vm.user.newPassword" type="password">
                                </div>
                                <div class="inner-holder">
                                    <label>Repeta parola noua</label>
                                    <input data-ng-model="vm.user.repeatNewPassword" type="password">
                                </div>

                                <div class="inner-holder">
                                    <button class="btn-register" data-ng-disabled="!vm.isValid(vm.user)"
                                            data-ng-click="vm.updateAccount()" type="submit">Actualizeaza datele
                                    </button>
                                </div>

                            </form><!--Modal Form End-->

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

<script type="text/javascript">
    angular.module('app')
        .controller('SettingsController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;
                vm.user = {};


                vm.updateAccount = updateAccount;
                vm.isValid = isValid;

                activate();

                function activate() {
                    getMe();
                }


                function getMe() {
                    return $http({
                        method: "GET",
                        url: "ajax/me",
                        params: {}
                    })
                        .then(function (response) {
                            vm.user = response.data;
                        }).catch(function (error) {
                            toaster.error('Eroare incarcare texte!', 'Incarcare texte');
                        });
                }

                function isValid(user) {
                    if (vm.user.newPassword != '' || vm.user.repeatNewPassword != '') {
                        if (vm.user.newPassword != vm.user.repeatNewPassword) {
                            return false;
                        }
                    }

                    return true;
                }


                function updateAccount(item) {
                    return $http({
                        method: "POST",
                        url: "ajax/me",
                        data: vm.user
                    })
                        .then(function (response) {
                            vm.user = response.data;
                        }).catch(function (error) {
                            toaster.error('Eroare actualizare cont!', 'Actualizare cont');
                        });
                }

            }
        ])
    ;
</script>
</body>
</html>