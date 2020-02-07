var ruta = document.querySelector("[name=route]").value;
var urlSucursal = ruta + '/apiSucursal';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#sucursal',

	created:function(){
		this.getSucursales();
	},

	data:{
		sucursales:[],
		buscar:'',
		id_sucursal: '',
		nombre:'',
		localidad:'',
		calle:'',
		cruzamientoa:'',
		cruzamientob:'',
		sucursalid:'',
		editando: false
	},

	methods:{
		getSucursales:function()
		{
			this.$http.get(urlSucursal).then(function(response)
			{
					this.sucursales = response.data;
				}).catch(function(response){
					console.log(response);
				});
		},

		showModal:function(){
			$('#add_sucursales').modal('show');
		},

		agregarSucursal:function(id){
			this.editando = false;
			var sucursal = {
				nombre:this.nombre,
				localidad:this.localidad,
				calle:this.calle,
				cruzamientoa:this.cruzamientoa,
				cruzamientob:this.cruzamientob,
			};

			this.$http.post(urlSucursal,sucursal)
			.then(function(response){
				$('#add_sucursales').modal('hide');
				this.getSucursales();
				this.nombre = '';
			this.localidad = '';
			this.calle = '';
			this.cruzamientoa = '';
			this.cruzamientob = '';
			});

		},

		editarSucursal:function(id){
			this.editando = true;
			this.$http.get(urlSucursal + '/' + id)
			.then(function(response){
				this.id_sucursal = response.data.id_sucursal
				this.nombre = response.data.nombre
				this.localidad = response.data.localidad
				this.calle = response.data.calle
				this.cruzamientoa = response.data.cruzamientoa
				this.cruzamientob = response.data.cruzamientob
				this.sucursalid = response.data.id_sucursal
				$('#add_sucursales').modal('show');
			});
		},

		actualizarSucursal:function(){
			
			var sucursal = {
				nombre:this.nombre,
				localidad:this.localidad,
				calle:this.calle,
				cruzamientoa:this.cruzamientoa,
				cruzamientob:this.cruzamientob,
			};

			this.$http.put(urlSucursal + '/' + this.sucursalid, sucursal)
			.then(function(response){
				this.getSucursales();
			});
			this.editando = false;
			$('#add_sucursales').modal('hide');

			this.nombre = '';
			this.localidad = '';
			this.calle = '';
			this.cruzamientoa = '';
			this.cruzamientob = '';
		},


		eliminarSucursal:function(id){
			var res = confirm ("¿Está seguro de eliminar a la sucursal?: " + id)
			if (res == true){
				this.$http.delete(urlSucursal + '/' + id)
				.then(function(json){
					this.getSucursales();
				});
			}
		},

		salir:function(){
			this.editando = false;
			this.id_sucursal='';
			this.nombre = '';
			this.localidad = '';
			this.calle = '';
			this.cruzamientoa = '';
			this.cruzamientob = '';
			$('#add_sucursales').modal('hide');
		}
		
	},

	computed:{
		filtroSucursal:function(){
			return this.sucursales.filter((sucursal)=>{
				return sucursal.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});