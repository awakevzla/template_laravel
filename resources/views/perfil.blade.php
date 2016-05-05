@extends('layouts.base')
@section('title')
    <title>Perfil de {{$user->usuario}}</title>
@endsection
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <form action="{{route('guardar_perfil')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" value="{{$user->usuario}}">
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" name="image" class="form-control">
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="btn btn-success" value="Guardar">
        </form>
    </div>
    @if(Storage::disk('local')->has($user->usuario.'-'.$user->id.'.jpg'))
        <div class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img style="width: 200px;" src="{{route('imagen_usuario', ['filename' => $user->usuario.'-'.$user->id.'.jpg'])}}" alt="Perfil">
            </div>
        </div>
    @endif
@endsection