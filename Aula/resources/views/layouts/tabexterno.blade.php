<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabelas Legais ai</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body class='bg-success'>
        <header>
            @section('menu')
            @if($array['mostraMenu'])
                @show
            @endif
            <h1 class='mt-3 text-center text-white'>@yield('title')</h1>
        </header>
        <main>
            @section('info')
            @show
            <table class='mt-5 table table-dark table-hover'>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Titulos</th>
                        <th>Tamanho</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($array['campos'] as $campo)
                        <tr>
                            <td>{{ $campo['time'] }}</td>
                            <td>{{ $campo['titulos'] }}</td>
                            <td>{{ $campo['tamanho'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </main>
    </body>
</html>
