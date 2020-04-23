var ruta= document.querySelector("[name=route]").value;
var urlProd = ruta + '/apiTipo';
var urlVenta = ruta + '/apiVenta';

function init(){
	new Vue({

	// Es necesario para poder realizar un post/patch en el store

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
				}			
	},

	el:'#ventas',

	created:function(){
		this.foliarVenta();
	},

	data:{
		producto:[],
		ventas:[],
		nombre: '',
		codigo:'',
		precio:'',
		cantidad:'',
		pago:0,
		tot:0,
		folio:'',
		cantidades:[1,1,1,1,1,1,1], //almacenar un conjunto de cantidades 
		fecha_salida: moment().format('YYYY-MM-DD')
	},

	methods:{
		getProducto:function(){
			this.$http.get(urlProd + '/' + this.codigo)
			.then(function(json){
				var venta = {'id_tipo':json.data.id_tipo,
							'nombre':json.data.nombre,
							'precio':json.data.precio,
							'cantidad':1,
							'total':json.data.precio
						}
				if(venta.id_tipo)
					this.ventas.push(venta);

				this.id_tipo= '';
				this.$refs.buscar.focus();
			})
		}, //Fin getProducto

		eliminarProducto:function(id){
			this.ventas.splice(id,1);
		},

		addProd:function(id){
			this.ventas[id].cantidad++;
			this.ventas[id].total = this.ventas[id].cantidad * this.ventas[id].precio;
		},

		minusProd:function(id){
			if(this.ventas[id].cantidad>=2)
			this.ventas[id].cantidad--;
			this.ventas[id].total = this.ventas[id].cantidad * this.ventas[id].precio;
		},

		foliarVenta:function(){
			this.folio = 'SDA-' + moment().format('YYMMDDhmmss');
		},

		vender:function(){
			var detalles2 = [];
			// Recorrer el array ventas por el tamaño de la tabla
			for (var i = 0; i < this.ventas.length; i++) {
				detalles2.push({
					codigo:this.ventas[i].id_tipo,
					nombre:this.ventas[i].nombre,
					precio:this.ventas[i].precio,
					cantidad:this.cantidades[i],
					fecha_salida:this.fecha_salida,
					total:this.ventas[i].precio * this.cantidades[i]
				})
			}

			// console.log(detalles2);

			var unaVenta = {
				folio:this.folio,
				fecha_salida: this.fecha_salida,
				total:this.tot,
				detalles:detalles2
			}

			console.log(unaVenta);

			this.$http.post(urlVenta,unaVenta)
			.then(function(json){
				console.log(json.data);
			}).catch(function(j){
				console.log(j.data);
			});

			//Limpiar campos
			alert("La salida se ha guardado");
			this.foliarVenta();
			this.ventas=[];

		}
	},
	// FIN DE METHODS

	computed:{
		total:function(){

			var sum = 0;
			for (var i = 0; i < this.ventas.length; i ++){
				sum = sum + this.cantidades[i] * this.ventas[i].precio;
			}
			return this.tot = sum;
			return sum;
		},

		cambio:function(){
			return this.pago - this.tot;
		},

		// Es para que el computed reciba un parámetro a través de otras variables
		totalProd(){
			return (id) => {
				var total = 0;
				if(this.cantidades[id]!=null)
					total = this.cantidades[id] * this.ventas[id].precio;

				// Regresa el total con un decimal
				return total.toFixed(1);
			}
		}

	}
});

}

window.onload = init;

