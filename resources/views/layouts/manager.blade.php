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
<li class="treeview {{ ( Request::routeIs('manager.checklist.*') == Route::current()->getName())  ? 'is-expanded' : '' }}""><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-check-square-o"></i><span class="app-menu__label">Checklist</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
        <li><a class="treeview-item {{ ( Request::routeIs('manager.checklist.index') == Route::current()->getName())  ? 'active' : '' }}" href="{{route('manager.checklist.index')}}"><i class="icon fa fa-check-square-o"></i><span class="app-menu__label">Checklists</span><span class="badge badge-success">4</span></a></li>
        <li><a class="treeview-item {{ ( Request::routeIs('manager.checklist.grupo.index') == Route::current()->getName())  ? 'active' : '' }}" href="{{route('manager.checklist.grupo.index')}}"><i class="icon fa fa-object-group"></i><span class="app-menu__label">Grupos</span><span class="badge badge-info">2</span></a></li>
    </ul>
</li>
@endif
@endsection

@section('content')
    @include('layouts.components.page-name')

    @yield('content')
@endsection
