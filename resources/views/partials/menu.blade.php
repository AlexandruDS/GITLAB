<!--Header Content Start-->
<header class="tnit-header {{$page['identifier'] === 'HOME' ? '' : ' tnit-inner-header'}}" data-ng-controller="MenuController as vm">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <!--Logo Start-->
                <strong class="tnit-logo">
                    <a href="./{{($languageCode == 'ro') ? '' : 'home' }}"><img src="./images/logo.png" alt=""
                                                                                style="height: 93px;"></a>
                </strong><!--Logo End-->
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-1">

                <!--Topbar content Start-->
                <div class="tnit-topbar-holder">
                    <!--Top Left Box Start-->
                    <ul class="tp-left-listed">
                        <li><i class="fa fa-phone"
                               aria-hidden="true"></i> {{$helper::getTextValue($texts, 'HEADER_PHONE')}}</li>
                        <li>
                            <a href="mailto:{{$helper::getTextValue($texts, 'HEADER_EMAIL')}}"><i class="fa fa-envelope"
                                                                                                  aria-hidden="true"></i> {{$helper::getTextValue($texts, 'HEADER_EMAIL')}}
                            </a>
                        </li>
                    </ul> <!--Top Left Box End-->
                    <!--Top Right Start-->
                    <div class="tp-right">
                        <div style="display: inline-block; margin-right: 5px;">
                                <a href="./"><img src="images/ro.png" style="margin-left: 0px; border:solid 1px {{$languageCode == 'ro' ? 'darkblue' : 'lightgray'}}; padding: 1px; height: 18px;"/></a>
                                <a href="./home"><img src="images/en.png" style="height: 18px; width: 24px;  margin-left: 0px; border:solid 1px  {{$languageCode == 'en' ? 'darkblue' : 'lightgray'}}; padding: 1px;"/></a>
                        </div>
                        @if(Request()->user)
                            <a href="{{($languageCode == 'ro') ? 'contul-meu' : 'my-account' }}" class="btn-account"
                               style="    position: relative; top: 2px;left: 7px;">
                                <strong>{{Request()->user->first_name}} {{Request()->user->last_name}}</strong>
                                @if(Request()->user->is_coach)
                                    (Coach)
                                @else
                                (Coachee)
                                @endif
                            </a>
                        @else
                            <a data-ng-click="vm.openLoginWindow()" class="btn-account"
                               style="position: relative; top: 2px;left: 7px; cursor: pointer">
                                {{$helper::getTextValue($texts, 'HEADER_MY_ACCOUNT')}}
                            </a>
                        @endif




                        <!--Socail Links start-->
                        <ul class="tnit-social-links">
                            @foreach($socials as $social)
                                <li>
                                    <a target="{{$social->new_window ?  '_blank': ''}}" href="{{$social->url}}">
                                        <i class="{{$social->icon}}" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul><!--Socail Links End-->

                        {{--
                        <!--Cart Holder Start-->
                        <div class="tnit-cart-holder">
                            <!--Button Cart-->
                            <div class="btn-cart">
                                <span class="icomoon icon-shopping-bag"></span>
                                <span class="num">2</span>
                                <!-- Cart Listed Start-->
                                <ul class="tnit-cart-listed">
                                    <li>
                                        <div class="inner-cart">
                                            <img src="images/cart-sm-img.jpg" alt="">
                                            <div class="text">
                                                <span class="th-color">x Life of City</span>
                                                1 x $39.99
                                                <a href="#" class="btn-close">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner-cart">
                                            <img src="images/cart-sm-img.jpg" alt="">
                                            <div class="text">
                                                <span class="th-color">x Life of City</span>
                                                1 x $39.99
                                                <a href="#" class="btn-close">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner-cart">
                                            <div class="text">
                                                <a href="#" class="tnit-btn-cart">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    Cart
                                                </a>
                                                <strong class="price">Total: $79.98</strong>
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-- Cart Listed End-->
                            </div><!--Button Cart End-->
                        </div><!--Cart Holder End-->
                        --}}
                    </div>
                </div>
                <!--Topbar content End-->

                <!--Nav Holder Start-->
                <div class="tnit-navbar-holder">

                    <nav class="navbar navbar-default" style="float: right">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#tnit-navbar-collapse" aria-expanded="false"><span
                                        class="sr-only">Menu</span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span></button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="tnit-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'MENU_HOME')}}</a>
                                </li>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'despre-noi' : 'about-us' }}">{{$helper::getTextValue($texts, 'MENU_ABOUT_US')}}</a>
                                </li>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'echipa-noastra' : 'our-team' }}">{{$helper::getTextValue($texts, 'MENU_TEAM')}}</a>
                                </li>
                                <?php if(isset($_GET['test'])): ?>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'echipa-noastra' : 'our-team' }}">{{$helper::getTextValue($texts, 'MENU_TEAM')}}</a>
                                </li>
                                <?php endif; ?>

                                @if($helper::getTextValue($texts, 'ENABLE_ONLINE_SESSIONS')== 1)
                                    <li>
                                        <a href="./{{($languageCode == 'ro') ? 'sesiuni' : 'sessions' }}">{{$helper::getTextValue($texts, 'MENU_SESSIONS')}}</a>
                                    </li>
                                @endif

                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'servicii' : 'services' }}">{{$helper::getTextValue($texts, 'MENU_SERVICES')}}</a>
                                </li>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'evenimente' : 'events' }}">{{$helper::getTextValue($texts, 'MENU_EVENTS')}}</a>
                                </li>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'noutati' : 'news' }}">{{$helper::getTextValue($texts, 'MENU_ARTICLES')}}</a>
                                </li>
                                <li>
                                    <a href="./{{($languageCode == 'ro') ? 'contact' : 'contact-us' }}">{{$helper::getTextValue($texts, 'MENU_CONTACT')}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                    <!--Nav Right Start-->
                {{--<ul class="tnit-nav-right">
                    <li class="tnit-search-box">
                        <a href="#" id="trigger-tnit-search"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <!-- Search Form Outer Start-->
                        <form method="get" class="tnit-search-form1">
                            <input type="text" placeholder="{{$helper::getTextValue($texts, 'HEADER_SEARCH_TEXT')}}">
                            <button class="btn-submit" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form><!-- Search Form Outer End-->
                    </li>
                </ul>--}}
                <!--Nav Right End-->
                </div><!--Nav Holder End-->
            </div>
        </div>
    </div>
</header><!--Header Content End-->

<script type="text/javascript">
    angular.module('app')
        .controller('MenuController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;

                vm.users = [];

                vm.openLoginWindow = openLoginWindow;
                //  vm.createSession = createSession;

                activate();

                function activate() {
                }

                function openLoginWindow(){
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'login.html',
                        controller: 'LoginController',
                        controllerAs: 'vm',
                        size: 'md',
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

            }
        ])
    ;
</script>
@include('partials.login-modal')
