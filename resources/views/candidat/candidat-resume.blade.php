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
                  <div class="download-resume dashboard-section">
                    <div >
                    <h6> Charger votre cv</h6><br><br>
                      <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <!-- <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Charger un CV ') }}</label> -->
                        <div class="col-md-8">
                        <input type="file"  name="fileToUpload">
                        </div>
                      
                      </div><br>
                      <div class="row">
                        <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                                      {{ __('Charger le cv') }}
                        </button>  
                        </div>
                      </div>
                      </form>
                    </div>
                   
                   <!--  <div>
                      <form method="POST" action="{{ route('lettre.upload') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group" style="display: none">
                        <input type="text" class="form-control" name="type" value="lettre" placeholder="" >
                      </div>
                      <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Charger une Lettre de motivation ') }}</label>
                      <input type="file"  name="fileToUpload">
                          <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Telecharger') }}
                                </button>
                            </div>
                        </div> 
                    </form>
                    </div> -->
                  </div>
                <br>
                <div class="jy-alert info-alert">
                    <p> <strong>NB:</strong> Pour une meilleure utilisation, veuillez s'il vous plait charger la version électronique
                     de votre avant d'éditer les champs ci-dessous </p>         
                </div><br>
                  <form   method="POST" action="{{ route('candidat.resume') }}" class="job-post-form">
                     @csrf
                    <div class="basic-info-input">
                        <div id="job-title" class="form-group row" style="display:none">
                          <label class="col-md-3 col-form-label">Nom Complet</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" name="nom" value="{{$user[0]->name}}" placeholder="{{$user[0]->name}}">
                          </div>
                        </div>
                        <h6> Compétences et formations</h6><br><br>
                        <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-4 col-form-label">Niveau d'etude*</label>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <select name="niveau_etude" class="form-control" >
                                    <option>{{$resume->niveau_etude}}</option>
                                    <option value="Bac">Bac</option>
                                    <option value="Bac + 2">Bac + 2</option>
                                    <option value="Bac + 3">Bac + 3</option>
                                    <option value="Bac + 4">Bac + 4</option>
                                    <option value="Bac + 5">Bac + 5 </option>
                                    <option value="Bac + 8">Bac + 8</option>
                                    <option value="Bac + 8 et plus">Bac + 8 et plus </option>
                                  </select>
                                  <i class="fa fa-caret-down"></i>
                                </div>
                              </div>
                          </div>

                          <div class="col-md-6">
                              <label class="col-md-4 col-form-label">Domaine d'étude*</label>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select name="domaine_etude" class="form-control">
                                      	<option>{{$resume->domaine_etude}}</option>
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
                              </div>
                          </div>
                         
                        </div>
  
                        <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-3 col-form-label">Années d'Expérience globales*</label>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <select name="annee_exp" class="form-control">
                                    <option  value="{{$resume->annee_exp}}">{{$resume->annee_exp}}</option>
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
                          </div>
                        </div>
    
                      <div id="job-summery" class="row">  
                        <div class="col-md-12">
                              <label class="col-md-5 col-form-label">Dernier poste occupé*</label>
                              <div class="col-md-7">
                                <div class="form-group">
                                  
                                    <input type="text" class="form-control" name="dernier_poste" value="{{$resume->dernier_poste}}" placeholder="ex: Chef de service" >
                                
                                </div>
                              </div>
                          </div>
                         <div class="col-12">
                          <label class="col-md-12 col-form-label">Responsabilités du dernier poste occupé</label>
                          <div class="col-md-12">
                           
                             
                              <textarea id="mytextarea" name="responsabilite" class="tinymce-editor tinymce-editor-1"  placeholder="Décrire vos responsabilités lors de votre dernier emploi">{{$resume->responsabilite}}</textarea>
                            
                         
                          </div>
                         </div>
                        </div>
  
                        <h6> Informations sur candidat </h6><br><br>
    
                      <div id="job-summery" class="row">
  
                          <div class="col-md-6">
                              <label class="col-md-3 col-form-label">Genre*</label>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select name="genre" class="form-control" >
                                      <option>{{$resume->genre}}</option>
                                      <option> Homme </option>
                                      <option> Femme </option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="col-md-6 col-form-label">Date de naissance*</label>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="form-group datepicker">
                                    <input type="date" name="date_naiss" value="{{$resume->date_naiss}}" class="form-control" >
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
    
                      <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-6 col-form-label"> Nationalité</label>
                              <div class="col-md-6">
                                  <div>
                                      <select name="nationalite" class="form-control">
                                        <option>{{ $resume->nationalite }}</option>
                              <option  value="afghane" class="afghane">Afghane</option>
				    					    		<option  value="albanaise" class="albanaise">Albanaise</option>
				    					    		<option  value="algerienne" class="algerienne">Algerienne</option>
				    					    		<option  value="allemande" class="allemande">Allemande</option>
				    					    		<option  value="americaine" class="americaine">Americaine</option>
				    					    		<option  value="andorrane" class="andorrane">Andorrane</option>
				    					    		<option  value="angolaise" class="angolaise">Angolaise</option>
				    					    		<option  value="antiguaise-et-barbudienne" class="antiguaise-et-barbudienne">Antiguaise et barbudienne</option>
				    					    		<option  value="argentine" class="argentine">Argentine</option>
				    					    		<option  value="armenienne" class="armenienne">Armenienne</option>
				    					    		<option  value="arubaise" class="arubaise">Arubaise</option>
				    					    		<option  value="australienne" class="australienne">Australienne</option>
				    					    		<option  value="autrichienne" class="autrichienne">Autrichienne</option>
				    					    		<option  value="azerbaidjanaise" class="azerbaidjanaise">Azerbaïdjanaise</option>
				    					    		<option  value="bahamienne" class="bahamienne">Bahamienne</option>
				    					    		<option  value="bahreinienne" class="bahreinienne">Bahreinienne</option>
				    					    		<option  value="bangladaise" class="bangladaise">Bangladaise</option>
				    					    		<option  value="barbadienne" class="barbadienne">Barbadienne</option>
				    					    		<option  value="belge" class="belge">Belge</option>
				    					    		<option  value="belizienne" class="belizienne">Belizienne</option>
				    					    		<option  value="beninoise" class="beninoise">Beninoise</option>
				    					    		<option  value="bermudienne" class="bermudienne">Bermudienne</option>
				    					    		<option  value="bhoutanaise" class="bhoutanaise">Bhoutanaise</option>
				    					    		<option  value="bielarusse" class="bielarusse">Bielarusse</option>
				    					    		<option  value="birmane" class="birmane">Birmane</option>
				    					    		<option  value="bissau-guineenne" class="bissau-guineenne">Bissau-Guineenne</option>
				    					    		<option  value="bolivienne" class="bolivienne">Bolivienne</option>
				    					    		<option  value="bosniaque" class="bosniaque">Bosniaque</option>
				    					    		<option  value="botswanaise" class="botswanaise">Botswanaise</option>
				    					    		<option  value="brazza-congolaise" class="brazza-congolaise">Brazza-Congolaise</option>
				    					    		<option  value="bresilienne" class="bresilienne">Bresilienne</option>
				    					    		<option  value="britannique" class="britannique">Britannique</option>
				    					    		<option  value="bruneienne" class="bruneienne">Bruneienne</option>
				    					    		<option  value="bulgare" class="bulgare">Bulgare</option>
				    					    		<option  value="burkinabee" class="burkinabee">Burkinabee</option>
				    					    		<option  value="burundaise" class="burundaise">Burundaise</option>
				    					    		<option  value="caimanien" class="caimanien">Caïmanien</option>
				    					    		<option  value="cambodgienne" class="cambodgienne">Cambodgienne</option>
				    					    		<option  value="camerounaise" class="camerounaise">Camerounaise</option>
				    					    		<option  value="canadienne" class="canadienne">Canadienne</option>
				    					    		<option  value="cap-verdienne" class="cap-verdienne">Cap-verdienne</option>
				    					    		<option  value="centrafricaine" class="centrafricaine">Centrafricaine</option>
				    					    		<option  value="chilienne" class="chilienne">Chilienne</option>
				    					    		<option  value="chinoise" class="chinoise">Chinoise</option>
				    					    		<option  value="chypriote" class="chypriote">Chypriote</option>
				    					    		<option  value="colombienne" class="colombienne">Colombienne</option>
				    					    		<option  value="comorienne" class="comorienne">Comorienne</option>
				    					    		<option  value="congolaise" class="congolaise">Congolaise</option>
				    					    		<option  value="cookienne" class="cookienne">Cookienne</option>
				    					    		<option  value="costaricaine" class="costaricaine">Costaricaine</option>
				    					    		<option  value="croate" class="croate">Croate</option>
				    					    		<option  value="cubaine" class="cubaine">Cubaine</option>
				    					    		<option  value="danoise" class="danoise">Danoise</option>
				    					    		<option  value="djiboutienne" class="djiboutienne">Djiboutienne</option>
				    					    		<option  value="dominicaine" class="dominicaine">Dominicaine</option>
				    					    		<option  value="dominiquaise" class="dominiquaise">Dominiquaise</option>
				    					    		<option  value="egyptienne" class="egyptienne">Egyptienne</option>
				    					    		<option  value="emirienne" class="emirienne">Emirienne</option>
				    					    		<option  value="equato-guineenne" class="equato-guineenne">Equato-guineenne</option>
				    					    		<option  value="equatorienne" class="equatorienne">Equatorienne</option>
				    					    		<option  value="erythreenne" class="erythreenne">Erythreenne</option>
				    					    		<option  value="espagnole" class="espagnole">Espagnole</option>
				    					    		<option  value="est-timorais" class="est-timorais">Est-Timorais</option>
				    					    		<option  value="estonienne" class="estonienne">Estonienne</option>
				    					    		<option  value="ethiopienne" class="ethiopienne">Ethiopienne</option>
				    					    		<option  value="feringienne" class="feringienne">Féringienne</option>
				    					    		<option  value="fidjienne" class="fidjienne">Fidjienne</option>
				    					    		<option  value="finlandaise" class="finlandaise">Finlandaise</option>
				    					    		<option  value="francaise" class="francaise">Française</option>
				    					    		<option  value="gabonnaise" class="gabonnaise">Gabonnaise</option>
				    					    		<option  value="gambienne" class="gambienne">Gambienne</option>
				    					    		<option  value="georgienne" class="georgienne">Georgienne</option>
				    					    		<option  value="ghaneenne" class="ghaneenne">Ghaneenne</option>
				    					    		<option  value="gibraltarienne" class="gibraltarienne">Gibraltarienne</option>
				    					    		<option  value="grecque" class="grecque">Grecque</option>
				    					    		<option  value="grenadinne" class="grenadinne">Grenadinne</option>
				    					    		<option  value="groenlandaise" class="groenlandaise">Groenlandaise</option>
				    					    		<option  value="guadeloupeenne" class="guadeloupeenne">Guadeloupeenne</option>
				    					    		<option  value="guatemalteque" class="guatemalteque">Guatemalteque</option>
				    					    		<option  value="guineenne" class="guineenne">Guineenne</option>
				    					    		<option  value="guyanaise" class="guyanaise">Guyanaise</option>
				    					    		<option  value="guyanienne" class="guyanienne">Guyanienne</option>
				    					    		<option  value="haitienne" class="haitienne">Haitienne</option>
				    					    		<option  value="hondurienne" class="hondurienne">Hondurienne</option>
				    					    		<option  value="hongkongais" class="hongkongais">Hongkongais</option>
				    					    		<option  value="hongroise" class="hongroise">Hongroise</option>
				    					    		<option  value="indienne" class="indienne">Indienne</option>
				    					    		<option  value="indonesienne" class="indonesienne">Indonesienne</option>
				    					    		<option  value="irakienne" class="irakienne">Irakienne</option>
				    					    		<option  value="iranienne" class="iranienne">Iranienne</option>
				    					    		<option  value="irlandaise" class="irlandaise">Irlandaise</option>
				    					    		<option  value="islandaise" class="islandaise">Islandaise</option>
				    					    		<option  value="israelienne" class="israelienne">Israélienne</option>
				    					    		<option  value="italienne" class="italienne">Italienne</option>
				    					    		<option  value="ivoirienne" class="ivoirienne">Ivoirienne</option>
				    					    		<option  value="jamaicaine" class="jamaicaine">Jamaicaine</option>
				    					    		<option  value="japonnaise" class="japonnaise">Japonnaise</option>
				    					    		<option  value="jordanienne" class="jordanienne">Jordanienne</option>
				    					    		<option  value="kazakhstanaise" class="kazakhstanaise">Kazakhstanaise</option>
				    					    		<option  value="kenyane" class="kenyane">Kenyane</option>
				    					    		<option  value="kirghize" class="kirghize">Kirghize</option>
				    					    		<option  value="kiribatienne" class="kiribatienne">Kiribatienne</option>
				    					    		<option  value="koweitienne" class="koweitienne">Koweïtienne</option>
				    					    		<option  value="laotienne" class="laotienne">Laotienne</option>
				    					    		<option  value="lesothane" class="lesothane">Lesothane</option>
				    					    		<option  value="lettone" class="lettone">Lettone</option>
				    					    		<option  value="libanaise" class="libanaise">Libanaise</option>
				    					    		<option  value="liberienne" class="liberienne">Liberienne</option>
				    					    		<option  value="libyenne" class="libyenne">Libyenne</option>
				    					    		<option  value="liechtensteinoise" class="liechtensteinoise">Liechtensteinoise</option>
				    					    		<option  value="lituanienne" class="lituanienne">Lituanienne</option>
				    					    		<option  value="luxembourgeoise" class="luxembourgeoise">Luxembourgeoise</option>
				    					    		<option  value="macanaise" class="macanaise">Macanaise</option>
				    					    		<option  value="macedonienne" class="macedonienne">Macedonienne</option>
				    					    		<option  value="mahoraise" class="mahoraise">Mahoraise</option>
				    					    		<option  value="malaisienne" class="malaisienne">Malaisienne</option>
				    					    		<option  value="malawienne" class="malawienne">Malawienne</option>
				    					    		<option  value="maldivienne" class="maldivienne">Maldivienne</option>
				    					    		<option  value="malgache" class="malgache">Malgache</option>
				    					    		<option  value="malienne" class="malienne">Malienne</option>
				    					    		<option  value="malouinne" class="malouinne">Malouinne</option>
				    					    		<option  value="maltaise" class="maltaise">Maltaise</option>
				    					    		<option  value="marocaine" class="marocaine">Marocaine</option>
				    					    		<option  value="martiniquaise" class="martiniquaise">Martiniquaise</option>
				    					    		<option  value="mauricienne" class="mauricienne">Mauricienne</option>
				    					    		<option  value="mauritanienne" class="mauritanienne">Mauritanienne</option>
				    					    		<option  value="mexicaine" class="mexicaine">Mexicaine</option>
				    					    		<option  value="moldave" class="moldave">Moldave</option>
				    					    		<option  value="monegasque" class="monegasque">Monegasque</option>
				    					    		<option  value="mongolienne" class="mongolienne">Mongolienne</option>
				    					    		<option  value="mozambicaine" class="mozambicaine">Mozambicaine</option>
				    					    		<option  value="namibienne" class="namibienne">Namibienne</option>
				    					    		<option  value="nauruanne" class="nauruanne">Nauruanne</option>
				    					    		<option  value="neerlandaise" class="neerlandaise">Neerlandaise</option>
				    					    		<option  value="nepalaise" class="nepalaise">Nepalaise</option>
				    					    		<option  value="neo-caledonienne" class="neo-caledonienne">Néo-Caledonienne</option>
				    					    		<option  value="neo-zelandaise" class="neo-zelandaise">Néo-Zelandaise</option>
				    					    		<option  value="nicaraguayenne" class="nicaraguayenne">Nicaraguayenne</option>
				    					    		<option  value="nigerianne" class="nigerianne">Nigerianne</option>
				    					    		<option  value="nigerienne" class="nigerienne">Nigerienne</option>
				    					    		<option  value="niueenne" class="niueenne">Niueenne</option>
				    					    		<option  value="nord-coreenne" class="nord-coreenne">Nord-Coréenne</option>
				    					    		<option  value="norvegienne" class="norvegienne">Norvegienne</option>
				    					    		<option  value="omanaise" class="omanaise">Omanaise</option>
				    					    		<option  value="ougandaise" class="ougandaise">Ougandaise</option>
				    					    		<option  value="ouzbek" class="ouzbek">Ouzbek</option>
				    					    		<option  value="pakistanaise" class="pakistanaise">Pakistanaise</option>
				    					    		<option  value="palestienne" class="palestienne">Palestienne</option>
				    					    		<option  value="paluanne" class="paluanne">Paluanne</option>
				    					    		<option  value="panameenne" class="panameenne">Panameenne</option>
				    					    		<option  value="papouane-neoguineenne" class="papouane-neoguineenne">Papouane-neoguineenne</option>
				    					    		<option  value="paraguayenne" class="paraguayenne">Paraguayenne</option>
				    					    		<option  value="peruvienne" class="peruvienne">Peruvienne</option>
				    					    		<option  value="philippine" class="philippine">Philippine</option>
				    					    		<option  value="polonaise" class="polonaise">Polonaise</option>
				    					    		<option  value="polynesienne" class="polynesienne">Polynesienne</option>
				    					    		<option  value="portoricaine" class="portoricaine">Portoricaine</option>
				    					    		<option  value="portugaise" class="portugaise">Portugaise</option>
				    					    		<option  value="qatarienne" class="qatarienne">Qatarienne</option>
				    					    		<option  value="reunionnaise" class="reunionnaise">Réunionnaise</option>
				    					    		<option  value="roumaine" class="roumaine">Roumaine</option>
				    					    		<option  value="russe" class="russe">Russe</option>
				    					    		<option  value="rwandaise" class="rwandaise">Rwandaise</option>
				    					    		<option  value="salomonienne" class="salomonienne">Salomonienne</option>
				    					    		<option  value="salvadorienne" class="salvadorienne">Salvadorienne</option>
				    					    		<option  value="samoa-americaine" class="samoa-americaine">Samoa Américaine</option>
				    					    		<option  value="samoanne" class="samoanne">Samoanne</option>
				    					    		<option  value="santomeenne" class="santomeenne">Santomeenne</option>
				    					    		<option  value="saoudienne" class="saoudienne">Saoudienne</option>
				    					    		<option  value="senegalaise" class="senegalaise">Senegalaise</option>
				    					    		<option  value="serbe" class="serbe">Serbe</option>
				    					    		<option  value="seychelloise" class="seychelloise">Seychelloise</option>
				    					    		<option  value="sierra-leonaise" class="sierra-leonaise">Sierra-leonaise</option>
				    					    		<option  value="singapourienne" class="singapourienne">Singapourienne</option>
				    					    		<option  value="slovaque" class="slovaque">Slovaque</option>
				    					    		<option  value="slovene" class="slovene">Slovene</option>
				    					    		<option  value="somalienne" class="somalienne">Somalienne</option>
				    					    		<option  value="soudanaise" class="soudanaise">Soudanaise</option>
				    					    		<option  value="sri-lankaise" class="sri-lankaise">Sri-Lankaise</option>
				    					    		<option  value="sud-africaine" class="sud-africaine">Sud-Africaine</option>
				    					    		<option  value="sud-coreenne" class="sud-coreenne">Sud-Coréenne</option>
				    					    		<option  value="sud-soudanaise" class="sud-soudanaise">Sud-Soudanaise</option>
				    					    		<option  value="suedoise" class="suedoise">Suedoise</option>
				    					    		<option  value="suisse" class="suisse">Suisse</option>
				    					    		<option  value="surinamienne" class="surinamienne">Surinamienne</option>
				    					    		<option  value="swazie" class="swazie">Swazie</option>
				    					    		<option  value="syrienne" class="syrienne">Syrienne</option>
				    					    		<option  value="tadjik" class="tadjik">Tadjik</option>
				    					    		<option  value="taiwanaise" class="taiwanaise">Taiwanaise</option>
				    					    		<option  value="tanzanienne" class="tanzanienne">Tanzanienne</option>
				    					    		<option  value="tchadienne" class="tchadienne">Tchadienne</option>
				    					    		<option  value="tcheque" class="tcheque">Tchèque</option>
				    					    		<option  value="thailandaise" class="thailandaise">Thailandaise</option>
				    					    		<option  value="togolaise" class="togolaise">Togolaise</option>
				    					    		<option  value="tongienne" class="tongienne">Tongienne</option>
				    					    		<option  value="trinidadienne" class="trinidadienne">Trinidadienne</option>
				    					    		<option  value="tunisienne" class="tunisienne">Tunisienne</option>
				    					    		<option  value="turkmene" class="turkmene">Turkmene</option>
				    					    		<option  value="turque" class="turque">Turque</option>
				    					    		<option  value="tuvaluanne" class="tuvaluanne">Tuvaluanne</option>
				    					    		<option  value="ukrainienne" class="ukrainienne">Ukrainienne</option>
				    					    		<option  value="uruguayenne" class="uruguayenne">Uruguayenne</option>
				    					    		<option  value="vanuataise" class="vanuataise">Vanuataise</option>
				    					    		<option  value="venezuelienne" class="venezuelienne">Venezuelienne</option>
				    					    		<option  value="vietnamienne" class="vietnamienne">Vietnamienne</option>
				    					    		<option  value="yemenite" class="yemenite">Yemenite</option>
				    					    		<option  value="zambienne" class="zambienne">Zambienne</option>
				    					    		<option  value="zimbabweenne" class="zimbabweenne">Zimbabweenne</option>

                                          
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="col-md-6 col-form-label">Pays de résidence</label>
                                <div class="col-md-6">
                                    <div>
                                        <select name="residence" class="form-control">
                                          <option>{{ $resume->residence }}</option>
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
                          </div>
                      </div>    
                   <br><br><h6> Informations sur les motivations du candidat </h6><br><br>
    
                      <div id="job-summery" class="row">
  
                          <div class="col-md-6">
                              <label class="col-md-4 col-form-label"> Quel est votre facteur de motivation ? </label>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="ex: Relever des défis" value="{{$resume->motivation}}" name="motivation">
                                  </div>
                                </div>
                          </div>
                    </div>
                          <div class="col-md-6">
                              <label class="col-md-3 col-form-label"> Êtes-vous disponible ?</label>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control" name="disponibilite">
                                      <option value="immediatement" <?php if($resume->disponibilite == 'immediatement') echo 'selected' ?>> Immédiatement </option>
                                      <option value="1 mois" <?php if($resume->disponibilite == '1 mois') echo 'selected'  ?> > 1 mois </option>
                                      <option value="1 a 3 mois" <?php if($resume->disponibilite == '1 a 3 mois') echo 'selected' ?>> 1 a 3 mois </option>
                                      <option value="3 a 6 mois" <?php if($resume->disponibilite == '3 a 6 mois') echo 'selected' ?>> 3 a 6 mois </option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
    
                      <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-3 col-form-label"> Êtes-vous mobile ?</label>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control" name="mobilite">
                                      <option>{{$resume->mobilite}}</option>
                                      <option value="oui"> Oui, je le suis </option>
                                      <option value="non"> Non, je ne le suis pas </option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="col-md-4 col-form-label"> Quelles sont vos prétentions salariales(annuelle)? </label>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ex: 250.000 FCFA" value="{{$resume->remuneration}}" name="remuneration">
                                  </div>
                                </div>
                          </div>
                          </div>
                      </div>   <br>
                      
                        <div id="job-post-form"  class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                    <button type="submit" class="button">Enregistrer</button>
                              </div>
                          </div>
                        </div>
                  </div>

                    </form>
                </div>
                @include('shared.cand-dash-menu')
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        var drop = new Dropzone('#file', {
          createImageThumbnails: false,
          addRemoveLinks: true,
          url: "{{ route('file.upload') }}",
          headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
          }
        });
      </script>
@endsection