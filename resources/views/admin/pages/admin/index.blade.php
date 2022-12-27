@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Administradores'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="form-group">
          <a href="#"><button class="btn btn-primary btn-sm mx-2" type="button">Adicionar</button></a>
        </div>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-dark text-white">
                <th width="80">ID.</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ativo</th>
                <th class="text-center" width="60">Editar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $admin)
              <tr>
                <td>{{$admin->id}}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->active == '1' ? 'SIM' : 'NÃO' }}</td>
                <td>
                    <a href="#" class="btn btn-warning fa fa-pencil-square-o"></a>
                </td>
              </tr>                  
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {!! $admins->links() !!}
        </div>
      </div>
    </div>
  </div>
    
@endsection
