@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('candidat.breadcrumb')
<div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
	  @if (session('status'))
          <div id="jy-alert" class="jy-alert success-alert">
          {{ session('status') }}
          </div><br>
         @endif
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
			
              <div class="dashboard-content-wrapper">
              <div class="dashboard-content-wrapper">
              <form  method="POST" action="{{ route('cand_update') }}" class="dashboard-form" enctype="multipart/form-data">
              @csrf
                <div class="dashboard-section upload-profile-photo">
                  <div class="update-photo">
                    <img class="image" src="{{asset('images')}}/{{ Auth::user()->photoUrl }}" onerror="this.src='{{asset('images/briefcase.png')}}'">
                  </div>
                  <div class="file-upload">            
                    <input type="file" name="image[]" class="file-input">Changer
                  </div>
                </div>
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>Vos Infos</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nom complet</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name ='name' value="{{ Auth::user()->name }}" placeholder="Nom complet">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Adresse Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name ='email' value="{{ Auth::user()->email }}" placeholder="email@example.com">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Téléphone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="tel" value="{{ Auth::user()->tel }}" placeholder="telephone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Adresse</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="adresse" value="{{ Auth::user()->adresse }}" placeholder="Adresse">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Ville</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name ='ville' value="{{ Auth::user()->ville }}" required placeholder="Ville">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pays</label>
                      <div class="col-sm-9">
                        <select class="form-control" name ='pays' required>
                        <option>{{ Auth::user()->pays }}</option>
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
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Domaine </label>
                      <div class="col-sm-9">
                        
                        <select class="form-control" name="secteur">
				    	                <option value="{{ Auth::user()->secteur }}">{{ Auth::user()->secteur }}</option>
				    					    		<option  value="administration-publique" class="administration-publique">Administration publique</option>
				    					    		<option  value="aeronautique" class="aeronautique">Aéronautique</option>
				    					    		<option  value="agriculture" class="agriculture">Agriculture</option>
				    					    		<option  value="agriculture-tropicale-et-subtropicale" class="agriculture-tropicale-et-subtropicale">Agriculture tropicale et subtropicale</option>
				    					    		<option  value="agronomie" class="agronomie">Agronomie</option>
				    					    		<option  value="amenagement-du-territoire-et-developpement" class="amenagement-du-territoire-et-developpement">Aménagement du territoire et développement</option>
				    					    		<option  value="anthropologie" class="anthropologie">Anthropologie</option>
				    					    		<option  value="archeologie" class="archeologie">Archéologie</option>
				    					    		<option  value="architecture" class="architecture">Architecture</option>
				    					    		<option  value="architecture-dinterieur" class="architecture-dinterieur">Architecture d’intérieur</option>
				    					    		<option  value="architecture-paysagere" class="architecture-paysagere">Architecture paysagère</option>
				    					    		<option  value="arts-sceniques" class="arts-sceniques">Arts scéniques</option>
				    					    		<option  value="assistance-sociale" class="assistance-sociale">Assistance sociale</option>
				    					    		<option  value="astronomie-astrophysique" class="astronomie-astrophysique">Astronomie, astrophysique</option>
				    					    		<option  value="audit-et-controle-de-gestion" class="audit-et-controle-de-gestion">Audit et Contrôle de gestion</option>
				    					    		<option  value="banque-finances-assurances" class="banque-finances-assurances">Banque /Finances /Assurances</option>
				    					    		<option  value="beaux-arts-peinture-sculpture-gravure" class="beaux-arts-peinture-sculpture-gravure">Beaux-arts (peinture, sculpture, gravure)</option>
				    					    		<option  value="biochimie" class="biochimie">Biochimie</option>
				    					    		<option  value="biologie" class="biologie">Biologie</option>
				    					    		<option  value="chimie" class="chimie">Chimie</option>
				    					    		<option  value="comptabilite-et-gestion-financiere" class="comptabilite-et-gestion-financiere">Comptabilité et gestion financière</option>
				    					    		<option  value="conservateur-de-musee" class="conservateur-de-musee">Conservateur de musée</option>
				    					    		<option  value="dentisterie" class="dentisterie">Dentisterie</option>
				    					    		<option  value="design-conception-graphique-conception-industrielle-mode-textiles" class="design-conception-graphique-conception-industrielle-mode-textiles">Design (conception graphique, conception industrielle, mode, textiles)</option>
				    					    		<option  value="dietetique-et-technologies-des-produits-alimentaires" class="dietetique-et-technologies-des-produits-alimentaires">Diététique et technologies des produits alimentaires</option>
				    					    		<option  value="diffusion-radiotelevision" class="diffusion-radiotelevision">Diffusion radio/télévision</option>
				    					    		<option  value="documentaliste-archiviste" class="documentaliste-archiviste">Documentaliste-archiviste</option>
				    					    		<option  value="droit-civil-y-compris-droit-de-la-propriete" class="droit-civil-y-compris-droit-de-la-propriete">Droit civil (y compris droit de la propriété)</option>
				    					    		<option  value="droit-communautaire-europeen" class="droit-communautaire-europeen">Droit communautaire européen</option>
				    					    		<option  value="droit-communautaire-ohada" class="droit-communautaire-ohada">Droit communautaire ohada</option>
				    					    		<option  value="droit-compare-droits-et-langues" class="droit-compare-droits-et-langues">Droit comparé, droits et langues</option>
				    					    		<option  value="droit-constitutionnel-et-public" class="droit-constitutionnel-et-public">Droit constitutionnel et public</option>
				    					    		<option  value="droit-international" class="droit-international">Droit international</option>
				    					    		<option  value="droit-penal-et-criminologie" class="droit-penal-et-criminologie">Droit pénal et criminologie</option>
				    					    		<option  value="economie-y-compris-etudes-de-cooperation-economique" class="economie-y-compris-etudes-de-cooperation-economique">Économie (y compris études de coopération économique)</option>
				    					    		<option  value="economie-agricole" class="economie-agricole">Économie agricole</option>
				    					    		<option  value="economie-domestique-nutrition" class="economie-domestique-nutrition">Économie domestique, nutrition</option>
				    					    		<option  value="education-physique-et-sportive" class="education-physique-et-sportive">Éducation physique et sportive</option>
				    					    		<option  value="elevage" class="elevage">Élevage</option>
				    					    		<option  value="enseignement-primaire" class="enseignement-primaire">Enseignement primaire</option>
				    					    		<option  value="enseignement-secondaire" class="enseignement-secondaire">Enseignement secondaire</option>
				    					    		<option  value="enseignement-special" class="enseignement-special">Enseignement spécial</option>
				    					    		<option  value="enseignement-technique-et-professionnel" class="enseignement-technique-et-professionnel">Enseignement technique et professionnel</option>
				    					    		<option  value="etude-des-transports-et-des-communications" class="etude-des-transports-et-des-communications">Étude des transports et des communications</option>
				    					    		<option  value="etude-du-sol-et-de-leau" class="etude-du-sol-et-de-leau">Étude du sol et de l’eau</option>
				    					    		<option  value="etudes-dinfirmiere-obstetrique-physiotherapie" class="etudes-dinfirmiere-obstetrique-physiotherapie">Études d’infirmière, obstétrique, physiothérapie</option>
				    					    		<option  value="etudes-de-bibliothecaire" class="etudes-de-bibliothecaire">Études de bibliothécaire</option>
				    					    		<option  value="etudes-de-secretariat-assistanat-de-direction" class="etudes-de-secretariat-assistanat-de-direction">Études de secrétariat /Assistanat de Direction</option>
				    					    		<option  value="etudes-du-developpement-durable" class="etudes-du-developpement-durable">Études du développement durable</option>
				    					    		<option  value="fabrication-cao-fao-iao-et-sciences-appliquees" class="fabrication-cao-fao-iao-et-sciences-appliquees">Fabrication (CAO, FAO, IAO) et sciences appliquées</option>
				    					    		<option  value="formation-des-adultes" class="formation-des-adultes">Formation des adultes</option>
				    					    		<option  value="formation-des-enseignants" class="formation-des-enseignants">Formation des enseignants</option>
				    					    		<option  value="geodesie-cartographie-teledetection" class="geodesie-cartographie-teledetection">Géodésie, cartographie, télédétection</option>
				    					    		<option  value="geographie" class="geographie">Géographie</option>
				    					    		<option  value="geologie" class="geologie">Géologie</option>
				    					    		<option  value="gestion-dentreprises" class="gestion-dentreprises">Gestion d’entreprises</option>
				    					    		<option  value="histoire" class="histoire">Histoire</option>
				    					    		<option  value="histoire-de-lart" class="histoire-de-lart">Histoire de l’art</option>
				    					    		<option  value="horticulture" class="horticulture">Horticulture</option>
				    					    		<option  value="informatique" class="informatique">Informatique</option>
				    					    		<option  value="ingenierie-chimique" class="ingenierie-chimique">Ingénierie chimique</option>
				    					    		<option  value="ingenierie-electrique" class="ingenierie-electrique">Ingénierie électrique</option>
				    					    		<option  value="ingenierie-electronique-telecommunications" class="ingenierie-electronique-telecommunications">Ingénierie électronique, télécommunications</option>
				    					    		<option  value="ingenierie-mecanique" class="ingenierie-mecanique">Ingénierie mécanique</option>
				    					    		<option  value="ingenierie-ou-genie-civile-genie-rurale" class="ingenierie-ou-genie-civile-genie-rurale">Ingénierie ou génie civile /génie rurale</option>
				    					    		<option  value="intelligence-artificielle" class="intelligence-artificielle">Intelligence artificielle</option>
				    					    		<option  value="journalisme" class="journalisme">Journalisme</option>
				    					    		<option  value="langues-etrangeres" class="langues-etrangeres">Langues étrangères</option>
				    					    		<option  value="linguistique" class="linguistique">Linguistique</option>
				    					    		<option  value="litterature-generale-et-comparee" class="litterature-generale-et-comparee">Littérature générale et comparée</option>
				    					    		<option  value="logistique-supply-chain-management" class="logistique-supply-chain-management">Logistique / Supply chain Management</option>
				    					    		<option  value="loisirs" class="loisirs">Loisirs</option>
				    					    		<option  value="management-des-ressources-humaines" class="management-des-ressources-humaines">Management des ressources humaines</option>
				    					    		<option  value="management-organisation" class="management-organisation">Management, Organisation</option>
				    					    		<option  value="marketing-des-achats" class="marketing-des-achats">Marketing des achats</option>
				    					    		<option  value="marketing-commerce-gestion-des-ventes" class="marketing-commerce-gestion-des-ventes">Marketing, Commerce, gestion des ventes</option>
				    					    		<option  value="mathematiques" class="mathematiques">Mathématiques</option>
				    					    		<option  value="medecine-et-epidemiologie" class="medecine-et-epidemiologie">Médecine et épidémiologie</option>
				    					    		<option  value="medecine-veterinaire" class="medecine-veterinaire">Médecine vétérinaire</option>
				    					    		<option  value="meteorologie" class="meteorologie">Météorologie</option>
				    					    		<option  value="microbiologie-biotechnologie" class="microbiologie-biotechnologie">Microbiologie, biotechnologie</option>
				    					    		<option  value="musique-et-musicologie" class="musique-et-musicologie">Musique et musicologie</option>
				    					    		<option  value="oceanographie" class="oceanographie">Océanographie</option>
				    					    		<option  value="pedagogie-et-enseignement-comparatif" class="pedagogie-et-enseignement-comparatif">Pédagogie et enseignement comparatif</option>
				    					    		<option  value="pharmacie" class="pharmacie">Pharmacie</option>
				    					    		<option  value="philologie-classique" class="philologie-classique">Philologie classique</option>
				    					    		<option  value="philosophie" class="philosophie">Philosophie</option>
				    					    		<option  value="photographie-cinematographie" class="photographie-cinematographie">Photographie, cinématographie</option>
				    					    		<option  value="physique" class="physique">Physique</option>
				    					    		<option  value="physique-nucleaire-et-physique-des-hautes-energies" class="physique-nucleaire-et-physique-des-hautes-energies">Physique nucléaire et physique des hautes énergies</option>
				    					    		<option  value="pisciculture" class="pisciculture">Pisciculture</option>
				    					    		<option  value="psychiatrie-et-psychologie-clinique" class="psychiatrie-et-psychologie-clinique">Psychiatrie et psychologie clinique</option>
				    					    		<option  value="psychologie-pedagogique" class="psychologie-pedagogique">Psychologie pédagogique</option>
				    					    		<option  value="psychologie-sciences-du-comportement" class="psychologie-sciences-du-comportement">Psychologie, sciences du comportement</option>
				    					    		<option  value="relations-industrielles-et-gestion-du-personnel" class="relations-industrielles-et-gestion-du-personnel">Relations industrielles et gestion du personnel</option>
				    					    		<option  value="relations-internationales-etudes-regionales-integration-regionale" class="relations-internationales-etudes-regionales-integration-regionale">Relations internationales, études régionales/ intégration régionale</option>
				    					    		<option  value="relations-publiques-publicite" class="relations-publiques-publicite">Relations publiques, publicité</option>
				    					    		<option  value="sante-publique" class="sante-publique">Santé publique</option>
				    					    		<option  value="science-des-materiaux" class="science-des-materiaux">Science des matériaux</option>
				    					    		<option  value="sciences-actuarielles" class="sciences-actuarielles">Sciences actuarielles</option>
				    					    		<option  value="sciences-de-lenvironnement-ecologie" class="sciences-de-lenvironnement-ecologie">Sciences de l’environnement, écologie</option>
				    					    		<option  value="sciences-nautiques-et-de-la-navigation" class="sciences-nautiques-et-de-la-navigation">Sciences nautiques et de la navigation</option>
				    					    		<option  value="sciences-politiques" class="sciences-politiques">Sciences politiques</option>
				    					    		<option  value="sociologie-y-compris-developpement-social" class="sociologie-y-compris-developpement-social">Sociologie (y compris développement social)</option>
				    					    		<option  value="statistiques" class="statistiques">Statistiques</option>
				    					    		<option  value="sylviculture" class="sylviculture">Sylviculture</option>
				    					    		<option  value="systeme-dinformation" class="systeme-dinformation">Système d’information</option>
				    					    		<option  value="technologies-medicales" class="technologies-medicales">Technologies médicales</option>
				    					    		<option  value="theologie" class="theologie">Théologie</option>
				    					    		<option  value="tourisme-restauration-et-gestion-dhotels" class="tourisme-restauration-et-gestion-dhotels">Tourisme, restauration et gestion d’hôtels</option>
				    					    		<option  value="traduction-interpretariat" class="traduction-interpretariat">Traduction, interprétariat</option>
				    					    		<option  value="transport" class="transport">Transport</option>
				    					    		<option  value="urbanisme-et-developpement" class="urbanisme-et-developpement">Urbanisme et développement</option>
				    					    		<option  value="autres" class="autres">Autres</option>
				    					    </select>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">À propos de Vous</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name ='description' placeholder="Présentez vous en quelques mots">{{ Auth::user()->description }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="dashboard-section basic-info-input">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button class="button">Enregistrer les Changements</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div>
                <form method="POST" action="{{ url('password_reset') }}" class="dashboard-form" >
                  @csrf
                  <h4><i data-feather="lock"></i>Changer votre Mot de passe</h4>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                    <input type="text" class="form-control" id="email" name="email" required placeholder="Email">
                  </div>

                  <div class="dashboard-section basic-info-input">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <button class="button">Changer</button>
                      </div>
                    </div>
                  </div>
                </form> 
              </div>
              </div>
              </div>
              @include('shared.cand-dash-menu')
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection