@extends('layouts.manager')

@section('title', 'Checklist!')

@section('content')
    @include('layouts.components.page-name', ['name' => 'Checklists Grupo'])

    <div class="row">
        <div class="col">
            <small><a href="{{ route('manager.checklist.grupo.index') }}" class="btn btn-info fa fa-arrow-left mb-2"></a></small>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <strong>Checklists</strong>
              <small><a href="#" class="btn btn-outline-success fa fa-plus"></a></small>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
                <strong>Usuários</strong>
                <small><a href="#" class="btn btn-outline-success fa fa-plus"></a></small>
              </div>
          </div>
        </div>
      </div>



@endsection
