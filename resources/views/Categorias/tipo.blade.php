@extends('layouts.master')
@section('titulo', 'Tipos de artículos')
@section('contenido')
<div id="tipo_articulo">
	<div class="container">
		<div>
			<div>
				<h2>Datos de las artículos |<small> Artículos</small></h2>
					<div class="row">
						<label>Buscar: </label><input type="text" placeholder="Escriba el nombre del articulo" class="form-control" v-model="buscar" value="buscar">
						<div class="col-xs-2">
						</div>
						<div class="col-xs-10"><br>
							<button class="fa fa-plus btn btn-primary" v-on:click="showModal()"> Agregar artículo</button><br><br><br>
								<table class="table table-striped table-hover table-dark">
									<thead>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>Opciones</th>
									</thead>
									<tbody>
										<tr v-for="articulo in filtroArticulo">
											<td>@{{articulo.nombre}}</td>
											<td>@{{articulo.categoria.nombre}}</td>
											<td>
												<span class="btn btn-warning btn-md fa fa-pencil" v-on:click="editarTipoArticulo(articulo.id_tipo)"></span>
												<span class="btn btn-danger btn-md fa fa-trash" v-on:click="eliminarTipoArticulo(articulo.id_tipo)"></span>
											</td>
										</tr>
									</tbody>
								</table>
				    	</div>
				    </div>
				    <div class="row">
      					<div class="col-md-6 col-xs-12">
        					<div class="modal fade" tabindex="-1" role="dialog" id="add_tipoarticulo">
          						<div class="modal-dialog" role="document">
            						<div class="modal-content">
              							<div class="modal-header">
              								<h4 class="modal-title" v-if="editando">Editar Categoría</h4>
                 							<h4 class="modal-title" v-if="!editando">Guardar Categoría</h4>
                							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              							</div>
              							<div class="modal-body">
                							<input type="text" placeholder="Nombre" v-model="nombre" class="form-control"><br>

                							<select class="form-control" v-model="id_categoria">
                								<option v-for="c in categorias" v-bind:value="c.id_categoria">
                									@{{c.nombre}}
                								</option>
                							</select>
              							</div>
              							<div class="modal-footer">
                							<button type="submit" class="btn btn-success" v-on:click="actualizarTipoArticulo()" v-if="editando">Actualizar</button>
                							<button type="submit" class="btn btn-success" v-on:click="agregarTipoArticulo()" v-if="!editando">Guardar</button>
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

<script src="js/tipos_articulos.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">