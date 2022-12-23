@extends('layouts.admin')

@section('title', 'Departamento!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Editar - Departamento'])

<div class="row">
  <div class="col-12">
    <div class="tile">

      @if (Session::get('error'))
        <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
      @endif

      <div class="col-md-12 mx-0 px-0">
        <form method="post" action="{{ route('admin.departamento.update', $departamento->id) }}">
          @csrf
          @method('put')

          <div class="form-group">

            <label >Cod. Departamento</label>
            <input disabled onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control my-2  col-md-3" name="cod_departamento" value="{{ $departamento->cod_departamento}}" maxlength="6">

            <label >Nome</label>
            <input class="form-control col-md-6" value="{{ $departamento->nome }}"  name="nome" type="text" placeholder="Digite o nome do departamento">

            <label class="control-label pt-2">Ativo</label>
            <div class="toggle-flip">
              <label class="form-check-label">
                <input type="checkbox" name="ativo" value="{{ $departamento->ativo }}" {{ $departamento->ativo == true ? 'checked': '' }} ><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
              </label>
            </div>
          </div>

      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
      </div>
    </form>
    </div>
  </div>

@endsection
