@extends("theme.$theme.layout")
@section("titulo")
Usuario - Rol
@endsection

@section("scripts")
@include('includes.mensaje')
<script>
    $('.rol_id').on('change', function() {
        var data = {
            id: $(this).data('userid'),//usuario_id
            rol_id: $(this).val(),
            _token: $('input[name=_token]').val()
        };
        if ($(this).is(':checked')) {
            data.estado = 1
        } else {
            data.estado = 0
        }
        ajaxRequest('/admin/usuario-rol', data);
    });

    function ajaxRequest(url, data) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                Gilberto.notificaciones(respuesta.respuesta, '', 'success');
            }
        });
    }
</script>
@endsection

@section('contenido')

<div class="card">
    <div class="card-header with-border">
        <h3 class="card-title">Usuario - Rol</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Usuario</th>
                @foreach ($roles as $rol)
                <th class="text-center">{{$rol->nombre}}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->username}}</td>
                    @foreach ($roles as $rol)
                    <td class="text-center"><input type="checkbox" class="rol_id" name="rol_id"
                            data-userid="{{$usuario->id}}" value="{{$rol->id}}"
                            {{in_array(['usuario_id' => $usuario->id, 'rol_id' => $rol->id], $usuariosRol->toArray()) ? 'checked' : '' }}>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection