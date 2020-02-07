var ruta = document.querySelector("[name=route]").value;
var urlCategoria =  ruta + '/apiCategoria';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#categoria',

	created:function(){
		this.getCategorias();
	},

	data:{
		categorias:[],
		id_categoria:'',
		buscar:'',
		nombre:'',
		categoriaid:'',
		editando:false

	},

	methods:{
		getCategorias:function(){
			this.$http.get(urlCategoria).then(function(response){
				this.categorias = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		showModal:function(){
			$('#add_categorias').modal('show');
		},

		agregarCategoria:function(id){
			this.editando = false;
			var categoria = {
				nombre:this.nombre,
			};

			this.$http.post(urlCategoria,categoria)
			.then(function(response){
				$('#add_categorias').modal('hide');
				this.getCategorias();
				this.nombre = '';
			});

		},

		editarCategoria:function(id){
			this.editando = true;
			this.$http.get(urlCategoria + '/' + id)
			.then(function(response){
				this.nombre = response.data.nombre
				this.categoriaid = response.data.id_categoria
				$('#add_categorias').modal('show');
			});
		},

		actualizarCategoria:function(){
			
			var categoria = {
				nombre:this.nombre,
			};

			this.$http.put(urlCategoria + '/' + this.categoriaid, categoria)
			.then(function(response){
				this.getCategorias();
			});
			this.editando = false;
			
			this.nombre = '';
			$('#add_categorias').modal('hide');
		},

		eliminarCategoria:function(id){
			var res = confirm ("¿Está seguro de eliminar la categoria?: " + id)
			if (res == true){
				this.$http.delete(urlCategoria + '/' + id)
				.then(function(json){
					this.getCategorias();
				});
			}
		},

		salir:function(){
			this.editando = false;
			this.id_categoria='';
			this.nombre = '';
			$('#add_categorias').modal('hide');
		}

	},

	computed:{
		filtroCategoria:function(){
			return this.categorias.filter((categoria)=>{
				return categoria.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});