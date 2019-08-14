@extends('shared.master')

@section('title', 'Kalimbe')

@section('content')
<div class="padding-top-90 padding-bottom-90 access-page-bg">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="access-form">
              <div class="form-header">
                <h5><i data-feather="user"></i>Login</h5>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <label class="col-md-6 col-form-label text-md-left">{{ __('Adresse E-Mail') }}</label>
                  <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group">
                <label class="col-md-6 col-form-label text-md-left">{{ __('Mot de Passe') }}</label>
                    <div class="col-md-12">
                    <input id="_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="more-option">
                  <div class="mt-0 terms">
                    <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                    <label for="radio-4">
                      <span class="dot"></span>{{ __('Se souvenir de moi') }}
                    </label>
                  </div>
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                      </a>
                    @endif
                </div>
                <button class="button primary-bg btn-block">Login</button>
              </form>
              <div class="shortcut-login">
                <p>Vous n'avez pas encore de Compte?<a href="{{ url('register_') }}">S'enregistrer</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection