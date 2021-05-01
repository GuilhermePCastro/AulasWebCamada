<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clientes</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Dados do Cliente</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Voltar</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>

                    {{ $cliente->nome }}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>

                    {{ $cliente->email }}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Endereço:</strong>

                    {{ $cliente->endereco }}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nascimento:</strong>

                    {{ $cliente->nascimento }}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Perfil:</strong>

                    @if(!empty($cliente->getRoleNames()))

                        @foreach($cliente->getRoleNames() as $v)

                            <label class="badge badge-success">{{ $v }}</label>

                        @endforeach

                    @endif

                </div>
            </div>


        </div>

        @endsection
    </body>
</html>
