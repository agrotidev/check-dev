@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="login-box" style="height: 450px;">
  <form class="login-form" method="post" action="{{route('manager.login')}}">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>

      @if (Session::get('error'))
        <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
      @endif

      @if (Session::get('info'))
        <div class="text-center"><small id="openMessage" class="text-primary ">{{ session()->get('info') }}</small></div>
      @endif

      <div class="form-group">
          <label class="control-label">E-mail</label>
          <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
      </div>
      <div class="form-group">
          <label class="control-label">SENHA</label>
          <input class="form-control" type="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
          <div class="utility">
              <div class="animated-checkbox">
                  <label>
                      <input type="checkbox" name="remember"><span class="label-text">Lembrar</span>
                  </label>
              </div>
              <p class="semibold-text mb-2"><a href="{{ route('manager.forgot') }}">Esqueceu a Senha ?</a></p>
          </div>
      </div>
      <div class="form-group btn-container">
        <a href="{{ route('manager.login')}}">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
        </a>
    </div>
  </form>
</div>
    
@endsection