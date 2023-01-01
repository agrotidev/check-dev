@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Checklists Grupos'])

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="form-group">
              <a href="#"><button class="btn btn-primary btn-sm mx-2" type="button">Criar Grupo</button></a>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-striped table-sm">
                <thead>
                  <tr class="bg-dark text-white">
                    <th width="80">COD</th>
                    <th width="200">Nome</th>
                    <th>Checklists</th>
                    <th>Usuários</th>
                    <th>Ativo</th>
                    <th class="text-center" width="100">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Grupo Nome</td>
                    <td>2</td>
                    <td>2</td>
                    <td>SIM</td>
                    <td>
                        <a href="#" class="btn btn-info fa fa-eye"></a>
                        <a href="#" class="btn btn-warning fa fa-pencil-square-o"></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
    </div>


@endsection
