
<?php 
session_start();

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

if (isset($_SESSION['user_id'])) {
	$id = $_SESSION['user_id'];
	$tildes = $conexion->query("SET NAMES 'utf8'");
	$sql="SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, 
	fechaRegistro, rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro 
	FROM users WHERE id = $id";
	$result_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
	$user = null;
  
	if (count($result_login) > 0) {
	  $user = $result_login;
	}
}
$tildes = $conexion->query("SET NAMES 'utf8'");
$sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='".$_GET['name_group']."' and estado='Activo'";
$result=mysqli_query($conexion,$sql);

?>

<div>
	<div class="table-responsive">

		<table class="table table-hover small" id="cargarListadoCursos">
			<thead class="text-center" style="background-color: #FF6C00; color: white; font-weight: bold;">
				<tr>
					<td>Curso</td>
					<td>Jornada</td>
					<td>Horario</td>
					<td>Intensidad</td>
					<td>Inicia</td>
					<td>Municipio</td>
					<td>Lugar</td>
					<td>Descripción</td>
					<td width="16%">Acciones</td>
				</tr>
			</thead>
			
			<tbody >
				<?php 
				while ($mostrar=mysqli_fetch_row($result)) {
					?>
						<tr class="text-center">
							<td><?php echo strtoupper($mostrar[2]); ?></td>
							<td><?php echo strtoupper($mostrar[3]); ?></td>
							<td><?php echo strtoupper($mostrar[4]); ?></td>
							<td><?php echo strtoupper($mostrar[5]); ?></td>
							<td><?php echo strtoupper($mostrar[6]); ?></td>
							<td><?php echo strtoupper($mostrar[7]); ?></td>
							<td><?php echo strtoupper($mostrar[8]); ?></td>
							<td><?php echo strtoupper($mostrar[11]); ?></td>
							<?php if(!empty($user) && ($user[9]=='Aprendiz')): ?>
								<?php 
									$eCurso = mysqli_fetch_row(mysqli_query($conexion, "SELECT estado FROM y_inscritos_cursos where id_usuario='$user[0]' and id_curso='$mostrar[0]'"))[0];
                          		?>
								<td style="text-align: center;" >
									<!-- Estado inscrito -->
									<?php if(($eCurso == 1)): ?>
										<span class="btn btn-warning btn-sm">
											<span class="fa fa-check-square-o"></span> Inscrito
										</span>
									<?php else:?>
										<span class="btn btn-warning btn-sm" onclick="btnInscribir(<?php echo $mostrar[0];?>, <?php echo $user[0];?>)">
											<span class="fa fa-plus-square-o"></span> Inscribir
										</span>
									<?php endif; ?>

									<span class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalVer" onclick="">
										<span class="fa fa-eye"></span>
									</span>
								</td>
							<?php elseif(!empty($user) && ($user[9]=='Administrador')): ?>
								<td style="text-align: center;" >
									<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
										<span class="fa fa-pencil-square-o"></span>
									</span>

									<span class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalVer" onclick="">
										<span class="fa fa-eye"></span>
									</span>
								
									<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
										<span class="fa fa-trash"></span>
									</span>
								</td>
							<?php endif; ?>
						</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function btnInscribir(idCurso, idUsuario){
		var datos = {
			"idCurso" : idCurso,
			"idUsuario" : idUsuario
        };
		$.ajax({
			type:"POST",
			data: datos,
			url:"procesos/agregarInscripcion.php",
			success:function(r){
				if(r==1){
					let valor = $('#valor').val();
					$('#tablaDatatable').load('tabla.php?name_group='+valor);
					Swal.fire(
					'Correcto!',
					'Se ha inscrito correctamente!',
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
	}
	$('#btnInscribir').click(function(){
			datos=$('#frmInscribir').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarInscripcion.php",
				success:function(r){
					if(r==1){
						let valor = $('#valor').val();
						$('#tablaDatatable').load('tabla.php?name_group='+valor);
						Swal.fire(
						'Correcto!',
						'Se ha inscrito correctamente!',
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

	$(document).ready(function() {
		$('#cargarListadoCursos').DataTable();
	} );

	var table = $('#cargarListadoCursos').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
        "infoEmpty": "Mostrando 0 de 0 de 0 Registros",
        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
</script>