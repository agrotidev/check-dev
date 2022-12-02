@extends('layouts.manager')

@section('title', 'Dashboard!')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Dashboard'])

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">{{Auth::user()->name}}</div>
        <p>{{Auth::user()->email}}</p>
      </div>
    </div>
  </div>
    
@endsection