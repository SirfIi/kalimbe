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
                  
                    @if($cand->count() ==0)
                    <div >
                    <p style="font-size: 32px">Il n'y a pas encore de candidatures pour le poste de <b>{{$post[0]->titre}}</b></p>
                    </div>
                    @else
                    <div class="download-resume">
                        <a href="{{route('employer.allcandidates', $cand[0]->postid)}}">Voir Toutes les candidatures </i></a>
                    </div>
                    
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID du Candidat</th>
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
                            <h5><a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}"> Ref: {{ $c->ref_cand }}</a></h5>
                            <div class="info">
                              <span class="location"><a href=""><i data-feather="map-pin"></i> {{ $c->pays_res }}  </a></span>
                             
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
                        <td class="status"><i data-feather="check-circle"></i>Présélectionné</td>
                   <!--     <td class="status">{{ date_format(date_create($c->date_cand),"d-m-Y")}}</td> -->
                        <td class="action">
                         <a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}" class="download"><i data-feather="eye"></i></a>
                        </td>
                      </tr>
                     
                     
                     
                     
               <!--      <tr class="candidates-list">
                        <td class="title">
                          <div class="body">
                            <h5><a href=""></a></h5>
                            <div class="info">
                              <span class="location"><a href=""></a></span>
                            </div>
                          </div>
                        </td>
                        <td class="status"><i data-feather="map-pin"></i> </td>
                        <td class="status"> 
                     <div class="progress-body">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                        </div>
                        <p class="progress-to"> %</p>
                      </div></td>
                        <td class="status"><i data-feather="check-circle"></i>Présélectionné</td>
                        <td class="status"></td>
                        <td class="action">
                          <a href="" class="download"><i data-feather="eye"></i></a>
                        </td>
                      </tr> -->
                      
                     @endforeach
                    </tbody>
                  </table>
                  @endif
                  <div>
                    <nav class="navigation pagination">
                      <div>{{$cand->links()}}</div>
                    </nav>                
                  </div>
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