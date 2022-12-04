@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Dashboard Admin'])

  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Usuários</h4>
          <p><b>{{ $usuarios->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>Likes</h4>
          <p><b>25</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-building-o"></i>
        <div class="info">
          <h4>Departamentos</h4>
          <p><b>{{ $departamentos->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
        <div class="info">
          <h4>Setores</h4>
          <p><b>{{ $setores->count() }}</b></p>
        </div>
      </div>
    </div>
  </div>


@endsection
