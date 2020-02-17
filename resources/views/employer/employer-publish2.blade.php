@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('employer.breadcrumb')
<div class="alice-bg section-padding-bottom">
      	<div class="container no-gliters">
        	<div class="row no-gliters">
          		<div class="col">
            		<div class="dashboard-container">
             			<div class="dashboard-content-wrapper">
               				<form  method="POST" action="{{ route('employeur.post') }}" class="dashboard-form job-post-form">
								{{-- <form class="dashboard-form job-post-form"> --}}
                			@csrf
                  				<div class="dashboard-section basic-info-input">
									<h4><i data-feather="user-check"></i>Publier une offre</h4><br>
									<h6>Entête du poste</h6><br>
                    				<div class="form-group row">
                      					<label class="col-md-3 col-form-label">Titre du poste</label>
                      					<div class="col-md-6">
                        					<input type="text" name ="titre" class="form-control" required placeholder="">
										</div><br>
									</div>
										<div class="row">
										<label class="col-md-3 col-form-label">Sommaire du poste</label>
										<div class="col-md-4">
											<div class="form-group">
												<select name ="type_contrat" class="form-control">
												    <option >Type de contrat</option>
													<option >CDI Temps plein</option>
													<option>CDI Temps partiel</option>
													<option>CDD Temps plein</option>
													<option>CDD Temps partiel</option>
												</select>
												<i class="fa fa-caret-down"></i>
											</div>
										</div>
											<div class="col-md-4">
											<div class="form-group">
												<input type="text" name ="salaire" class="form-control" required placeholder="Prétention salariale (fcfa)">
											</div>
										</div>
									</div><br>
									<div class="row">
											<label class="col-md-3 col-form-label"></label> 
											<div class="col-md-4">
												<div class="form-group datepicker">
													<input name ="date_exp" type="date" required class="form-control">
												</div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
												<select name="mobilite" class="form-control">
													<option value="">Mobilité liée au poste</option>
													<option value="oui">Oui</option>
													<option value="non">Non</option>
												</select>
												<i class="fa fa-caret-down"></i>
											</div>
										</div>
									</div><br>
								 <div class="row">
										<label class="col-md-3 col-form-label">Lieu du travail</label>
													<div class="col-md-6">
														<select multiple class="form-control" name="localisation[]" style="height:120px; font-size:12px;">
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
									</div><br><br>
                                
									<div class="row">
										<label class="col-md-3 col-form-label">Description du poste</label>
										<div class="col-md-9">
											<textarea id="mytextarea" name="description" class="tinymce-editor tinymce-editor-1" placeholder="Description text here"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-md-3 col-form-label">Responsabilités</label>
										<div class="col-md-9">
											<textarea id="mytextarea2" name="responsabilities" class="tinymce-editor tinymce-editor-2" placeholder="Responsibilities (Optional)"></textarea>
										</div>
									</div>
									<br>
									<br>
										<h6>Exigences requises</h6><br>
                    				<div class="row">
                     					<div class="col-md-12">
                         					<div class="row">
                         					    	<label class="col-md-3 col-form-label">Domaines de compétences</label>
												<div class="col-md-4">
													<div class="form-group">
														<select multiple name ="secteur[]" class="form-control" style="height: 120px">
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
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
															<ul id='stars_secteur'>
																<li class='star' title='Poor' data-value='1'>
																<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Fair' data-value='2'>
																<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Good' data-value='3'>
																<i class='fa fa-star fa-fw'></i>
																</li>
															</ul>
															<input type="text" name="val_secteur" id="val_secteur" style="display: none">
														</div>
													</section>
												</div>
													<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-ec" name="elim_secteur">
                                                        <label for="radio-ec">
                                                          <span class="dot"></span>Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
													<label class="col-md-3 col-form-label">Domaines d'études exigés</label>
												<div class="col-md-4">
													<div class="form-group">
														<select multiple name ="domaine_etude[]" class="form-control" style="height: 120px" required>
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
															<option  value="assistance-sociale" class="assistance-sociale">Assistance sociale</option>			    					    		<option  value="astronomie-astrophysique" class="astronomie-astrophysique">Astronomie, astrophysique</option>												<option  value="audit-et-controle-de-gestion" class="audit-et-controle-de-gestion">Audit et Contrôle de gestion</option>
															<option  value="banque-finances-assurances" class="banque-finances-assurances">Banque /Finances /Assurances</option>
															<option  value="beaux-arts-peinture-sculpture-gravure" class="beaux-arts-peinture-sculpture-gravure">Beaux-arts (peinture, sculpture, gravure)</option>
															<option  value="biochimie" class="biochimie">Biochimie</option>			    					    		<option  value="biologie" class="biologie">Biologie</option>
															<option  value="chimie" class="chimie">Chimie</option>
															<option  value="comptabilite-et-gestion-financiere" class="comptabilite-et-gestion-financiere">Comptabilité et gestion financière</option>
															<option  value="conservateur-de-musee" class="conservateur-de-musee">Conservateur de musée</option>
															<option  value="dentisterie" class="dentisterie">Dentisterie</option>
															<option  value="design-conception-graphique-conception-industrielle-mode-textiles" class="design-conception-graphique-conception-industrielle-mode-textiles">Design (conception graphique, conception industrielle, mode, textiles)</option>												<option  value="dietetique-et-technologies-des-produits-alimentaires" class="dietetique-et-technologies-des-produits-alimentaires">Diététique et technologies des produits alimentaires</option>
															<option  value="diffusion-radiotelevision" class="diffusion-radiotelevision">Diffusion radio/télévision</option>
															<option  value="documentaliste-archiviste" class="documentaliste-archiviste">Documentaliste-archiviste</option>
															<option  value="droit-civil-y-compris-droit-de-la-propriete" class="droit-civil-y-compris-droit-de-la-propriete">Droit civil (y compris droit de la propriété)</option>
															<option  value="droit-communautaire-europeen" class="droit-communautaire-europeen">Droit communautaire européen</option>
															<option  value="droit-communautaire-ohada" class="droit-communautaire-ohada">Droit communautaire ohada</option>			    					    		<option  value="droit-compare-droits-et-langues" class="droit-compare-droits-et-langues">Droit comparé, droits et langues</option>
															<option  value="droit-constitutionnel-et-public" class="droit-constitutionnel-et-public">Droit constitutionnel et public</option>
															<option  value="droit-international" class="droit-international">Droit international</option>
															<option  value="droit-penal-et-criminologie" class="droit-penal-et-criminologie">Droit pénal et criminologie</option>												<option  value="economie-y-compris-etudes-de-cooperation-economique" class="economie-y-compris-etudes-de-cooperation-economique">Économie (y compris études de coopération économique)</option>
															<option  value="economie-agricole" class="economie-agricole">Économie agricole</option>			    					    		<option  value="economie-domestique-nutrition" class="economie-domestique-nutrition">Économie domestique, nutrition</option>
															<option  value="education-physique-et-sportive" class="education-physique-et-sportive">Éducation physique et sportive</option>
															<option  value="elevage" class="elevage">Élevage</option>
															<option  value="enseignement-primaire" class="enseignement-primaire">Enseignement primaire</option>				    					    		<option  value="enseignement-secondaire" class="enseignement-secondaire">Enseignement secondaire</option>
															<option  value="enseignement-special" class="enseignement-special">Enseignement spécial</option>
															<option  value="enseignement-technique-et-professionnel" class="enseignement-technique-et-professionnel">Enseignement technique et professionnel</option>
															<option  value="etude-des-transports-et-des-communications" class="etude-des-transports-et-des-communications">Étude des transports et des communications</option>
															<option  value="etude-du-sol-et-de-leau" class="etude-du-sol-et-de-leau">Étude du sol et de l’eau</option>
															<option  value="etudes-dinfirmiere-obstetrique-physiotherapie" class="etudes-dinfirmiere-obstetrique-physiotherapie">Études d’infirmière, obstétrique, physiothérapie</option>
															<option  value="etudes-de-bibliothecaire" class="etudes-de-bibliothecaire">Études de bibliothécaire</option>
															<option  value="etudes-de-secretariat-assistanat-de-direction" class="etudes-de-secretariat-assistanat-de-direction">Études de secrétariat /Assistanat de Direction</option>
															<option  value="etudes-du-developpement-durable" class="etudes-du-developpement-durable">Études du développement durable</option>			    					    		<option  value="fabrication-cao-fao-iao-et-sciences-appliquees" class="fabrication-cao-fao-iao-et-sciences-appliquees">Fabrication (CAO, FAO, IAO) et sciences appliquées</option>
															<option  value="formation-des-adultes" class="formation-des-adultes">Formation des adultes</option>
															<option  value="formation-des-enseignants" class="formation-des-enseignants">Formation des enseignants</option>
															<option  value="geodesie-cartographie-teledetection" class="geodesie-cartographie-teledetection">Géodésie, cartographie, télédétection</option>
															<option  value="geographie" class="geographie">Géographie</option>			    					    		<option  value="geologie" class="geologie">Géologie</option>				    					    		<option  value="gestion-dentreprises" class="gestion-dentreprises">Gestion d’entreprises</option>
															<option  value="histoire" class="histoire">Histoire</option>
															<option  value="histoire-de-lart" class="histoire-de-lart">Histoire de l’art</option>
															<option  value="horticulture" class="horticulture">Horticulture</option>
															<option  value="informatique" class="informatique">Informatique</option>
															<option  value="ingenierie-chimique" class="ingenierie-chimique">Ingénierie chimique</option>
															<option  value="ingenierie-electrique" class="ingenierie-electrique">Ingénierie électrique</option>
															<option  value="ingenierie-electronique-telecommunications" class="ingenierie-electronique-telecommunications">Ingénierie électronique, télécommunications</option>
															<option  value="ingenierie-mecanique" class="ingenierie-mecanique">Ingénierie mécanique</option>												<option  value="ingenierie-ou-genie-civile-genie-rurale" class="ingenierie-ou-genie-civile-genie-rurale">Ingénierie ou génie civile /génie rurale</option>
															<option  value="intelligence-artificielle" class="intelligence-artificielle">Intelligence artificielle</option>
															<option  value="journalisme" class="journalisme">Journalisme</option>
															<option  value="langues-etrangeres" class="langues-etrangeres">Langues étrangères</option>
															<option  value="linguistique" class="linguistique">Linguistique</option>
															<option  value="litterature-generale-et-comparee" class="litterature-generale-et-comparee">Littérature générale et comparée</option>
															<option  value="logistique-supply-chain-management" class="logistique-supply-chain-management">Logistique / Supply chain Management</option>
															<option  value="loisirs" class="loisirs">Loisirs</option>												<option  value="management-des-ressources-humaines" class="management-des-ressources-humaines">Management des ressources humaines</option>
															<option  value="management-organisation" class="management-organisation">Management, Organisation</option>
															<option  value="marketing-des-achats" class="marketing-des-achats">Marketing des achats</option>
															<option  value="marketing-commerce-gestion-des-ventes" class="marketing-commerce-gestion-des-ventes">Marketing, Commerce, gestion des ventes</option>
															<option  value="mathematiques" class="mathematiques">Mathématiques</option>
															<option  value="medecine-et-epidemiologie" class="medecine-et-epidemiologie">Médecine et épidémiologie</option>
															<option  value="medecine-veterinaire" class="medecine-veterinaire">Médecine vétérinaire</option>
															<option  value="meteorologie" class="meteorologie">Météorologie</option>												<option  value="microbiologie-biotechnologie" class="microbiologie-biotechnologie">Microbiologie, biotechnologie</option>
															<option  value="musique-et-musicologie" class="musique-et-musicologie">Musique et musicologie</option>
															<option  value="oceanographie" class="oceanographie">Océanographie</option>
															<option  value="pedagogie-et-enseignement-comparatif" class="pedagogie-et-enseignement-comparatif">Pédagogie et enseignement comparatif</option>
															<option  value="pharmacie" class="pharmacie">Pharmacie</option>
															<option  value="philologie-classique" class="philologie-classique">Philologie classique</option>
															<option  value="philosophie" class="philosophie">Philosophie</option>
															<option  value="photographie-cinematographie" class="photographie-cinematographie">Photographie, cinématographie</option>												<option  value="physique" class="physique">Physique</option>
															<option  value="physique-nucleaire-et-physique-des-hautes-energies" class="physique-nucleaire-et-physique-des-hautes-energies">Physique nucléaire et physique des hautes énergies</option>
															<option  value="pisciculture" class="pisciculture">Pisciculture</option>
															<option  value="psychiatrie-et-psychologie-clinique" class="psychiatrie-et-psychologie-clinique">Psychiatrie et psychologie clinique</option>
															<option  value="psychologie-pedagogique" class="psychologie-pedagogique">Psychologie pédagogique</option>
															<option  value="psychologie-sciences-du-comportement" class="psychologie-sciences-du-comportement">Psychologie, sciences du comportement</option>
															<option  value="relations-industrielles-et-gestion-du-personnel" class="relations-industrielles-et-gestion-du-personnel">Relations industrielles et gestion du personnel</option>
															<option  value="relations-internationales-etudes-regionales-integration-regionale" class="relations-internationales-etudes-regionales-integration-regionale">Relations internationales, études régionales/ intégration régionale</option>
															<option  value="relations-publiques-publicite" class="relations-publiques-publicite">Relations publiques, publicité</option>												<option  value="sante-publique" class="sante-publique">Santé publique</option>
															<option  value="science-des-materiaux" class="science-des-materiaux">Science des matériaux</option>
															<option  value="sciences-actuarielles" class="sciences-actuarielles">Sciences actuarielles</option>
															<option  value="sciences-de-lenvironnement-ecologie" class="sciences-de-lenvironnement-ecologie">Sciences de l’environnement, écologie</option>
															<option  value="sciences-nautiques-et-de-la-navigation" class="sciences-nautiques-et-de-la-navigation">Sciences nautiques et de la navigation</option>												<option  value="sciences-politiques" class="sciences-politiques">Sciences politiques</option>
															<option  value="sociologie-y-compris-developpement-social" class="sociologie-y-compris-developpement-social">Sociologie (y compris développement social)</option>
															<option  value="statistiques" class="statistiques">Statistiques</option>
															<option  value="sylviculture" class="sylviculture">Sylviculture</option>
															<option  value="systeme-dinformation" class="systeme-dinformation">Système d’information</option>
															<option  value="technologies-medicales" class="technologies-medicales">Technologies médicales</option>												<option  value="theologie" class="theologie">Théologie</option>
															<option  value="tourisme-restauration-et-gestion-dhotels" class="tourisme-restauration-et-gestion-dhotels">Tourisme, restauration et gestion d’hôtels</option>
															<option  value="traduction-interpretariat" class="traduction-interpretariat">Traduction, interprétariat</option>
															<option  value="transport" class="transport">Transport</option>
															<option  value="urbanisme-et-developpement" class="urbanisme-et-developpement">Urbanisme et développement</option>
															<option  value="autres" class="autres">Autres</option>			    		
														</select>
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
														  <ul id='stars_dom_etudes'>
															<li class='star' title='Poor' data-value='1'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Fair' data-value='2'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Good' data-value='3'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
														  </ul>
														  <input type="text" name="val_dom_etudes" id="val_dom_etudes" style="display: none">
														</div>
													</section>
												</div>
												<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-ex" name="elim_dom_etudes">
                                                        <label for="radio-ex">
                                                          <span class="dot"></span> Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
												<label class="col-md-3 col-form-label">Niveau d'études</label>
												<div class="col-md-4">
													<div class="form-group">
														<select multiple class="form-control" name="niveau_etude[]" style="height: 100px" required>
															<option>Bac</option>
															<option>Bac + 2</option>
															<option>Bac + 3</option>
															<option>Bac + 4</option>
															<option>Bac + 5</option>
															<option>Bac + 8</option>
															<option>Bac + 8 et Plus</option>
														</select>
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
														  <ul id='stars_niv_etudes'>
															<li class='star' title='Poor' data-value='1'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Fair' data-value='2'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Good' data-value='3'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
														  </ul>
														  <input type="text" name="val_niv_etudes" id="val_niv_etudes" style="display: none">
														</div>
													</section>
												</div>
														<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-n" name="elim_niv_etudes">
                                                        <label for="radio-n">
                                                          <span class="dot"></span> Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
													<label class="col-md-3 col-form-label">Années d'expérience</label>
												<div class="col-md-4">
													<div class="form-group">
														<select multiple name="annee_exp[]" class="form-control" style="height: 100px" required>
															<option  value="etudiant" class="etudiant">Etudiant</option>
															<option  value="jeune-diplome-0-a-1an" class="jeune-diplome-0-a-1an">Jeune diplômé (0 à 1 an)</option>
															<option  value="debutant-1-a-3ans" class="debutant-1-a-3ans">Débutant (1 à 3 ans)</option>
															<option  value="3-a-5-ans" class="3-a-5-ans">3 à 5 ans</option>
															<option  value="5-a-10-ans" class="5-a-10-ans">5 à 10 ans</option>
															<option  value="10-a-15-ans" class="10-a-15-ans">10 à 15 ans</option>
															<option  value="15-ans-et-plus" class="15-ans-et-plus">15 ans et plus</option>
														</select>
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
															<ul id='stars_exp'>
																<li class='star' title='Poor' data-value='1'>
																<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Fair' data-value='2'>
																<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Good' data-value='3'>
																<i class='fa fa-star fa-fw'></i>
																</li>
															</ul>
															<input type="text" name="val_annees_exp" id="val_annees_exp" style="display: none">
														</div>
													</section>
												</div>
														<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-a" name="elim_annees_exp">
                                                        <label for="radio-a">
                                                          <span class="dot"></span> Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
													<label class="col-md-3 col-form-label">Nationalité</label>
												<div class="col-md-4">
													<div class="form-group">
														<select multiple name="nationalite[]" class="form-control" style="height: 120px">
															<option value="Toute Nationalité">Toute Nationalité</option>
															@foreach($nationalite as $nation)
															<option  value="{{$nation->valeur}}" class="{{$nation->valeur}}">{{$nation->Nationalite}}</option>
															@endforeach 
														</select>
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
														  <ul id='stars_val_nat'>
															<li class='star' title='Poor' data-value='1'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Fair' data-value='2'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Good' data-value='3'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
														  </ul>
														  <input type="text" name="val_nationalite" id="val_nationalite" style="display: none" >
														</div>
													</section>
												</div>
														<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-na" name="elim_nationalite">
                                                        <label for="radio-na">
                                                          <span class="dot"></span> Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
													<label class="col-md-3 col-form-label">Disponibilité</label>
												<div class="col-md-4">
													<div class="form-group">
														<select class="form-control" name="disponibilite" required>
															<option value="immediatement"> immediatement </option>
															<option value="1 mois"> 1 mois </option>
															<option value="1 a 3 mois"> 1 a 3 mois </option>
															<option value="3 a 6 mois"> 3 a 6 mois </option>
														</select>
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
												<div class="col-md-3">
													<section class='rating-widget'>
														<!-- Rating Stars Box -->
														<div class='rating-stars text-center' style="font-size:10px;">
														  <ul id='stars_dispo'>
															<li class='star' title='Poor' data-value='1'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Fair' data-value='2'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
															<li class='star' title='Good' data-value='3'>
															  <i class='fa fa-star fa-fw'></i>
															</li>
														  </ul>
														  <input type="text" name="val_dispo" id="val_dispo" style="display: none">
														</div>
													</section>
												</div>
														<div class="col-md-2">
                                    				<div class="mt-0 terms">
                                                        <input class="custom-radio" type="checkbox" id="radio-d" name="elim_dispo">
                                                        <label for="radio-d">
                                                          <span class="dot"></span> Éliminatoire
                                                        </label>
                                                      </div>
													</div>  
                        					</div>
                      					</div>
									</div>
									<br>
										<h6>Exigences souhaitées</h6><br>
									<div class="row">
										<div class="col-12">
											<div name="top" id="job-summery" class="job-summery">
												<div class ="div_ref">

												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="form-group row">
										<label class="col-md-3 col-form-label"></label>
										<div class="col-md-9">
											<button type ="submit" class="button">Publier votre Offre</button>
										</div>
									</div>
                  				</div>
                			</form>
              			</div>
                		@include('shared.emp-dashboard-menu')
              		</div>
            	</div>
          	</div>
        </div>
</div>


    <script>
     
	  	$(document).ready(function(){
			var count = 1;
			dynamic_field(count);
			function dynamic_field(number){
				console.log(number);
			//	var html =''; 
			var html = '<div class="row">';
							html += '<div class="col-md-4">';
								html += '<div class="form-group">';
									html += '<label class="col-md-12 col-form-label">Type de question</label>';
									html += '<div class="form-group">';
										html += '<select name="type_quest[]" class="form-control">';
											html += '<option value="chiffre">Question à chiffre</option>';
                                        	html += '<option value="echelle">Question à échelle</option>';
											html += '<option value="fermé">Question fermé</option>';
                                        html += '</select>';
									html += '</div>';
                                html += '</div>';
							html += '</div>';
							html += '<div class="col-md-5">';
								html += '<div class="form-group">';
									html += '<label class="col-md-12 col-form-label">Libellé de la question</label>';
									html += '<div class="form-group">';
										html += '<input type="text" name="question[]"class="form-control" required>'
									html += '</div>';
								html += '</div>';
							html += '</div>';
							html += '<div class="col-md-2">';
								html += '<div class="form-group">';
									html += '<label class="col-md-12 col-form-label">Appréciation </label>';
									html += '<select name="level[]" class="form-control">';
                                		html += '<option value="1">Peu favorable</option>';
                                		html += '<option value="2">Favorable</option>';
                                		html += '<option value="3">Assez favorable</option>';
                                		html += '<option value="4">Tres favorable</option>';
                                		html += '<option value="5">Requis</option>';
									html += '</select>';
								html += '</div>';
							html += '</div>';
							if(number > 1){

							html += '<div class="col-md-1" onclick=" remove_Question(this.parentElement)">';
								html += '<div class="col-md-12" >';
									html += '<i class="fas fa-trash-alt"></i>';
								html += '</div>';
							html += '</div>';
						html += '</div>';
				//	html += '</div>';
            //    html += '</div>';
				$('.div_ref').append(html);
				}else{
					html += '<div class="col-md-1" id="add" name="add">';
						html += '<div class="col-md-12" >';
							html += '<i class="fas fa-plus-circle" ></i>';
						html += '</div>';
					html += '</div>';
				html += '</div>';

				
				//	html += '</div>';
              //  html += '</div>';
				$('.div_ref').html('');
				$('.div_ref').append(html);

				}
      		}
			$('#add').click(function(){
				count++;
				dynamic_field(count);
			});
			

			$(document).on('click', '#remove', function(){
				count--;
				//dynamic_field(count);
				$('.div_ref').children().last().remove();

			})

	  	});

		function remove_Question(t) {
				t.remove();
		}

		$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars_secteur li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_secteur');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_lieu li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_lieu');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_contract li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_contract');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_salaire li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_salaire');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_mobilite li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_mobilite');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_dom_etudes li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_dom_etudes');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });
  $('#stars_niv_etudes li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_niv_etudes');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_exp li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_annees_exp');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_val_nat li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_val_nat = document.getElementById('val_nationalite');
  
	input_val_nat.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

  $('#stars_dispo li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
	var input_dispo = document.getElementById('val_dispo');
  
	input_dispo.value = onStar;
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

});


 
</script>
@endsection
