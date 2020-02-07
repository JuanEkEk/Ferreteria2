var ruta = document.querySelector("[name=route]").value;
var urlDatosUsuario =  ruta +'/apiDatosUsuario';

new Vue({
	http:{
		headers:{
					'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
			},

	el:'#datosusuario',

	created:function(){
		this.getDatosUsuario();
	},

	data:{
		datosusuarios:[],
		id_usuario:'',
		usuario:'',
		password:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		edad:'',
		usuarioid:'',
		editando:false
	},

	methods:{
		getDatosUsuario:function(){
			this.$http.get(urlDatosUsuario).then(function(response){
				this.datosusuarios = response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		showModal:function(){
			$('#datosu').modal('show');
		},

		editarDatosUsuario:function(id){
			this.editando = true;
			this.$http.get(urlDatosUsuario + '/' + id)
			.then(function(response){
				this.usuario = response.data.usuario
				this.password = response.data.password
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.edad = response.data.edad
				this.usuarioid = response.data.id_usuario
				$('#datosu').modal('show');
			});
		},

		actualizarDatosUsuario:function(){
			
			var dato = {
				usuario:this.usuario,
				password:this.password,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				edad:this.edad
			};

			this.$http.put(urlDatosUsuario + '/' + this.usuarioid, dato)
			.then(function(response){
				this.getDatosUsuario();
			});
			this.salir();
			alert("Los cambios en los datos se aplicarán al reiniciar tu sesión");

		},

		salir:function(){
			this.editando = false;
			this.id_usuario='';
			this.usuario = '';
			this.password = '';
			this.nombre = '';
			this.apellidop = '';
			this.apellidom = '';
			this.edad = '';
			$('#datosu').modal('hide');
		}
	}

});