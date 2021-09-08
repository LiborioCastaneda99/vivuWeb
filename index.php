<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header text-center">
					Cursos disponibles en el área de artesanías
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
							<div class="form-group col-md-9">
								<label for="inputNombre4">Nombre</label>
								<input type="text" class="form-control input-sm" id="curso" name="curso">
							</div>
							<div class="form-group col-md-3">
								<label for="inputJornada4">Jornada</label>
								<input type="text" class="form-control input-sm" id="jornada" name="jornada">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputGrupo4">Grupo</label>
								<input type="text" class="form-control input-sm" id="nombre_grupo" name="nombre_grupo">
							</div>
							<div class="form-group col-md-8">
								<label for="inputJornada4">Centro de formación</label>
								<input type="text" class="form-control input-sm" id="centro" name="centro">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputHorario4">Horario</label>
								<input type="text" class="form-control input-sm" id="horario" name="horario">
							</div>
							<div class="form-group col-md-3">
								<label for="inputIntensidad4">Intensidad</label>
								<input type="text" class="form-control input-sm" id="intensidad" name="intensidad">
							</div>
							<div class="form-group col-md-3">
								<label for="inputFecha4">Fecha Inicio</label>
								<input type="date" class="form-control input-sm" name="fecha_inicio"  id="fecha_inicio">
							</div>
							<div class="form-group col-md-3">
								<label for="inputMunicipio4">Municipio</label>
								<input type="text" class="form-control input-sm" name="municipio"  id="municipio">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputDireccion4">Dirección</label>
								<input type="text" class="form-control input-sm" id="direccion" name="direccion">
							</div>
							<div class="form-group col-md-4">
								<label for="inputTipo4">Tipo formación</label>
								<input type="text" class="form-control input-sm" id="formacion" name="formacion">
							</div>
							<div class="form-group col-md-4">
								<label for="inputEstado4">Estado</label>
								<input type="text" class="form-control input-sm" name="estado"  id="estado">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputDescripcion4">Descripción</label>
								<textarea name="descripcion" id="descripcion" class="form-control input-sm" cols="30" rows="10"></textarea>
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
								<input type="text" class="form-control input-sm" id="cursoU" name="cursoU">
								<input type="text" hidden="" id="idCurso" name="idCurso">
							</div>
							<div class="form-group col-md-3">
								<label for="inputJornada4">Jornada</label>
								<input type="text" class="form-control input-sm" id="jornadaU" name="jornadaU">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputGrupo4">Grupo</label>
								<input type="text" class="form-control input-sm" id="nombre_grupoU" name="nombre_grupoU">
							</div>
							<div class="form-group col-md-8">
								<label for="inputJornada4">Centro de formación</label>
								<input type="text" class="form-control input-sm" id="centroU" name="centroU">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="inputHorario4">Horario</label>
								<input type="text" class="form-control input-sm" id="horarioU" name="horarioU">
							</div>
							<div class="form-group col-md-3">
								<label for="inputIntensidad4">Intensidad</label>
								<input type="text" class="form-control input-sm" id="intensidadU" name="intensidadU">
							</div>
							<div class="form-group col-md-3">
								<label for="inputFecha4">Fecha Inicio</label>
								<input type="date" class="form-control input-sm" name="fecha_inicioU"  id="fecha_inicioU">
							</div>
							<div class="form-group col-md-3">
								<label for="inputMunicipio4">Municipio</label>
								<input type="text" class="form-control input-sm" name="municipioU"  id="municipioU">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputDireccion4">Dirección</label>
								<input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
							</div>
							<div class="form-group col-md-4">
								<label for="inputTipo4">Tipo formación</label>
								<input type="text" class="form-control input-sm" id="formacionU" name="formacionU">
							</div>
							<div class="form-group col-md-4">
								<label for="inputEstado4">Estado</label>
								<input type="text" class="form-control input-sm" name="estadoU"  id="estadoU">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputDescripcion4">Descripción</label>
								<textarea name="descripcionU" id="descripcionU" class="form-control input-sm" cols="30" rows="10"></textarea>
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
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
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
						$('#tablaDatatable').load('tabla.php');
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
		$('#tablaDatatable').load('tabla.php');
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
				$('#idCurso').val(datos['id']);
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
						$('#tablaDatatable').load('tabla.php');
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
