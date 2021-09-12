
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
$CC = $_GET['id'];
$tildes = $conexion->query("SET NAMES 'utf8'");
$sql="SELECT users.nombres, users.apellidos, users.tipodocumento, users.documento, users.tipoPoblacion, users.email, users.telefono, users.fechaRegistro, `inscritos-cursos`.`codigo_curso` As codigoCurso,`inscritos-cursos`.`id` As id_inscrito FROM users,`inscritos-cursos` WHERE users.documento=`inscritos-cursos`.`documento` and `inscritos-cursos`.codigo_curso=$CC and `inscritos-cursos`.estado='Inscrito'";
$result=mysqli_query($conexion,$sql);

?>

<div >
	<div class="table-responsive">

		<table class="table table-hover small" id="cargarCursosOfertados">
			<thead class="text-center bg-primary">
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">Nombres y apellidos</th>
					<th class="text-center">Tipo de Documento</th>
					<th class="text-center">Documento</th>
					<th class="text-center">Tipo de población</th>
					<th class="text-center">Teléfono</th>
					<th class="text-center">Email</th>
					<th class="text-center">Fecha de Reg.</th>                      
					<th class="text-center">Acción</th>
				</tr>
			</thead>
			
			<tbody >
				<?php 
				    while ($mostrar=mysqli_fetch_row($result)) {
					    ?>
						<tr class="text-center">
							<td><b><?php $i=$i+1; echo $i; ?></b></td>
							<td><?php echo strtoupper($mostrar[0]." ".$mostrar[1]); ?></td>
							<td><?php echo strtoupper($mostrar[2]); ?></td>
							<td><?php echo strtoupper($mostrar[3]); ?></td>
							<td><?php echo strtoupper($mostrar[4]); ?></td>
							<td><?php echo strtoupper($mostrar[6]); ?></td>
							<td><?php echo strtoupper($mostrar[5]); ?></td>
							<td><?php echo strtoupper($mostrar[7]); ?></td>
							<td>Eliminar</td>
                           
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
		$('#cargarCursosOfertados').DataTable();
	} );

	var table = $('#cargarCursosOfertados').DataTable({
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