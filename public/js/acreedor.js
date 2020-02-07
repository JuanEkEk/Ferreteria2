var ruta= document.querySelector("[name=route]").value;
var urlAcreedor = ruta + '/apiAcreedor';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#acreedor',

	created:function(){
		this.getAcreedores();
	},

	data:{
		acreedores:[],
		id_acreedor:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		edad:'',
		acreedorid:'',
		editando:false
	},

	methods:{
		getAcreedores:function(){
			this.$http.get(urlAcreedor).then
			(function(response){
				this.acreedores = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		showModal:function(){
			$('#add_acreedores').modal('show');
		},


		agregarAcreedor:function(id){
			this.editando = false;
			var acreedor = {
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				edad:this.edad,
			};

			this.$http.post(urlAcreedor,acreedor)
			.then(function(response){
				$('#add_acreedores').modal('hide');
				this.getAcreedores();
				this.nombre = '';
				this.apellidop = '';
				this.apellidom = '';
				this.edad = '';
			});

		},

		editarAcreedor:function(id){
			this.editando = true;
			this.$http.get(urlAcreedor + '/' + id)
			.then(function(response){
				// this.id_proveedor = response.data.id_proveedor
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.edad = response.data.edad
				this.acreedorid = response.data.id_acreedor
				$('#add_acreedores').modal('show');
			});
		},


		actualizarAcreedor:function(){
			
			var acreedor = {
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				edad:this.edad
			};

			this.$http.put(urlAcreedor + '/' + this.acreedorid, acreedor)
			.then(function(response){
				this.getAcreedores();
			});
			this.editando = false;
			
			this.nombre = '';
			this.apellidop = '';
			this.apellidom = '';
			this.edad = '';
			$('#add_acreedores').modal('hide');
		},

		eliminarAcreedor:function(id){
			var res = confirm ("¿Está seguro de eliminar al acreedor?: " + id)
			if (res == true){
				this.$http.delete(urlAcreedor + '/' + id)
				.then(function(json){
					this.getAcreedores();
				});
			}
		},

		salir:function(){
			this.editando = false;
			this.id_acreedor='';
			this.nombre = '';
			this.apellidop = '';
			this.apellidom = '';
			this.edad = '';
			$('#add_acreedores').modal('hide');
		}
	}
});