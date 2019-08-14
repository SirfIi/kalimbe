<header class="header-2">
<div class="container">
  <div class="row">
    <div class="col">
      <div class="header-top">
        <div class="logo-area">
          <a href="{{url('/')}}"><img src="{{asset('images/youmann.jpg')}}" alt=""></a>
        </div>
        <div class="header-top-toggler">
          <div class="header-top-toggler-button"></div>
        </div>
        <div class="top-nav">
          @guest
            <div class="dropdown header-top-account login-modals">
               <a  href="{{ url('login_') }}">Se connecter</a>
            </div>
            <div class="dropdown header-top-account login-modals">
              <a  href="{{ url('register_') }}">S'enregistrer</a>
            </div>
          @else
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Se deconnecter') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            @endguest
          </div>
        </div>

            <nav class="navbar navbar-expand-lg cp-nav-2">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="menu-item active">
                    <a title="Home" href="{{url('/')}}">Accueil</a>
                  </li>
                  <li class="menu-item dropdown">
                    <a href="{{ route('jobtheque') }}"  aria-haspopup="false" aria-expanded="false">Offres d'emplois</a>
                  </li>
    
                  @if (Auth::user())
                    @if (Auth::user()->type == 10)
                    <li class="menu-item dropdown">
                      <a href="{{ url('candidate-dashboard') }}"   aria-haspopup="false" aria-expanded="false">Mon espace</a>
                    </li>
                    @else
                    <li class="menu-item dropdown">
                      <a href="{{ url('cv-theque') }}"   aria-haspopup="false" aria-expanded="false">C.V-Thèque</a>
                    </li>
                    <li class="menu-item dropdown">
                      <a href="{{ url('employer') }}"   aria-haspopup="false" aria-expanded="false">Mon espace</a>
                    </li>
                    @endif
                  @endif
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
              <h5 class="modal-title"><i data-feather="user"></i>{{ __('Login') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Adresse E-Mail') }}</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Mot de passe') }}</label>
                  <div class="col-md-6">
                    <input id="_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                          {{ __('Se souvenir de moi') }}
                        </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                      </a>
                    @endif
                  </div>
                </div>
              </form>


              <div class="shortcut-login">
                <p>Vous n'avez pas encore de compte? <a href="#">S'enregistrer</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      @guest
      <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Créez un Compte Candidat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <div id="registerForm" >
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label for="name" class="col-md-5 col-form-label text-md-left">{{ __('Nom') }}</label>
                  <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nom complet" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div id ="secteurDiv" class="form-group" style="display: none" >
                  <label for="secteur" class="col-md-5 col-form-label text-md-left">{{ __('Secteur') }}</label>
                  <div class="col-md-12">
                    <input id="secteur" type="text" class="form-control @error('secteur') is-invalid @enderror" name="secteur" value="null" placeholder="Secteur d'activité"  autocomplete="secteur" autofocus>
                      @error('secteur')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div id ="descriptionDiv" class="form-group" style="display: none" >
                  <label for="description" class="col-md-5 col-form-label text-md-left">{{ __('Description') }}</label>
                  <div class="col-md-12">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="null" placeholder="Description de votre Entreprise"  autocomplete="description" autofocus>
                      @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div id ="tailleDiv" class="form-group" style="display: none" >
                  <label for="taille" class="col-md-5 col-form-label text-md-left">{{ __('Taille') }}</label>
                  <div class="col-md-12">
                    <input id="taille" type="text" class="form-control @error('taille') is-invalid @enderror" name="taille" value="1" placeholder="Nombre d'employés de votre Entreprise" >
                      @error('taille')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group" style="display: none" style="display: none">
                  <div class="col-md-12">
                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="10">
                      @error('type')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-md-5 col-form-label text-md-left">{{ __('Adresse E-mail') }}</label>
                  <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Votre adresse E-mail" required autocomplete="email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div id ="siteDiv" class="form-group" style="display: none">
                  <label for="site" class="col-md-5 col-form-label text-md-left">{{ __('Site Web') }}</label>
                  <div class="col-md-12">
                    <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="null" placeholder="Votre Site Web" autocomplete="site">
                      @error('site')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div  id ="adresseDiv" class="form-group">
                  <label for="adresse" class="col-md-5 col-form-label text-md-left">{{ __('Adresse') }}</label>
                  <div class="col-md-12">
                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" placeholder="" required autocomplete="adresse" autofocus>
                      @error('adresse')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div  id ="villeDiv" class="form-group">
                  <label for="ville" class="col-md-5 col-form-label text-md-left">{{ __('Ville') }}</label>
                  <div class="col-md-12">
                    <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" placeholder="" required autocomplete="Ville" autofocus>
                      @error('ville')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                <div  id ="paysDiv" class="form-group">
                  <label for="pays" class="col-md-5 col-form-label text-md-left">{{ __('Pays') }}</label>
                  <div class="col-md-12">
                      <select  id="search-location" name='pays'>
                      <option>Localisation</option>
                        @foreach($all as $c)
                          <option>{{ $c->country_name}}</option>
                          @endforeach  
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tel" class="col-md-5 col-form-label text-md-left">{{ __('Téléphone') }}</label>
                  <div class="col-md-12">
                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" placeholder="" required autocomplete="tel" autofocus>
                      @error('tel')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-md-5 col-form-label text-md-left">{{ __('Mot de passe') }}</label>
                  <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="password-confirm" class="col-md-5 col-form-label text-md-left">{{ __('Confirmer le mot de passe') }}</label>
                  <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
               
                <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                <label for="ReCaptcha">Recaptcha:</label>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                  </div>
                </div>
                  <div class="form-group">
                    <input class="form-check-input" type="checkbox"  name="checked2" class="form-control @error('checked2') is-invalid @enderror" value="checked" id="checked2" required>
                    <label class="form-check-label" for="checked2">
                      J'accepte les <a href="#">  termes & conditions</a>
                    </label>
                    @error('checked2')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  
              
                <button class="button primary-bg btn-block" type="submit"> {{ __('Enregistrer') }}</button>
              </form>
              </div>
              <div class="shortcut-login"> <p>Vous avez déja un compte? </p>
                <button type="button" data-dismiss="modal" aria-label="Close">
                  Login
                </button>
              </div>


            </div>
          </div>
        </div>
      </div>
      @endguest
    </div>


  