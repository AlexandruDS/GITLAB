<div class="col-md-3 col-sm-12 col-xs-12">
    <!--Sidebar Outer Start-->
    <aside class="tnit-sidebar-outer">

        <!--Widget Start-->
        <div class="widget widget-categories">
            <h3>{{$helper::getTextValue($texts, 'MY_ACCOUNT_TITLE')}}</h3>
            <ul class="widget-listed">
                <li>
                    <a href="./{{($languageCode == 'ro') ? 'contul-meu' : 'my-account' }}">
                        {{$helper::getTextValue($texts, 'ACCOUNT_SETTINGS_TITLE')}}
                    </a>
                </li>
                <li>
                    <a href="./{{($languageCode == 'ro') ? 'sesiunile-mele' : 'my-sessions' }}">
                        {{$helper::getTextValue($texts, 'ACCOUNT_SESSIONS_TITLE')}}
                    </a>
                </li>
                @if(Request()->user->is_coach)
                    <li>
                        <a href="./{{($languageCode == 'ro') ? 'documentele-mele' : 'my-documents' }}">
                            {{$helper::getTextValue($texts, 'ACCOUNT_DOCUMENTS_TITLE')}}
                        </a>
                    </li>
                @endif
                @if(Request()->user->is_admin)
                    <li>
                        <a href="./{{($languageCode == 'ro') ? 'admin' : 'admin' }}">
                            {{$helper::getTextValue($texts, 'ACCOUNT_ADMIN_TITLE')}}
                        </a>
                    </li>
                @endif

                <li>
                    <a data-ng-click="app.logout()" style="cursor: pointer">
                        {{$helper::getTextValue($texts, 'ACCOUNT_LOGOUT_TITLE')}}
                    </a>
                </li>
            </ul>
        </div><!--Widget End-->

        <!--Widget Start-->
        <div class="widget widget-categories">
            <h3>{{$helper::getTextValue($texts, 'SERVICES_TITLE')}}</h3>
            <ul class="widget-listed">
                @foreach($services as $service)
                    <li><a href="./{{($languageCode == 'ro') ? 'servicii' : 'services' }}/{{$service->url}}">{{$service->title}}</a></li>
                @endforeach
            </ul>
        </div><!--Widget End-->

        <!--Widget Start-->
        <div class="widget widget-tweets">
            <h3>{{$helper::getTextValue($texts, 'QUALITITES_TITLE')}}</h3>
            <div class="row tnit-social-row_v2">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Socail Box Start-->
                    <div class="tnit-social-box after-line">
                        <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                        <div class="tnit-text">
                            <strong>{{$helper::getTextValue($texts, 'QUALITITES_NUMBER1')}} %</strong>
                            <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE1')}}</span>
                        </div>
                    </div><!--Socail Box End-->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Socail Box Start-->
                    <div class="tnit-social-box">
                        <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i></a>
                        <div class="tnit-text">
                            <strong>{{$helper::getTextValue($texts, 'QUALITITES_NUMBER2')}} %</strong>
                            <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE2')}}</span>
                        </div>
                    </div><!--Socail Box End-->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Socail Box Start-->
                    <div class="tnit-social-box after-line mb-0">
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i></a>
                        <div class="tnit-text">
                            <strong>{{$helper::getTextValue($texts, 'QUALITITES_NUMBER3')}} %</strong>
                            <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE3')}}</span>
                        </div>
                    </div><!--Socail Box End-->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Socail Box Start-->
                    <div class="tnit-social-box mb-0">
                        <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                        <div class="tnit-text">
                            <strong>{{$helper::getTextValue($texts, 'QUALITITES_NUMBER4')}} %</strong>
                            <span>{{$helper::getTextValue($texts, 'QUALITITES_TITLE4')}}</span>                                            </div>
                    </div><!--Socail Box End-->
                </div>
            </div>
        </div><!--Widget End-->

        <!--Widget Start-->
        <div class="widget widget-tags">
            <h3>Tags</h3>
            <!--Widget Tags Start-->
            <ul class="widget-tags">
                <li>
                    <a href="#">Motivational</a>
                </li>
                <li>
                    <a href="#">Business</a>
                </li>
                <li>
                    <a href="#">Training</a>
                </li>
                <li>
                    <a href="#">Personal</a>
                </li>
                <li>
                    <a href="#">Public</a>
                </li>
                <li>
                    <a href="#">Leadership</a>
                </li>
            </ul><!--Widget Tags End-->
        </div><!--Widget End-->
    </aside><!--Sidebar Outer End-->
</div>