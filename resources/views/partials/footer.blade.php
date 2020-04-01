<!--Footer Content Start-->
<footer class="tnit-footer">
    <!--Footer Top Row start-->
    <div class="tnit-footer-tprow">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <!--Widget About Start-->
                    <div class="widget widget-about">
                        <strong class="ft-logo" style="text-align: center; margin-bottom: 4px;">
                            <a href="/"><img style="height:80px !important;" src="./images/ft-logo.png"
                                                      alt=""></a>
                        </strong>
                        <h5 style="font-weight: bold; color: white;">{{$helper::getTextValue($texts, 'FOOTER_TEXT_INFO_TITLE')}}</h5>
                        <p>{{$helper::getTextValue($texts, 'FOOTER_TEXT_INFO_TEXT')}}</p>
                        <ul class="about-info-listed">
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$helper::getTextValue($texts, 'HEADER_ADDRESS')}}
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:{{$helper::getTextValue($texts, 'HEADER_PHONE')}}">{{$helper::getTextValue($texts, 'HEADER_PHONE')}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:{{$helper::getTextValue($texts, 'HEADER_EMAIL')}}">{{$helper::getTextValue($texts, 'HEADER_EMAIL')}}</a>
                            </li>
                        </ul>
                    </div><!--Widget About End-->
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <!--Widget Start-->
                    <div class="widget">
                        <h4>{{$helper::getTextValue($texts, 'FOOTER_TITLE_SERVICES')}}</h4>
                        <!--Widget Listed Start-->
                        <ul class="widget-listed">
                            @foreach($services as $service)
                                <li><a href="./{{($languageCode == 'ro') ? 'servicii' : 'services' }}/{{$service->url}}">{{$service->title}}</a></li>
                            @endforeach
                        </ul><!--Widget Listed End-->

                    </div><!--Widget End-->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <!--Widget Start-->
                    <div class="widget wiget-instagram">
                        <h4>{{$helper::getTextValue($texts, 'FOOTER_TITLE_IMAGES')}}</h4>
                        <ul class="intagram-listed">
                            @for($i = 1 ; $i <= 6; $i++)
                                <li>
                                    <a href="images/footer/{{$i}}.jpg" data-lightbox="footer-images">
                                        <img style="padding: 2px; border: solid 1px lightgray; width: 84px; height: 84px;"
                                             src="images/footer/{{$i}}.jpg"
                                             alt="">
                                    </a>
                                </li>
                            @endfor
                        </ul>
                        <div style="margin-top: 20px;">
                            <img src="images/icf.png" style="width: 100px; margin-right: 30px; margin-left: 10px;"/>
                            <img src="images/acsth.jpg" style="width: 100px"/>
                        </div>
                    </div><!--Widget End-->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <!--Widget Start-->
                    <div class="widget widget-appointment">
                        <h4>{{$helper::getTextValue($texts, 'FOOTER_TITLE_FORM')}}</h4>
                        <form id="footerForm" onsubmit="sendContactFooter(event);" method="get" class="tnit-appointment-form">
                            <div class="inner-holder">
                                <input name="name" type="text" placeholder="{{$helper::getTextValue($texts, 'FOOTER_NAME_FORM')}}">
                                <input name="language_code" type="hidden" value="{{$languageCode}}">
                            </div>
                            <div class="inner-holder">
                                <input name="phone" type="tel" placeholder="{{$helper::getTextValue($texts, 'FOOTER_PHONE_FORM')}}">
                            </div>
                            <div class="inner-holder">
                                <button class="btn-submit"
                                        type="submit">{{$helper::getTextValue($texts, 'FOOTER_TITLE_BUTTON')}}</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            function sendContactFooter(event) {
                                console.log($('#footerForm').serialize());
                                $.post('api/contact_footer', $('#footerForm').serialize()).done(function(response){
                                    alert("{{($languageCode == 'ro') ? 'Va vom contacta in curand!' : 'We will contact you soon!'}}" );
                                    $("#footerForm")[0].reset();
                                });
                                event.preventDefault();
                            }
                        </script>
                    </div><!--Widget End-->
                </div>
            </div>

            <div class="row" style="position: relative; top:-10px;">
                <div class="col-md-3 col-md-offset-4"><a href="politica-de-confidentialitate">Politica de confidentialitate</a></div>
                <div class="col-md-3"><a href="politica-cookies">Politica privind utlizarea cookie-urilor</a></div>
            </div>
        </div>
    </div><!--Footer Top Row End-->
    <!--CopyRight Row Start-->
    <div class="tnit-copyright-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">

                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <p>Copyright © 2019 <span class="th-color">Pathways Consulting</span>, Powered by <a
                                href="http://www.creato-design.com/">Creato </a>.</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!--Socail Links start-->
                    <ul class="tnit-social-links tnit-social-links_v2">
                        @foreach($socials as $social)
                            <li>
                                <a target="{{$social->new_window ?  '_blank': ''}}" href="{{$social->url}}">
                                    <i class="{{$social->icon}}" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul><!--Socail Links End-->
                </div>
            </div>
        </div>
    </div><!--CopyRight Row End-->
</footer><!--Footer Content End-->