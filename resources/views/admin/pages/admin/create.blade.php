@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Cadastro - Administrador'])

<div class="row">
  <div class="col-12">
    <div class="tile">

      @if (Session::get('error'))
        <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
      @endif

      <div class="col-md-12 mx-0 px-0">
        <form method="post" action="#">
          @csrf
          <div class="form-group">
            
            <div class="form-row">            
              <div class="form-gorup col-md-2">
                <label >Matrícula</label><br>
                <input class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="code" type="number"  placeholder="Digite seu código" maxlength="6">
              </div>
                    
              <div class="form-group col-md-5">
                <label >Nome</label>
                <input class="form-control" name="name" type="text" placeholder="Digite seu nome">
              </div>
  
              <div class="form-group col-md-5">
                <label >E-mail</label>
                <input class="form-control" name="name" type="text" placeholder="Digite seu e-mail">                  
              </div>
          
            </div>

            <div class="form-row">

              <div class="form-group col-md-1">
                <label>Ativo</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="active" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>

            </div>

      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.administrador.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
      </div>
    </form>
    </div>
  </div>
 
@endsection