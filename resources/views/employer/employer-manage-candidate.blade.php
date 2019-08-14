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
                        <th>Job Title</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($cand as $c)
                     @if(($c->postdom == $c->resumdom) || ($c->postniv == $c->resniv) || ($c->postann == $c->resann) || ($c->zone == $c->pays_res))
                     <tr class="candidates-list">
                        <td class="title">
                          <div class="thumb">
                            <img src="dashboard/images/user-1.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="body">
                            <h5><a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}">Ref: {{ $c->ref_cand }} </a></h5>
                            <div class="info">
                          <!--     <span class="designation"><a href="#"><i data-feather="check-square"></i>Senior UI / UX Designer</a></span> -->
                              <span class="location"><a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}"><i data-feather="map-pin"></i> {{ $c->pays_res }} </a></span>
                            </div>
                          </div>
                        </td>
                        <td class="status"><i data-feather="check-circle"></i>Présélectionné</td>
                        <td class="action">
                          <a href="{{route('shortlisted.detail', ['id_cand'=>$c->ref_cand, 'id_post'=>$c->id_post])}}" class="download"><i data-feather="eye"></i></a>
                        </td>
                      </tr>      
                      @endif
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