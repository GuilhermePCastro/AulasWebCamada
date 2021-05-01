<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cliente</title>
    </head>
    <body>
    @extends('layouts.app')

            @section('content')

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cadastrar cliente</h2>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Voltar</a>
                    </div>
                </div>
            </div>
            </br>


            @if (count($errors) > 0)

              <div class="alert alert-danger">
                <strong>Ops!</strong> Há algo errado com os dados passados.<br><br>
                <ul>
                   @foreach ($errors->all() as $error)

                     <li>{{ $error }}</li>

                   @endforeach
                </ul>
              </div>

            @endif

            {!! Form::open(array('route' => 'clientes.store','method'=>'POST')) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>

                        {!! Form::text('nome', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Endereço:</strong>
                        {!! Form::text('endereco', null, array('placeholder' => 'Endereço','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nascimento:</strong>
                        {!! Form::date('nascimento', null, array('placeholder' => 'Nascimento','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Perfil:</strong>

                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                    </div>
                </div>

            </div>

            {!! Form::close() !!}


        @endsection
    </body>
</html>
