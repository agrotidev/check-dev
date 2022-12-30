@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
  @include('layouts.components.page-name', ['name' => 'Cadastro - Usuario'])

<div class="row">
  <div class="col-12">
    <div class="tile">

      @if (Session::get('error'))
        <div class="text-center"><small id="openMessage" class="text-danger ">{{ session()->get('error') }}</small></div>
      @endif

      <div class="col-md-12 mx-0 px-0">
        <form method="post" action="{{ route('admin.usuario.store') }}">
          @csrf

          <div class="form-group">
            
            <div class="form-row">            
              <div class="form-gorup col-md-2">
                <label >Matrícula</label><br>
                <input class="form-control @error('code') is-invalid @enderror" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="code" type="text"  placeholder="Digite seu código" maxlength="6" value="{{ old('code') }}">
                @error('code')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
                    
              <div class="form-group col-md-5">
                <label >Nome</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Digite seu nome" value="{{ old('name') }}">
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group col-md-5">
                <label >E-mail</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="Digite seu e-mail" value="{{ old('email') }}">    
                @error('email')
                  <small class="text-danger">{{ $message }}</small>
                @enderror              
              </div>
          
            </div>

            <div class="form-row">

              <div class="form-group col-md-4">  
                <label >Setor</label>
                <select class="form-control @error('setor') is-invalid @enderror" name="setor">
                  <option >Selecione o setor</option>                  
                  @foreach ($setores as $setor)
                  @if (old('setor') == $setor->id)
                    <option value="{{ $setor->id }}" selected>{{ $setor->nome }}</option>
                  @else
                    <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                  @endif
                  @endforeach
                </select>  
              </div> 

              <div class="form-group col-md-1">
                <label>Gerente</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="ismanager"  {{ old('ismanager') ? 'checked' : '' }} "><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>

              <div class="form-group col-md-1">
                <label>Lider</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="islider" {{ old('islider') ? 'checked' : '' }}><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>

              <div class="form-group col-md-1">
                <label>Mobile</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="mobile" {{ old('mobile') ? 'checked' : '' }}><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>

              <div class="form-group col-md-1">
                <label>Ativo</label>
                <div class="toggle-flip">
                  <label class="form-check-label">
                    <input type="checkbox" name="active"{{ old('active') ? 'checked' : '' }}><span  class="flip-indecator" data-toggle-on="SIM" data-toggle-off="NAO"></span>
                  </label>
                </div>
              </div>

            </div>

      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.usuario.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
      </div>
    </form>
    </div>
  </div>
 
@endsection