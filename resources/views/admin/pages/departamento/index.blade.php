@extends('layouts.admin')

@section('title', 'Dashboard!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Departamentos'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        
        @if (Session::get('success'))
          <div class="text-center"><small id="openMessage" class="text-success ">{{ session()->get('success') }}</small></div>
        @endif


        <div class="form-group">
          <a href="{{ route('admin.departamento.create') }}"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
          <a href="{{ route('admin.import.departamento.index') }}" class="btn btn-warning btn-sm mx-2" type="button">Importar</a>
        </div>

        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-dark text-white">
                <th>COD.</th>
                <th>Departamento</th>
                <th>Ativo</th>
                <th class="text-center" width="60">Editar</th>
                {{-- <th class="text-center" width="60"></th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($departamentos as $departamento)
              <tr>
                <td  id="demoNotify">{{$departamento->cod_departamento}}</td>
                <td>{{$departamento->nome}}</td>
                <td>{{ $departamento->ativo == '1' ? 'SIM' : 'NÃO' }}</td>
                <td>
                  <a href="{{ route('admin.departamento.edit', $departamento->id) }}" class="btn btn-warning fa fa-pencil-square-o"></a>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {!! $departamentos->links() !!}
        </div>
      </div>
    </div>
  </div>

@endsection
