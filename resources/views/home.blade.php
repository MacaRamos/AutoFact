@extends("theme.$theme.layout")
@section('titulo')
Mes
@endsection
@section('tituloContenido')
<h1 style="font-family: 'Khand', sans-serif;">Mes</h1>
@endsection

@section("header")
<!-- Select2 -->
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section("scripts")
<!-- Select2 -->
<script src="{{asset("assets/$theme/plugins/select2/js/select2.full.min.js")}}"></script>
<!-- ChartJS -->
<script src="{{asset("assets/$theme/plugins/chart.js/Chart.min.js")}}"></script>
@include('includes.mensaje')
@include('includes.error-form')
<script>
    $(function(){
        $(".select2").select2();
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        });

        var validaciones = 
        {
            rules: {
                "respuesta[]": {
                    required: true
                }
            },
            submitHandler: function(form) {
                // do other things for a valid form
                form.submit();          
                
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback text-left');
                if (element.is("select")) {
                    element.parent().append(error);
                }
                else error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {   
                $(element).removeClass('is-invalid');
            }
        }; 

        var validator = $('#form-general').validate(validaciones);
  

        var donutData = {
            labels: [
                'Sí', 
                'No',
                'Más o Menos',
            ],
            datasets: [
                {
                data: [@json($respuestasSi),@json($respuestasNo),@json($respuestasMasOMenos)],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
                }
            ]
            }

        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = document.getElementById('myChart').getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        });

    });
</script>
@endsection

@section('contenido')
<div class="card">
    <div class="wrapper-editor">
        <div class="card-header with-border border-vina">
            <h4 class="card-title text-gray">{{isset($respuestas) ? 'Respuestas' : 'Responda'}}</h4>
        </div>
        <div class="card-body">
            @if (Auth::user()->roles[0]->id == 2)
            @if (isset($respuestas))
            @include('respuestaMes')
            @else
            @include('preguntasMes')
            @endif
            @else
            <div class="chart">
                <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection