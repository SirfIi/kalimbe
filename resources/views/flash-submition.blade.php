@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
<div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
          <div class="row no-gliters">
            <div class="col">
              <div class="dashboard-container">
                <div class="dashboard-content-wrapper">
                <br><br>
                  <form   method="POST" action="{{ route('candidat.resume') }}" class="job-post-form">
                     @csrf
                    <div class="basic-info-input">
                        <div id="job-title" class="form-group row">
                          <label class="col-md-3 col-form-label">Titre</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" name="titre" value="{{$resume->titre}}" placeholder="Un titre à votre cv">
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
                                    <option>Bac</option>
                                    <option>Bac + 2</option>
                                    <option>Bac + 3</option>
                                    <option>Bac + 4</option>
                                    <option>Bac + 5 </option>
                                    <option>Bac + 8</option>
                                    <option>Bac + 8 et plus </option>
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
                                      <option>Finance</option>
                                      <option> Justice / Réglémentation </option>
                                      <option> Comptabilité </option>
                                      <option> Informatique </option>
                                      <option> Télécommunication </option>
                                      <option> Électromécanique </option>
                                      <option> Santé </option>
                                      <option> Ressources Humaines </option>
                                      <option> Art </option>
                                      <option> Marketing </option>
                                      <option> Transfromation digitale </option>
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
                                    <option>{{$resume->annee_exp}}</option>
                                    <option>0 à 1ans</option>
                                    <option>1 à 3ans</option>
                                    <option>3 à 5ans</option>
                                    <option>5 à 10ans</option>
                                    <option>10ans et plus</option>
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
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="dernier_poste" value="{{$resume->dernier_poste}}" placeholder="ex: Chef de service" >
                                  </div>
                                </div>
                              </div>
                          </div>
                         <div class="col-12">
                          <label class="col-md-12 col-form-label">Responsabilités du dernier poste occupé</label>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="form-group">
                              <textarea id="mytextarea" name="responsabilite" class="tinymce-editor tinymce-editor-1"  placeholder="Décrire vos responsabilités lors de votre dernier emploi">{{$resume->responsabilite}}</textarea>
                              </div>
                            </div>
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
                                        @foreach($all as $c)
                                          <option>{{ $c->country_name}}</option>
                                        @endforeach 
                                          
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
                                          @foreach($all as $c)
                                            <option>{{ $c->country_name}}</option>
                                          @endforeach  
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
                                    <input type="text" class="form-control"  placeholder="ex: Relever des défis" name="motivation">
                                  </div>
                                </div>
                          </div>
                    </div>
                          <div class="col-md-6">
                              <label class="col-md-3 col-form-label"> Êtes-vous disponible ?</label>
                              <div class="col-md-9">
                                <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control" name="disponobilite">
                                      <option>{{$resume->disponobilite}}</option>
                                      <option value="oui"> Oui, je le suis </option>
                                      <option value="non"> Non, je ne le suis que partiellement </option>
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
@endsection