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
            <form method="post" action="{{ route('manager.checklist.store') }}">
              @csrf
              <div class="form-group">

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label >Nome</label>
                    <input class="form-control" name="nome" type="text" placeholder="Digite o nome da tarefa">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Tipo Checklist</label>
                    <select class="form-control" name="categoria_tarefa">
                      <option >Selecione o tipo</option>
                      @foreach ($categoria_tarefas as $categoria_tarefa)
                        <option value="{{ $categoria_tarefa->id}}" type="text">{{ $categoria_tarefa->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao" type="text" placeholder="Digite a descrição da tarefa"></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Ativo</label>
                    <div class="toggle-flip">
                      <label class="form-check-label">
                        <input type="checkbox" name="ativo" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input class="form-control" name="descricao" type="text" placeholder="Digite a descrição da tarefa">
                </div>
                
                <div class="form-group">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>

                  <div class="form-group col-md-4">
                    <label >Tipo Checklist</label>
                    <select class="form-control" name="categoria_tarefa">
                      <option >Selecione o tipo</option>
                      @foreach ($categoria_tarefas as $categoria_tarefa)
                        <option value="{{ $categoria_tarefa->id}}" type="text">{{ $categoria_tarefa->nome }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                  
                    
                    
                </div>
    
                {{-- <div class="form-group col-md-6 mx-0 px-0">
                  <label >Setor</label>
                  <select class="form-control" name="setor">
                    <option >Selecione o setor</option>
                    @foreach ($setores as $setor)
                      <option value="{{ $setor->id}}" type="text">{{ $setor->nome }}</option>
                    @endforeach
                  </select>
                </div> --}}
    
                {{-- <div class="form-group col-md-6 mx-0 px-0">
                  <label >Tipo Checklist</label>
                  <select class="form-control" name="tipo_tarefas">
                    <option >Selecione o tipo</option>
                    @foreach ($tipo_tarefas as $tipo_tarefa)
                      <option value="{{ $tipo_tarefa->id}}" type="text">{{ $tipo_tarefa->nome }}</option>
                    @endforeach
                  </select>
                </div> --}}
    
                <label class="control-label pt-2">Ativo</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="ativo" value="ativo" checked><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>
            
          </div>
          <div class="tile-footer">
            <a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
          </div>
        </form>
        </div>
    </div>   
    
@endsection
