@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
<!-- Company Details -->
<div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="company-details">
              <div class="title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="{{asset('images')}}/{{$emp->photoUrl}}" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4>{{$emp->name}}</h4>
                    <div class="info">
                      <span class="company-type"><i data-feather="briefcase"></i>{{$emp->secteur}}</span>
                      <span class="office-location"><i data-feather="map-pin"></i>{{$emp->localisation}}</span>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="details-information padding-top-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="about-details details-section">
                      <h4><i data-feather="align-left"></i>À propos de nous</h4>
                      {!!  $emp->description  !!}
                    </div>
                    
                    <div class="open-job details-section">
                      <h4><i data-feather="check-circle"></i>Offres en cours</h4>
                      <div class="job-list">
                        <div class="body">
                          <div class="content">
                            <h4><a href="job-details.html">Restaurant Team Member - Crew </a></h4>
                            <div class="info">
                              <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                              <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                            </div>
                          </div>
                          <div class="more">
                            <div class="buttons">
                              <a href="#" class="button">Apply Now</a>
                             
                            </div>
                            <p class="deadline">Deadline: Oct 31,  2019</p>
                          </div>
                        </div>
                      </div>
                      <div class="job-list">
                        <div class="body">
                          <div class="content">
                            <h4><a href="job-details.html">Restaurant Team Member - Crew </a></h4>
                            <div class="info">
                              <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                              <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                            </div>
                          </div>
                          <div class="more">
                            <div class="buttons">
                              <a href="#" class="button">Apply Now</a>
                             
                            </div>
                            <p class="deadline">Deadline: Oct 31,  2019</p>
                          </div>
                        </div>
                      </div>
                      <div class="job-list">
                        <div class="body">
                          <div class="content">
                            <h4><a href="job-details.html">Restaurant Team Member - Crew </a></h4>
                            <div class="info">
                              <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                              <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                            </div>
                          </div>
                          <div class="more">
                            <div class="buttons">
                              <a href="#" class="button">Apply Now</a>
                              
                            </div>
                            <p class="deadline">Deadline: Oct 31,  2019</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-contact">
                      <div class="information">
                        <h4>Information</h4>
                        <ul>
                          <li><span>Categorie:</span>{{$emp->secteur}}</li>
                          <li><span>Localisation:</span>{{$emp->ville}}, {{$emp->pays}}</li>
                          <li><span>Telephone:</span> {{$emp->tel}}</li>
                          <li><span>Email:</span> {{$emp->email}}</li>
                          <li><span>Taille de la Compagnie:</span> {{$emp->taille}}</li>
                          <li><span>Site Web:</span> <a href="#">{{$emp->site}}</a></li>
                        </ul>
                      </div>
                      <div class="buttons">
                        <a href="#" class="button contact-button" data-toggle="modal" data-target="#exampleModal">Contactez Nous</a>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade contact-form-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h4><i data-feather="edit"></i>Contactez Nous</h4>
                              <form action="#">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Votre Nom">
                                </div>
                                <div class="form-group">
                                  <input type="email" class="form-control" placeholder="Votre Email">
                                </div>
                                <div class="form-group">
                                  <textarea class="form-control" placeholder="Votre Message"></textarea>
                                </div>
                                <button class="button">Soumettre</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="share-job-post">
                      <span class="share">Réseux sociaux:</span>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      <a href="#"><i class="fab fa-google-plus-g"></i></a>
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