@extends('layouts.admin')

@section('title', 'Dashboard!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Departamento'])



  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="col-md-5 mx-0 px-0">
          <form>
            <div class="form-group">
              <label class="control-label">Departamento</label>
              <input class="form-control" type="text" placeholder="Digite o departamento">

              <label class="control-label pt-2">Ativo</label>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="active">Sim
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="active">Não
                </label>
              </div>
            </div>
          </form>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <div class="tile-body">
          <form>
            <div class="form-group">
              <label class="control-label">Departamento</label>
              <input class="form-control" type="text" placeholder="Digite o departamento">

              <label class="control-label pt-2">Ativo</label>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="active">Sim
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="active">Não
                </label>
              </div>
            </div>
          </form>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form class="row">
            <div class="form-group col-md-3">
              <label class="control-label">Departamento</label>
              <input class="form-control" type="text" placeholder="Digite o departamento">
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Ativo</label>
              <div class="form-check">
                <label class="form-check-label mr-3">
                  <input class="form-check-input" type="radio" name="gender">Sim
                </label>
                <label class="form-check-label ml-3">
                  <input class="form-check-input" type="radio" name="gender">Não
                </label>
              </div>
            </div>
            <div class="form-group col-md-4 align-self-end">
              <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Departamentos</h3>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-primary text-white">
                <th>#</th>
                <th>Cod_Dep</th>
                <th>Descrição</th>
                <th>Ativo</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>NAO</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>NAO</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Departamentos</h3>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-primary text-white">
                <th>#</th>
                <th>Cod_Dep</th>
                <th>Descrição</th>
                <th>Ativo</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>NAO</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>NAO</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Departamentos</h3>
        <div class="table-responsive-sm">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="bg-primary text-white">
                <th>#</th>
                <th>Cod_Dep</th>
                <th>Descrição</th>
                <th>Ativo</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>SIM</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>NAO</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>NAO</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection