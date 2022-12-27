@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Teste'])

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div>
              @foreach ($categoriaTarefa as $i => $tarefas)    
                Categoria Tarefa: {{ $tarefas[0]->categoria_tarefa }} <br><br>

                @foreach ($tarefas as $tarefa)
                    Tarefa: {{ $tarefa->nome }}<br>
                    Descricao Tarefa: {{ $tarefa->descricao }}<br>
                @endforeach
                <br>

              @endforeach
            </div>
          </div>
        </div>
    </div>
    
    
@endsection
