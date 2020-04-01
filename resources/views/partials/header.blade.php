<meta charset="utf-8">
<meta name="description" content="{{$page['meta']}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$page['title']}}</title>
<base href="/">
<!--Style Css Start-->
<link rel="stylesheet" href="css/style.css" media='all'>
<link rel="stylesheet" href="css/custom.css" media='all'>
<!--Bootstrap Css Start-->
<link rel="stylesheet" href="css/bootstrap.css" media='all'>
<!--Owl Carousel Css Start-->
<link rel="stylesheet" href="css/owl-carousel.css" media='all'>
<!--Theme Color Css Start-->
<link rel="stylesheet" href="css/theme-color.css" media='all'>
<!--Responsive Css Start-->
<link rel="stylesheet" href="css/responsive.css" media='all'>
<!--Animate Css Start-->
<link rel="stylesheet" href="css/animate.css" media='all'>
<!--Scrollbar Css Start-->
<link rel="stylesheet" href="css/jquery.scrollbar.css" media='all'>
<!--Font Awesome Css Start-->
<link rel="stylesheet" href="css/font-awesome.min.css" media='all'>
<!--Font IcoMoon Css Start-->
<link rel="stylesheet" href="css/icomoon.css" media='all'>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Cookiebot -->
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="0377e19e-fdad-4111-81eb-a94deef6fee8" data-blockingmode="auto" type="text/javascript"></script>

<!-- Start of  Zendesk Widget script -->
<script id="ze-snippet"
        src="https://static.zdassets.com/ekr/snippet.js?key=4592ab15-481b-4463-9376-9c16d098a072"></script>
<!-- End of  Zendesk Widget script -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.css"
      integrity="sha256-K4PK62zpbl/XelQ0bLxyUztMw5nLdGyd2qGmPTGM1oY=" crossorigin="anonymous"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox-plus-jquery.min.js"
        integrity="sha256-j4lH4GKeyuTMQAFtmqhxfZbGxx+3WS6n2EJ/NTB21II=" crossorigin="anonymous"></script>


<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
<link rel="manifest" href="fav/site.webmanifest">
<link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148183494-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-148183494-1');
</script>


<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular-cookies.min.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.9.0/loading-bar.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.js'></script>

<script src="https://unpkg.com/angular-toastr/dist/angular-toastr.tpls.js"></script>
<link rel="stylesheet" href="https://unpkg.com/angular-toastr/dist/angular-toastr.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>


<!-- UI Select -->
<link rel="stylesheet" href="js/ui-select/dist/select.min.css">
<script src='js/ui-select/dist/select.min.js'></script>
<script src='js/angular-file-upload.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.5.0/textAngular-rangy.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.5.0/textAngular-sanitize.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.5.0/textAngular.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.5.16/textAngular.css" integrity="sha256-CIXWjF0D4QdzSYLdaLLcgDYj9ekf89AUq3b0yZzGvxg=" crossorigin="anonymous" />

<script type="text/javascript">
    var app = angular.module('app', [
        'angular-loading-bar',
        'ngAnimate',
        'ngCookies',
        'ngSanitize',
        'toastr',
        'ui.bootstrap',
        'ui.select',
        'angularFileUpload',
        'textAngular'
    ]);
    app.config(['cfpLoadingBarProvider', '$interpolateProvider',
        function (cfpLoadingBarProvider, $interpolateProvider) {

            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            cfpLoadingBarProvider.includeSpinner = false;
        }]);
    app.filter('secondsToDateTime', [function () {
        return function (seconds) {
            return new Date(1970, 0, 1).setSeconds(seconds);
        };
    }]);
    app.filter('dateTimeToSeconds', [function () {
        return function (datetime) {
            if (!datetime) return null;
            return Date.parse(datetime);
        };
    }]);

    app.directive('myMaxlength', function () {
        return {
            require: 'ngModel',
            link: function (scope, element, attrs, ngModelCtrl) {
                var maxlength = Number(attrs.myMaxlength);

                function fromUser(text) {
                    if (text.length > maxlength) {
                        var transformedInput = text.substring(0, maxlength);
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                        return transformedInput;
                    }
                    return text;
                }

                ngModelCtrl.$parsers.push(fromUser);
            }
        };
    });

</script>


<script type="text/javascript">
    angular.module('app')
        .controller('AppController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;


                vm.logout = logout;
                vm.openEditProfile = openEditProfile;

                activate();

                function activate() {
                    //    return getUser();
                }

                function openEditProfile() {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'profile.html',
                        controller: 'ProfileController',
                        controllerAs: 'vm',
                        size: 'lg',
                        resolve: {
                            user: function () {
                                return vm.user
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                    }, function () {
                    });

                }


                function logout() {
                    return $http({
                        method: "POST",
                        url: "ajax/auth/logout"
                    })
                        .then(function (response) {
                            toaster.success('Delogare cu success!');
                            setTimeout(function () {
                                $window.location.href = '{!! ($languageCode == 'ro') ? '/' : '/home'  !!}';
                            }, 1000);

                        }).catch(function (error) {
                        });
                }


                function getUser() {
                    return $http({
                        method: "GET",
                        url: "ajax/me",
                        params: {}
                    })
                        .then(function (response) {
                            vm.user = response.data;

                        }).catch(function (error) {
                            //    toaster.error('Eroare incarcare user!', 'Incarcare user');
                        });
                }

            }
        ])
    ;
</script>
@include('modals.register')

<!-- End of Angular -->


<style>

    .account-home-icon {
        font-size: 24px;
        text-align: center;
        background: #1F73B7 !important;
        border-radius: 7px;
        color: white;
        padding-top: 20px;
        padding-bottom: 20px;
        min-height: 150px;
        margin-left: 10px;
        margin-top: 10px;
    }

    .account-home-icon a {
        color: white;
    }
    .ta-editor.form-control.small-height, .ta-scroll-window.form-control.small-height  {
        height: 150px;
        min-height: 150px;
        overflow: auto;
        padding-left: 5px;
        padding-right: 5px;
    }
    .form-control.small-height > .ta-bind {
        min-height: 132px;
    }
    .btn-toolbar > .btn, .btn-toolbar > .btn-group, .btn-toolbar > .input-group {
        margin-left: 5px;
        margin-bottom: 4px;
    }
</style>
