<?php
	$group = $_GET['name_group'];
	$group = (strlen($group) > 0 ) ? $group : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
	
	<input type="hidden" value="<?php echo $group?>" name= "valor" id="valor">
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header text-center">
						CURSO DISPONIBLES EN EL ÁREA <?php $group_ = (strlen($group) > 0 ) ? "DE ". $group : '' ; echo strtoupper($group_) ?>
					</div>
					<div class="card-body">
						<span class="btn" style="background-color: #FF6C00; color: #fff;" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Agregar-->
	<div class="modal fade bd-example-modal-lg" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo curso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputCodigo4">Codigo</label>
								<input type="number" class="form-control input-sm" id="idCurso" name="idCurso" required="">
							</div>
							<div class="form-group col-md-9">
								<label for="inputNombre4">Nombre</label>
								<input type="text" class="form-control input-sm" id="curso" name="curso" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputGrupo4">Grupo</label>
								<input type="text" class="form-control input-sm" id="nombre_grupo" name="nombre_grupo" required="">
							</div>
							<div class="form-group col-md-8">
								<label for="inputJornada4">Centro de formación</label>
								<input type="text" class="form-control input-sm" id="centro" name="centro" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputHorario4">Horario</label>
								<input type="text" class="form-control input-sm" id="horario" name="horario" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputIntensidad4">Intensidad / Horas</label>
								<input type="number" class="form-control input-sm" id="intensidad" name="intensidad" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputFecha4">Fecha Inicio</label>
								<input type="date" class="form-control input-sm" name="fecha_inicio"  id="fecha_inicio" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputMunicipio4">Municipio</label>
								<input type="text" class="form-control input-sm" name="municipio"  id="municipio" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputDireccion4">Dirección</label>
								<input type="text" class="form-control input-sm" id="direccion" name="direccion" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputTipo4">Tipo formación</label>
								<select name="formacion" id="formacion" class="form-control input-sm">
									<option value="" disabled="" selected="">Seleccione...</option>
									<option value="Virtual">Virtual</option>
									<option value="Presencial">Presencial</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="inputEstado4">Estado</label>
								<select name="estado" id="estado" class="form-control input-sm">
									<option value="" disabled="" selected="">Seleccione...</option>
									<option value="Activo">Activo</option>
									<option value="Inactivo">Inactivo</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="inputJornada4">Jornada</label>
								<select name="jornada" id="jornada" class="form-control input-sm">
									<option value="" disabled="" selected="">Seleccione...</option>
									<option value="Diurna">Diurna</option>
									<option value="Nocturna">Nocturna</option>
									<option value="Mixta">Mixta</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputDescripcion4">Descripción</label>
								<textarea name="descripcion" id="descripcion" class="form-control input-sm" cols="30" rows="5"></textarea>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Editar-->
	<div class="modal fade bd-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar curso <span id="nombreU"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<div class="form-row">
							<div class="form-group col-md-9">
								<label for="inputNombre4">Nombre</label>
								<input type="text" class="form-control input-sm" id="cursoU" name="cursoU" required="">
								<input type="text" hidden="" id="idCursoU" name="idCursoU">
							</div>
							<div class="form-group col-md-3">
								<label for="inputJornada4">Jornada</label>
								<input type="text" class="form-control input-sm" id="jornadaU" name="jornadaU" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputGrupo4">Grupo</label>
								<input type="text" class="form-control input-sm" id="nombre_grupoU" name="nombre_grupoU" required="">
							</div>
							<div class="form-group col-md-8">
								<label for="inputJornada4">Centro de formación</label>
								<input type="text" class="form-control input-sm" id="centroU" name="centroU" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputHorario4">Horario</label>
								<input type="text" class="form-control input-sm" id="horarioU" name="horarioU" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputIntensidad4">Intensidad</label>
								<input type="text" class="form-control input-sm" id="intensidadU" name="intensidadU" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputFecha4">Fecha Inicio</label>
								<input type="date" class="form-control input-sm" name="fecha_inicioU"  id="fecha_inicioU" required="">
							</div>
							<div class="form-group col-md-3">
								<label for="inputMunicipio4">Municipio</label>
								<input type="text" class="form-control input-sm" name="municipioU"  id="municipioU" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputDireccion4">Dirección</label>
								<input type="text" class="form-control input-sm" id="direccionU" name="direccionU" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputTipo4">Tipo formación</label>
								<input type="text" class="form-control input-sm" id="formacionU" name="formacionU" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputEstado4">Estado</label>
								<input type="text" class="form-control input-sm" name="estadoU"  id="estadoU" required="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputDescripcion4">Descripción</label>
								<textarea name="descripcionU" id="descripcionU" class="form-control input-sm" cols="30" rows="5"></textarea>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#agregarnuevosdatosmodal').modal('toggle');
						$('#frmnuevo')[0].reset();
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						Swal.fire(
						'Correcto!',
						'Se ha guardado correctamente!',
						'success'
						);
					}else{
						Swal.fire(
						'Error!',
						'No se ha guardado correctamente!',
						'error'
						);
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#modalEditar').modal('toggle');
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						Swal.fire(
						'Correcto!',
						'Se ha actualizado correctamente!',
						'success'
						);					
					}else{
						Swal.fire(
						'Error!',
						'No se ha actualizado correctamente!',
						'error'
						);					
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		let valor = $('#valor').val();
		$('#tablaDatatable').load('tabla.php?name_group='+valor);
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idCurso){
		$.ajax({
			type:"POST",
			data:"id=" + idCurso,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idCursoU').val(datos['id']);
				$('#cursoU').val(datos['curso']);
				$('#jornadaU').val(datos['jornada']);
				$('#nombre_grupoU').val(datos['nombre_grupo']);
				$('#centroU').val(datos['centro']);
				$('#horarioU').val(datos['horario']);
				$('#intensidadU').val(datos['intensidad']);
				$('#fecha_inicioU').val(datos['fecha_inicio']);
				$('#municipioU').val(datos['municipio']);
				$('#direccionU').val(datos['direccion']);
				$('#formacionU').val(datos['formacion']);
				$('#estadoU').val(datos['estado']);
				$('#descripcionU').val(datos['descripcion']);
			}
		});
	}

	function eliminarDatos(idCurso){
		const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: '¿Está seguro?',
		text: "¡No podrás revertir esto!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: '¡Si, bórralo!',
		cancelButtonText: '¡No, cancela!',
		reverseButtons: true
		}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type:"POST",
				data:"id=" + idCurso,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						swalWithBootstrapButtons.fire(
						'¡Eliminado!',
						'El curso ha sido eliminado.',
						'success'
						)
					}else{
						swalWithBootstrapButtons.fire(
						'¡Eliminado!',
						'El curso no ha sido eliminado.',
						'error'
						)
					}
				}
			});
			
		} else if (
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
			'Cancelado',
			'El curso está seguro, ha cancelado la eliminación.',
			'error'
			)
		}
		});
	}

	
</script>
