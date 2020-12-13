@extends("theme.$theme.layout")
@section('titulo')
Editar menú
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Editar menú</h1>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}"></script>
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}"></script>
@include('includes.mensaje')
@include('includes.error-form')
@endsection

@section('contenido')
<div class="card">
    <div class="card-header with-border border-vina">
        <h4 class="card-title text-gray">Menú</h4>
        <div class="card-tools pull-right">
            <a href="{{route('menu')}}" class="btn btn-block text-white bg-vina btn-sm ">
                <i class="fas fa-reply"></i> Volver a menús
            </a>
        </div>
    </div>
    <!-- form start -->
    <form action="{{route('actualizar_menu', ['id'=> $data->id])}}" class="form-horizontal" method="POST"
        autocomplete="off">
        @csrf @method("put")
        <div class="card-body">
            @include('admin.menu.form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('includes.boton-form-editar')
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection