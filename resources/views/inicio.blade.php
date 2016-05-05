<?php
Blade::extend(function($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});
?>
@extends('layouts.base')
@section('title')
    <title>Inicio</title>
@endsection
@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/inicio.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
@endsection
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{Session::get('type')}} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Mensaje: </strong>{{Session::get('message')}}
        </div>
    @endif
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
                </div>
                <button type="submit" class="btn btn-success">Publicar</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>¿Qué piensan los demás?</h3></header>
            @foreach($posts as $post)
                <article class="post">
                    <p>{{$post->body}}</p>
                    <div class="info">
                        Compartida por {{$post->usuario->usuario}} / {{$post->updated_at->format('d-m-Y H:i:s')}}
                    </div>
                    <div class="interaccion">
                        <a href="#" data-like="true" data-id="{{$post->id}}" class="like"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></a>
                        <a href="#" data-like="false" data-id="{{$post->id}}" class="like"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></a>
                        @if(Auth::user()==$post->usuario)
                        <a href="{{route('eliminarPost', ['id'=>$post->id])}}"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
                        <a class="editar" data-id="{{$post->id}}" data-body="{{$post->body}}" href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <textarea name="body.edit" id="body-edit" rows="5" class="form-control"></textarea>
                        <input type="hidden" id="_token" value="{{csrf_token()}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="guardar" type="button" class="btn btn-success">Guardar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script>
        var urlEditar= '{{route('editarPost')}}';
        var urlLike = '{{route('like')}}';
        var token='{{csrf_token()}}';
    </script>
    <script src="{{URL::to('src/js/app.js')}}"></script>
@endsection