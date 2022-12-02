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
                {{-- <th>Descrição</th> --}}
                <th>Ativo</th>
                {{-- <th class="text-center" width="150">Ações</th> --}}
                <th class="text-center" width="60"></th>
                {{-- <th class="text-center" width="60"></th> --}}
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
                  {{-- <form action="{{ route('admin.departamento.destroy', $departamento->id) }}" method="POST">
                    @csrf
                    @method('DELETE') --}}
                    <button onclick="alerta({{ $departamento->id}})" class="btn btn-outline-warning btn-sm" type="submit">Editar</button>
                  {{-- </form> --}}
                </td>
                {{-- <td >
                  <a href="#" class="btn btn-outline-info btn-sm">Visualizar</a>
                  <a href="#" class="btn btn-outline-warning btn-sm">Editar</a>
                </td> --}}
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

@section('scripts')

<script>
  
  function alerta(departamento) {
    return Swal.fire({
            title: 'Deseja apagar o registro?',
            showCancelButton: true,
            cancelButtonText: 'NÃO',
            confirmButtonText: 'SIM',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              Swal.fire('Deletado!', 'Registro apagado com sucesso!', 'success')
            }
          });
  }
</script>
    
@endsection