<div class="dashboard-sidebar">
                <div class="user-info">
                  <div class="thumb" style="width:60%;">
                  <img class="image" style="width:80%; height: 100px" src="{{asset('images')}}/{{ Auth::user()->photoUrl }}" onerror="this.src='{{asset('images/briefcase.png')}}';">
                  </div>
                  <div class="user-body">
                  @if (Auth::user())
                    <h5> {{ Auth::user()->name }}</h5>
                  @endif
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">Profil</p>
                    </div>
                  </div>
                </div>
                <div class="dashboard-menu">
                  <ul>
                    <li><i class="fas fa-home"></i><a href="{{url('candidate-dashboard')}}">Dashboard</a></li>
                    <li><i class="fas fa-user"></i><a href="{{url('candidate-profil')}}">Editer votre Profil</a></li>
                    <li><i class="fas fa-file-alt"></i><a href="{{url('candidate-resume')}}">Votre C.V numerique</a></li>
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Supprimer le Compte</a></li>
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
                              <input type="password" class="form-control" placeholder="Enter password">
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
              </div>