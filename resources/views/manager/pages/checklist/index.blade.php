@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Checklists'])

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="form-group">
              <a href="{{ route('manager.checklist.create') }}"><button class="btn btn-primary btn-sm mx-2" type="button">Criar Checklist</button></a>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-striped table-sm">
                <thead>
                  <tr class="bg-dark text-white">
                    <th width="80">COD</th>
                    <th width="200">Checklist</th>
                    <th>Setor</th>
                    <th>Usuário</th>
                    <th>Tipo Checklist</th>
                    <th>Ativo</th>
                    <th class="text-center" width="100">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($checklists as $checklist)
                  <tr>
                    <td  id="demoNotify">{{$checklist->id}}</td>
                    <td>{{ $checklist->nome }}</td>
                    <td>{{ $checklist->tipo_tarefas }}</td>
                    <td>{{$checklist->setor}}</td>
                    <td>{{$checklist->user}}</td>                    
                    <td>@if ($checklist->ativo) <span class="badge badge-success">Sim</span>  @else <span class="badge badge-danger">Não</span> @endif</td>
                    <td>
                        <a href="{{ route('manager.checklist.tarefas.index', $checklist->id) }}" class="btn btn-info fa fa-eye"></a>
                        <a href="{{ route('manager.checklist.edit', $checklist->id) }}" class="btn btn-warning fa fa-pencil-square-o"></a>
                    </td>
                  </tr>                  
                  @endforeach
                </tbody>
              </table>
            </div>
            <div>
              {!! $checklists->links() !!}
            </div>
          </div>
        </div>
    </div>
    
    
@endsection
