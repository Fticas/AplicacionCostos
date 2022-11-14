<!DOCTYPE html>
<html lang="en">
    <head>
    	
    	<meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title>Sistema de Costos</title>
        <style type="text/css">

        </style>
    </head>
	<body>
		<div class = "container">	
  				<div class="row">
    				<div class="col-md-4" style="float:left;">
    					<br>
    					<br>
   						<h3 >Reporte de ventas</h3>
 						<br>
    					<p>Fecha de Inicio: {{$fecha_inicio}}</p>
    					<p>Fecha de Final: {{$fecha_final}}</p>
    				</div>
    				<div class="col-md-8" style="float:right;">
    				<img src="./images/logo.jpeg" width="200"height= "200" style="padding-left:65%; padding-top:15px;">
    				</div>
    			</div>
    			<div class="table-responsive" style="margin-top:220px;">
    				<table class="table m-0" >
    					<thead>
    						<tr >
    							<th>Mes</th>
    							<th>Producto</th>
    							<th>Ventas</th>
    							<th>Sub Total</th>
    						</tr>
    					</thead>
    					<tbody>
    					@foreach($ventas as $venta)
    						<tr>
    							<td>@if ($venta->producto !=NULL){{$venta->mes}}
    								@else
    								@endif
    							</td>
    							<td>@if ($venta->producto !=NULL){{$venta->producto}}
    								@else 
    								@endif
    							</td>
    							<td>@if ($venta->producto !=NULL){{$venta->ventas}}
    								@else<b>
    								@if($venta->mes!=NULL)SubTotal
    								@else TOTAL
    								@endif
    								</b>
    								@endif
    							</td>
    							<td>@if ($venta->producto !=NULL)${{number_format($venta->subtotal, 2)}}
    								@else<b>${{number_format($venta->subtotal, 2)}}</b>
    								@endif</td>
    					@endforeach							
    					</tbody>
    				</table>
    			</div>							
		</div>
	</body>
</html>