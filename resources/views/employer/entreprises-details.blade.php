@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
<!-- Company Details -->
<div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="job-title-and-info">
          <div class="buttons">
            <a class="apply" href="#" data-toggle="modal" data-target="#modal-delete" >Désactiver ce Compte</a>
          </div>
        </div>
         <!-- Modal -->
         <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="trash-2"></i>Supprimer le Compte</h4>
                          <p>Êtes-vous sûrs de vouloir désactiver ce Compte? Cela ne peut pas être annulé!</p>
                          <div class="job-title-and-info">
                            <div class="buttons">
                              <a class="apply" href="{{route('entreprise.delete',$emp[0]->id )}}" style="background-color: #DC143C;" >Supprimer</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        <div class="row">
          <div class="col">
            <div class="company-details">
              <div class="title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="{{asset('images')}}/{{$emp[0]->photoUrl}}" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4>{{$emp[0]->name}}</h4>
                    <div class="info">
                      <span class="company-type"><i data-feather="briefcase"></i>{{$emp[0]->secteur}}</span>
                      <span class="office-location"><i data-feather="map-pin"></i>{{$emp[0]->ville}}, {{$emp[0]->pays}}</span>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="details-information padding-top-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="about-details details-section">
                      <h4><i data-feather="align-left"></i>À propos </h4>
                      {!!  $emp[0]->description  !!}
                    </div>
                    
                    <div class="open-job details-section">
                      <h4><i data-feather="check-circle"></i>Offres d'emploi</h4>
                      @foreach($posts as $p)
                      <div class="job-list">
                        <div class="body">
                          <div class="content">
                            <h4><a href="{{route('jobdetail', $p->id)}}">{{$p->titre}} </a></h4>
                            <div class="info">
                              <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$p->localisation}}</a></span>
                              <span class="job-type temporary"><a href="#"></i>{{$p->type_contrat}}</a></span>
                            </div>
                          </div>
                          <div class="more">
                            <p class="deadline">Date d'expiration: {{$p->date_exp}}</p>
                          </div>
                        </div>
                      </div>
                     @endforeach
                     
                    </div>
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-contact">
                      <div class="information">
                        <h4>Information</h4>
                        <ul>
                          <li><span>Categorie:</span>{{$emp[0]->secteur}}</li>
                          <li><span>Localisation:</span>{{$emp[0]->ville}}, {{$emp[0]->pays}}</li>
                          <li><span>Telephone:</span> {{$emp[0]->tel}}</li>
                          <li><span>Email:</span> {{$emp[0]->email}}</li>
                          <li><span>Taille de la Compagnie:</span> {{$emp[0]->taille}}</li>
                          <li><span>Site Web:</span> <a href="#">{{$emp[0]->site}}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Company Details End -->
@endsection