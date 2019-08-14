<header class="header-2">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="{{url('/')}}"><img src="images/logo-2.png" alt=""></a>
              </div>
              <div class="header-top-toggler">
                <div class="header-top-toggler-button"></div>
              </div>
              <div class="top-nav">
                <div class="dropdown header-top-account login-modals">
                  <button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong">Login</button>
                  <button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong2">S'enregistrer</button>
                </div>
                <select class="selectpicker select-language" data-width="fit">
                  <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                  <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                </select>
              </div>
            </div>
            <nav class="navbar navbar-expand-lg cp-nav-2">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="menu-item active"><a title="Home" href="{{url('/')}}">Accueil</a></li>
                  <li class="menu-item dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="job-listing.html">Job Listing</a></li>
                      <li class="menu-item"><a  href="job-listing-with-map.html">Job Listing With Map</a></li>
                      <li class="menu-item"><a  href="job-details.html">Job Details</a></li>
                      <!-- <li class="menu-item"><a  href="post-job.html">Post Job</a></li> -->
                    </ul>
                  </li>
    
                  <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Les Employeurs</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item"><a  href="employer-listing.html">Listing Employeurs</a></li>
                      <li class="menu-item"><a  href="employer-details.html">Employer Details</a></li>
                    </ul>
                  </li>

                  <li class="menu-item dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    <ul  class="dropdown-menu">
                      <li class="menu-item dropdown">
                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Candidate Dashboard</a>
                        <ul class="dropdown-menu">
                          <li class="menu-item"><a  href="dashboard.html">Tableau de Bord</a></li>
                          <li class="menu-item"><a  href="resume.html">Votre Curriculum</a></li>
                          <li class="menu-item"><a  href="edit-resume.html">Editer votre Curriculum</a></li>
                          <li class="menu-item"><a  href="dashboard-edit-profile.html">Editer votre Profil</a></li>
                          <li class="menu-item"><a  href="add-resume.html">Gerer vos CV</a></li>
                          <li class="menu-item"><a  href="dashboard-applied.html">Vos Emplois appliqués</a></li>
                        </ul>
                      </li>
                      <li class="menu-item dropdown">
                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employer Dashboard</a>
                        <ul class="dropdown-menu">
                          <li class="menu-item"><a  href="{{ url('employer') }}" >Tableau de bord</a></li>
                          <li class="menu-item"><a href="{{ url('employer-edit') }}">Editer le Profil</a></li>
                          <li class="menu-item"><a href="{{ url('employer-manage-job') }}">Les Candidatures</a></li>
                          <li class="menu-item"><a href="{{ url('employer-manage-candidate') }}">Les Offres</a></li>
                          <li class="menu-item"><a href="{{ url('employer-publish') }}">Publier une Offre</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    
     <!-- Modal -->
     <div class="account-entry">
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="user"></i>Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group">
                  <input type="email" placeholder="Adresse Email" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Mot de passe" class="form-control">
                </div>
                <div class="more-option">
                  <a href="#">Mot de passe oublié?</a>
                </div>
                <button class="button primary-bg btn-block">Login</button>
              </form>
              <div class="shortcut-login">
                <p>Vous n'avez pas encore de compte? <a href="#">S'enregistrer</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Enregistrement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="account-type">
                <label for="idRegisterCan">
                  <input id="idRegisterCan" type="radio" name="register">
                  <span>Candidat</span>
                </label>
                <label for="idRegisterEmp">
                  <input id="idRegisterEmp" type="radio" name="register">
                  <span>Employeur</span>
                </label>
              </div>
              <form action="#">
                <div class="form-group">
                  <input type="text" placeholder="Nom d'utilisateur" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Adresse Email" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Mot de Passe" class="form-control">
                </div>
                <div class="more-option terms">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                      J'accepte les <a href="#">  termes & conditions</a>
                    </label>
                  </div>
                </div>
                <button class="button primary-bg btn-block">Enregistrer</button>
              </form>
              <div class="shortcut-login">
                <p>Vous avez déja un compte? <a href="#">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>