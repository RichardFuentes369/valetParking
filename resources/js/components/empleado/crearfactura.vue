<template>
	<div>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title titulo">Crear Factura</h5>
				<div class="card-body">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="text-center">Cliente</h3>
								<input type="text" v-model="dni" placeholder="DNI" class="form-control">
								<div class="mt-5">
									<div class="row mr-5">
										<div class="col-sm-12 row">
											<div class="col-sm-4 text-right">
												<label for="">Nombre</label>
											</div>
											<div class="col-sm-8">
												<input type="text" :value="model.cliente.nombre" class="mt-1 form-control text-center" readonly>
											</div>
										</div>
										<div class="col-sm-12 row">
											<div class="col-sm-4 text-right">
												<label for="">Apellido</label>
											</div>
											<div class="col-sm-8">
												<input type="text" :value="model.cliente.apellido" class="mt-1 form-control text-center" readonly>
											</div>
										</div>
										<div class="col-sm-12 row">
											<div class="col-sm-4 text-right">
												<label for="">Dni</label>
											</div>
											<div class="col-sm-8">
												<input type="text" :value="model.cliente.dni" class="mt-1 form-control text-center" readonly>
											</div>
										</div>
										<div class="col-sm-12 row">
											<div class="col-sm-4 text-right">
												<label for="">Fijo</label>
											</div>
											<div class="col-sm-8">
												<input type="text" :value="model.cliente.fijo" class="mt-1 form-control text-center" readonly>
											</div>
										</div><div class="col-sm-12 row">
											<div class="col-sm-4 text-right">
												<label for="">Celular</label>
											</div>
											<div class="col-sm-8">
												<input type="text" :value="model.cliente.celular" class="mt-1 form-control text-center" readonly>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h3 class="text-center">Factura</h3>
								<div class="row">
									<div class="col-sm-6">
										<el-select v-model="model.tipo_vehiculo" placeholder="Select" class="form-control-file">
											<el-option
											v-for="item in tipo_vehicilos"
											:key="item.value"
											:label="item.label"
											:value="item.value" />
										</el-select>
									</div>
									<div class="col-sm-6">
										<el-select v-model="model.descuento" placeholder="Select" class="form-control-file">
											<el-option
											v-for="descuento in descuentos"
											:key="descuento.id"
											:label="descuento.nombre"
											:value="descuento.id">
											<span style="float: left">{{ descuento.nombre }}</span>
											<span style="float: right; color: #8492a6; font-size: 13px">{{ descuento.porcentaje }}</span>
										</el-option>
									</el-select>
								</div>									
							</div>
							<div class="col-sm-12">
								<input type="text" class="form-control mt-3 bg-dark text-white text-center text-uppercase" v-model="model.placa" placeholder="PLACA" required> 
							</div>
							<h3 class="text-center mt-3">Empleado</h3>
							<input type="text" :value="model.usuario_logeado" class="form-control text-center mt-2" readonly>		
							<button :disabled="active" class="btn btn-success btn-block mt-3" @click="crearFactura">Generar Factura</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
export default {
	data() {
		return {
			route: 'api/clientes/',
			route2: 'api/descuentos/',
			route3: 'api/facturas/',
			dni:'',
			clientes: [],
			model: {
				cliente: {},
				tipo_vehiculo: '',
				descuento: '',
				placa: '',
				usuario_logeado: document.getElementsByName('correo_usuario')[0].content
			},
			tipo_vehicilos: [
			{
				value: '1',
				label: 'Moto'
			}, 
			{
				value: '0',
				label: 'Carro'
			}
			],
			descuentos: [],
			active: true
		};
	},
	watch: {
		dni: function (val) {
			this.filtrar(val)
		},
	},
	mounted() {
		this.lista_clientes()
		this.lista_descuentos()
	},
	methods: {
		async lista_clientes() {
			await axios.get(`${this.route}lista-clientes`).then(res => {
				this.clientes = res.data
			})
			this.conteo = this.clientes.length
		},		
		async lista_descuentos() {
			await axios.get(`${this.route2}lista-descuentos`).then(res => {
				this.descuentos = res.data
			})
		},
		filtrar(val) {
			let cliente = this.clientes.find(o => o.dni === val)
			if(cliente != undefined){
				this.model.cliente = cliente
				this.active = false
			} else {
				this.model.cliente = {}
				this.active = true
			}
		},
		async crearFactura() {
			if(this.model.placa != ''){
				await axios.post(`${this.route3}crear-factura`, this.model)
				this.$notify({
					title: 'Success',
					message: 'Factura creada exitosamente',
					type: 'success'
				});
				this.dni = ''
				this.model = {
					cliente: {},
					tipo_vehiculo: '',
					descuento: '',
					placa: '',
					usuario_logeado: document.getElementsByName('correo_usuario')[0].content
				}	
			} else {
				alert('DEBE INGRESAR LA PLACA')
			}			
		}
	}
}
</script>

<style lang="css" scoped>
.titulo{
	color: white;
	padding: 1rem;
	border-left: 6px solid blue;
	background-color: lightgrey;
	font-family: cursive, sans-serif;
}
.tres-puntos{
	width: 100%;
	height: 39px;
	font-size: 12pt;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
}
</style>
