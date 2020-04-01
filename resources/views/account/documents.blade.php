<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')
</head>
<body data-ng-controller="DocumentsController as vm">

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
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <!--Inner Video Outer Start-->
                        <div class="tnit-video-inner-outer tnit-blog-inner-outer">
                            @if(Request()->user->is_coach)
                                <div class="row">
                                    <div class="col-md-9">
                                        <h2>Documentele mele</h2>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button class="tnit-btn-style_v2 btn-event"
                                                data-ng-click="vm.openManageDocumentModal()">
                                            <i class="fa fa-upload"></i>
                                            Incarca
                                        </button>
                                    </div>
                                </div>

                                <div class="list-group" data-ng-repeat="document in vm.documents">
                                    <a href="javascript:void(0);"
                                       class="list-group-item">
                                        <i class="pull-left fa fa-2x fa-file fa-file-<% vm.getFileIcon(document.file.extension) %>-o"></i>
                                        <button class="pull-right btn btn-default" style="margin-left: 5px;"
                                                data-ng-click="vm.openDeleteItem(document, 'documents')"><i
                                                    class="fa fa-trash"></i></button>
                                        <button class="pull-right btn btn-default"
                                                data-ng-click="vm.downloadFile(document.file)"><i
                                                    class="fa fa-download"></i> <% document.file.name %>
                                        </button>

                                        <h4 class="list-group-item-heading">
                                            <% document.title %></h4>
                                        <p class="list-group-item-text" style="padding-left: 28px;"
                                           data-ng-bind-html="document.description"></p>
                                        <small style="font-style: italic; padding-left: 28px;">
                                            <% document.file.name %>
                                        </small>
                                    </a>
                                </div>

                                <div data-ng-if="!(vm.documents.length > 0)" class="text-muted text-lg text-center">
                                    Nu ai niciun document ca si profesor!
                                </div>
                                <hr>
                            @endif
                        </div><!--Inner Video Outer End-->

                    </div>
                    @include('partials.right-pane-account')
                </div>
            </div>
        </section><!--Video Section End-->

    </div><!--Main Content End-->

    @include('partials.footer')
    @include('documents.manage')
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
        .controller('DocumentsController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;


                vm.getFileIcon = getFileIcon;
                vm.openManageDocumentModal = openManageDocumentModal;
                vm.downloadFile = downloadFile;
                vm.openDeleteItem = openDeleteItem;

                activate();

                function activate() {
                    getDocuments();
                }


                function downloadFile(file) {
                    window.open("ajax/files/" + file.id + "/download");
                    //   return SharedMedicalRequestsServices.downloadFile(file.id);
                }

                function getFileIcon(extension) {

                    switch (extension) {
                        case 'xls':
                        case 'xlsx':
                            return 'excel';
                        default:
                            return '';
                    }
                }

                function getDocuments() {
                    return $http({
                        method: "GET",
                        url: "ajax/documents",
                        params: {}
                    })
                        .then(function (response) {
                            vm.documents = response.data;

                        }).catch(function (error) {
                            //    toaster.error('Eroare incarcare user!', 'Incarcare user');
                        });
                    ``
                }


                function openDeleteItem(item, resourcePath) {
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
                                return item
                            },
                            path: function () {
                                return resourcePath;
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        return getDocuments();
                    }, function () {
                    });
                }

                function openManageDocumentModal(document) {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'manage-document.html',
                        controller: 'ManageDocumentController',
                        controllerAs: 'vm',
                        backdrop: 'static',
                        size: 'lg',
                        resolve: {
                            resolveItem: function () {
                                return document;
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        getDocuments();
                    }, function () {
                    });

                }


            }
        ])
    ;
</script>
</body>
</html>