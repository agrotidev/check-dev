@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Usuarios'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="form-group">
          <a href="#"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
          <button class="btn btn-warning btn-sm mx-2" type="button">Importar</button>
        </div>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-dark text-white">
                <th width="80">COD.</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Gerente</th>
                <th>Lider</th>
                <th>Mobile</th>
                <th>Ativo</th>
                <th class="text-center" width="60">Editar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $usuario)
              <tr>
                <td  id="demoNotify">{{$usuario->code}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->ismanager }}</td>
                <td>{{ $usuario->islider }}</td>
                <td>{{ $usuario->mobile }}</td>
                <td>{{ $usuario->active == '1' ? 'SIM' : 'NÃO' }}</td>
                <td>
                    <a href="#" class="btn btn-warning fa fa-pencil-square-o"></a>
                </td>
              </tr>                  
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {!! $usuarios->links() !!}
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