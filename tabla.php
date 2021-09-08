
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='".$_GET['name_group']."' and estado='Activo'";
$result=mysqli_query($conexion,$sql);

?>

<div>
	<div class="table-responsive">

		<table class="table table-hover small" id="cargarListadoCursos">
			<thead style="background-color: #FF6C00;color: white; font-weight: bold;">
				<tr>
					<td>Curso</td>
					<td>Jornada</td>
					<td>Horario</td>
					<td>Intensidad</td>
					<td>Inicia</td>
					<td>Municipio</td>
					<td>Lugar</td>
					<td>Descripción</td>
					<td width="13%">Acciones</td>
				</tr>
			</thead>
			
			<tbody >
				<?php 
				while ($mostrar=mysqli_fetch_row($result)) {
					?>
					<tr class="text-center">
						<td><?php echo utf8_encode(strtoupper($mostrar[2])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[3])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[4])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[5])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[6])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[7])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[8])); ?></td>
						<td><?php echo utf8_encode(strtoupper($mostrar[11])); ?></td>
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
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
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