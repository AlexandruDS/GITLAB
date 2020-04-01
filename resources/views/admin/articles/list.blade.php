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
                <li class="breadcrumb-item active">Lista articole</li>
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
                                        <strong>Lista Articole</strong>
                                    </div>
                                    
                                    <div class="col-md-2 text-right">
                                        <button class="btn btn-block btn-default"
                                                data-ng-click="vm.openManageArticle()">
                                            <i class="fa fa-plus"></i> &nbsp;
                                            Creare articol
                                        </button>
                                    </div>
                                </div>

                                <hr>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-10">
                                        <input type="text" placeholder="Introdu termen de cautare..."
                                               data-ng-model="vm.q" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group btn-group-justified" role="group">
                                            <button type="button"
                                                    data-ng-click="vm.languageId = null"
                                                    class="btn btn-default <% !vm.languageId ? 'btn-primary' : '' %>"
                                                    style="width: 33.33%">ALL
                                            </button>
                                            <button type="button"
                                                    data-ng-click="vm.languageId = 1"
                                                    class="btn btn-default <% vm.languageId == 1 ? 'btn-primary' : '' %>"
                                                    style="width: 33.33%">RO
                                            </button>

                                            <button type="button"
                                                    data-ng-click="vm.languageId = 2"
                                                    class="btn btn-default  <% vm.languageId == 2 ? 'btn-primary' : '' %>"
                                                    style="width: 33.33%">EN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-responsive table-striped " style="margin-top: 20px;">
                                    <tr>
                                        <th>#</th>
                                        <th>Denumire Articol</th>
                                        <th style="width: 100px;">Limba</th>
                                        <th>Data</th>
                                        <th style="width: 100px;"></th>
                                    </tr>
                                    <tr data-ng-repeat="article in vm.articles | filter: vm.q | orderBy: 'identifier'"  data-ng-if="!vm.languageId || (vm.languageId && article.language_id == vm.languageId)">
                                        <td><% article.id %></td>
                                        <td><% article.title %> <br>
                                            <small> <% article.abstract %></small>
                                        </td>
                                        <td>
                                            <label data-ng-if="article.language_id == 1" class="label label-primary"
                                                   style="padding: 5px; width: 100%; display: block">RO</label>
                                            <label data-ng-if="article.language_id == 2" class="label label-default"
                                                   style="padding: 5px; width: 100%; display: block">EN</label>
                                        </td>
                                        <td><% vm.formatDate(article.created_at) | date:'dd.MM.yyyy' %></td>
                                        <td class="text-right">
                                            <button class="btn btn-default"
                                                    data-ng-click="vm.openManageArticle(article)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-default"
                                                    data-ng-click="vm.openDeleteArticle(article)">
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
    @include('admin.articles.manage')
    @include('generic.delete-item')

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


                vm.openManageArticle = openManageArticle;
                vm.openDeleteArticle = openDeleteArticle;


                vm.formatDate = formatDate;

                activate();

                function activate() {
                    getArticles();
                }


                function formatDate(date) {
                    if (!date) {
                        return null;
                    }
                    var dateOut = new Date(date);
                    return dateOut;
                };

                function getArticles() {
                    return $http({
                        method: "GET",
                        url: "ajax/articles",
                        params: {}
                    })
                        .then(function (response) {
                            vm.articles = response.data;
                        }).catch(function (error) {
                            toaster.error('Eroare incarcare texte!', 'Incarcare texte');
                        });
                }

                function openManageArticle(item) {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'create-article.html',
                        controller: 'ManageArticleController',
                        controllerAs: 'vm',
                        size: 'lg',
                        backdrop: 'static',
                        resolve: {
                            item: function () {
                                return item;
                            },
                            path: function () {
                                return 'articles'
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        return getArticles();
                    }, function () {
                    });
                }

                function openDeleteArticle(article) {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'delete-item.html',
                        controller: 'DeleteItemController',
                        backdrop: 'static',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            item: function () {
                                return article;
                            },
                            path: function () {
                                return 'articles'
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        return getArticles();
                    }, function () {
                    });
                }


            }
        ])
    ;
</script>
</body>
</html>