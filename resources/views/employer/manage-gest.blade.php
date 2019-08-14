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
                <div class="manage-job-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Gestionnaire</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $j)
                    
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="#">{{$j->nom}}</a></h5>
                          <div class="info">
                            <span class="office-location"><a href="#"><i data-feather="briefcase"></i>{{$j->fonction}}</a></span>
                          </div>
                        </td>
                       
                        <td class="action">
                          <a href="{{url('employer/gestionnaire', $j->id_user)}}" class="edit" title="Edit"><i data-feather="edit"></i></a>
                         @if( $j->id_user != Auth::user()->id)
                          <a href="{{route('employer.delete-gestionnaire',  $j->id_user)}}" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                         @endif
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div>
                    <nav class="navigation pagination">
                      
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