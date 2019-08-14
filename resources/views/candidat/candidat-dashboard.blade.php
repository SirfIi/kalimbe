@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('candidat.breadcrumb')
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="dashboard-applied">
                  <h4 class="apply-title">Vous avez appliqué à <span>{{$nb}}</span> emploi(s)</h4>
                  <div class="dashboard-apply-area">
                    @foreach($cand as $c)
                    <div class="job-list">
                      <div class="thumb">
                        <a href="#">
                        <img class="image" src="{{'images'}}/{{$c->photoUrl_ent}}"  onerror="this.src='images/briefcase.png';">
                        </a>
                      </div>
                      <div class="body">
                        <div class="content">
                          <h4><a href="#">{{$c->poste_titre}}</a></h4>
                          <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>{{$c->name_ent}}</a></span>
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$c->localisation}}</a></span>
                            @if($c->type_contrat == 'CDD Temps plein')
                            <span class="full-time"><a href="#"><i data-feather="clock"></i>{{$c->type_contrat}}</a></span>
                            @elseif($c->type_contrat == 'CDD Temps partiel')
                            <span class="part-time"><a href="#"><i data-feather="clock"></i>{{$c->type_contrat}}</a></span>
                            @elseif($c->type_contrat == 'CDI Temps plein')
                            <span class="freelance"><a href="#"><i data-feather="clock"></i>{{$c->type_contrat}}</a></span>
                            @else
                            <span class="temporary"><a href="#"><i data-feather="clock"></i>{{$c->type_contrat}}</a></span>
                            @endif

                            @if($c->cand_status == '0')
                            <span class="full-time"><a href="#">Candidature rejettée</a></span>
                            @elseif($c->cand_status == '1')
                            <span class="company"><a href="#">Candidature en Attente</a></span>
                            @else
                            <span class="company"><a href="#">Candidature Acceptée</a></span>
                            
                            @endif
                          </div>
                        </div>
                       
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @include('shared.cand-dash-menu')
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection