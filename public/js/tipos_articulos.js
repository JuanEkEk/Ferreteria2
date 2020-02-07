var ruta = document.querySelector("[name=route]").value;
var urlTipoArticulo = ruta + '/apiTipo';
var urlCategoria = ruta +'/apiCategoria';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#tipo_articulo',

	data:{
		categorias:[],
		tipoarticulos:[],
		buscar:'',
		id_categoria:'',
		id_tipo:'',
		nombre:'',
		editando:false,
		tipoid:'',
		categoriaid: ''


	},

	created:function(){
		this.getCategorias();
		this.getTipoArticulo();
	},

	methods:{
		getCategorias:function(){
			this.$http.get(urlCategoria).then(function(response){
				this.categorias = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		getTipoArticulo:function(){
			this.$http.get(urlTipoArticulo).then(function(response){
				this.tipoarticulos = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},


		showModal:function(){
			$('#add_tipoarticulo').modal('show');
		},

		agregarTipoArticulo:function(id){
			this.editando = false;
			var tipoarticulo = {
				nombre:this.nombre,
				id_categoria:this.id_categoria,
			};

			this.$http.post(urlTipoArticulo,tipoarticulo)
			.then(function(response){
				$('#add_tipoarticulo').modal('hide');
				this.getTipoArticulo();
				this.nombre = '';
				this.id_categoria = '';
			});

		},

		editarTipoArticulo:function(id){
			this.editando = true;
			this.$http.get(urlTipoArticulo + '/' + id)
			.then(function(response){
				this.nombre = response.data.nombre
				this.tipoid = response.data.id_tipo
				this.categoriaid = response.data.id_categoria
				$('#add_tipoarticulo').modal('show');
			});
		},

		actualizarTipoArticulo:function(){
			
			var tipoarticulo = {
				nombre:this.nombre,
				id_categoria:this.id_categoria,
			};

			this.$http.put(urlTipoArticulo + '/' + this.tipoid, tipoarticulo)
			.then(function(response){
				this.getTipoArticulo();
			});
			this.editando = false;
			this.nombre = '';
			this.id_categoria = '';
			$('#add_tipoarticulo').modal('hide');
		},

		eliminarTipoArticulo:function(id){
			var res = confirm ("¿Está seguro de eliminar el articulo?: " + id)
			if (res == true){
				this.$http.delete(urlTipoArticulo + '/' + id)
				.then(function(json){
					this.getTipoArticulo();
				});
			}
		},

		salir:function(){
			this.editando = false;
			this.id_tipo='';
			this.id_categoria = '';
			this.nombre = '';
			$('#add_tipoarticulo').modal('hide');
		}

	},

	computed:{
		filtroArticulo:function(){
			if (this.buscar=='') {
				return this.tipoarticulos;
			}else{
			return this.tipoarticulos.filter((articulo)=>{
				return articulo.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
			}
		}
	}


});