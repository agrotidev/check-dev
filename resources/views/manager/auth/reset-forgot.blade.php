@extends('layouts.auth')

@section('title', 'Reset Login')

@section('content')


<div class="login-box" style="height: 450px;">
  <form class="login-form" method="POST" action="{{ route('manager.reset') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <h4 class="login-head center">Crie uma nova senha!</h4>

    @if ($errors->has('email'))
      <div class="text-center"><small id="openMessage" class="text-danger ">E-mail invalido!</small></div>
    @endif

    @if (Session::get('fail'))
    <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('fail') }}</small></div>
    @endif

    @if (Session::get('success'))
    <div class="text-center"><small id="openMessage" class="text-success ">{{ session()->get('success') }}</small></div>
    @endif


    <div class="form-group">
        <label class="control-label">E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}">
    </div>
    <div class="form-group">
        <label class="control-label">Senha</label>
        <input class="form-control" type="password" name="password" placeholder="Senha" autofocus>
        <small id="openMessage" class="text-danger">@error('password') {{$message}} @enderror</small>
    </div>
    <div class="form-group">
        <label class="control-label">Confirme sua Senha</label>
        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirme a senha" value="{{ old('password_confirmation') }}" >
        <small id="openMessage" class="text-danger">@error('password_confirmation') {{$message}} @enderror</small>
    </div>
    <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Salvar</button>
    </div>
  </form>
</div>

@endsection