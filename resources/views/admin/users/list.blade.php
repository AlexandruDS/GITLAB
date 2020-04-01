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
            <h2>{{$helper::getTextValue($texts, 'ACCOUNT_ADMIN_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">Lista useri</li>
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
                            @if(Request()->user->is_coach)
                                @include('admin.partials.menu')

                                <div class="row">
                                    <div class="col-md-10 text-lg" style="font-size: 20px;">
                                        <strong>Lista useri</strong>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button class="btn btn-block btn-default"
                                                data-ng-click="vm.openManageUser()">
                                            <i class="fa fa-plus"></i> &nbsp;
                                            Creare user
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-striped" style="margin-top: 20px;">
                                    <tr>
                                        <th>#</th>
                                        <th>Nume</th>
                                        <th>Prenume</th>
                                        <th>Email</th>
                                        <th>Telefon</th>
                                        <th>Coach</th>
                                        <th>Data</th>
                                        <th></th>
                                    </tr>
                                    <tr data-ng-repeat="user in vm.users">
                                        <td><% user.id %></td>
                                        <td><% user.first_name %></td>
                                        <td><% user.last_name %></td>
                                        <td><% user.email %></td>
                                        <td><% user.phone %></td>
                                        <td>
                                            <label data-ng-if="user.is_coach == true" class="label label-primary"
                                                   style="padding: 5px; width: 100%; display: block">DA</label>
                                            <label data-ng-if="user.is_coach == false" class="label label-default"
                                                   style="padding: 5px; width: 100%; display: block">NU</label>
                                        </td>
                                        <td><% user.created_at %></td>
                                        <td class="text-right">
                                            <button class="btn btn-default" data-ng-click="vm.openManageUser(user)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-default" data-ng-click="vm.openDeleteUser(user)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                            @endif
                        </div><!--Inner Video Outer End-->

                    </div>
                </div>
            </div>
        </section><!--Video Section End-->

    </div><!--Main Content End-->

    @include('partials.footer')
    @include('admin.users.manage')
    @include('admin.users.delete')

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


                vm.openManageUser = openManageUser;
                vm.openDeleteUser = openDeleteUser;

                activate();

                function activate() {
                    getUsers();
                }

                function getUsers() {
                    return $http({
                        method: "GET",
                        url: "ajax/users",
                        params: {}
                    })
                        .then(function (response) {
                            vm.users = response.data;
                            console.log(response.data);

                        }).catch(function (error) {
                            toaster.error('Eroare incarcare useri!', 'Incarcare useri');
                        });
                }


                function openManageUser(user) {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'create-user.html',
                        controller: 'ManageUserController',
                        controllerAs: 'vm',
                        size: 'lg',
                        resolve: {
                            resolveUser: function () {
                                return user
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        return getUsers();
                    }, function () {
                    });
                }

                function openDeleteUser(user) {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'delete-user.html',
                        controller: 'DeleteUserController',
                        backdrop: 'static',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            resolveUser: function () {
                                return user
                            } 
                        }
                    });

                    modalInstance.result.then(function () {
                        return getUsers();
                    }, function () {
                    });
                }


            }
        ])
    ;
</script>
</body>
</html>