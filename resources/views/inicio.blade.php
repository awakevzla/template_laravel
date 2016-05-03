@extends('layouts.base')
@section('title')
    <title>Inicio</title>
@endsection
@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/inicio.css')}}">
@endsection
@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>¿Qué estás pensando?</h3></header>
            <form action="{{route('crear_post')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                    @if ($errors->get('body'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @foreach($errors->get('body') as $error)
                                <strong>Error:</strong>{{$error}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Mensaje: </strong>{{Session::get('message')}}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Publicar</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>¿Qué piensan los demás?</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis consectetur, dolorum enim, inventore ipsum libero
                    optio pariatur provident quam quo quod rerum! Ad dolor, est incidunt iste placeat recusandae.</p>
                <div class="info">
                    Compartida por Pedro Lugo 02/05/2016
                </div>
                <div class="interaccion">
                    <a href="#">Me Gusta</a>
                    <a href="#">No me gusta</a>
                    <a href="#">Eliminar</a>
                    <a href="#">Editar</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis consectetur, dolorum enim, inventore ipsum libero
                    optio pariatur provident quam quo quod rerum! Ad dolor, est incidunt iste placeat recusandae.</p>
                <div class="info">
                    Compartida por Pedro Lugo 02/05/2016
                </div>
                <div class="interaccion">
                    <a href="#">Me Gusta</a>
                    <a href="#">No me gusta</a>
                    <a href="#">Eliminar</a>
                    <a href="#">Editar</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis consectetur, dolorum enim, inventore ipsum libero
                    optio pariatur provident quam quo quod rerum! Ad dolor, est incidunt iste placeat recusandae.</p>
                <div class="info">
                    Compartida por Pedro Lugo 02/05/2016
                </div>
                <div class="interaccion">
                    <a href="#">Me Gusta</a>
                    <a href="#">No me gusta</a>
                    <a href="#">Eliminar</a>
                    <a href="#">Editar</a>
                </div>
            </article>
        </div>
    </section>
@endsection