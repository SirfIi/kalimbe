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
                
              </div>
              @include('shared.cand-dash-menu')
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection