<template>
	<div>
		<h5 class="card-title subtitulo">Facturas por Cobrar</h5>
		<div class="card">
			<div class="card-body scroll-y">
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Factura</th>
								<th scope="col">Cliente</th>
								<th scope="col">Placa</th>
								<th scope="col">Asociado</th>
								<th scope="col">Creado Por</th>
								<th scope="col">Fecha de Creacion</th>
							</tr>
						</thead>
						<tr v-for="(cobrar, key) in porCobrar">
							<td scope="col">{{key+1}}</td>
							<td scope="col">{{cobrar.id}}</td>
							<td scope="col">{{cobrar.cliente.nombre}} {{cobrar.cliente.apellido}}</td>
							<td scope="col">{{cobrar.placa}}</td>
							<td scope="col">{{cobrar.cliente.asociado}}</td>
							<th scope="col">{{cobrar.created_by}}</th>
							<td scope="col">{{cobrar.created_at | fecha}}</td>
						</tr> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import moment from 'moment'
export default {
	data() {
		return {
			route: 'api/facturas/',
			porCobrar: [],
		};
	},
	filters: {
		fecha: function(value) {
			if (!value) return 'no tiene fecha'
				value = moment(value).format('LLL');
			return value
		}
	},
	mounted() {
		this.facturasPorCobrar()
	},
	methods: {
		facturasPorCobrar() {
			axios.get(`${this.route}lista-facturas-por-cobrar`).then(res => {
				this.porCobrar = res.data
			})
		}
	}
};
</script>

<style lang="css" scoped>
.subtitulo{
	color: white;
	padding: 1rem;
	border-left: 6px solid blue;
	background-color: lightgrey;
	font-family: cursive, sans-serif;
}

.scroll-y{
	height: 20rem;
	width: 100%;
	overflow-y: auto;
}
</style>
