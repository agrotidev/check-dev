@extends('layouts.auth')

@section('title', 'Forgot')

@section('content')

<div class="login-box flipped">
  <form class="forget-form" method="post" action="{{ route('admin.forgot') }}">
      @csrf

      <h4 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Esqueceu a Senha ?</h4>

      @if (Session::get('success'))
      <small id="openMessage" class="text-success">{{ session()->get('success') }}</small>
      @endif

      <div class="form-group">
          <label class="control-label">EMAIL</label>
          <input class="form-control" type="text" name="email" placeholder="Email">
          <small id="openMessage" class="text-danger">@error('email') {{$message}} @enderror</small>
      </div>

      <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Confirmar</button>
      </div>
      <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="{{ route('admin.login') }}" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Voltar Login</a></p>
      </div>
  </form>
</div>
    
@endsection