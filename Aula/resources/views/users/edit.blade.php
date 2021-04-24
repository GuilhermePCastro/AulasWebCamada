<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuários</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Usuário</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                </div>
            </div>
        </div>
        <br>

        @if (count($errors) > 0)

        <div class="alert alert-danger">
            <strong>Ops!</strong> Algo errado com os dados.<br><br>
            <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
            </ul>
        </div>

        @endif


        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
                    <strong>Senha:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirme a senha:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Perfil:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>

        </div>

        {!! Form::close() !!}

        @endsection
    </body>
</html>
