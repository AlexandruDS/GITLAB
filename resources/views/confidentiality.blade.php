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
            <h2>{{($languageCode == 'ro') ? 'POLITICA DE CONFIDENTIALITATE' : 'CONFIDENTIALITY POLICY' }}</h2>
            <!--BreadCrumb Listed Start-->
            <ul class="breadcrumb tnit-breadcrumb-holder">
                <li class="breadcrumb-item"><a
                            href="./{{($languageCode == 'ro') ? '' : 'home' }}">{{$helper::getTextValue($texts, 'BREADCRUMB_HOME')}}</a>
                </li>
                <li class="breadcrumb-item active">{{($languageCode == 'ro') ? 'POLITICA DE CONFIDENTIALITATE' : 'CONFIDENTIALITY POLICY' }}</li>
            </ul>
            <!--BreadCrumb Listed End-->
        </div>
    </div>
    <!--Inner Banner Content End-->


    <!--Main Content Start-->

    <div class="tnit-main-content">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <h3>INFORMARE CU PRIVIRE LA PRELUCRAREA DATELOR CU CARACTER PERSONAL</h3>
            <h4>Definiții</h4>
            <p>
                Date personale inseamnă orice date care pot conduce la identificarea unei persoane fizice, fie direct,
                fie prin corelare între acestea, ca de exemplu nume, prenume, fotografie, varstă, sex, naționalitate,
                etnie, adresă de domiciliu/resedintă, adresă de e-mail, adresă IP, ocupație, venit, cont bancar,
                orientare politică, religie, semnătură, etc.
            </p>
            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p>categorii speciale de date personale inseamnă categoriile de date referitoare la rasă, etnie,
                        date privind starea de sănătate sau conexe activității operatorului în legătură cu pacienții,
                        date despre viața sexuală, codul numeric personal sau un alt cod ori număr având o funcție de
                        identificare cu aplicabilitate generală;</p></li>
                <li><p>prelucrare inseamnă orice operațiune sau set de operațiuni efectuate asupra datelor cu caracter
                        personal sau asupra seturilor de date cu caracter personal, cu sau fără utilizarea de mijloace
                        automatizate, cum ar fi colectarea, înregistrarea, organizarea, structurarea, stocarea,
                        adaptarea sau modificarea, extragerea, consultarea, utilizarea, divulgarea prin transmiterea,
                        diseminarea sau punerea la dispoziție în orice alt mod, alinierea sau combinarea,
                        restricționarea, ștergerea sau distrugerea;</p></li>
                <li><p>persoană vizată inseamnă persoana fizică ale cărei date cu caracter personal sunt prelucrate, cu
                        titlu de exemplu: pacienți, rude/însoțitori/împuterniciți ai pacienților;</p></li>
            </ol>

            <h4>Scopul prelucrării datelor cu caracter personal</h4>
            <p><strong>PATHWAYS CONSULTING SRL</strong> prelucrează datele dumneavoastră personale în scopuri legitime
                directe sau conexe activității de prestare a serviciilor de coachings consultanta și pentru îndeplinirea
                obligațiilor legale ce ne sunt impuse. Vă informăm, cu titlu de exemplu, despre câteva dintre procesele
                de prelucrare a datelor pe care PATHWAYS CONSULTING le poate efectua:</p>
            <ol style="padding-left:30px; padding-top: 10px; padding-bottom: 10px;">
                <li><p>Colectarea, înregistrarea, păstrarea, vizualizarea datelor în vederea dezvoltarii functionalitatilor pe care clientii nostri le pot primi prin intermediul siteului nostru</p></li>
                <li><p>Mesajele transmise de catre dvs pot fi vizualizate in scopul imbunatatirii siteului nostru</p></li>
                <li><p>Asistenta pentru conturile de coachee sau de Coach, in cazul in care o situatia o impune</p></li>
            </ol>
            <h4>Linkuri către alte website-uri</h4>
            <p>Website-ul nostru poate furniza linkuri către website-uri partenere sau externe. După ce accesati un link al unei terțe părți, veți fi direcționat(ă) către website-ul respective, si va veti raporta la politicile lor privind confidențialitatea, noi nu suntem responsabili pentru continut acestor companii terte.</p>
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