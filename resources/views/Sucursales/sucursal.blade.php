@extends('layouts.master')
@section('contenido')
<div id="sucursal">
	<div class="container">
		<div>
			<div>
				<h2>Datos de las sucursales |<small> Sucursales</small></h2>
					<div class="row">
						<label>Buscar: </label><input type="text" placeholder="Escriba el nombre de la sucursal" class="form-control" v-model="buscar" value="buscar">
						<div class="col-xs-2">
						</div>
						<div class="col-xs-10"><br>
							<button class="fa fa-plus btn btn-primary" v-on:click="showModal()"> Agregar sucursal</button><br><br><br>
								<table class="table table-striped table-hover table-dark">
									<thead>
										<th>Nombre</th>
										<th>Localidad</th>
										<th>Calle</th>
										<th>Cruzamiento principal</th>
										<th>Cruzamiento secundario</th>
										<th>Opciones</th>
									</thead>
									<tbody>
										<tr v-for="su in filtroSucursal">
											<td>@{{su.nombre}}</td>
											<td>@{{su.localidad}}</td>
											<td>@{{su.calle}}</td>
											<td>@{{su.cruzamientoa}}</td>
											<td>@{{su.cruzamientob}}</td>
											<td>
												<span class="btn btn-warning btn-md fa fa-pencil" v-on:click="editarSucursal(su.id_sucursal)"></span>
												<span class="btn btn-danger btn-md fa fa-trash" v-on:click="eliminarSucursal(su.id_sucursal)"></span>
											</td>
										</tr>
									</tbody>
								</table>
				    	</div>
				    </div>
				    <div class="row">
      					<div class="col-md-6 col-xs-12">
        					<div class="modal fade" tabindex="-1" role="dialog" id="add_sucursales">
          						<div class="modal-dialog" role="document">
            						<div class="modal-content">
              							<div class="modal-header">
              								<h4 class="modal-title" v-if="editando">Editar Sucursal</h4>
                 							<h4 class="modal-title" v-if="!editando">Guardar Sucursal</h4>
                							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              							</div>
              							<div class="modal-body">
                							<input type="text" placeholder="Nombre" v-model="nombre" class="form-control"><br>
                							<input type="text" placeholder="Localidad" v-model="localidad" class="form-control"><br>
                							<input type="text" placeholder="Calle" v-model="calle" class="form-control"><br>
                							<input type="text" placeholder="Cruzamiento principal" v-model="cruzamientoa" class="form-control"><br>
                							<input type="text" placeholder="Cruzamiento secundario" v-model="cruzamientob" class="form-control"><br>
              							</div>
              							<div class="modal-footer">
                							<button type="submit" class="btn btn-success" v-on:click="actualizarSucursal()" v-if="editando">Actualizar</button>
                							<button type="submit" class="btn btn-success" v-on:click="agregarSucursal()" v-if="!editando">Guardar</button>
              							</div>
            						</div>
          						</div>
        					</div>
      					</div>
    				</div> 
				</div>	
		</div>
	</div>
</div>
@endsection
@push('scripts')

<script src="js/sucursal.js"></script>
<script src="js/vue-resource.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">