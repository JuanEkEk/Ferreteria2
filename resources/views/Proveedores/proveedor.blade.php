@extends('layouts.master')
@section('titulo', 'Proveedores')
@section('contenido')
<div id="proveedor">
	<div class="container">
		<div>
			<div>
				<h2>Datos de las proveedores |<small> Proveedores</small></h2>
					<div class="row">
						<label>Buscar: </label><input type="text" placeholder="Escriba el nombre del proveedor" class="form-control" v-model="buscar" value="buscar">
						<div class="col-xs-2">
						</div>
						<div class="col-xs-10"><br>
							<button class="fa fa-plus btn btn-primary" v-on:click="showModal()"> Agregar proveedor</button><br><br><br>
								<table class="table table-striped table-hover table-dark">
									<thead>
										<th>Nombre</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Edad</th>
										<th>Opciones</th>
									</thead>
									<tbody>
										<tr v-for="proveedor in filtroProveedor">
											<td>@{{proveedor.nombre}}</td>
											<td>@{{proveedor.apellidop}}</td>
											<td>@{{proveedor.apellidom}}</td>
											<td>@{{proveedor.edad}}</td>
											<td>
												<span class="btn btn-warning btn-md fa fa-pencil" v-on:click="editarProveedor(proveedor.id_proveedor)"></span>
												<span class="btn btn-danger btn-md fa fa-trash" v-on:click="eliminarProveedor(proveedor.id_proveedor)"></span>
											</td>
										</tr>
									</tbody>
								</table>
				    	</div>
				    </div>
				    <div class="row">
      					<div class="col-md-6 col-xs-12">
        					<div class="modal fade" tabindex="-1" role="dialog" id="add_proveedores">
          						<div class="modal-dialog" role="document">
            						<div class="modal-content">
              							<div class="modal-header">
              								<h4 class="modal-title" v-if="editando">Editar Proveedor</h4>
                 							<h4 class="modal-title" v-if="!editando">Guardar Proveedor</h4>
                							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              							</div>
              							<div class="modal-body">
                							<input type="text" placeholder="Nombre" v-model="nombre" class="form-control"><br>
                							<input type="text" placeholder="Apellido Paterno" v-model="apellidop" class="form-control"><br>
                							<input type="text" placeholder="Apellido Materno" v-model="apellidom" class="form-control"><br>
                							<input type="text" placeholder="Edad" v-model="edad" class="form-control"><br>
              							</div>
              							<div class="modal-footer">
                							<button type="submit" class="btn btn-success" v-on:click="actualizarProveedor()" v-if="editando">Actualizar</button>
                							<button type="submit" class="btn btn-success" v-on:click="agregarProveedor()" v-if="!editando">Guardar</button>
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

<script src="js/proveedor.js"></script>
<script src="js/vue-resource.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">