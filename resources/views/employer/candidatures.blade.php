@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('employer.breadcrumb')
 <!-- Search and Filter -->
 <div class="searchAndFilter-wrapper-2">
    <div class="container">
     
       <div class="row">
      
         <div class="col">
          
           <div class="searchAndFilter-block" >
             <div class="searchAndFilter searchAndFilter-2">
                 <select onchange="filtre()" class="selectpicker" id="niveau_etude" name='niveau_etude' >
                    <option value="">Niveau d'étude</option>
					<option value="Bac">Bac</option>
					<option value="Bac + 2">Bac + 2</option>
					<option value="Bac + 3">Bac + 3</option>
					<option value="Bac + 4">Bac + 4</option>
					<option value="Bac + 5">Bac + 5 </option>
					<option value="Bac + 8">Bac + 8</option>
					<option value="Bac + 8 et plus">Bac + 8 et plus </option>	    	 
				 </select>
				 
                 <select onchange="filtre()" class="selectpicker" id="domaine_etude" name='domaine_etude'>
					<option  value="" class="administration">Domaine d'étude</option>
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
				 
				<select onchange="filtre()" id="annee_exp" name="annee_exp" class="selectpicker">
					<option  value="">Années d'expérience</option>
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
   <!-- Search and Filter End -->
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
                <div class="manage-candidate-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Listes des Candidats</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody id="candidateslist">
                    @foreach($cand as $c) 
						<tr class="candidates-list">
							<td class="title">
								<div class="thumb">
									<img src="{{asset('images')}}/{{$c->photoUrl}}" class="img-fluid" alt="">
								</div>
								<div class="body">
									<h5><a href="{{route('cv-theque.detail', $c->id)}}">{{ $c->name }} </a></h5>
									<div class="info">
									<span class="designation"><a href="#"><i data-feather="check-square"></i>{{ $c->secteur}} </a></span>
									<span class="location"><a href="#"><i data-feather="map-pin"></i> {{ $c->ville}} </a></span>
									</div>
								</div>
							</td>
							<td class="status">

							</td>
							<td class="action">
								<a href="{{route('cv-theque.detail', $c->id)}}" class="download"><i data-feather="eye"></i></a>
							</td>
						</tr>      
                    @endforeach
                    </tbody>
                  </table>
                  <div>
                    <nav class="navigation pagination">
                      <div>{{$cand->links()}}</div>
                    </nav>                
                  </div>
                </div>
              </div>
                @include('shared.emp-dashboard-menu')
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>
	<script type="text/javascript">

		function filtre(){
			$annee_exp = document.getElementById('annee_exp').value;
			$niveau_etude = document.getElementById('niveau_etude').value;
			$domaine_etude = document.getElementById('domaine_etude').value;
		
			$.ajax({
				type : 'get',
				url : '{{URL::to("filtre")}}',
				data:{'exp':$annee_exp, 'n_etude': $niveau_etude, 'd_etude': $domaine_etude},

				success:function(data){
					if(data){
						var ent = {!! json_encode($ent) !!};
						candidateslist = document.getElementById('candidateslist')
						//candidateslist.innerHTML = ""
						$('#candidateslist').html(data);

					}
				}
			});

			}
		
	</script>
@endsection