@extends('layouts.includes.dashboard')

@section('user-menu')
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Configuração</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="{{route('manager.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
        </ul>
    </li> 
@endsection

@section('app-menu')
<li><a class="app-menu__item  {{ ( Request::routeIs('manager.dash') == Route::current()->getName())  ? 'active' : '' }}" href="{{route('manager.dash')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
@if ((Auth::user()->islider == true || Auth::user()->ismanager == true))
<li><a class="app-menu__item {{ ( Request::routeIs('manager.checklist.index') == Route::current()->getName())  ? 'active' : '' }}" href="{{route('manager.checklist.index')}}"><i class="app-menu__icon fa fa-check-square-o"></i><span class="app-menu__label">Checklists</span></a></li>
@endif
@endsection

@section('content')
    @include('layouts.components.page-name')

    @yield('content')
@endsection