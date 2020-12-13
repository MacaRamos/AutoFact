@extends("theme.$theme.layout")
@section('titulo')
Módulos
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Módulos</h1>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@include('includes.mensaje')
@endsection

@section('contenido')
<div class="card">
  <div class="wrapper-editor">
    <div class="card-header with-border border-vina">
      <h3 class="card-title text-gray">Módulo</h3>
      <div class="card-tools pull-right">
        <a href="{{route('modulos.create')}}" class="btn btn-block bg-vina text-white btn-sm">
          <i class="fas fa-plus-circle"></i> Nuevo
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-condensed table-hover" id="tabla-data">
        <thead class="border-bottom-3 border-black">
          <tr>
            <th>Nombre</th>
            <th style="width: 100px"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr>
            <td>{{$data->nombre}}</td>
            <td>
              <a href="{{route('modulos.edit', ['modulo' => $data->id])}}" class="btn bg-gray btn-xs rounded mr-2"
                style="width: 24px; height: 24px;">
                <i class="fas fa-pencil-alt"></i>
              </a>
              <form action="{{route('modulos.destroy', ['modulo' => $data->id])}}" class="d-inline form-eliminar"
                method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-xs rounded eliminar" style="width: 24px; height: 24px;">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection