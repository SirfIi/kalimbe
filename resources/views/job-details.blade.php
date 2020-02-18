@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
      @if (session('status'))
          <div id="jy-alert" class="jy-alert success-alert">
          {{ session('status') }}
          </div><br>
         @endif
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                  <img  style="width:100%; height: 90% " class="image" src="{{asset('images/'.$job[0]->user->photoUrl)}}"  onerror="this.src='{{asset('images/briefcase.png')}}';">
                  </div>
                  <div class="title-body">
                    <h4>{{$job[0]->titre}}</h4>
                    <div class="info">
                      <span class="company"><a href="{{ route('emp-detail', $job[0]->user->id)}}"><i data-feather="briefcase"></i>{{$job[0]->user->name}}</a></span>
                      <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$job[0]->localisation}}</a></span>
                      @if($job[0]->type_contrat == 'CDD Temps plein')
                          <span class="full-time"><a href="#"><i data-feather="clock"></i>{{$job[0]->type_contrat}}</a></span>
                          @elseif($job[0]->type_contrat == 'CDD Temps partiel')
                          <span class="part-time"><a href="#"><i data-feather="clock"></i>{{$job[0]->type_contrat}}</a></span>
                          @elseif($job[0]->type_contrat == 'CDI Temps plein')
                          <span class="freelance"><a href="#"><i data-feather="clock"></i>{{$job[0]->type_contrat}}</a></span>
                          @else
                          <span class="temporary"><a href="#"><i data-feather="clock"></i>{{$job[0]->type_contrat}}</a></span>
                      @endif
                    </div>
                    <div class="info">
                   
                    </div>
                   
                  </div>
                </div>
                <div class="buttons">
                
                        @guest
                          <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-2">Postuler</a>
                        @else
                          @if(Auth::user()->type == 10)
                            @if($cc >0)
                            <a href="#" class="apply" style="background-color: #DC143C;">Vous avez déja appliqué à cette Offre</a>
                            @else
                            <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-2">Postuler</a>
                            @endif
                          @endif
                        @endif
                        </div>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Description</h4>
                      {!!  $job[0]->description  !!}
                    </div>
                    <div class="responsibilities details-section">
                      <h4><i data-feather="zap"></i>Responsabilités</h4>
                      
                      {!!  $job[0]->responsabilities  !!}
                      
                    </div>
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Criteres du poste</h4>
                      <ul>
                        <li><b>Secteur d'activité</b>
                          @foreach($question as $quizz)
                            @if($quizz->titre == 'Secteur')
                            {{$quizz->libele}},
                            @endif
                          @endforeach
                        </li>
                       
                        <li><b>Niveau d'étude</b>
                          @foreach($question as $quizz)
                            @if($quizz->titre == 'Niveau etude')
                            {{$quizz->libele}},
                            @endif
                          @endforeach
                        </li>
                        <li><b>Années d'expérience</b>
                          @foreach($question as $quizz)
                            @if($quizz->titre == 'Annees experience')
                            {{$quizz->libele}},
                            @endif
                         @endforeach
                        </li>
                        <li><b>Disponibilité</b>
                          @foreach($question as $quizz)
                            @if($quizz->titre == 'disponibilite')
                            {{$quizz->libele}},
                            @endif
                         @endforeach
                        </li>
                  
                      </ul>
                    </div>
   
                    <div class="other-benifit details-section">
                      <h4></i>Compétences exigées</h4>
                      @foreach($job[0]->refs as $r)
                      <ul>
                        <li>  
                          {{ $r->skill  }} : {{ $r->comp  }} <br>
                       </li> 
                               
                      </ul>
                      @endforeach
                    </div>
     
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Details du poste</h4>
                        <ul>
                          <li><span>Date de publication:</span>{{ date_format(date_create($job[0]->created_at),"d-m-Y")}}, </li>
                          <li><span>Type de contrat:</span> {{$job[0]->type_contrat}},</li>
                          <li><span>Expérience requise:</span> 
                            @foreach($question as $quizz)
                              @if($quizz->titre == 'Annees experience')
                              {{$quizz->libele}},
                              @endif
                            @endforeach
                        </li>
                          <li><span>Lieu:</span>
                            @foreach($question as $quizz)
                              @if($quizz->titre == 'Lieu du travail')
                              {{$quizz->libele}},
                              @endif
                            @endforeach
                          </li>
                          <li><span>Rémuneration:</span>{{$job[0]->remuneration}},</li>
                          <li><span>Nationalité:</span>
                            @foreach($question as $quizz)
                              @if($quizz->titre == 'Nationalité')
                              {{$quizz->libele}},
                              @endif
                            @endforeach
                          </li>
                          <li><span>Date limite de soumission:</span>{{ date_format(date_create($job[0]->date_exp),"d-m-Y")}}, </li>
                        </ul>
                      </div>
                    </div> 
                   
                  </div>
                 
      
                </div>
               
              </div>
             
            </div>
          </div>
        </div>
        
        <div class="apply-popup">
          @guest
                    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document" >
                        <div class="modal-content" style="width:150%">
                          <div class="modal-header">
                            <h5 class="modal-title"><i data-feather="edit"></i>Postuler à cette Offre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="jy-alert info-alert">
                            <p> Vous ètes en ce moment en train de postuler pour le poste <strong>{{$job[0]->titre}}</strong> de l'entreprise <strong> {{$job[0]->user->name}} </strong>   </p>
                          </div>
                         
                          <div class="modal-body">
                          <!-- method="POST" action="{{ route('unknown.apply') }}"-->
                            <form   method="POST" action="{{route('unknown.apply')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="basic-info-input">
                              <h6> Informations sur le Candidat </h6><br><br>
                              <div id="job-summery" class="row">
                                    <div class="col-md-6">
                                      <label class="col-md-12 col-form-label"> Nom et Prénom </label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class="form-group">
                                            <input type="text" class="form-control" required placeholder="" name="nom">
                                            @error('nom')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label class="col-md-12 col-form-label">E-mail </label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class="form-group">
                                            <input type="text" class="form-control" required placeholder="" name="email">
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label class="col-md-12 col-form-label">Téléphone </label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class="form-group">
                                            <input type="text" class="form-control" required placeholder="" name="tel">
                                            @error('tel')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                            <div id="job-summery" class="row">
        
                                <div class="col-md-6">
                                    <label class="col-md-3 col-form-label">Genre*</label>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <div class="form-group">
                                          <select name="genre" class="form-control" >
                                            <option> Homme </option>
                                            <option> Femme </option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-6 col-form-label">Date de naissance*</label>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <div class="form-group datepicker">
                                          <input type="date" name="date_naiss" class="form-control" >
                                          @error('date_naiss')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
          
                            <div id="job-summery" class="row">
                                <div class="col-md-6">
                                    <label class="col-md-6 col-form-label"> Nationalité</label>
                                    <div class="col-md-12">
                                        <div>
                                            <select name="nationalite" class="form-control">
                                              @foreach($nationalite as $nation)
                                                <option  value="{{$nation->valeur}}" class="{{$nation->valeur}}">{{$nation->Nationalite}}</option>
                                              @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-6 col-form-label">Pays de résidence</label>
                                      <div class="col-md-12">
                                          <div>
                                            <select name="residence" class="form-control">
                                              @foreach($pays as $p)
                                                <option  value="{{$p->valeur}}" class="{{$p->valeur}}">{{$p->pays}}</option>
                                              @endforeach 
                                            </select>

                                          </div>
                                      </div>
                                </div>
                            </div>
                                <br><br>
                                <h6> Compétences et formations</h6>
                                <div id="job-summery" class="row">
                                  <div class="col-md-6">
                                      <label class="col-md-12 col-form-label">Niveau d'etude*</label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <select name="niveau_etude" class="form-control">
                                            <option value="Bac">Bac</option>
                                            <option value="Bac + 2">Bac + 2</option>
                                            <option value="Bac + 3">Bac + 3</option>
                                            <option value="Bac + 4">Bac + 4</option>
                                            <option value="Bac + 5">Bac + 5 </option>
                                            <option value="Bac + 8">Bac + 8</option>
                                            <option value="Bac + 8 et plus">Bac + 8 et plus </option>
          
                                          </select>
                                        
                                        </div>
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="col-md-12 col-form-label">Domaine d'étude / Expertise*</label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class="form-group">
                                            <select multiple name="domaine_etude[]" class="form-control" style="height:80px" required>
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
                                          
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                
                                </div>
  
                        <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label">Années d'Expérience globales*</label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <select name="annee_exp" class="form-control" required>
                                    <option value="">-Expérience globale (Années) -</option>
                                    <option  value="etudiant" class="etudiant">Etudiant</option>
                                    <option  value="jeune-diplome-0-a-1an" class="jeune-diplome-0-a-1an">Jeune diplômé (<strong>0</strong> à <strong>1</strong> an)</option>
                                    <option  value="debutant-1-a-3ans" class="debutant-1-a-3ans">Débutant (<strong>1</strong> à <strong>3</strong> ans)</option>
                                    <option  value="3-a-5-ans" class="3-a-5-ans"><strong>3</strong> à  <strong>5</strong>  ans</option>
                                    <option  value="5-a10-ans" class="5-a10-ans"><strong>5</strong>  à <strong>10</strong>  ans</option>
                                    <option  value="10-a-15-ans" class="10-a-15-ans"><strong>10</strong>  à  <strong>15</strong> ans</option>
                                    <option  value="15-ans-et-plus" class="15-ans-et-plus"><strong>15</strong> ans et plus</option>
                                  </select>
                                 
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label">Dernier poste occupé*</label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="dernier_poste" value="" required placeholder="ex: Chef de service" >
                                    @error('dernier_poste')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
    
                        <div id="job-summery" class="row">  
                       
                         <div class="col-12">
                          <label class="col-md-12 col-form-label">Responsabilités du dernier poste occupé</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                              <textarea id="mytextarea" name="responsabilite" class="tinymce-editor tinymce-editor-1"  placeholder="Décrire vos responsabilités lors de votre dernier emploi"></textarea>
                              @error('responsabilite')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            </div>
                          </div>
                         </div>
                        </div>
  
                       
                   <br><br><h6> Informations sur les motivations du Candidat </h6><br><br>
    
                      <div id="job-summery" class="row">
  
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label"> Quel est votre facteur de motivation ? </label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="ex: Relever des défis" name="motivation">
                                    @error('motivation')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                          </div>
                    </div>
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label"> Êtes-vous disponible ?</label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control" name="disponibilite">
                                    <option value="immediatement"> immediatement </option>
                                      <option value="1 mois"> 1 mois </option>
                                      <option value="1 a 3 mois"> 1 a 3 mois </option>
                                      <option value="3 a 6 mois"> 3 a 6 mois </option>
                                    </select>
                                   
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
    
                      <div id="job-summery" class="row">
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label"> Êtes-vous disposés à la mobilité géographique ? ?</label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control" name="mobilite">
                                      
                                      <option value="oui"> Oui, je le suis </option>
                                      <option value="non"> Non, je ne le suis pas </option>
                                    </select>
                                   
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label class="col-md-12 col-form-label"> Quelle est votre prétention salariale (annuelle)? </label>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ex: 250.000 FCFA"  name="remuneration">
                                    @error('remuneration')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                          </div>
                          </div>
                      </div>   <br>
                      <div id="job-summery" class="row">
                      <div class="col-md-12">
                      
                      @if($job[0]->refs->count()>0)
                      <h6>Veuillez préciser votre niveau de maitrise pour chacune des compétences ci-dessous
                     avant de soumettre votre candidature... 
                      </h6>
                     @endif
                      <input type="text" name="id_ent" value="{{$job[0]->id_ent}}" style="display:none; border: 0px; background-color: white;" />
                      <input type="text" name="id_post" id="skill" value="{{$job[0]->id}}" style="display:none; border: 0px; background-color: white;" />
                            @foreach($job[0]->refs as $ref) 
                              <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="skill_{{$loop->index+1}}" id="skill" value="{{$ref->skill}}" style="display:none; border: 0px; background-color: white;" />
                                
                                </div>
                              </div><br>

                              <div class="row">
                              <div class="col-md-6">
                             
                              {{$ref->skill}}
                                  <div class="form-group">
                                  {{$ref->comp}}
                                    <input type="text" name="comp_{{$loop->index+1}}" id="comp"  value=" {{$ref->comp}}" style=" display:none; border: 0px; background-color: white;"/>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label class="col-md-3 col-form-label">Niveau</label>
                                  <div class="col-md-9">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <select name="level_{{$loop->index+1}}" class="form-control"  id="note" >
                                          <option value="1" >Je peux initier</option>
                                          <option value="2" >Je réalise bien</option>
                                          <option value="3" >Je maitrise</option>
                                          <option value="4" >J’excelle</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @endforeach 
                              <div class="form-group">
                                  <strong>CV:</strong>
                                   <label>
                                     <span>Charger un nouveau CV (pdf,zip,doc,docx)</span>
                                     <input onchange="sizeValidation()" id="up-cv" name="file_cv" type="file" required>
                                   </label> 
                                 </div>
                                 <br>
   
                                 <div class="form-group">
                                   <strong>Lettre de motivation:</strong>
                                   <label>
                                     <span>Charger une Lettre de motivaton(pdf,zip,doc,docx)</span>
                                     <input onchange="sizeValidation()" id="up-ltr" name="file_ltr" type="file">
                                   </label>
                                 </div>
                                 <br>
   
                                 <div class="form-group">
                                     <strong>Autre Document:</strong>
                                     <label>
                                       <span>Charger autre document(pdf,zip,doc,docx)</span>
                                       <input onchange="sizeValidation()" id="up-doc" name="file_doc" type="file">
                                     </label>
                                  
                                   
                                 </div>
                              </div>
                      </div>
                  </div>
                            
                              <button class="button primary-bg btn-block">Appliquer maintenant</button>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                @else
                @if(Auth::user()->type == 10)
                {{-- <div class="modal fade" id="apply-popup-id" tabindex="-1" role="dialog" aria-hidden="true"> --}}
                <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width:150%">
                          <div class="modal-header">
                            <h5 class="modal-title"><i data-feather="edit"></i>Postuler à cette Offre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <div class="jy-alert info-alert">
                            <p> Vous ètes en ce moment en train de candidater pour le poste <strong>{{$job[0]->titre}}</strong> de l'entreprise <strong> {{$job[0]->user->name}} </strong>   </p>
                          </div><br>

                          <!-- method="POST" action="{{ route('candidat.apply') }}"-->
                            <form method="POST" action="{{ route('candidat.apply') }}" enctype="multipart/form-data">
                              @csrf

                              <div id="job-summery" class="row">
                                <div class="col-md-6">
                                    <label class="col-md-12 col-form-label"> Nationalité</label>
                                    <div class="col-md-12">
                                        <div>
                                            <select name="nationalite" class="form-control">
                                              @foreach($nationalite as $nation)
                                                <option  value="{{$nation->valeur}}" class="{{$nation->valeur}}" <?php if($resume[0]->nationalite == $nation->valeur) echo 'selected' ?>>{{$nation->Nationalite}}</option>
                                              @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-12 col-form-label">Pays de résidence</label>
                                      <div class="col-md-12">
                                          <div>
                                            <select name="residence" class="form-control">
                                              @foreach($pays as $p)
                                                <option  value="{{$p->valeur}}" class="{{$p->valeur}}" <?php if($resume[0]->residence == $p->valeur) echo 'selected' ?>>{{$p->pays}}</option>
                                              @endforeach 
                                            </select>
    
                                          </div>
                                      </div>
                                </div>
                            </div>

                            <br><br>
                            <h6> Compétences et formations</h6>
                            <div id="job-summery" class="row">
                              <div class="col-md-6">
                                  <label class="col-md-12 col-form-label">Niveau d'étude*</label>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <select name="niveau_etude" class="form-control">
                                        <option value="Bac" <?php if($resume[0]->niveau_etude == 'Bac') echo 'selected' ?>>Bac</option>
                                        <option value="Bac + 2" <?php if($resume[0]->niveau_etude == 'Bac + 2') echo 'selected' ?>>Bac + 2</option>
                                        <option  value="Bac + 3"<?php if($resume[0]->niveau_etude == 'Bac + 3') echo 'selected' ?>>Bac + 3</option>
                                        <option value="Bac + 4" <?php if($resume[0]->niveau_etude == 'Bac + 4') echo 'selected' ?>>Bac + 4</option>
                                        <option value="Bac + 5" <?php if($resume[0]->niveau_etude == 'Bac + 5') echo 'selected' ?>>Bac + 5</option>
                                        <option value="Bac + 8" <?php if($resume[0]->niveau_etude == 'Bac + 8') echo 'selected' ?>>Bac + 8</option>
                                        <option value="Bac + 8 et plus" <?php if($resume[0]->niveau_etude == 'Bac + 8 et plus') echo 'selected' ?>>Bac + 8 et plus</option>
                                      </select>
                                    
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <label class="col-md-12 col-form-label">Domaine d'étude / Expertise</label>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <select multiple name="domaine_etude[]" class="form-control"  placeholder="Domaine d'étude" style="height:80px" required>
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
                                    </div>
                                  </div>
                              </div>
                            
                            </div>

                    <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label">Années d'Expérience globales*</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <select name="annee_exp" class="form-control" required>
                                <option value="">-Expérience globale (Années) -</option>
                                <option  value="etudiant" class="etudiant">Etudiant</option>
                                <option  value="jeune-diplome-0-a-1an" class="jeune-diplome-0-a-1an" <?php if($resume[0]->annee_exp == 'jeune-diplome-0-a-1an') echo 'selected' ?>>Jeune diplômé (<strong>0</strong> à <strong>1</strong> an)</option>
                                <option  value="debutant-1-a-3ans" class="debutant-1-a-3ans" <?php if($resume[0]->annee_exp == 'debutant-1-a-3ans') echo 'selected' ?>>Débutant (<strong>1</strong> à <strong>3</strong> ans)</option>
                                <option  value="3-a-5-ans" class="3-a-5-ans" <?php if($resume[0]->annee_exp == '3-a-5-ans') echo 'selected' ?>><strong>3</strong> à  <strong>5</strong>  ans</option>
                                <option  value="5-a10-ans" class="5-a10-ans" <?php if($resume[0]->annee_exp == '5-a10-ans') echo 'selected' ?>><strong>5</strong>  à <strong>10</strong>  ans</option>
                                <option  value="10-a-15-ans" class="10-a-15-ans" <?php if($resume[0]->annee_exp == '10-a-15-ans') echo 'selected' ?>><strong>10</strong>  à  <strong>15</strong> ans</option>
                                <option  value="15-ans-et-plus" class="15-ans-et-plus" <?php if($resume[0]->annee_exp == '15-ans-et-plus') echo 'selected' ?>><strong>15</strong> ans et plus</option>
                              </select>
                             
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label">Dernier poste occupé*</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                              <input type="text" class="form-control" name="dernier_poste" value="{{$resume[0]->dernier_poste}}" required placeholder="ex: Chef de service" >
                                @error('dernier_poste')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div id="job-summery" class="row">  
                   
                     <div class="col-12">
                      <label class="col-md-12 col-form-label">Responsabilités du dernier poste occupé</label>
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                          <textarea id="mytextarea" name="responsabilite" class="tinymce-editor tinymce-editor-1"  placeholder="Décrire vos responsabilités lors de votre dernier emploi">{{$resume[0]->responsabilite}}</textarea>
                          @error('responsabilite')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        </div>
                      </div>
                     </div>
                    </div>

                   
               <br><br><h6> Informations sur les motivations du Candidat </h6><br><br>

                  <div id="job-summery" class="row">

                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label"> Quel est votre facteur de motivation ? </label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control"  placeholder="ex: Relever des défis" value="{{$resume[0]->motivation}}" name="motivation">
                                @error('motivation')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                      </div>
                </div>
                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label"> Êtes-vous disponible ?</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                                <select class="form-control" name="disponibilite" required>
                                  <option value="immediatement" <?php if($resume[0]->disponibilite == 'immediatement') echo 'selected' ?>> immediatement </option>
                                  <option value="1 mois" <?php if($resume[0]->disponibilite == '1 mois') echo 'selected' ?>> 1 mois </option>
                                  <option value="1 a 3 mois" <?php if($resume[0]->disponibilite == '1 a 3 mois') echo 'selected' ?>> 1 a 3 mois </option>
                                  <option value="3 a 6 mois" <?php if($resume[0]->disponibilite == '3 a 6 mois') echo 'selected' ?>> 3 a 6 mois </option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>

                  <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label"> Êtes-vous disposés à la mobilité géographique ? ?</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                                <select class="form-control" name="mobilite">
                                  <option value="oui" <?php if($resume[0]->mobilite == 'oui') echo 'selected' ?>> Oui, je le suis </option>
                                  <option value="non" <?php if($resume[0]->mobilite == 'non') echo 'selected' ?>> Non, je ne le suis pas </option>
                                </select>
                               
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-12 col-form-label"> Quelles sont vos prétentions salariales(annuelle)? </label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="ex: 250.000 FCFA"   value="{{$resume[0]->remuneration}}" name="remuneration">
                                @error('remuneration')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                      </div>
                      </div>
                  </div>   <br>


                      @if($job[0]->refs->count()>0)
                      <h6>Veuillez préciser votre niveau de maitrise pour chacune des compétences ci-dessous
                     avant de soumettre votre candidature... </h6>
                     @endif

                              <input type="text" name="id_ent" value="{{$job[0]->id_ent}}" style="display:none; border: 0px; background-color: white;" />
                              <input type="text" name="id_post" id="skill" value="{{$job[0]->id}}" style="display:none; border: 0px; background-color: white;" />
                            @foreach($job[0]->refs as $ref) 
                              <div class="row">
                             <div class="col-md-6">
                             <input type="text" name="skill_{{$loop->index+1}}" id="skill" value="{{$ref->skill}}" style="display:none; border: 0px; background-color: white;" />
                             
                            </div>
                              </div><br>
                              <div class="row">
                              <div class="col-md-6">
                             
                              {{$ref->skill}}

                                  <div class="form-group">
                                  {{-- {{$ref->comp}} --}}
                                    <input type="text" name="ref_id[]" id="ref_id"  value=" {{$ref->ref_id}}" style=" display:none; border: 0px; background-color: white;"/>
                                    <input type="text" name="comp[]" id="comp"  value=" {{$ref->comp}}" style=" display:none; border: 0px; background-color: white;"/>
                                  </div>
                                  
                                </div>
                                <div class="col-md-6">
                                  @if($ref->skill == 'echelle' || $ref->skill == 'chiffre' )
                                  <div class="form-group" id="echelle" >
                                    <label for="customRange2">Choisir une échelle</label>
                                    <input type="range" class="custom-range" min="0" max="10" id="customRange2" name="customRange2[]">
                                  </div>
                                  @else
                                  <div class="form-group" id="choice">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="exampleRadios[]" id="exampleRadios1" value="oui" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Oui
                                      </label>
                                    </div>
                                    <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios[]" id="exampleRadios2" value="oui">
                                            <label class="form-check-label" for="exampleRadios2">
                                              Non
                                            </label>
                                    </div>
                             </div>  

                                  @endif
                                  {{-- <label class="col-md-3 col-form-label">Niveau</label>
                                  <div class="col-md-9">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <select name="level_{{$loop->index+1}}" class="form-control"  id="note" >
                                          <option value="1" >Je peux initier</option>
                                          <option value="2" >Je réalise bien</option>
                                          <option value="3" >Je maitrise</option>
                                          <option value="4" >J’excelle</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div> --}}
                                </div>
                              </div>
                              @endforeach 
                              <h6>Charger vos fichiers</h6>
                              

                              <div class="form-group">
                               <strong>CV:</strong>
                                @if($cv)
                                  <span>{{$cv->title}}</span>
                                  <input  id="up-cv-defaut" name="file_defaut_cv" value="{{$cv->title}}" type="text" style="display:none">
                                  <label>
                                      <span>Charger un nouveau CV (pdf,zip,doc,docx)</span>
                                      <input onchange="sizeValidation()" id="up-cv" name="file_cv" type="file">
                                  </label> 
                                @else
                                
                                <label>
                                  <span>Charger un nouveau CV (pdf,zip,doc,docx)</span>
                                  <input onchange="sizeValidation()" id="up-cv" name="file_cv" type="file" required>
                                </label> 
                                @endif
                              </div>
                              <br>

                              <div class="form-group">
                                <strong>Lettre de motivation:</strong>
                                @if($ltr)
                                  <span>{{$ltr->title}} </span>
                                  <input  id="up-cv-defaut" name="file_defaut_ltr" value="{{$ltr->title}}" type="text" style="display:none">
                                @endif
                                
                                <label>
                                  <span>Charger une Lettre de motivaton(pdf,zip,doc,docx)</span>
                                  <input onchange="sizeValidation()" id="up-ltr" name="file_ltr" type="file">
                                </label>
                              </div>
                              <br>

                              <div class="form-group">
                                  <strong>Autre Document:</strong>
                                  @if($doc)
                                    <span>{{$doc}}</span>
                                    <input  id="up-cv-defaut" name="file_defaut_doc" value="{{$doc->title}}" type="text" style="display:none">
                                  @endif
                                
                                  <label>
                                    <span>Charger autre document(pdf,zip,doc,docx)</span>
                                    <input onchange="sizeValidation()" id="up-doc" name="file_doc" type="file">
                                  </label>
                               
                                
                              </div>

                              <button class="button primary-bg btn-block">Appliquer maintenant</button>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                @endguest
                  </div>
      </div>
      
    </div>
    <!-- Candidates Details End -->
    <script type="text/javascript">
    var class_cv = document.getElementsByClassName("up-cv");
    console.log(class_cv.length)

    function deleteFile(id){
	    document.getElementById('cv_'+id).style.display = "none";
    }

		function sizeValidation(e){
      console.log(e);
			console.log(e.target);

			if(e.file[0].size > 2000000)
			{
				alert("L'image est trop grande"); 
				document.getElementById('up-cv').value = "";
			}
		}
  
      function change(e){
       console.log(e)
      }

      var up_cv = document.getElementById('up-cv');
      var up_cv_1 = document.getElementById('up-cv-1');

      // up_cv.addEventListener('change', function(e) {
      //   var label =  document.getElementById("cv")
      //    var filename = e.target.files[0].name;
         
      //    document.getElementById("up-cv-defaut").value = filename;
      //    label.innerHTML = filename;
      //    label.style.display ='block';

      // })

      

    	function add_file(){
        var div_add_file =  document.getElementById("add_file");
        div_add_file.innerHTML += '<div><input  id="up-cv-defaut" name="file_defaut" value="" type="text" style="display:none"><label><div id="cv"></div><span>Cliquer ici charger un fichier <span>(pdf, doc, docx)</span></span><input onchange="sizeValidation()"  name="file[]" type="file" multiple></label></div><br>';
        console.log(class_cv.length)
      }
    </script>

@endsection