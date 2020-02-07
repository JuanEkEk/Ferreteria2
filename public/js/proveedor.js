var ruta = document.querySelector("[name=route]").value;
var urlProveedor = ruta + '/apiProveedor';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#proveedor',

	created:function(){
		this.getProveedores();
	},

	data:{
		saludo:'Hola',
		proveedores:[],
		id_proveedor:'',
		buscar:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		edad:'',
		proveedorid:'',
		editando:false
	},

	methods:{
		getProveedores:function(){
			this.$http.get(urlProveedor).then(function(response){
				this.proveedores = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		showModal:function(){
			$('#add_proveedores').modal('show');
		},

		agregarProveedor:function(id){
			this.editando = false;
			var proveedor = {
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				edad:this.edad,
			};

			this.$http.post(urlProveedor,proveedor)
			.then(function(response){
				$('#add_proveedores').modal('hide');
				this.getProveedores();
				this.nombre = '';
				this.apellidop = '';
				this.apellidom = '';
				this.edad = '';
			});

		},

		editarProveedor:function(id){
			this.editando = true;
			this.$http.get(urlProveedor + '/' + id)
			.then(function(response){
				// this.id_proveedor = response.data.id_proveedor
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.edad = response.data.edad
				this.proveedorid = response.data.id_proveedor
				$('#add_proveedores').modal('show');
			});
		},

		actualizarProveedor:function(){
			
			var proveedor = {
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				edad:this.edad
			};

			this.$http.put(urlProveedor + '/' + this.proveedorid, proveedor)
			.then(function(response){
				this.getProveedores();
			});
			this.editando = false;
			

			this.nombre = '';
			this.apellidop = '';
			this.apellidom = '';
			this.edad = '';
			$('#add_proveedores').modal('hide');
		},

		eliminarProveedor:function(id){
			var res = confirm ("¿Está seguro de eliminar al proveedor?: " + id)
			if (res == true){
				this.$http.delete(urlProveedor + '/' + id)
				.then(function(json){
					this.getProveedores();
				});
			}
		},

		salir:function(){
			this.editando = false;
			this.id_proveedor='';
			this.nombre = '';
			this.apellidop = '';
			this.apellidom = '';
			this.edad = '';
			$('#add_proveedores').modal('hide');
		}
	},

	computed:{
		filtroProveedor:function(){
			return this.proveedores.filter((proveedor)=>{
				return proveedor.nombre.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					   proveedor.apellidop.toLowerCase().match(this.buscar.trim().toLowerCase()) || 
					   proveedor.apellidom.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});