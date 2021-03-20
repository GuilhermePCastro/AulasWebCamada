@extends('layouts.tabexterno')
@section('title', 'Tabela dos times brasileiros')
@section('menu')
    <nav class="nav navbar-expand-lg navbar-light bg-light">
        <ul class='navbar-nav'>
            <li class='nav-item'><a class="nav-link" href="{{ Route('welcome') }}">Home</a></li>
            <li class='nav-item'><a class="nav-link" href="{{ Route('avisos') }}">Avisos</a></li>
            <li class='nav-item'><a class="nav-link" href="{{ Route('tabela') }}">Tabela</a></li>
        </ul>
    </nav>
@endsection
@section('info')
    <p class='mt-3 text-center text-white'>
        Essa é uma tabela para mostrar os dados de alguns times brasileiros.
    </p>
@endsection

