@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Tarefas Checklist'])

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <label >Nome</label>
          <h6>{{ $checklist->nome }}</h6>
          <small>{{ $checklist->descricao }}</small>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="form-group">
              <a href="{{ url()->previous() }}" class="btn btn-info fa fa-arrow-left"></a>
              <a href="{{ route('manager.checklist.tarefas.create', $checklist->id) }}"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar Tarefa</button></a>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-striped table-sm">
                <thead>
                  <tr class="bg-dark text-white">
                    <th width="80">COD</th>
                    <th width="200">Nome</th>
                    <th>Descricão</th>
                    <th>Categoria Tarefas</th>
                    <th>Ativo</th>
                    <th class="text-center" width="100">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($checklist->tarefas as $tarefa)
                  <tr>
                    <td >{{ $tarefa->id }}</td>
                    <td >{{ $tarefa->nome }}</td>
                    <td >{{ $tarefa->descricao }}</td>
                    <td >{{ $tarefa->categoria_tarefa }}</td>
                    <td>{{ $tarefa->ativo == '1' ? 'SIM' : 'NÃO' }}</td>
                    <td>
                      <a href="#" class="btn btn-info fa fa-eye"></a>
                      <a href="#" class="btn btn-warning fa fa-pencil-square-o"></a>
                  </td>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div>
              {{-- {!! $checklists->links() !!} --}}
            </div>
          </div>
        </div>
    </div>
    
    
@endsection
