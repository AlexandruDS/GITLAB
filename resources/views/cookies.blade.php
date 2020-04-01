<!DOCTYPE html>
<html data-ng-app="app" data-ng-controller="AppController as app">

<head>
    @include('partials.header')

</head>

<body>

<!--Wrapper Content Start-->
<div class="tnit-wrapper">

@include('partials.menu')

<!--Inner Banner Content Start-->
    <div class="tnit-inner-banner">
        <div class="container">
            <h2>{{($languageCode == 'ro') ? 'POLITICA PRIVIND UTILIZAREA COOKIE-URILOR' : 'COOKIES POLICY' }}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">{{($languageCode == 'ro') ? 'POLITICA PRIVIND UTILIZAREA COOKIE-URILOR' : 'COOKIES POLICY' }}</li>
            </ul>
            <!--BreadCrumb Listed End-->
        </div>
    </div>
    <!--Inner Banner Content End-->


    <!--Main Content Start-->

    <div class="tnit-main-content">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <h3>POLITICA PRIVIND FISIERELE COOKIES</h3>
            <h4>Introducere</h4>
            <p>
                Prezenta Politică privind fișierele cookies se aplică tuturor utilizatorilor paginii de internet
                pathways-consulting.net. Informațiile prezentate în continuare au ca scop informarea utilizatorilor
                acestei pagini de internet cu privire la plasarea, utilizarea și administrarea cookie-urilor de către
                pathways-consulting.net în contextul navigării utilizatorilor pe această pagină de internet.etc.
            </p>

            <h4>Ce sunt cookie-urile?</h4>
            <p>Folosim termenul „cookie”-uri pentru a ne referi la modulele cookie și la tehnologiile similare prin
                intermediul cărora pot fi colectate informații în mod automat. Un „Internet Cookie” (termen cunoscut și
                sub denumirea de „browser cookie” sau „HTTP cookie” ori „cookie”) reprezintă un fișier de mici
                dimensiuni, format din litere și numere, care va fi stocat pe computerul, terminalul mobil sau pe alte
                echipamente ale unui utilizator prin intermediul cărora se accesează internetul. Cookie-urile sunt
                instalate prin solicitarea emisă de un web-server către un browser (de ex.: Internet Explorer, Firefox,
                Chrome). Cookie-urile odată instalate au o durată de existență determinată, rămânând „pasive”, în sensul
                că nu conțin programe software, viruși sau spyware și nu vor accesa informațiile de pe hard driverul
                utilizatorului pe al cărui echipament au fost instalate.</p>
            <p>Un cookie este format din două părți: numele cookie-ului; și conținutul sau valoarea cookie-ului. Din
                punct de vedere tehnic, doar web-serverul care a trimis cookie-ul îl poate accesa din nou în momentul în
                care un utilizator se întoarce pe pagina de internet asociată web-serverului respectiv.</p>
            <h4>Pentru ce scopuri sunt utilizate cookie-urile prin intermediul acestei pagini de internet:</h4>
            <p>Cookie-urile sunt utilizate pentru a furniza utilizatorilor acestei pagini de internet o experiență mai
                bună de navigare și servicii adaptate nevoilor și interesului fiecărui utilizator în parte și anume
                pentru:</p>


            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p>îmbunătățirea utilizării acestei pagini de internet, inclusiv prin identificarea oricăror erori
                        care apar în timpul vizitării/utilizării acesteia de către utilizatori;</p></li>
                <li><p>furnizarea de statistici anonime cu privire la modul în care este utilizată această pagină de
                        internet către pathways-consulting.net , în calitate de deținător al acestei pagini de
                        internet;</p></li>
                <li><p>anticiparea unor eventuale bunuri care vor fi în viitor puse la dispoziția utilizatorilor prin
                        intermediul acestei pagini de internet, în funcție de serviciile / produsele accesate.</p></li>
            </ol>

            <p>Pe baza feedback-ului transmis prin cookie-uri în legătură cu modul în care se utilizează această pagină
                de internet, pathways-consulting.net poate adopta măsuri pentru ca această pagină de internet să fie mai
                eficientă și mai accesibilă pentru utilizatori. Astfel, utilizarea cookie-urilor permite memorarea
                anumitor setări/preferințe stabilite de către utilizatorii acestei pagini de internet, precum: </p>
            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p>limba în care este vizualizată o pagină de internet;</p></li>
                <li><p>limba în care este vizualizată o pagină de internet;</p></li>
                <li><p>facilitarea accesului în contul utilizatorilor;</p></li>
                <li><p>postarea comentariilor pe site.</p></li>
            </ol>
            <h4>Care este durata de viață a cookie-urilor?</h4>
            <p>Durata de viață a cookie-urilor poate varia semnificativ, depinzând de scopul pentru care este plasat.
                Există următoarele categorii de cookie-uri care determină și durata de viață a acestora:</p>

            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p><strong>Cookie-uri de sesiune</strong> – Un „cookie de sesiune” este un cookie care este șters
                        automat când
                        utilizatorul își închide browserul.</p></li>
                <li><p><strong>Cookie-uri persistente sau fixe</strong> – Un „cookie persistent” sau „fix” este un
                        cookie care rămâne
                        stocat în terminalul utilizatorului până când atinge o anumită dată de expirare (care poate fi
                        în câteva minute, zile sau câțiva ani în viitor) sau până la ștegerea acestuia de către
                        utilizator în orice moment prin intermediul setărilor browserului.</p></li>
            </ol>
            <h4>Ce sunt cookie-urile plasate de terți? </h4>
            <p>Anumite secțiuni de conținut de pe pagina de internet pot fi furnizate prin intermediul unor terți, adică
                nu de către pathways-consulting.net caz în care aceste cookie-uri sunt denumite cookie-uri plasate de
                terți („third party cookie-uri”). Terții furnizori ai cookie-urilor trebuie să respecte, de asemenea,
                regulile în materie de protecție a datelor și Politica de Confidențialitate disponibilă pe această
                pagină de internet.</p>
            <p>Aceste cookie-uri pot proveni de la urmatorii terți: Google Analytics, Facebook. </p>
            <h4>Ce tip de informații sunt stocate și accesate prin intermediul cookie-urilor?</h4>
            <p>Cookie-urile păstrează informații într-un fișier text de mici dimensiuni care permit recunoașterea
                browserului. Această pagină de internet recunoaște browserul până când cookie-urile expiră sau sunt
                șterse.</p>
            <h4>Particularizarea setările browserului în ceea ce privește cookie-urile</h4>
            <p>În cazul în care utilizarea cookie-urilor nu este deranjantă iar calculatorul sau echipamentul tehnic
                utilizat pentru navigarea pe această pagină de internet este folosit doar de către dumneavoastră, pot fi
                setate termene lungi de expirare pentru stocrarea istoricului de navigare.</p>
            <p>În cazul în care calculatorul sau echipamentul tehnic utilizat pentru navigarea pe această pagină de
                internet este folosit de mai multe persoane, poate fi luată în considerare setarea pentru ștergerea
                datelor individuale de navigare de fiecare dată când browserul este închis.</p>
            <h4>Cum pot fi oprite cookie-urile? </h4>

            <p>Dezactivarea și refuzul de a primi cookie-uri pot face această pagină de internet dificil de vizitat,
                atrăgând după sine limitări ale posibilităților de utilizare ale acesteia. Utilizatorii își pot
                configura browserul să respingă fișierele cookie sau să fie acceptate cookie-uri de la o pagină de
                internet anume.</p>
            <p>Toate browserele moderne oferă posibilitatea de a schimba setările cookie-urilor. Aceste setări pot fi
                accesate, ca regulă, în secțiunea „opțiuni” sau în meniul de „preferințe” al browserului tău.</p>
            <p>Totuși, refuzarea sau dezactivarea cookie-urilor nu înseamnă că nu veți mai primi publicitate online – ci
                doar ca aceasta nu va fi adaptată preferințelor și interesele dumneavoastră, evidențiate prin
                comportamentul de navigare.</p>
            <p>Pentru a înțelege aceste setări, următoarele linkuri pot fi folositoare:</p>
            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p>
                        <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies">Cookie
                            settings in Internet Explorer</a></p></li>
                <li><p>
                        <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies">Cookie
                            settings in Firefox</a></p></li>
                <li><p>
                        <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies">Cookie
                            settings in Chrome</a></p></li>
                <li><p>
                        <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies">Cookie
                            settings in Safari</a></p></li>
            </ol>

            <p><strong>Pentru orice întrebări suplimentare cu privire la modul în sunt utilizate cookie-urile prin
                    intermediul acestei pagini de internet, vă rugăm să vă adresați la adresa
                    office@pathways-consulting.net</strong></p>
        </div>
    </div>


    @include('partials.footer')

</div>
<!--Wrapper Content End-->

<!--JQuery Files Start-->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/video-player.js"></script>
<script src="js/jQuery-plugin-progressbar.js"></script>
<script src="js/script.js"></script>

</body>

</html>