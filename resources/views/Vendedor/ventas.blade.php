@extends('layouts.masteruser')
@section('titulo', 'Ventas')
@section('contenido')
<div id="ventas">
	<br>
	@{{nombre}}
	<div class="container">

		<h3>FOLIO : @{{folio}}</h3>
		<h3>FECHA SALIDA : @{{fecha_salida}}</h3>

		<div class="row">
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control" v-model="codigo" ref="buscar" v-on:keyup.enter="getProducto()">
					<span class="input-group-btn">
						<button type="button" class="btn btn-primary" @click="getProducto()">Agregar</button>
					</span>
				</div>
				<br>
				<button class="btn btn-success form-control" @click="vender()">Guardar salida de productos</button>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-xs-6">
				<table class="table table-bordered">
					<thead style="background: #FFFFCC">
						<th>CÓDIGO</th>
						<th>NOMBRE</th>
						<th width="10%">PRECIO</th>
						<th width="15%">CANTIDAD</th>
						<th width="15%">TOTAL</th>
						<th>ACCIONES</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in ventas">
							<td>@{{v.id_tipo}}</td>
							<td>@{{v.nombre}}</td>
							<td>@{{v.precio}}</td>
							<td>
								<input type="number" class="form-control" min="1" v-model.number="cantidades[index]">
							</td>
							<td><b>$ <!-- @{{v.total}} --> @{{totalProd(index)}}</b></td>
							<td>
								<!-- Botón para eliminar-->
								<span class="fa fa-trash btn btn-xs btn-danger" @click="eliminarProducto(index)"></span>
							</td>
						</tr>
					</tbody>
				</table>
				@{{cantidades}}
			</div>


			<!-- Fin del row -->
			<div class="col-xs-12 col-md-6">
				<table class="table table-bordered">
					<tr>
						<th width="25%" style="background: #FFFFCC">Total</th>
						<td><h3>$ @{{total}}</h3></td>
					</tr>
					<tr>
						<th style="background: #FFFFCC">Paga con:</th>
						<td>
							<h2><input type="number" class="form-control" v-model="pago"></h2>
						</td>
					</tr>
					<tr>
						<th style="background: #FFFFCC">Cambio de:</th>
						<td><b><h3 class="text-primary">@{{cambio}}</h3></b></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
	<script src="js/vue-resource.js"></script>
    <script src="js/ventas.js" ></script>
    <script src="js/moment-with-locales.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">