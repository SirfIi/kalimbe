@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('employer.breadcrumb')
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
                <div class="job-title-and-info">
                  <h4><i data-feather="lock"></i> Ajouter un gestionnaire</h4>

                  <div class="buttons">
                  <a class="apply" href="{{url('employer/manage/gestionnaire')}}" data-target="#apply-popup-id">Liste des Gestionnaires du Compte</a>
                </div>
                </div>
                  <form method="POST" action="{{route('create_gest')}}" class="dashboard-form">
                    @csrf
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nom Complet</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nom" required placeholder="Nom complet du Gestionnaire">
                            @error('nom')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                            @enderror
                          </div>
                        </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Fonction</label>
                              <div class="col-sm-9">
                                <input type="text"  name="fonction" class="form-control" required placeholder="Fonction">
                                @error('fonction')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Adresse E-mail professionnelle</label>
                              <div class="col-sm-9">
                                <input type="email"  name="email" class="form-control" required placeholder="email">
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Téléphone professionnel</label>
                              <div class="col-sm-9">
                                <input type="tel"  name="tel" class="form-control" required placeholder="Téléphone">
                                @error('tel')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type de compte</label>
                                <div class="col-sm-9">
                                    <select  name="type_gest" class="form-control">
                                        <option value="master" >Administrateur</option>
                                        <option value="slave" >Ordinaire</option>
                                    </select>
                                </div>
                          </div>

                          <div class="form-group row" style="display:none">
                            <div class="col-sm-9">
                                <input type="text" name="site"  value="{{Auth::user()->site}}" class="form-control" placeholder="">
                                @error('site')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group row" style="display:none">
                            <div class="col-sm-9">
                                <input type="text"  name="adresse"  value="{{Auth::user()->adresse}}" class="form-control" placeholder="">
                            </div>
                          </div>

                          <div class="form-group row" style="display:none">
                            <div class="col-sm-9">
                                <input type="text"  name="checked2"  value="{{Auth::user()->checked2}}" class="form-control" placeholder="">
                            </div>
                          </div>

                          <div class="form-group row" style="display:none">
                            <div class="col-sm-9">
                                <input type="text"  name="secteur"  value="{{Auth::user()->secteur}}" class="form-control" placeholder="">
                            </div>
                          </div>

                          <div class="form-group row" style="display:none">
                            <div class="col-sm-9">
                                <input type="text"  name="pays"   value="{{Auth::user()->pays}}" class="form-control" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mot de passe</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" >
                            </div>
                          </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <button type="submit" class="button">Enregister</button>
                        </div>
                      </div>
                  </form>
                  <br>
                </div>
                @include('shared.emp-dashboard-menu')
              </div>
            </div>
          </div>
        </div>
      </div>  

@endsection