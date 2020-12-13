<div class="row mb-3">
    @if (isset($respuestas))
    @foreach ($respuestas as $key => $respuesta)
    @if ($respuesta->pregunta->tipo_id == 1)
    <div class="col-12 col-md-12">
        <div class="form-group">
            <label class="requerido">{{$respuesta->pregunta->descripcion}}</label>
            <textarea class="form-control" rows="2" name="respuesta[{{$key}}]" maxlength="255" minlength="0" readonly>{{$respuesta->respuesta}}</textarea>
        </div>
    </div>
    @else
    <div class="col-12 col-md-6 col-lg-3">
        <div class="form-group">
            <label class="requerido">{{$respuesta->pregunta->descripcion}}</label>
            <select class="form-control select2" style="width: 100%;" name="respuesta[{{$key}}]" disabled>
                <option value="">Seleccione...</option>
                @foreach ($respuesta->pregunta->alternativas as $alternativa)
                <option value="{{$alternativa->id}}"
                    {{$respuesta->alternativa_id == $alternativa->id ? 'selected': ''}}>
                    {{$alternativa->alternativa->descripcion ?? ''}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>