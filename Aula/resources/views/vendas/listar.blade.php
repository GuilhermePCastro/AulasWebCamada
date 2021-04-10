<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vendas</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <table class='table table-striped mt-5'>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Valor</th>
                <th>ID Cliente</th>
            </tr>
            @foreach($vendas as $venda)
                <tr>
                    <th>{{$venda->id}}</th>
                    <th>{{$venda->dt_venda}}</th>
                    <th>{{$venda->vl_venda}}</th>
                    <th>{{$venda->cliente_id}}</th>
                </tr>
            @endforeach
        </table>
    </body>
</html>
