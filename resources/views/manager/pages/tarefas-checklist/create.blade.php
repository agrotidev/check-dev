@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Criar Tarefa'])

    <div class="row">
      <div class="col-12">
        <div class="tile">
    
          @if (Session::get('error'))
            <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
          @endif
    
          <div class="col-md-12 mx-0 px-0">
            <form method="post" action="{{ route('manager.checklist.tarefas.store', $checklist->id) }}">
              @csrf

              <div class="form-group">

                <div class="form-row">
                  
                  <div class="form-group col-md-6">
                    <label >Nome</label>
                    <input class="form-control" name="nome" type="text" placeholder="Digite o nome da tarefa">
                  </div>
                  @if (($checklist->tipo_tarefas === 3))
                    <div class="form-group col-md-6">
                      <label >Tipo Checklist</label>
                      <select class="form-control" name="categoria_tarefa">
                        <option >Selecione o tipo</option>
                        @foreach ($categoria_tarefas as $categoria_tarefa)
                          <option value="{{ $categoria_tarefa->id}}" type="text">{{ $categoria_tarefa->nome }}</option>
                        @endforeach
                      </select>
                    </div> 
                  @endif
                  
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Descrição</label>
                    <input class="form-control" name="descricao" type="text" placeholder="Digite a descrição da tarefa" />
                  </div>

                  {{-- <div class="form-group col-md-3">
                    <label >Valor</label>
                    <input class="form-control" name="valor" type="text" placeholder="Digite o valor">
                  </div> --}}

                  <div class="form-group col-md-3">
                    <label class="control-label pt-2">Ativo</label>
                    <div class="toggle-flip">
                      <label class="form-check-label">
                        <input type="checkbox" name="ativo" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                      </label>
                    </div>
                </div>
    
            
          </div>
          <div class="tile-footer">
            <a class="btn btn-secondary" href="{{ route('manager.checklist.tarefas.index', $checklist->id) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
          </div>
        </form>
        </div>
    </div>   
    
@endsection
