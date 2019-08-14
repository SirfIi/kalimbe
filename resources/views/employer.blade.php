@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
 <!-- Breadcrumb -->
 <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Listing des Employeurs</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Listing des Employeurs</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <form action="#">
                <input type="text" placeholder="Entrez les mots-clés">
                <button><i data-feather="search"></i></button>
              </form>
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
            <div class="employer-container">
              <div class="filtered-employer-wrapper">
                <div class="employer-view-controller-wrapper">
                  <div class="employer-view-controller">
                    <div class="controller list active">
                      <i data-feather="menu"></i>
                    </div>
                    <div class="controller grid">
                      <i data-feather="grid"></i>
                    </div>
                    <div class="employer-view-filter">
                      <select class="selectpicker">
                        <option value="" selected>Les plus Recents</option>
                        <option value="california">Les mieux notés</option>
                        <option value="las-vegas">Les plus populaires</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="employer-filter-result">
                @foreach($employers as $emp)
                  <div class="employer">
                    <div class="thumb">
                      <a href="#">
                        <img src="{{asset('images/')}}/{{$emp->photoUrl}}" class="img-fluid" onerror="this.src='{{asset('images/briefcase.png')}}'">
                      </a>
                    </div>
                    <div class="body">
                      <div class="content">
                        <h4><a href="{{ route('emp-detail', $emp->id)}}">{{$emp->name}}</a></h4>
                        <div class="info">
                          <span class="company-category"><a href="#"><i data-feather="briefcase"></i>{{$emp->secteur}}</a></span>
                          <span class="location"><a href="#"><i data-feather="map-pin"></i>{{$emp->ville}}, {{$emp->pays}}</a></span>
                        </div>
                      </div>
                      <div class="button-area">
                        <a href="#">4 Open Position</a>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
                <div >
                  <nav class="navigation pagination">
                    <div>{{$employers->links()}}</div>
                  </nav>                
                </div>
              </div>
              <div class="employer-filter-wrapper">
                <div class="selected-options same-pad">
                  <div class="selection-title">
                    <h4>You Selected</h4>
                    <a href="#">Clear All</a>
                  </div>
                  <ul class="filtered-options">
                  </ul>
                </div>
                <div class="employer-filter-dropdown same-pad category">
                  <select class="selectpicker">
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
                <div class="employer-filter-dropdown same-pad location">
                <select class="selectpicker">
                @foreach($all as $c)
                 <option>{{ $c->country_name}}</option>
                @endforeach  
                </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Job Listing End -->


@endsection