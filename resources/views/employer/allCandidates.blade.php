@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
@include('employer.breadcrumb')
<div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="manage-candidate-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Tous les Candidats </th>
                         <th>Niveau d'adéquation</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($cand as $c)
                   
                   
                     <tr class="candidates-list">
                        <td class="title">
                          <div class="body">
                            <h5><a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}">Ref: {{ $c->ref_cand }} </a></h5>
                            <div class="info">
                          <!--     <span class="designation"><a href="#"><i data-feather="check-square"></i>Senior UI / UX Designer</a></span> -->
                              <span class="location"><a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}"><i data-feather="map-pin"></i> {{ $c->pays_res }} </a></span>
                            </div>
                          </div>
                        </td>
                        <td>
                         <div class="row">
                              <div class="col-md-9">
                                <div class="progress-body">
                                <div class="progress">
                                <div class="progress-bar" 
                               role="progressbar" aria-valuenow="{{ round($c->note_finale, 1) }}"
                               aria-valuemin="0" aria-valuemax="100" style=""></div>
                          </div>
                      </div>
                       <p class="status">{{ round($c->note_finale, 1) }}%</p>
                              </div>
                        </div> 
                        </td>
                        <td class="status">
                            @if(($c->postdom == $c->resumdom) || ($c->postniv == $c->resniv) || ($c->postann == $c->resann) || ($c->zone == $c->pays_res))
                            <i data-feather="check-circle"></i>Présélectionné
                            @else
                            Candidature Rejettée
                            @endif
                        </td>
                        <td class="action">
                          <a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}" class="download"><i data-feather="eye"></i></a>
                        </td>
                      </tr>      
                      
                      
                     @endforeach
                    </tbody>
                  </table>
                 
                </div>
              </div>
                @include('shared.emp-dashboard-menu')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection