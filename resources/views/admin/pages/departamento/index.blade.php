@extends('layouts.admin')

@section('title', 'Dashboard!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Departamentos'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="form-group">
          <a href="{{ route('admin.departamento.create') }}"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
          <button class="btn btn-warning btn-sm mx-2" type="button">Importar</button>
          <button class="btn btn-info btn-sm mx-2" type="button">Exportar</button>
        </div>

        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-primary text-white">
                <th>COD.</th>
                <th>Departamento</th>
                <th>Ativo</th>
                <th class="text-center" width="60"></th>
                <th class="text-center" width="60"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($departamentos as $departamento)
              <tr>
                <td  id="demoNotify">{{$departamento->cod_departamento}}</td>
                <td>{{$departamento->nome}}</td>
                {{-- <td>Otto</td> --}}
                <td>{{ $departamento->ativo == '1' ? 'SIM' : 'NÃO' }}</td>
                {{-- <td >
                  <a href="#" class="btn btn-outline-info btn-sm">Visualizar</a>
                </td> --}}
                <td>
                    <button onclick="alerta({{ $departamento->id}})" class="btn btn-warning fa fa-pencil-square-o" type="submit"></button>

                </td>
                <td>
                    <form action="{{ route('admin.departamento.destroy', $departamento->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <i class="btn btn-danger fa fa-trash show-delete-box"></i>
                    </form>
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
