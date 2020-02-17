@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="candidate-details">
              <div class="title-and-info">
                <div class="title">
                  <div class="thumb">
                  
                  <img class="image" style="width:95%; height: 100px" src="{{asset('images')}}/{{$res->photoUrl }}" onerror="this.src='{{asset('images/briefcase.png')}}';">
                  </div>
                  <div class="title-body">
                    <h4>{{$res->nom}}</h4>
                    <div class="info">
                      <span class="candidate-designation"><i data-feather="check-square"></i>{{$res->domaine_etude}}</span><br>
                      <span class="candidate-location"><i data-feather="map-pin"></i>{{$res->residence}}</span>
                    </div>
                  </div>
                </div>

                <div class="download-resume">
                  @if(Auth::user()->type == 30)
                  <a href="#" data-toggle="modal" data-target="#exampleModalLong3">Désactiver ce Compte</a>
                  @endif
                </div>
              
                {{-- <div class="download-resume">
                  @if($hasCv > 0)
                  @if($cv)
                  <a href="{{route('download.file', $cv->id)}}">Telecherger le  CV <i data-feather="download"></i></a>
                  @endif
                  @else
                  <a href="#" style="background-color: #DC143C;">Ce Candidat n'a pas encore charger un CV </a>
                  @endif
                </div> --}}
              </div>
             
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-12 col-lg-8">
                  <div class="basic-info-input">
                 
                    <h6> Compétences et formations</h6><br><br>
                    <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Niveau d'etude*</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="titre_cv" placeholder=" {{$res->niveau_etude}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Dernier poste occupé*</label>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" id="last_p" placeholder="{{$res->dernier_poste}} " disabled style="border: 0px; background-color: white; font-size: 124%;" >
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Domaine d'étude*</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{$res->domaine_etude}} " disabled style="border: 0px; background-color: white; font-size: 124%;" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Expérience globale*</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="last_p" placeholder="{{$res->annee_exp}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                    </div>

                    <div id="job-summery" class="row">

                     <div class="col-12">
                      <label class="col-md-6 col-form-label">Domaine de compétence du dernier poste occupé</label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
  
                          {!! $res->responsabilite !!} 
                          </div>
                        </div>
                      </div>
                     </div>
                    </div> <br>

                    <h6> Informations sur candidat </h6><br><br>

                  <div id="job-summery" class="row">

                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label">Genre*</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{$res->genre}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Date de naissance*</label>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-group datepicker">
                                <input type="text" class="form-control" id="last_p" placeholder=" {{$res->date_naiss}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
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
                                <input type="text" class="form-control" id="last_p" placeholder="{{$res->nationalite}}" disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Pays de résidence</label>
                            <div class="col-md-6">
                                <div>
                                  <input type="text" class="form-control" id="last_p" placeholder=" {{$res->residence}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                                </div>
                            </div>
                      </div>
                  </div>    
               <br><br><h6> Informations sur les motivations du candidat </h6><br><br>

                  <div id="job-summery" class="row">

                      <div class="col-md-6">
                          <label class="col-md-4 col-form-label"> Facteur de motivation </label>
                          <div class="col-md-8">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" id="last_p" placeholder="{{$res->motivation}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                            </div>
                      </div>
                </div>
                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label"> Disponibilite </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder="{{$res->disponibilite}} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                        </div>
                  </div>

                  <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label"> Mobilite </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder="{{$res->mobilite}}" disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-4 col-form-label">  Prétentions salariales(annuelle)? </label>
                          <div class="col-md-8">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" id="last_p" placeholder=" {{$res->remuneration}}" disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                            </div>
                      </div>
                      </div>
                  </div>   <br>
                  </div>

                  @if($cv || $ltr || $doc)
                  <br><br><h6> Télécharger les fichiers du candidat </h6><br>
                  @endif
                  <div class="col-xl-6 offset-xl-1 col-lg-4">
                      @if($cv)
                        <a href="{{route('download.file', $cv->id)}}">
                          <strong>CV: </strong> {{$cv->title}}
                          <i data-feather="download"></i>
                        </a>
                      @endif
                  </div><br>
                  <div class="col-xl-6 offset-xl-1 col-lg-4">
                      @if($ltr)
                        <a href="{{route('download.file', $ltr->id)}}">
                          <strong>Lettre de motivation: </strong> {{$ltr->title}}
                          <i data-feather="download"></i>
                        </a>
                      @endif
                  </div><br>

                  <div class="col-xl-6 offset-xl-1 col-lg-4">
                      @if($doc)
                        <a href="{{route('download.file', $doc->id)}}">
                          <strong>Autre document: </strong> {{$doc->title}}
                          <i data-feather="download"></i>
                        </a>
                      @endif
                  </div><br>


                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
	   	<div class="modal fade modal-delete" id="exampleModalLong3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4><i data-feather="trash-2"></i>Supprimer Ce Candidat</h4>
                        <p>Êtes-vous sûr! Vous voulez supprimer le candidat <b></b>. Cela ne peut pas être annulé!</p>
                        <div class="job-title-and-info">
                          <div class="buttons">
                            <a class="apply" href="{{route('candidat.delete', $res->id_cand)}}" style="background-color: #DC143C;">Supprimer</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Candidates Details End -->
@endsection