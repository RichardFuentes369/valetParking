<template>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title titulo">Configuración</h5>
			<center>
				<div class="col-sm-12"><br>
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Nombres</span>
								</div>
								<input type="text" class="form-control" name="name" v-model="model.nombres">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Apellidos</span>
								</div>
								<input type="text" class="form-control" name="lastname" v-model="model.apellidos">
							</div> 
						</div>
						<div class="col-sm-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">TD</span>
								</div>
								<input type="text" class="form-control" name="document_type" v-model="model.td" readonly>
								&nbsp;&nbsp;
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">DNI</span>
								</div>
								<input type="text" class="form-control" name="dni" style="width: 20em" v-model="model.dni" readonly>
							</div> 
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Sexo</span>
								</div>
								<select name="sexo" id="sexo" class="form-control">
									<option value="M" selected="selected">Masculino</option>
									<option value="F">Femenino</option>				
								</select>
							</div> 
						</div>
						<div class="col-sm-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Fijo</span>
								</div>
								<input type="text" class="form-control" name="phone" v-model="model.fijo">
							</div> 
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Celular</span>
								</div>
								<input type="text" class="form-control" name="cellphone" v-model="model.celular">
							</div> 
						</div>
						<div class="col-sm-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Fecha Nacimiento</span>
								</div>
								<input type="text" class="form-control" name="birthdate" v-model="model.fecha_nacimiento">
							</div> 
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input type="text" class="form-control" name="email" v-model="model.correo">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Contraseña</span>
								</div>
								<input type="password" name="password" class="form-control" v-model="model.contrasena">
							</div> 
						</div>
						<div class="col-sm-12" align="left" style="font-family: cursive;">
							Recuerda que si actualizaste solo tus datos sin actualizar la contraseña podras seguir en la plataforma. <br>Si por el contrario, actualizaste la contraseña... El sistema te sacara de la plataforma, y deberas ingresar con la contraseña nueva.
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Actualizar</button>
					</div>
				</div>
			</center>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			route: 'api/usuarios/',
			model: {
				usuario_logeado: document.getElementsByName('correo_usuario')[0].content,
				nombres: '',
				apellidos: '',
				td: '',
				dni: '',
				sexo: '',
				fijo: '',
				celular: '',
				fecha_nacimiento: '',
				correo: '',
				contrasena: ''				
			},
		};
	},
	mounted() {
		this.listar_usuario()
	},
	methods: {
		listar_usuario() {
			axios.get(`${this.route}${this.model.usuario_logeado}/lista-usuario-ajuste`).then(res => {
				this.model = {
					nombres: res.data.nombre,
					apellidos: res.data.apellido,
					td: res.data.td,
					dni: res.data.dni,
					sexo: '',
					fijo: res.data.telefono_fijo,
					celular: res.data.telefono_celular,
					fecha_nacimiento: res.data.fecha_nacimiento,
					correo: res.data.email,
					contrasena: ''
				}
			})
		},
		// async eliminarDescuento(id) {
		// 	await axios.delete(`${this.route}${id}/eliminar-descuento`)
		// 	this.lista_descuento()
		// 	this.$notify({
		// 		title: 'Success',
		// 		message: 'Se elimino el descuento correctamente',
		// 		type: 'success'
		// 	});
		// },
	},
};
</script>

<style lang="css" scoped>
.titulo{
	color: white;
	padding: 1rem;
	border-left: 6px solid blue;
	background-color: lightgrey;
	font-family: cursive, sans-serif;
}
</style>
