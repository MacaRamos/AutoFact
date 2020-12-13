@extends("theme.$theme.layout")
@section('titulo')
Crear módulo
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Crear módulo</h1>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}"></script>
@include('includes.mensaje')
@endsection

@section('contenido')
<div class="card">
    <div class="card-header with-border border-vina">
        <h4 class="card-title text-gray">Módulo</h4>
        <div class="card-tools pull-right">
            <a href="{{route('modulos.index')}}" class="btn btn-block text-white bg-vina btn-sm ">
                <i class="fas fa-reply"></i> Volver a modulos
            </a>
        </div>
    </div>
    <!-- form start -->
    <form action="{{route('modulos.store')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            @include('admin.modulo.form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="row float-right">
                @include('includes.boton-form-crear')
            </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection