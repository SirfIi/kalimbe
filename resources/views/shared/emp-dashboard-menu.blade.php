<div class="dashboard-sidebar">

                <div class="company-info">
                  <div class="thumb">
                    @if($ent[0]->photoUrl)
                  <img class="image" src="{{asset('images/$ent[0]->photoUrl')}}"  onerror="this.src='{{asset('images/briefcase.png')}}';">
                  @endif
                  </div>
                  <div class="company-body">
                  @if (Auth::user())
                    <h5> {{ $ent[0]->name }}</h5>
                  @endif
                    <span></span>
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">Profile</p>
                    </div>
                   
                  </div>
                </div>
<div class="dashboard-menu">
                  <ul>
                    <li class="activeClass" ><i class="fas fa-home"></i><a href="{{ url('employer') }}">Tableau de bord</a></li>
                  
                    @if($user->count() > 0 )

                      @if($user[0]->type_gest =='master')
                        <li class="activeClass"><i class="fas fa-user"></i><a href="{{ url('employer-edit') }}">Editer le Profil</a></li>
                      @endif
                   
                    @elseif($user->count() == 0  )
                    <li class="activeClass"><i class="fas fa-user"></i><a href="{{ url('employer-edit') }}">Editer le Profil</a></li>
                    @endif

                    <li class="activeClass"><i class="fas fa-plus-square"></i><a href="{{ url('employer-publish') }}">Publier une Offre</a></li>
                    <li class="activeClass"><i class="fas fa-clipboard"></i><a href="{{ url('employer-manage-job') }}">Les Offres</a></li>
                    <li class="activeClass"><i class="fas fa-file"></i><a href="{{ url('employer-candidatures') }}">Les Candidatures</a></li>
                   
                    @if($user->count() > 0 ) 
                      @if($user[0]->type_gest =='master')
                      <li class="activeClass"><i class="fas fa-user-plus"></i><a href="{{ url('gestionnaire') }}">Ajouter un Gestionnaire</a></li>
                      @endif
                    @elseif($user->count() ==0 )
                    <li class="activeClass"><i class="fas fa-user-plus"></i><a href="{{ url('gestionnaire') }}">Ajouter un Gestionnaire</a></li>
                    @endif
                    @if(Auth::user()->type == 30 )
                    <li class="activeClass"><i class="fas fa-briefcase"></i><a href="{{ url('entreprises') }}">Entreprises</a></li>
                    <li class="activeClass"><i class="fas fa-users"></i><a href="{{ url('candidats') }}">Candidats</a></li>
                    @endif
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Supprimer le Profil</a></li>
                  </ul>
                  <!-- Modal -->
                  <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="trash-2"></i>Supprimer le Compte</h4>
                          <p>Êtes-vous sûr! Vous voulez supprimer votre profil. Cela ne peut pas être annulé!</p>
                          <form action="#">
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Mot de passe">
                            </div>
                            <div class="buttons">
                              <button class="delete-button">Enregistrer les changements</button>
                              <button class="">Annuler</button>
                            </div>
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" checked="">
                              <label class="form-check-label">Vous acceptez nos <a href="#">Termes et Conditions</a> et les <a href="#">Politiques de confidentialité</a></label>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>