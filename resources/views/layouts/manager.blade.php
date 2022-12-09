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
<li><a class="app-menu__item active" href="{{route('manager.dash')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
<li><a class="app-menu__item" href="{{route('manager.dash')}}"><i class="app-menu__icon fa fa-clipboard"></i><span class="app-menu__label">Checklist</span></a></li>
@endsection

@section('content')
    @include('layouts.components.page-name')

    @yield('content')
@endsection