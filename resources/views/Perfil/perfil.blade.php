@extends('layouts.master')
@section('contenido')
<div id="datosusuario">
	<div class="container">
		<div>
			<div>
				<h2>Datos del usuario |<small> Usuario</small></h2>
					<div class="row">
						<div class="col-xs-2">
						</div>
						<div class="col-xs-10"><br>
								<table class="table table-striped table-hover table-dark">
									<thead>
										<th>Usuario</th>
										<th>Contraseña</th>
										<th>Nombre</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Edad</th>
										<th>Opciones</th>
									</thead>
									<tbody>
										<tr v-for="dato in datosusuarios">
											<td>@{{dato.usuario}}</td>
											<td>@{{dato.password}}</td>
											<td>@{{dato.nombre}}</td>
											<td>@{{dato.apellidop}}</td>
											<td>@{{dato.apellidom}}</td>
											<td>@{{dato.edad}}</td>
											<td>
												<span class="btn btn-warning btn-md fa fa-pencil" v-on:click="editarDatosUsuario(dato.id_usuario)"></span>
											</td>
										</tr>
									</tbody>
								</table>
				    	</div>
				    </div>
				    <div class="row">
      					<div class="col-md-6 col-xs-12">
        					<div class="modal fade" tabindex="-1" role="dialog" id="datosu">
          						<div class="modal-dialog" role="document">
            						<div class="modal-content">
              							<div class="modal-header">
              								<h4 class="modal-title" v-if="editando">Editar Datos</h4>
                 							<h4 class="modal-title" v-if="!editando">Guardar Datos</h4>
                							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              							</div>
              							<div class="modal-body">
              								<input type="text" placeholder="Usuario" v-model="usuario" class="form-control"><br>
              								<input type="text" placeholder="Contraseña" v-model="password" class="form-control"><br>
                							<input type="text" placeholder="Nombre" v-model="nombre" class="form-control"><br>
                							<input type="text" placeholder="Apellido Paterno" v-model="apellidop" class="form-control"><br>
                							<input type="text" placeholder="Apellido Materno" v-model="apellidom" class="form-control"><br>
                							<input type="text" placeholder="Edad" v-model="edad" class="form-control"><br>
              							</div>
              							<div class="modal-footer">
                							<button type="submit" class="btn btn-success" v-on:click="actualizarDatosUsuario()" v-if="editando">Actualizar</button>
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
<script src="js/perfil.js"></script>
<script src="js/vue-resource.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">