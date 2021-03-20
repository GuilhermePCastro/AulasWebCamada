@extends('layouts.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
    @parent
    <p>^ ^ Barra superior adicionada do layout pai/m&atilde;e ^ ^ </p>
@endsection
@section('content')
    <p>Quadro de Avisos da Empresa</p>
    <p>Olá {{ $array['nome'] }}</p>

    @if ($array['mostra'])
        @foreach ($array['avisos'] as  $aviso)
            <p>Aviso {{$aviso['id']}}</p>
            <p>{{$aviso['texto']}}</p>
        @endforeach
    @endif
@endsection
