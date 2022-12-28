@extends('layouts.admin')

@section('title', 'Setor')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Cadastro - Setor'])

<div class="row">
  <div class="col-12">
    <div class="tile">

      @if (Session::get('error'))
        <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
      @endif

      <div class="col-md-12 mx-0 px-0">
        <form method="post" action="{{ route('admin.setor.store') }}">
          @csrf
          <div class="form-group">

            <label >Cod. Setor</label>
            <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control my-2  col-md-3" name="cod_setor" type="text"  placeholder="Digite o código do setor" maxlength="6">

            <label >Nome</label>
            <input class="form-control col-md-6" name="nome" type="text" placeholder="Digite o nome do setor">


            <div class="form-group col-md-6 mx-0 px-0">
              <label >Departamento</label>
              <select class="form-control" name="departamento">
                <option >Selecione o departamento</option>
                @foreach ($departamentos as $departamento)
                  <option value="{{ $departamento->id}}" type="text">{{ $departamento->nome }}</option>
                @endforeach
              </select>
            </div>

            <label class="control-label pt-2">Ativo</label>
            <div class="toggle-flip">
              <label class="form-check-label">
                <input type="checkbox" name="ativo" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
              </label>
            </div>
          </div>
        
      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.setor.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
      </div>
    </form>
    </div>
  </div>
 
@endsection