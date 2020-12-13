@extends("theme.$theme.layout")
@section('titulo')
Menú
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Menú</h1>
@endsection

@section("styles")
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection


@section("scripts")
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@include('includes.mensaje')
@endsection

@section('contenido')
<div class="card">
    <div class="wrapper-editor">
        <div class="card-header with-border border-vina">
            <h3 class="card-title text-gray">Menú</h3>
            <div class="card-tools pull-right">
                <a href="{{route('crear_menu')}}" class="btn btn-block bg-vina text-white btn-sm">
                    <i class="fas fa-plus-circle"></i> Nuevo
                </a>
            </div>
        </div>
        <div class="card-body">
            @csrf
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    @foreach ($menus as $key => $item)
                    @if ($item["menu_anterior"] != 0)
                    @break
                    @endif
                    @include("admin.menu.menu-item",["item" => $item])
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection