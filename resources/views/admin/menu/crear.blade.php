@extends("theme.$theme.layout")
@section('titulo')
Crear menú
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Crear menú</h1>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}"></script>
@include('includes.error-form')
@include('includes.mensaje')
@endsection

@section('contenido')
<div class="card">
    <div class="card-header with-border border-vina">
        <h4 class="card-title text-gray">menú</h4>
        <div class="card-tools pull-right">
            <a href="{{route('menu')}}" class="btn btn-block text-white bg-vina btn-sm ">
                <i class="fas fa-reply"></i> Volver a menús
            </a>
        </div>
    </div>
    <!-- form start -->
    <form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            @include('admin.menu.form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('includes.boton-form-crear')
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection