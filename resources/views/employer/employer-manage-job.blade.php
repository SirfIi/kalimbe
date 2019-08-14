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
                <div class="manage-job-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Titre du poste</th>
                        <th>Applications</th>
                        <th>Date d'expiration</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $j)
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="#">{{$j->titre}}</a></h5>
                          <div class="info">
                            <span class="office-location"><a href="#"><i data-feather="map-pin"></i>{{$j->localisation}}</a></span>
                            @if($j->type_contrat == 'CDD Temps plein')
                            <span class="full-time"><a href="#"><i data-feather="clock"></i>{{$j->type_contrat}}</a></span>
                            @elseif($j->type_contrat == 'CDD Temps partiel')
                            <span class="part-time"><a href="#"><i data-feather="clock"></i>{{$j->type_contrat}}</a></span>
                            @elseif($j->type_contrat == 'CDI Temps plein')
                            <span class="freelance"><a href="#"><i data-feather="clock"></i>{{$j->type_contrat}}</a></span>
                            @else
                            <span class="temporary"><a href="#"><i data-feather="clock"></i>{{$j->type_contrat}}</a></span>
                            @endif
                          </div>
                        </td>
                        <td class="application"><a href="{{route('employer.manage-candidate', $j->id)}}">{{ $j->candidatures->count()}} Application(s)</a></td>
                        <td class="deadline">{{ date_format(date_create($j->date_exp),"d-m-Y")}}</td>
                        @if($j->status==0)
                        <td class="status pending">En attente</td>
                        @elseif($j->status==1)
                        <td class="status active">Active</td>
                        @else
                        <td class="status expired">Expirée</td>
                        @endif
                        <td class="action">
                          <a href="{{ route('employer.job-summary', $j->id) }}" class="preview" title="Preview"><i data-feather="eye"></i></a>
                          <a href="{{route('employer.job-edit',  $j->id)}}" class="edit" title="Edit"><i data-feather="edit"></i></a>
                          <!-- <a href="{{route('employer.job-delete', $j->id)}}" class="remove" title="Delete"><i data-feather="trash-2"></i></a> -->
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div>
                    <nav class="navigation pagination">
                      <div>{{$jobs->links()}}</div>
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