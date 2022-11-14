@extends('layout.plantillaprincipal')

@section('contenido')


    <div class="container">
    	<br>
    	<h5>Generacion de reportes de Ventas</h5>
    	<br>
    	@if(!count($ventas))
    	<form action="{{route('reportesventas.store')}}" method="post">
    		<div class="row">
    		@csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
    		<div class="col-5">
    			<label for = "fecha_inicio" class="form-label">Ingrese la fecha de inicio</label>
    			<input name ="fecha_inicio"class="form-control" type="month" value="{{old('fecha_inicio')}}">
    			@error('fecha_inicio')
                	<small style="color: red;">{{$message}}</small>
            	@enderror
    		</div>
    		<div class="col-5">
    			<label for = "fecha_final" class="form-label">Ingrese la fecha Final</label>
    			<input name ="fecha_final"class="form-control" type="month"value="{{old('fecha_final')}}">
    			@error('fecha_final')
                	<small style="color: red;">{{$message}}</small>
            	@enderror
    		</div>
    		<div class="col-2">
    			<label class="form-label" style="color: white;">.....................................</label>
        		<input type="submit" value="Generar reporte" class="btn btn-primary">
    		</div>
    		</div>
    	</form>
    	@else
    	@endif

		<hr>    	


		<!-- generar reporte, si se esta recibiendo info-->


    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    		<div class="card">
    			<div class="card-body p-0">
    				@if(count($ventas))
    				<div class="invoice-container">	
    					<br>
    					
    					<div class="invoice-header">

    						<div class="row gutters">
    							<div class ="col-4" >
    							<br>
    							<h3 style="padding-left:10%">Reporte de ventas</h3>
    							<br><br>
    							<p style="padding-left:10%">Fecha de Inicio: {{$fecha_inicio}}</p>
    							<p style="padding-left:10%">Fecha de Final: {{$fecha_final}}</p>
    							</div>
    							<div class="col-8 float-right" style="padding-left:45%">
    								<a href="index.html" class="invoice-logo">
    								<img src="/images/logo.jpeg" width="80%"height= "200">
    								</a>
    							</div>
    						</div>
    					</div>
    					<hr>
    						<div class="row gutters">
    							<div class="col-lg-12 col-md-12 col-sm-12">
    								<div class="table-responsive">
    									<table class="table custom-table m-0">
    										<thead>
    											<tr>
    												<th>Mes</th>
    												<th>Producto</th>
    												<th>Cantidad</th>
    												<th>Sub Total</th>
    											</tr>
    										</thead>
    										<tbody>
    											
    											@foreach($ventas as $venta)
    											<tr>
    												<td>@if ($venta->producto !=NULL){{$venta->mes}}
    												@else
    												@endif</td>
    												<td>@if ($venta->producto !=NULL){{$venta->producto}}
    												@else 
    												@endif</td>
    												<td>@if ($venta->producto !=NULL){{$venta->ventas}}
    												@else<b>
    													@if($venta->mes!=NULL)SubTotal
    													@else TOTAL
    												@endif
    												</b>
    												@endif</td>
    												<td>@if ($venta->producto !=NULL)${{number_format($venta->subtotal, 2)}}
    												@else<b>${{number_format($venta->subtotal, 2)}}</b>
    												@endif</td>
    											@endforeach
    											
        										
    										</tbody>
    									</table>
    								</div>

    							</div>
											
    						</div>
    					
    					
    				</div>
    				@else
        			@endif

    			</div>

    		</div>
    		@if(count($ventas))
    		<hr>
    		<div class="row">
    			<div class="col-10">
   				</div>
   				<form action="{{route('reportesventas.update', '1')}}" method="POST" class="col-2" style="padding: 25px;">
            		@csrf
            		@method('put')
            		<input type="hidden" name=_token value='{{csrf_token()}}'>
            		<input type="hidden" name= "fecha_inicio" value="{{$fecha_inicio}}">
            		<input type="hidden" name= "fecha_final" value="{{$fecha_final}}">
   					<button type="submit"  class="btn btn-primary">Descargar PDF</button>
   				</form>
    		</div>
    		@else
    		@endif
    	</div>
    </div>


</div>



@endsection