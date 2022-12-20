@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Setores'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="form-group">
          <a href="{{ route('admin.setor.create') }}"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
          <button class="btn btn-warning btn-sm mx-2" type="button">Importar</button>
          <button class="btn btn-info btn-sm mx-2" type="button">Exportar</button>
        </div>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-dark text-white">
                <th width="80">COD.</th>
                <th>Setor</th>
                <th>Departamento</th>
                <th>Ativo</th>
                <th class="text-center" width="60">Editar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($setores as $setor)
              <tr>
                <td  id="demoNotify">{{$setor->cod_setor}}</td>
                <td>{{$setor->nome}}</td>
                <td>{{ $setor->departamento }}</td>
                <td>{{ $setor->ativo == '1' ? 'SIM' : 'NÃO' }}</td>
                <td>
                    <a href="{{ route('admin.setor.edit', $setor->id) }}" class="btn btn-warning fa fa-pencil-square-o"></a>
                </td>
              </tr>                  
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {!! $setores->links() !!}
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