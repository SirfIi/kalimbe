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
                <form method="POST" action="{{route('edit_gest')}}" class="dashboard-form" >
                  @csrf
                    <div class="dashboard-section basic-info-input">
                        <h4><i data-feather="user-check"></i>Informations sur Le Gestionnaire</h4>
                        <input type="text" class="form-control" name ='id_user' value="{{ $thisUser[0]->id_user }}" required style="display:none">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nom </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ='name' value="{{ $thisUser[0]->nom }}" required placeholder="Nom de l'Entreprise">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ='email' value="{{ $thisUser[0]->email }}" required placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fonction</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ='fonction' value="{{ $thisUser[0]->fonction }}" required placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Téléphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ='tel' value="{{ $thisUser[0]->tel }}" required placeholder="email@example.com">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type de Compte</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" required>
                                    <option value="master" <?php if($thisUser[0]->type_gest == 'master'){echo("selected");}?> >Administrateur </option>
                                    <option value="slave" <?php if($thisUser[0]->type_gest == 'slave'){echo("selected");}?> >Ordinaire</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4">
                        
                      </div>
                      <div class="col-sm-4">
                        <button class="button">Sauvegarder</button>
                      </div>
                      <div class="col-sm-4">
                       
                      </div>
                    </div>
                </form>
              </div>
                @include('shared.emp-dashboard-menu')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection