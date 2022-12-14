@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Checklist'])

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="form-group">
              <a href="{{ route('manager.checklist.create') }}"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-striped table-sm">
                <thead>
                  <tr class="bg-primary text-white">
                    <th width="80">COD</th>
                    <th width="200">Checklist</th>
                    <th>Setor</th>
                    <th>Usuário</th>
                    <th>Tipo Checklist</th>
                    <th>Ativo</th>
                    {{-- <th class="text-center" width="150">Ações</th> --}}
                    <th class="text-center" width="100">Opções</th>
                    {{-- <th class="text-center" width="60">Editar</th> --}}
                    {{-- <th class="text-center" width="60"></th> --}}
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
                    <td>{{ $checklist->ativo == '1' ? 'SIM' : 'NÃO' }}</td>
                    <td>
                        <a href="#" class="btn btn-info fa fa-eye"></a>
                        <a href="#" class="btn btn-warning fa fa-pencil-square-o"></a>
                        {{-- <a href="{{ route('admin.setor.edit', $setor->id) }}"  onclick="alerta({{ $setor->id}})" class="btn btn-warning fa fa-pencil-square-o" type="submit"></a> --}}
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
