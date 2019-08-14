@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
 <!-- Breadcrumb -->
 <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Liste des emplois</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liste des emplois</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <form action="#">
                <input type="text" placeholder="Entrez les mots-clés">
                <button><i data-feather="search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->


@endsection