@extends('layouts.admin')

@section('title', 'Dashboard!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Departamentos'])


  <div class="row">
    <div class="col-md-12">
      <div class="tile">

        @if (Session::get('error'))
          <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
        @endif

        <div class="form-group">
          <a href="{{ route('admin.departamento.index') }}" class="btn btn-info btn-sm mx-2 fa fa-arrow-left"></a>
          <hr>
        </div>

        <div class="form-group title">
          <form class="import" action="{{ route('admin.import.departamento.xls') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label><i class="fa fa-upload" aria-hidden="true"></i> Importar Departamento</label>
            <input class="form-control-file"  name="file" type="file" aria-describedby="fileHelp">
            @if (Session::get('error'))
              <div id="openMessage" class="mt-1 text-danger">{{ session()->get('error') }}</div>
            @endif
            <hr>
            <button class="btn btn-primary btn-sm mt-1" type="submit">Salvar</button>
          </form>
        </div>

      </div>
    </div>
  </div>

@endsection
