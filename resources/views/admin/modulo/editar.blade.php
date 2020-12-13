@extends("theme.$theme.layout")
@section('titulo')
Editar módulo
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Editar módulo {{$modulo->nombre}}</h1>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header with-border border-vina">
        <h4 class="card-title text-gray">módulo</h4>
        <div class="card-tools pull-right">
            <a href="{{route('modulos.index')}}" class="btn btn-block text-white bg-vina btn-sm ">
                <i class="fas fa-reply"></i> Volver a módulos
            </a>
        </div>
    </div>
    <form action="{{route('modulos.update', ['modulo' => $modulo->id])}}" id="form-general" class="form-horizontal"
        method="POST" autocomplete="off">
        @csrf @method("put")
        <div class="card-body">
            @include('admin.modulo.form')
        </div>
        <div class="card-footer">
            <div class="row float-right">
                @include('includes.boton-form-editar')
            </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection