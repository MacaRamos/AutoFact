<form action="{{route('guardarRespuestas')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
    @csrf @method('post')
    
    <div class="row mb-3">
        @if (isset($preguntas))
        @foreach ($preguntas as $key => $pregunta)
        @if ($pregunta->tipo_id == 1)
        <div class="col-12 col-md-12">
            <div class="form-group">
                <label class="requerido">{{$pregunta->descripcion}}</label>
                <input type="hidden" name="pregunta[{{$key}}]" value="{{$pregunta->id}}">
                <textarea class="form-control" rows="2" name="respuesta[{{$key}}]" maxlength="255" minlength="0" required></textarea>
            </div>
        </div>
        @else
        <div class="col-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label class="requerido">{{$pregunta->descripcion}}</label>
                <input type="hidden" name="pregunta[{{$key}}]" value="{{$pregunta->id}}">
                <select class="form-control select2" style="width: 100%;" name="respuesta[{{$key}}]" required>
                    <option value="">Seleccione...</option>
                    @foreach ($pregunta->alternativas as $alternativa)
                    <option value="{{$alternativa->id}}">
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
    
    <!-- /.card-footer -->
    <div class="card-footer">
        <div class="row float-right">
            @include('includes.boton-form-crear')
        </div>
    </div>
</form>