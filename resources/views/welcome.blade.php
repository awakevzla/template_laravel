@extends('layouts.base')
@section('title')
    <title>Inicio</title>
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Registro</h3>
            <form action="{{route('registrar')}}" method="post">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                    @if ($errors->get('email'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @foreach($errors->get('email') as $error)
                                <strong>Error:</strong>{{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario')}}">
                    @if ($errors->get('usuario'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @foreach($errors->get('usuario') as $error)
                                <strong>Error:</strong>{{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Clave</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->get('password'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @foreach($errors->get('password') as $error)
                                <strong>Error:</strong>{{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmación</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="Registrar" class="btn btn-success">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Ingreso</h3>
            <form action="{{route('ingresar')}}" method="post">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Clave</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="Entrar" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection