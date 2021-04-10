<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clientes</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Endereço</th>
            </tr>
            @foreach($clientes as $cliente)
                <tr>

                        <th>{{$cliente->nome}}</th>
                        <th>{{$cliente->email}}</th>
                        <th>{{$cliente->endereco}}</th>

                </tr>
            @endforeach
        </table>
    </body>
</html>
