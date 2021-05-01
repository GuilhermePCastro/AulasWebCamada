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
                    <h2>Clientes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('clientes.create') }}"> + Novo cliente</a>
                </div>
            </div>
        </div>

        <br>

        @if ($message = Session::get('success'))

        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>

        @endif


        <table class="table table-bordered">

        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereco</th>
        <th>E-mail</th>
        <th>Nascimento</th>
        <th width="280px">Ação</th>
        </tr>

        @foreach ($data as $key => $cliente)

        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->endereco }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->nascimento }}</td>
            <td>

            @if(!empty($cliente->getRoleNames()))

                @foreach($cliente->getRoleNames() as $v)

                <label class="badge badge-success">{{ $v }}</label>

                @endforeach

                @endif


            </td>


            <td>
            <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>

                {!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy', $cliente->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

            </td>
        </tr>

        @endforeach

        </table>

        {!! $data->render() !!}

        @endsection
    </body>
</html>
