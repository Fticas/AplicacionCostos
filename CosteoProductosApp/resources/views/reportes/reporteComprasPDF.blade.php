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
   						<h3 >Reporte de compras</h3>
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
    							<th>Materia Prima</th>
    							<th>Cantidad</th>
    							<th>Sub Total</th>
    						</tr>
    					</thead>
    					<tbody>
    					@foreach($compras as $compra)
    						<tr>
    							<td>@if ($compra->materia !=NULL){{$compra->mes}}
    								@else
    								@endif
    							</td>
    							<td>@if ($compra->materia !=NULL){{$compra->materia}}
    								@else 
    								@endif
    							</td>
    							<td>@if ($compra->materia !=NULL){{$compra->compras}}
    								@else<b>
    								@if($compra->mes!=NULL)SubTotal
    								@else TOTAL
    								@endif
    								</b>
    								@endif
    							</td>
    							<td>@if ($compra->materia !=NULL)${{number_format($compra->subtotal, 2)}}
    								@else<b>${{number_format($compra->subtotal, 2)}}</b>
    								@endif</td>
    					@endforeach							
    					</tbody>
    				</table>
    			</div>							
		</div>
	</body>
</html>