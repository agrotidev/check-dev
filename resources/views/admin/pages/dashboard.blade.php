@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Dashboard Admin'])

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">{{Auth::guard('admin')->user()->name}}</div>
        <p>{{Auth::guard('admin')->user()->email}}</p>
      </div>
    </div>
  </div>
    
@endsection
