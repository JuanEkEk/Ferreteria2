@extends('layouts.master')
@section('titulo', 'Categorías')
@section('contenido')
<div id="categoria">
	<div class="container">
		<div>
			<div>
				<h2>Datos de las categorias |<small> Categorías</small></h2>
					<div class="row">
						<label>Buscar: </label><input type="text" placeholder="Escriba el nombre de la categoría" class="form-control" v-model="buscar" value="buscar">
						<div class="col-xs-2">
						</div>
						<div class="col-xs-10"><br>
							<button class="fa fa-plus btn btn-primary" v-on:click="showModal()"> Agregar categoría</button><br><br><br>
								<table class="table table-striped table-hover table-dark">
									<thead>
										<th>Nombre</th>
										<th>Opciones</th>
									</thead>
									<tbody>
										<tr v-for="categoria in filtroCategoria">
											<td>@{{categoria.nombre}}</td>
											<td>
												<span class="btn btn-warning btn-md fa fa-pencil" v-on:click="editarCategoria(categoria.id_categoria)"></span>
												<span class="btn btn-danger btn-md fa fa-trash" v-on:click="eliminarCategoria(categoria.id_categoria)"></span>
											</td>
										</tr>
									</tbody>
								</table>
				    	</div>
				    </div>
				    <div class="row">
      					<div class="col-md-6 col-xs-12">
        					<div class="modal fade" tabindex="-1" role="dialog" id="add_categorias">
          						<div class="modal-dialog" role="document">
            						<div class="modal-content">
              							<div class="modal-header">
              								<h4 class="modal-title" v-if="editando">Editar Categoría</h4>
                 							<h4 class="modal-title" v-if="!editando">Guardar Categoría</h4>
                							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              							</div>
              							<div class="modal-body">
                							<input type="text" placeholder="Nombre" v-model="nombre" class="form-control"><br>
              							</div>
              							<div class="modal-footer">
                							<button type="submit" class="btn btn-success" v-on:click="actualizarCategoria()" v-if="editando">Actualizar</button>
                							<button type="submit" class="btn btn-success" v-on:click="agregarCategoria()" v-if="!editando">Guardar</button>
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

<script src="js/categoria.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">