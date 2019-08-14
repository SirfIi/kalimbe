@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('employer.breadcrumb')
    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                  <img  style="width:100%" class="image" src="{{asset('images')}}/{{ $ent[0]->photoUrl }}"  onerror="this.src='{{asset('images/briefcase.png')}}';">
                  </div>
                  <div class="title-body">
                    <h4>{{$post->titre}}</h4>
                    <div class="info">
                      <span class="company"><a href="#"><i data-feather="briefcase"></i>{{$ent[0]->name}}</a></span>
                      <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$post->localisation}}</a></span>
                      @if($post->type_contrat == 'CDD Temps plein')
                          <span class="full-time"><a href="#"><i data-feather="clock"></i>{{$post->type_contrat}}</a></span>
                          @elseif($post->type_contrat == 'CDD Temps partiel')
                          <span class="part-time"><a href="#"><i data-feather="clock"></i>{{$post->type_contrat}}</a></span>
                          @elseif($post->type_contrat == 'CDI Temps plein')
                          <span class="freelance"><a href="#"><i data-feather="clock"></i>{{$post->type_contrat}}</a></span>
                          @else
                          <span class="temporary"><a href="#"><i data-feather="clock"></i>{{$post->type_contrat}}</a></span>
                      @endif
                    </div>
                  </div>
                </div>
                @if($post->status == 0)
                <div class="buttons">
                  <a class="apply" href="{{route ('employer.job-active', $post->id)}}" data-target="#apply-popup-id">Activer le poste</a>
                </div>
                @elseif($post->status == 1)
                <div class="buttons">
                  <a class="apply" href="{{route ('employer.job-desactive', $post->id)}}" data-target="#apply-popup-id">Desactiver le poste</a>
                </div>
                @endif
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Description</h4>
                      {!!  $post->description  !!}
                    </div>
                    <div class="responsibilities details-section">
                      <h4><i data-feather="zap"></i>Responsabilités</h4>
                      
                      {!!  $post->responsabilities  !!}
                      
                    </div>
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Criteres du poste</h4>
                      <ul>
                        <li> {{$post->diplome}}  </li>
                        <li> {{$post->domaine_etude}}</li>
                        <li> {{$post->niveau_etude}}</li>
                        <li> {{$post->annee_exp}}</li>
                        <li> {{$post->nationalite}}</li>
                      </ul>
                    </div><br>
                   
  
                    <div class="other-benifit details-section">
                    <h4><i data-feather="align-left"></i>Réferences du poste</h4>
                    @foreach($refs as $r)
                      <ul>
                        <li>  {{ $r->skill  }} : {{ $r->comp  }} <br>
                              Note : {{ $r->level  }} /4 
                       </li>       
                      </ul>
                      @endforeach
                    </div>
   
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Details du poste</h4>
                        <ul>
                          <li><span>Date de publication:</span> {{ date_format(date_create($post->created_at),"d-m-Y")}}  </li>
                          <li><span>Type de contrat:</span> {{$post->type_contrat}}</li>
                          <li><span>Expérience requise:</span>{{$post->annee_exp}}</li>
                          <li><span>Lieu:</span>{{$post->localisation}}</li>
                          <li><span>Rémuneration:</span>{{$post->remuneration}}</li>
                          <li><span>Nationalité:</span> {{$post->nationalite}}</li>
                          <li><span>Date limite de soumission:</span> {{ date_format(date_create($post->date_exp),"d-m-Y")}}</li>
                          
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
    <!-- Candidates Details End -->
@endsection