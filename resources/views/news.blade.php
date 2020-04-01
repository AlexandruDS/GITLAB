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
            <h2>{{$helper::getTextValue($texts, 'ARTICLES_TITLE')}}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a></li>
                <li class="breadcrumb-item active">{{$helper::getTextValue($texts, 'ARTICLES_TITLE')}}</li>
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
                                <h2>{{$helper::getTextValue($texts, 'ARTICLES_LATEST_TITLE')}}</h2>
                            </div><!--Heading Outer End-->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @foreach($latestArticles as $article)
                                    <!--Blog Item Start-->
                                    <div class="tnit-blog-item tnit-blog-item_v2">
                                        <div class="row" style="position: relative">
                                            @if(!$article->external_url)
                                            <a style="position:absolute; bottom: 15px; right:30px;" href="./{{($languageCode == 'ro') ? 'noutati' : 'news' }}/{{$article->url}}" class="tnit-btn-style1">{{$helper::getTextValue($texts, 'ARTICLES_MORE_BUTTON')}}</a>
                                            @else
                                                <a target="_blank" style="position:absolute; bottom: 15px; right:30px;" href="{{$article->external_url}}" class="tnit-btn-style1">{{$helper::getTextValue($texts, 'ARTICLES_MORE_BUTTON')}}</a>
                                            @endif
                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                <!--Blog Thumb Start-->
                                                <figure class="tnit-thumb">
                                                   <img src="{{ route('image.displayImage', $article->image ) }}"  style="min-height: 250px;" alt="">
                                                
                                                    <figcaption class="tnit-caption">
                                                        <div class="date-box">
                                                            <span>{{date("d", strtotime($article->created_at))}}</span>
                                                            {{ date("M", strtotime($article->created_at))}}
                                                        </div>

                                                    </figcaption>
                                                </figure><!--Blog Thumb End-->
                                            </div>
                                            <div class="col-md-8 col-sm-7 col-xs-12">
                                                <!--Blog Text Start-->
                                                <div class="tnit-text">
                                                    <h4>
                                                        @if(!$article->external_url)
                                                        <a href="./{{($languageCode == 'ro') ? 'noutati' : 'news' }}/{{$article->url}}">{{$article->title}}</a>
@else
                                                            <a target="_blank" href="{{$article->external_url}}">{{$article->title}}</a>

                                                        @endif

                                                    </h4>
                                                    <!--Meta Listed Start-->
                                                    <ul class="tnit-meta-listed tnit-meta-listed2">
                                                        <li>{{$helper::getTextValue($texts, 'ARTICLES_BY')}} <strong>{{$article->user->first_name}} {{$article->user->last_name}}</strong> </li>
                                                        <li>{{$helper::getTextValue($texts, 'ARTICLES_IN')}}<strong> {{($languageCode == 'ro') ? $article->category->name_ro : $article->category->name_en }}</strong> </li>
                                                    </ul><!--Meta Listed End-->
                                                    <p style="margin-bottom: 12px;">{{$article->abstract}} </p>
                                                </div><!--Blog Text End-->
                                            </div>
                                        </div>
                                    </div><!--Blog Item End-->
                                    @endforeach
                                </div>
                            </div>

                        </div><!--Inner Video Outer End-->

                    </div>
                    @include('partials.right-pane')
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

</body>
</html>