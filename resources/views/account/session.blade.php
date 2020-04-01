<!DOCTYPE html>

<html data-ng-app="app" data-ng-controller="AppController as app">
<head>
    @include('partials.header')
</head>
<body data-ng-controller="SessionController as vm">

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
                            {{--@if(Request()->user->is_coach--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{$session->title}}</h2>
                                    <hr>
                                </div>
                                <div class="col-md-12 text-right">

                                    <a href="sesiunile-mele" class="btn btn-default btn-lg" style="margin-right:5px;"
                                    >
                                        <i class="fa fa-arrow-left"></i> Inapoi
                                    </a>
                                    @if(Request()->user->is_coach)

                                        <button class=" pull-left btn btn-danger btn-lg"
                                                data-ng-click="vm.openDeleteSessionModal()">
                                            <i class="fa fa-trash"></i> Stergere
                                        </button>
                                    @endif
                                    @if($session->start_url)
                                        <button class="btn btn-blue btn-lg" style="margin-right:5px;"><i
                                                    class="fa fa-stop"></i> Opreste
                                        </button>
                                        <a target="_blank" href="{{$session->start_url}}"
                                           class="btn btn-primary btn-lg"><i class="fa fa-universal-access"></i> Intra
                                            in meeting</a>
                                    @else
                                        <button class="btn btn-success btn-lg" style=""
                                                data-ng-click="vm.startSession({{$session->id}})">
                                            <i class="fa fa-play"></i> Pornire sesiune
                                        </button>
                                    @endif
                                </div>
                                <div class="col-md-12">


                                    <div class="panel panel-default" style="margin-top: 20px;">
                                        <div class="panel-heading">
                                            <h3>Despre Coach <i class="fa fa-user-secret fa-lg pull-right"></i>
                                                <u>{{$session->user->first_name}} {{$session->user->last_name}}</u></h3>

                                        </div>
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>{!!  $languageCode == 'ro' ? $session->user->description_ro : $session->user->description_en !!}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <figure class="tnit-about-thumb">
                                                        <img style="width: 100%; border-top-right-radius: 20px; border-bottom-right-radius: 5px;border: solid 1px aliceblue;     border: solid 1px darkgrey; border-radius: 5px;
    padding: 4px; background: white; " src="{{ route('image.displayImage', $session->user->image ) }}" alt="">
                                                    </figure>
                                                </div>

                                            </div>

                                            <h3>Documente</h3>
                                            <div style="margin-top: 20px">
                                                @foreach($session->user->documents as $document)
                                                    <div class="list-group" style="margin-top: 10px;">
                                                        <a href="javascript:void(0);"
                                                           class="list-group-item">
                                                            <i class="pull-left fa fa-2x fa-file fa-file-<% vm.getFileIcon('{!! $document->file->extension !!}') %>-o"></i>

                                                            <button class="pull-right btn btn-default"
                                                                    data-ng-click="vm.downloadFile({!! $document->file->id !!})">
                                                                <i
                                                                        class="fa fa-download"></i> {{ $document->file['name'] }}
                                                            </button>

                                                            <h4 class="list-group-item-heading">
                                                                <% document.title %></h4>
                                                            <p class="list-group-item-text" style="padding-left: 28px;">
                                                                {!! $document->description  !!}
                                                            </p>
                                                            <small style="font-style: italic; padding-left: 28px;">
                                                                {!! $document->file->name  !!}
                                                            </small>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default" style="margin-top: 20px;">
                                        <div class="panel-heading">
                                            <h3>Curriculum</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>{!!  $languageCode == 'ro' ? $session->content : $session->content !!}</p>
                                            @if(!$session->content)
                                                <p class="text-muted text-center">Nu exista curriculum</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="panel panel-default" style="margin-top: 20px;">
                                        <div class="panel-heading">
                                            <h3>Participanti</h3>
                                        </div>
                                        <div class="panel-body" style="padding: 25px;">
                                            @foreach($session->session_users as $session_user)
                                                <label class="label label-default label-lg"
                                                       style="padding:10px; font-size:16px; margin-right: 10px;">
                                                    <i class="fa fa-user"></i> {{$session_user->user->first_name}} {{$session_user->user->last_name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <hr>
                            {{--@endif--}}

                        </div>

                    </div>
                    @include('partials.right-pane-account')
                </div>
            </div>
        </section><!--Video Section End-->

    </div><!--Main Content End-->

    @include('partials.footer')
    @include('modals.create-session')
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
        .controller('SessionController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;
                vm.session = {!! $session !!};
                console.log(vm.session);

                vm.openCreateSessionModal = openCreateSessionModal;
                vm.openDeleteSessionModal = openDeleteSessionModal;
                vm.startSession = startSession;
                //  vm.createSession = createSession;
                vm.downloadFile = downloadFile;
                vm.getFileIcon = getFileIcon;

                function downloadFile(fileId) {
                    window.open("ajax/files/" + fileId + "/download");
                    //   return SharedMedicalRequestsServices.downloadFile(file.id);
                }

                function getFileIcon(extension) {

                    extension = extension.toLowerCase();
                    switch (extension) {
                        case 'xls':
                        case 'xlsx':
                            return 'excel';
                        case 'png' :
                            return 'picture';
                        default:
                            return '';
                    }
                }

                activate();

                function activate() {
                }

                function openDeleteSessionModal() {
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
                                return vm.session;
                            },
                            path: function () {
                                return 'sessions';
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                        setTimeout(function () {
                            window.location.href = '/sesiunile-mele';
                        }, 1000);
                    }, function () {
                    });
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
                                window.location.reload();
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