@extends('layouts.manager')

@section('title', 'Grupo')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Cadastro - Grupo Checklist'])

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
              <div class="form-group col-md-6">
                <label >Nome</label>
                <input class="form-control" value="{{ old('nome') }}" name="nome" type="text" placeholder="Digite o nome do Grupo">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label >Descrição</label>
                <textarea class="form-control"name="descricao" type="text" placeholder="Digite a descrição"></textarea>
              </div>
            </div>
            

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="control-label pt-2">Ativo</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="ativo" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>
            </div>
            
          </div>
        
      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('manager.checklist.grupo.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
      </div>
    </form>
    </div>
  </div>
 
@endsection