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
                      <span class="candidate-designation"><i data-feather="check-square"></i>{{$res->domaine_etude}}</span>
                      <span class="candidate-location"><i data-feather="map-pin"></i>{{$res->residence}}</span>
                    </div>
                  </div>
                </div>
                @if($status->status==1 )
                <div class="download-resume" >
                  <a href="{{route('application.reject', ['id_cand'=>$id_cand, 'id_post'=>$id_post])}}" style="background-color: red;">Rejetter cette Candidature <i data-feather="check-square"></i></a>
                </div>

                <div class="download-resume" >
                  <a href="{{route('application.accept', ['id_cand'=>$id_cand, 'id_post'=>$id_post])}}" style="background-color: green;">Retenir cette Candidature <i data-feather="check-square"></i></a>
                </div>
                @elseif($status->status ==2)
                <div class="download-resume" >
                  <a href="{{route('application.reject', ['id_cand'=>$id_cand, 'id_post'=>$id_post])}}" style="background-color: #DC143C;">Rejetter cette Candidature <i data-feather="check-square"></i></a>
                </div>
                @elseif($status->status ==0)
                <div class="download-resume" >
                  <a href="{{route('application.accept', ['id_cand'=>$id_cand, 'id_post'=>$id_post])}}" style="background-color: green;">Retenir cette Candidature <i data-feather="check-square"></i></a>
                </div>
                @endif
                @if($hasCv > 0)
                <div class="download-resume">
                  <a href="{{route('download.file', $id_cand )}}">Telecherger le  CV <i data-feather="download"></i></a>
                </div>
                @else
                <a href="#" style="background-color: #DC143C;">Ce Candidat n'a pas encore charger un CV </a>
                @endif
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
                            <input type="text" class="form-control" id="titre_cv" placeholder=" {{ $res->niveau_etude }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Dernier poste occupé*</label>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->dernier_poste }} " disabled style="border: 0px; background-color: white; font-size: 124%;" >
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Domaine d'étude*</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->domaine_etude}} " disabled style="border: 0px; background-color: white; font-size: 124%;" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Expérience globale*</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->annee_exp }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                    </div>

                    <div id="job-summery" class="row">

                     <div class="col-12">
                      <label class="col-md-6 col-form-label">Domaine de compétence du dernier poste occupé</label>
                      <div class="col-md-6">
                        
                        <h4>  {!! $res->responsabilite !!}</h4>
                        
                      </div>
                     </div>
                    </div> <br>

                    <h6> Informations sur candidat </h6><br><br>

                  <div id="job-summery" class="row">

                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label">Genre*</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{$res->genre }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Date de naissance*</label>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-group datepicker">
                                <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->date_naiss }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
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
                                <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->nationalite }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">Pays de résidence</label>
                            <div class="col-md-6">
                                <div>
                                  <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->residence }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
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
                                <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->motivation }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                            </div>
                      </div>
                </div>
                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label"> Disponibilite </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->disponibilite }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                        </div>
                  </div>

                  <div id="job-summery" class="row">
                      <div class="col-md-6">
                          <label class="col-md-3 col-form-label"> Mobilite </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->mobilite }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-4 col-form-label">  Prétentions salariales(annuelle)? </label>
                          <div class="col-md-8">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="text" class="form-control" id="last_p" placeholder=" {{ $res->remuneration }} " disabled style="border: 0px; background-color: white; font-size: 124%;">
                              </div>
                            </div>
                      </div>
                      </div>
                  </div>   <br>
                  </div>
                  <h6><i data-feather="feather"></i>Compétences Personnelles</h6>
                  @foreach($refs as $ref)  
                    <div class="professonal-skill details-section">
                      <div class="progress-group">
                        <div class="progress-item">
                          <div class="progress-head">
                            <p class="progress-on"> {{ $ref->comp }} </p>
                          </div>
                          <div class="progress-body">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="{{ ($ref->level/4)*100 }}" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                            </div>
                            <p class="progress-to">{{ ($ref->level/4)*100 }}%</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
      
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->
@endsection