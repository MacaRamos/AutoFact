<div class="col-lg-8 mx-auto">
    <div class="form-group row">
        <label for="nombre" class="col-lg-3 col-form-label requerido">Nombre</label>
        <div class="col-lg-8">
            <input type="text" name="nombre" class="form-control" id="nombre"
                value="{{old('nombre', $data->nombre ?? '')}}" required />
        </div>
    </div>
    <div class="form-group row">
        <label for="url" class="col-lg-3 col-form-label requerido">Url</label>
        <div class="col-lg-8">
            <input type="text" name="url" class="form-control" id="url" value="{{old('url', $data->url ?? '')}}"
                required />
        </div>
    </div>
    <div class="form-group row">
        <label for="icono" class="col-lg-3 col-form-label">icono</label>
        <div class="col-lg-8">
            <input type="text" name="icono" class="form-control" id="icono"
                value="{{old('icono', $data->icono ?? '')}}">
        </div>
        <div class="col-lg-1">
            <i id="mostrar-icono" class="{{old("icono")}} pt-2"></i>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Módulo</label>
        <div class="col-lg-3">
            <input type="hidden" name="modulo_id" value="{{$modulo->id ?? ''}}"/>
            <input type="text" name="modulo" class="form-control" id="modulo" value="{{old('modulo', $modulo->nombre ?? '')}}"
                readonly />
        </div>
    </div>

</div>