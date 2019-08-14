@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
     <!-- Breadcrumb -->
 <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>CV-thèque</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liste des CV</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->
<!-- Job Listing -->
<div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row no-gutters">
          <div class="col">
            <div class="job-listing-container">
              <div class="filtered-job-listing-wrapper">
                <div class="job-view-controller-wrapper">
                  <div class="job-view-controller">
                    <div class="controller list active">
                      <i data-feather="menu"></i>
                    </div>
                    <div class="controller grid">
                      <i data-feather="grid"></i>
                    </div>
                    <div class="controller"  id="actualise">
                      <i data-feather="rotate-cw" ></i>
                    </div>
                  </div>
                </div>
            
              <div id="job-filter-result" class="job-filter-result">
                  @foreach($cv as $c)
                  <div class="job-list">
                    <div class="thumb">
                      <a href="#">
                      <img class="image" src="{{asset('images')}}/{{ $c->photoUrl }}" onerror="this.src='images/briefcase.png';">
                      </a>
                    </div>

                    <div class="body">
                      <div class="content">
                        <h4><a href="{{route('cv-theque.detail', $c->id_cand)}}">Ref: {{$c->id_cand}}</a></h4>
                        <div class="info">
                          <span class="company"><a href="#"><i data-feather="briefcase"></i>{{$c->domaine_etude}}</a></span>
                          <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$c->residence}}</a></span>
                        </div>
                      </div>
                    </div> 
                  </div>
                  @endforeach
                </div>
                <div id="job-filter-result-0" class="job-filter-result" style="display: none">
                </div><br>
                <div>
                  <nav class="navigation pagination">
                    <div class="nav-links">
                    <div>{{$cv->links()}}</div>
                    </div>
                  </nav>                
                </div>
              </div>
              <div class="job-filter-wrapper">
                <div class="job-filter-dropdown same-pad category">
                  <select onchange="search()" id="domaine" class="selectpicker">
                  <option value="" selected>Domaine d'études</option>
                  <option  value="administration" class="administration">Administration</option>
				    					    		<option  value="assurance-qualite" class="assurance-qualite">Assurance qualité</option>
				    					    		<option  value="banque" class="banque">Banque</option>
				    					    		<option  value="construction" class="construction">Construction</option>
				    					    		<option  value="commercial" class="commercial">Commercial</option>
				    					    		<option  value="communication" class="communication">Communication</option>
				    					    		<option  value="comptabilite-finance" class="comptabilite-finance">Comptabilité / Finance</option>
				    					    		<option  value="conseil" class="conseil">Conseil</option>
				    					    		<option  value="econometrie" class="econometrie">Econométrie</option>
				    					    		<option  value="education-formation" class="education-formation">Education / Formation</option>
				    					    		<option  value="finance-banque" class="finance-banque">Finance/ Banque</option>
				    					    		<option  value="gestion" class="gestion">Gestion</option>
				    					    		<option  value="gestion-de-projets" class="gestion-de-projets">Gestion de projets</option>
				    					    		<option  value="gestion-des-comptes" class="gestion-des-comptes">Gestion des comptes</option>
				    					    		<option  value="hotellerie" class="hotellerie">Hôtellerie</option>
				    					    		<option  value="ingenierie" class="ingenierie">Ingénierie</option>
				    					    		<option  value="it-logiciel" class="it-logiciel">IT / Logiciel</option>
				    					    		<option  value="juridique" class="juridique">Juridique</option>
				    					    		<option  value="logistique" class="logistique">Logistique</option>
				    					    		<option  value="management-dorganisation" class="management-dorganisation">Management d'organisation</option>
				    					    		<option  value="marketing" class="marketing">Marketing</option>
				    					    		<option  value="metier-qualifie" class="metier-qualifie">Métier qualifié</option>
				    					    		<option  value="maintenance-reparation" class="maintenance-reparation">Maintenance / Réparation</option>
				    					    		<option  value="production" class="production">Production</option>
				    					    		<option  value="ressources-humaines" class="ressources-humaines">Ressources humaines</option>
				    					    		<option  value="redaction-edition" class="redaction-edition">Rédaction / Edition</option>
				    					    		<option  value="risque-management" class="risque-management">Risque / Management</option>
				    					    		<option  value="sante" class="sante">Santé</option>
				    					    		<option  value="sciences-technologie" class="sciences-technologie">Sciences / Technologie</option>
				    					    		<option  value="sciences-politiques" class="sciences-politiques">Sciences politiques</option>
				    					    		<option  value="sciences-sociales" class="sciences-sociales">Sciences sociales</option>
				    					    		<option  value="securite" class="securite">Sécurité</option>
				    					    		<option  value="service-client" class="service-client">Service client</option>
				    					    		<option  value="statistiques" class="statistiques">Statistiques</option>
				    					    		<option  value="traduction" class="traduction">Traduction</option>
				    					    		<option  value="ventes" class="ventes">Ventes</option>
				    					    		<option  value="autre" class="autre">Autre</option>

                  </select>
                </div>
                <div class="job-filter-dropdown same-pad location">
                  <select onchange="search()" id ="residence" class="selectpicker">
                    <option value="" selected>Localisation</option>
                  	<option  value="afghanistan" class="afghanistan">Afghanistan</option>
				    					    		<option  value="afrique-du-sud" class="afrique-du-sud">Afrique du Sud</option>
				    					    		<option  value="albanie" class="albanie">Albanie</option>
				    					    		<option  value="algerie" class="algerie">Algérie</option>
				    					    		<option  value="allemagne" class="allemagne">Allemagne</option>
				    					    		<option  value="andorre" class="andorre">Andorre</option>
				    					    		<option  value="angola" class="angola">Angola</option>
				    					    		<option  value="antigua-et-barbuda" class="antigua-et-barbuda">Antigua-et-Barbuda</option>
				    					    		<option  value="arabie-saoudite" class="arabie-saoudite">Arabie Saoudite</option>
				    					    		<option  value="argentine" class="argentine">Argentine</option>
				    					    		<option  value="armenie" class="armenie">Arménie</option>
				    					    		<option  value="aruba" class="aruba">Aruba</option>
				    					    		<option  value="australie" class="australie">Australie</option>
				    					    		<option  value="autriche" class="autriche">Autriche</option>
				    					    		<option  value="azerbaidjan" class="azerbaidjan">Azerbaïdjan</option>
				    					    		<option  value="bahamas" class="bahamas">Bahamas</option>
				    					    		<option  value="bahrein" class="bahrein">Bahreïn</option>
				    					    		<option  value="bangladesh" class="bangladesh">Bangladesh</option>
				    					    		<option  value="barbade" class="barbade">Barbade</option>
				    					    		<option  value="belgique" class="belgique">Belgique</option>
				    					    		<option  value="belize" class="belize">Belize</option>
				    					    		<option  value="bermudes" class="bermudes">Bermudes</option>
				    					    		<option  value="benin" class="benin">Bénin</option>
				    					    		<option  value="bhoutan" class="bhoutan">Bhoutan</option>
				    					    		<option  value="bielorussie" class="bielorussie">Biélorussie</option>
				    					    		<option  value="birmanie" class="birmanie">Birmanie</option>
				    					    		<option  value="bolivie" class="bolivie">Bolivie</option>
				    					    		<option  value="bosnie-herzegovine" class="bosnie-herzegovine">Bosnie-Herzégovine</option>
				    					    		<option  value="botswana" class="botswana">Botswana</option>
				    					    		<option  value="bresil" class="bresil">Brésil</option>
				    					    		<option  value="brunei" class="brunei">Brunéi</option>
				    					    		<option  value="bulgarie" class="bulgarie">Bulgarie</option>
				    					    		<option  value="burkina-faso" class="burkina-faso">Burkina Faso</option>
				    					    		<option  value="burundi" class="burundi">Burundi</option>
				    					    		<option  value="cambodge" class="cambodge">Cambodge</option>
				    					    		<option  value="cameroun" class="cameroun">Cameroun</option>
				    					    		<option  value="canada" class="canada">Canada</option>
				    					    		<option  value="cap-vert" class="cap-vert">Cap-vert</option>
				    					    		<option  value="chili" class="chili">Chili</option>
				    					    		<option  value="chine" class="chine">Chine</option>
				    					    		<option  value="chypre" class="chypre">Chypre</option>
				    					    		<option  value="colombie" class="colombie">Colombie</option>
				    					    		<option  value="comores" class="comores">Comores</option>
				    					    		<option  value="congo-brazaville" class="congo-brazaville">Congo Brazaville</option>
				    					    		<option  value="congo-kinshasa" class="congo-kinshasa">Congo Kinshasa</option>
				    					    		<option  value="coree-du-nord" class="coree-du-nord">Corée du Nord</option>
				    					    		<option  value="coree-du-sud" class="coree-du-sud">Corée du Sud</option>
				    					    		<option  value="costa-rica" class="costa-rica">Costa Rica</option>
				    					    		<option  value="cote-divoire" class="cote-divoire">Côte d'Ivoire</option>
				    					    		<option  value="croatie" class="croatie">Croatie</option>
				    					    		<option  value="cuba" class="cuba">Cuba</option>
				    					    		<option  value="danemark" class="danemark">Danemark</option>
				    					    		<option  value="djibouti" class="djibouti">Djibouti</option>
				    					    		<option  value="dominique" class="dominique">Dominique</option>
				    					    		<option  value="el-salvador" class="el-salvador">El Salvador</option>
				    					    		<option  value="espagne" class="espagne">Espagne</option>
				    					    		<option  value="estonie" class="estonie">Estonie</option>
				    					    		<option  value="egypte" class="egypte">Égypte</option>
				    					    		<option  value="emirats-arabes-unis" class="emirats-arabes-unis">Émirats Arabes Unis</option>
				    					    		<option  value="equateur" class="equateur">Équateur</option>
				    					    		<option  value="erythree" class="erythree">Érythrée</option>
				    					    		<option  value="etats-unis" class="etats-unis">États-Unis</option>
				    					    		<option  value="ethiopie" class="ethiopie">Éthiopie</option>
				    					    		<option  value="fidji" class="fidji">Fidji</option>
				    					    		<option  value="finlande" class="finlande">Finlande</option>
				    					    		<option  value="france" class="france">France</option>
				    					    		<option  value="gabon" class="gabon">Gabon</option>
				    					    		<option  value="gambie" class="gambie">Gambie</option>
				    					    		<option  value="georgie" class="georgie">Géorgie</option>
				    					    		<option  value="ghana" class="ghana">Ghana</option>
				    					    		<option  value="gibraltar" class="gibraltar">Gibraltar</option>
				    					    		<option  value="grenade" class="grenade">Grenade</option>
				    					    		<option  value="grece" class="grece">Grèce</option>
				    					    		<option  value="groenland" class="groenland">Groenland</option>
				    					    		<option  value="guadeloupe" class="guadeloupe">Guadeloupe</option>
				    					    		<option  value="guatemala" class="guatemala">Guatemala</option>
				    					    		<option  value="guinee" class="guinee">Guinée</option>
				    					    		<option  value="guinee-equatoriale" class="guinee-equatoriale">Guinée Équatoriale</option>
				    					    		<option  value="guinee-bissau" class="guinee-bissau">Guinée-Bissau</option>
				    					    		<option  value="guyana" class="guyana">Guyana</option>
				    					    		<option  value="guyane-francaise" class="guyane-francaise">Guyane Française</option>
				    					    		<option  value="haiti" class="haiti">Haïti</option>
				    					    		<option  value="honduras" class="honduras">Honduras</option>
				    					    		<option  value="hong-kong" class="hong-kong">Hong-Kong</option>
				    					    		<option  value="hongrie" class="hongrie">Hongrie</option>
				    					    		<option  value="inde" class="inde">Inde</option>
				    					    		<option  value="indonesie" class="indonesie">Indonésie</option>
				    					    		<option  value="irak" class="irak">Irak</option>
				    					    		<option  value="iran" class="iran">Iran</option>
				    					    		<option  value="irlande" class="irlande">Irlande</option>
				    					    		<option  value="islande" class="islande">Islande</option>
				    					    		<option  value="israel" class="israel">Israël</option>
				    					    		<option  value="italie" class="italie">Italie</option>
				    					    		<option  value="iles-caimanes" class="iles-caimanes">Îles Caïmanes</option>
				    					    		<option  value="iles-cook" class="iles-cook">Îles Cook</option>
				    					    		<option  value="iles-feroe" class="iles-feroe">Îles Féroé</option>
				    					    		<option  value="jamaique" class="jamaique">Jamaïque</option>
				    					    		<option  value="japon" class="japon">Japon</option>
				    					    		<option  value="jordanie" class="jordanie">Jordanie</option>
				    					    		<option  value="kazakhstan" class="kazakhstan">Kazakhstan</option>
				    					    		<option  value="kenya" class="kenya">Kenya</option>
				    					    		<option  value="kirghizistan" class="kirghizistan">Kirghizistan</option>
				    					    		<option  value="kiribati" class="kiribati">Kiribati</option>
				    					    		<option  value="koweit" class="koweit">Koweït</option>
				    					    		<option  value="laos" class="laos">Laos</option>
				    					    		<option  value="lesotho" class="lesotho">Lesotho</option>
				    					    		<option  value="lettonie" class="lettonie">Lettonie</option>
				    					    		<option  value="liban" class="liban">Liban</option>
				    					    		<option  value="liberia" class="liberia">Libéria</option>
				    					    		<option  value="libye" class="libye">Libye</option>
				    					    		<option  value="liechtenstein" class="liechtenstein">Liechtenstein</option>
				    					    		<option  value="lituanie" class="lituanie">Lituanie</option>
				    					    		<option  value="luxembourg" class="luxembourg">Luxembourg</option>
				    					    		<option  value="macao" class="macao">Macao</option>
				    					    		<option  value="macedoine" class="macedoine">Macédoine</option>
				    					    		<option  value="madagascar" class="madagascar">Madagascar</option>
				    					    		<option  value="malaisie" class="malaisie">Malaisie</option>
				    					    		<option  value="malawi" class="malawi">Malawi</option>
				    					    		<option  value="maldives" class="maldives">Maldives</option>
				    					    		<option  value="mali" class="mali">Mali</option>
				    					    		<option  value="malouines" class="malouines">Malouines</option>
				    					    		<option  value="malte" class="malte">Malte</option>
				    					    		<option  value="maroc" class="maroc">Maroc</option>
				    					    		<option  value="martinique" class="martinique">Martinique</option>
				    					    		<option  value="maurice" class="maurice">Maurice</option>
				    					    		<option  value="mauritanie" class="mauritanie">Mauritanie</option>
				    					    		<option  value="mayotte" class="mayotte">Mayotte</option>
				    					    		<option  value="mexique" class="mexique">Mexique</option>
				    					    		<option  value="moldovie" class="moldovie">Moldovie</option>
				    					    		<option  value="monaco" class="monaco">Monaco</option>
				    					    		<option  value="mongolie" class="mongolie">Mongolie</option>
				    					    		<option  value="mozambique" class="mozambique">Mozambique</option>
				    					    		<option  value="namibie" class="namibie">Namibie</option>
				    					    		<option  value="nauru" class="nauru">Nauru</option>
				    					    		<option  value="nepal" class="nepal">Népal</option>
				    					    		<option  value="nicaragua" class="nicaragua">Nicaragua</option>
				    					    		<option  value="niger" class="niger">Niger</option>
				    					    		<option  value="nigeria" class="nigeria">Nigéria</option>
				    					    		<option  value="niue" class="niue">Niué</option>
				    					    		<option  value="norvege" class="norvege">Norvège</option>
				    					    		<option  value="nouvelle-caledonie" class="nouvelle-caledonie">Nouvelle-Calédonie</option>
				    					    		<option  value="nouvelle-zelande" class="nouvelle-zelande">Nouvelle-Zélande</option>
				    					    		<option  value="oman" class="oman">Oman</option>
				    					    		<option  value="ouganda" class="ouganda">Ouganda</option>
				    					    		<option  value="ouzbekistan" class="ouzbekistan">Ouzbékistan</option>
				    					    		<option  value="pakistan" class="pakistan">Pakistan</option>
				    					    		<option  value="palaos" class="palaos">Palaos</option>
				    					    		<option  value="palestine" class="palestine">Palestine</option>
				    					    		<option  value="panama" class="panama">Panama</option>
				    					    		<option  value="papouasie-nouvelle-guinee" class="papouasie-nouvelle-guinee">Papouasie-Nouvelle-Guinée</option>
				    					    		<option  value="paraguay" class="paraguay">Paraguay</option>
				    					    		<option  value="pays-bas" class="pays-bas">Pays-Bas</option>
				    					    		<option  value="perou" class="perou">Pérou</option>
				    					    		<option  value="philippines" class="philippines">Philippines</option>
				    					    		<option  value="pologne" class="pologne">Pologne</option>
				    					    		<option  value="polynesie-francaise" class="polynesie-francaise">Polynésie Française</option>
				    					    		<option  value="porto-rico" class="porto-rico">Porto Rico</option>
				    					    		<option  value="portugal" class="portugal">Portugal</option>
				    					    		<option  value="qatar" class="qatar">Qatar</option>
				    					    		<option  value="republique-centrafricaine" class="republique-centrafricaine">République Centrafricaine</option>
				    					    		<option  value="republique-dominicaine" class="republique-dominicaine">République Dominicaine</option>
				    					    		<option  value="republique-tcheque" class="republique-tcheque">République Tchèque</option>
				    					    		<option  value="reunion" class="reunion">Réunion</option>
				    					    		<option  value="roumanie" class="roumanie">Roumanie</option>
				    					    		<option  value="royaume-uni" class="royaume-uni">Royaume-Uni</option>
				    					    		<option  value="russie" class="russie">Russie</option>
				    					    		<option  value="rwanda" class="rwanda">Rwanda</option>
				    					    		<option  value="salomon" class="salomon">Salomon</option>
				    					    		<option  value="samoa" class="samoa">Samoa</option>
				    					    		<option  value="samoa-americaines" class="samoa-americaines">Samoa Américaines</option>
				    					    		<option  value="sao-tome-et-principe" class="sao-tome-et-principe">Sao Tomé-et-Principe</option>
				    					    		<option  value="serbie" class="serbie">Serbie</option>
				    					    		<option  value="seychelles" class="seychelles">Seychelles</option>
				    					    		<option  value="senegal" class="senegal">Sénégal</option>
				    					    		<option  value="sierra-leone" class="sierra-leone">Sierra Leone</option>
				    					    		<option  value="singapour" class="singapour">Singapour</option>
				    					    		<option  value="slovaquie" class="slovaquie">Slovaquie</option>
				    					    		<option  value="slovenie" class="slovenie">Slovénie</option>
				    					    		<option  value="somalie" class="somalie">Somalie</option>
				    					    		<option  value="soudan" class="soudan">Soudan</option>
				    					    		<option  value="soudan-du-sud" class="soudan-du-sud">Soudan du Sud</option>
				    					    		<option  value="sri-lanka" class="sri-lanka">Sri Lanka</option>
				    					    		<option  value="suede" class="suede">Suède</option>
				    					    		<option  value="suisse" class="suisse">Suisse</option>
				    					    		<option  value="suriname" class="suriname">Suriname</option>
				    					    		<option  value="swaziland" class="swaziland">Swaziland</option>
				    					    		<option  value="syrie" class="syrie">Syrie</option>
				    					    		<option  value="tadjikistan" class="tadjikistan">Tadjikistan</option>
				    					    		<option  value="taiwan" class="taiwan">Taïwan</option>
				    					    		<option  value="tanzanie" class="tanzanie">Tanzanie</option>
				    					    		<option  value="tchad" class="tchad">Tchad</option>
				    					    		<option  value="thailande" class="thailande">Thaïlande</option>
				    					    		<option  value="timor-oriental" class="timor-oriental">Timor Oriental</option>
				    					    		<option  value="togo" class="togo">Togo</option>
				    					    		<option  value="tonga" class="tonga">Tonga</option>
				    					    		<option  value="trinite-et-tobago" class="trinite-et-tobago">Trinité-et-Tobago</option>
				    					    		<option  value="tunisie" class="tunisie">Tunisie</option>
				    					    		<option  value="turkmenistan" class="turkmenistan">Turkménistan</option>
				    					    		<option  value="turquie" class="turquie">Turquie</option>
				    					    		<option  value="tuvalu" class="tuvalu">Tuvalu</option>
				    					    		<option  value="ukraine" class="ukraine">Ukraine</option>
				    					    		<option  value="uruguay" class="uruguay">Uruguay</option>
				    					    		<option  value="vanuatu" class="vanuatu">Vanuatu</option>
				    					    		<option  value="venezuela" class="venezuela">Venezuela</option>
				    					    		<option  value="viet-nam" class="viet-nam">Viet Nam</option>
				    					    		<option  value="yemen" class="yemen">Yémen</option>
				    					    		<option  value="zambie" class="zambie">Zambie</option>
				    					    		<option  value="zimbabwe" class="zimbabwe">Zimbabwe</option> 
                  </select>
                </div>
              
                <div class="job-filter-dropdown same-pad location">
                  <select onchange="search()" id ="experience" class="selectpicker">
                  <option value="" selected>Années d'expérience</option>
                      <option  value="jeune-diplome-0-a-1an" class="jeune-diplome-0-a-1an">Jeune diplômé (0 à 1 an)</option>
				    					<option  value="debutant-1-a-3ans" class="debutant-1-a-3ans">Débutant (1 à 3 ans)</option>
				    					<option  value="3-a-5-ans" class="3-a-5-ans">3 à 5 ans</option>
				    					<option  value="5-a-10-ans" class="5-a-10-ans">5 à 10 ans</option>
				    					<option  value="10-a-15-ans" class="10-a-15-ans">10 à 15 ans</option>
                      <option  value="15-ans-et-plus" class="15-ans-et-plus">15 ans et plus</option>
                      
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Job Listing End -->

    <script>
    var cv = {!! json_encode($cv) !!};
    console.log(cv.data);
     var data = cv.data;
     var res = [];
     var default_ = document.getElementById("job-filter-result");
     var result = document.getElementById("job-filter-result-0");
     var domaine =  document.getElementById("domaine");
     var residence =  document.getElementById("residence");
     var experience =  document.getElementById("experience");
     var actual = document.getElementById("actualise");

     function search(){
       res = []
       var d = domaine.value;
       var r = residence.value; 
       var e = experience.value; 
       var exit = false;
      console.log(d);
      console.log(r);
      console.log(e);
        for(var i=0; i<data.length; i++){
          if(d == data[i].domaine_etude  ){
            exit = false;
            for(var j=0; j<res.length; j++){
              if(res[j].id == data[i].id){
                exit = true;
                break;
              }
            }
            if(exit == false){
              res.push(data[i]);
            }
          }
          if( r == data[i].residence  ){
            exit = false;
            for(var j=0; j<res.length; j++){
              if(res[j].id == data[i].id){
                exit = true;
                break;
              }
            }
            if(exit == false){
              res.push(data[i]);
            }
              
          }
          if(  e == data[i].annee_exp ){
            exit = false;
            for(var j=0; j<res.length; j++){
              if(res[j].id == data[i].id){
                exit = true;
                break;
              }
            }
            if(exit == false){
              res.push(data[i]);
            } 
          }
        }

      console.log(res);
      if(res.length>0){
        default_.style.display= 'none';
        result.style.display= 'block';
        result.innerHTML ='';
        for(var j=0; j<res.length; j++){
          result.innerHTML += '<div class="job-list"><div class="thumb"><a href="#"><img class="image" src="/images/'+res[j].photoUrl+'" onerror=this.src="/images/briefcase.png";></a></div><div class="body"><div class="content"><h4><a href="/cv-theque/detail/'+res[j].id_cand+'">Ref: '+res[j].id_cand+'</a></h4><div class="info"><span class="company"><a href="#"><i data-feather="briefcase"></i>'+res[j].domaine_etude+'</a></span><span class="office-location"><a href="#"><i data-feather="map-pin"></i>'+res[j].residence+'</a></span></div></div></div></div>'
        }
      }
    }
    actual.addEventListener('click', function() {
        window.location.reload();
    })
    </script>
@endsection

