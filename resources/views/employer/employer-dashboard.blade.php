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

                <div class="dashboard-section user-statistic-block">
                  <div class="user-statistic">
                    <i data-feather="command"></i>
                    <h3>{{$jobCount}}</h3>
                    <span>Emplois publiés</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="file-text"></i>
                    <h3>{{$appCount}}</h3>
                    <span>Candidatures Totales</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="users"></i>
                    <h3>{{$ac}}</h3>
                    <span>Candidatures Retenues</span>
                  </div>
                </div>
                <div class="dashboard-section dashboard-view-chart">
                  <canvas class="view-chart" id="view-chart" width="400" height="200"></canvas>
                </div>
              </div>
              @include('shared.emp-dashboard-menu')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  var apps = {!! json_encode($app) !!};
  var jobs = {!! json_encode($jobs) !!};
 
  var mois = [];
  var mois_app = ['0']; 
  var mois_job = ['0'];     
  var nbApp = []; 
  var nbJobs = []; 

  for (let i = 0; i<apps.length; i++) { 
    let exist = false;
    for(let j=0; j<mois_app.length; j++){
      if(apps[i].created_at.substr(0, 7) == mois_app[j].substr(0, 7)){
        exist = true;
        break;
      }
    }

    if(exist == false){
      mois_app.push( apps[i].created_at.substr(0, 7) );
    }
  }

  mois_app = mois_app.sort();

  for (let i = 0; i<mois_app.length; i++) { 
    let c = 0;
    for (let j = 0; j<apps.length; j++) { 
      if(apps[j].created_at.substr(0, 7) == mois_app[i].substr(0, 7)){
       c++
      }
    }
    nbApp.push(c);
  }
  // ///////////

  for (let i = 0; i<jobs.length; i++) { 
    let exist = false;
    for(let j=0; j<mois_job.length; j++){
      if(jobs[i].created_at.substr(0, 7) == mois_job[j].substr(0, 7)){
        exist = true;
        break;
      }
    }

    if(exist == false){
      mois_job.push( jobs[i].created_at.substr(0, 7) );
    }
  }

  for (let i = 0; i<mois_job.length; i++) { 
    let c = 0;
    for (let j = 0; j<jobs.length; j++) { 
      if(jobs[j].created_at.substr(0, 7) === mois_job[i].substr(0, 7)){
       c++;
      }
    }
    nbJobs.push(c);
  }


  if(mois_job.length>mois_app.length){
    mois =mois_job;
  }else{
    mois =mois_app;
  }
</script>

@endsection