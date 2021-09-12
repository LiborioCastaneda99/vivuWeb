<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
	$records = $conn->prepare('SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, fechaRegistro,rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results) > 0) {
		$user = $results;
	}
}
?>
<?php

/*$server = 'localhost';
$username = 'root';
$password = '';
$database = 'complementario';*/
$server = 'localhost';
$username = 'root';
$password = '12345';
$database = 'vivu';

					// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect( $server, $username, $password) or die ("No se ha podido conectar al servidor de Base de datos");

					// Selección del a base de datos a utilizar
$db = mysqli_select_db( $conexion, $database ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );



$consulta = "SELECT municipio, COUNT(municipio) As ContarMunicipio FROM `cursos` GROUP BY municipio";
$resultado_contador = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos contador");

$consulta_Sexo = "SELECT sexo, COUNT(sexo) As ContarSexo FROM `users` where rol='Aprendiz' GROUP BY sexo";
$resultado_consulta_Sexo = mysqli_query( $conexion, $consulta_Sexo ) or die ( "Algo ha ido mal en la consulta a la base de datos contador");

$consulta_Poblacion = "SELECT municipio As Mun_Poblacion, tipoPoblacion, COUNT(tipoPoblacion)As ContarPoblacion FROM `users`  where rol='Aprendiz' GROUP BY municipio,tipoPoblacion";
$resultado_consulta_Poblacion = mysqli_query( $conexion, $consulta_Poblacion ) or die ( "Algo ha ido mal en la consulta a la base de datos contador");

$consulta_cursos_solicitados = "SELECT nombreCursoSolicitado, COUNT(nombreCursoSolicitado) As NombreCurso FROM `cursos_solicitados` GROUP BY nombreCursoSolicitado";
$resultado_consulta_cursos_solicitados = mysqli_query( $conexion, $consulta_cursos_solicitados ) or die ( "Algo ha ido mal en la consulta a la base de datos contador");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="assets/logoSena.png">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<title>Graficas | Oferta Complementaria</title>
	<meta property="og:title" content="Graficas | Oferta Complementaria">
	<meta name="csrf-param" content="authenticity_token" />
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
	<link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
	<link rel="stylesheet" media="screen" href="assets/grupos.css" />
	<script src="assets/general.js" data-turbolinks-track="reload"></script>
	<style type="text/css">
		.footer_new {
			bottom: 0;
			text-align: center;
			font-size: 15px;
			width: 100%;
			height: 50px; /* Set the fixed height of the footer here */
			line-height: 44px; /* Vertically center the text there */
			background-color: #FF6C00;
			color: white;
		}
	</style>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Estado', 'Contador'],  <?php

				while($row = mysqli_fetch_array( $resultado_contador )) {	

					echo "['".$row['municipio']."', ".$row['ContarMunicipio']."],";
				}
				?>
				]);

			var options = {
				title: 'GRAFICO PORCENTUAL DE LOS MUNICIPIO QUE SE LES HA BRINDADO CURSO',
				is3D: true,
				pieHole: 0.4,
				width: 600,
				height: 400,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_municipio'));
			chart.draw(data, options);
		}
	</script>
	<script type="text/javascript">
		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Estado', 'Contador'],  <?php

				while($row = mysqli_fetch_array( $resultado_consulta_Sexo )) {	

					echo "['".$row['sexo']."', ".$row['ContarSexo']."],";
				}
				?>
				]);

			var options = {
				title: 'GRAFICO PORCENTUAL DE GENEROS',
				is3D: true,
				pieHole: 0.4,
				width: 600,
				height: 400,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_municipio_v'));
			chart.draw(data, options);
		}
	</script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);
		function drawStuff() {
			var data = google.visualization.arrayToDataTable([
				['Estado', 'Cantidad'],  <?php

				while($row = mysqli_fetch_array( $resultado_consulta_cursos_solicitados )) {	

					echo "['".$row['nombreCursoSolicitado']."', ".$row['NombreCurso']."],";
				}
				?>
				]);

			var options = {
				title: 'GRAFICO CURSOS SOLICITADOS',
				width: 500,
				legend: { position: 'none' },
				chart: { title: 'GRAFICO CURSOS SOLICITADOS'},
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
          	x: {
              0: { side: 'top', label: 'Cantidad'} // Top x-axis.
          }
      },
      bar: { groupWidth: "90%" }
  };

  var chart = new google.charts.Bar(document.getElementById('piechart_3d_cursos_solicitados'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Estado', 'Contador'],  <?php

			while($row = mysqli_fetch_array( $resultado_consulta_Poblacion )) {	

				echo "['".$row['Mun_Poblacion']." -> ".$row['tipoPoblacion']."', ".$row['ContarPoblacion']."],";
			}
			?>
			]);

		var options = {
			title: 'GRAFICO PORCENTUAL DEL TIPO DE POBLACIÓN ATENTIDA',
			is3D: true,
			pieHole: 0.4,
			width: 600,
			height: 400,
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_poblacionxmunicipio'));
		chart.draw(data, options);
	}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$('#estado').on('change',function(){                                      
			let valor = $('#estado').val();
			console.log(valor);
			$.ajax({                        
				type: 'get',                 
				url : 'dashboard.php',                   
				data: {value: valor},
				success: function(data)            
				{

				}
			});
		});
	});
</script>
</head>
<body>
	<?php include 'header_admin.php'; ?>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div id="piechart_3d_municipio" style="width: 500px;height: 340px;"></div>
			</div>
			<div class="col-md-6">
				<div id="piechart_3d_municipio_v" style="width: 500px;height: 340px;"></div>	
			</div>

			<div class="col-md-6 text-center">
				<div id="piechart_3d_poblacionxmunicipio" style="width: 500px;height: 340px; margin: 0px auto;"></div>
			</div>
			<div class="col-md-6 text-center">
				<div id="piechart_3d_cursos_solicitados" style="width: 500px;height: 340px; margin: 0px auto;"></div>
			</div>
		</div>
	</div>
	<br><br><br>

	 <footer class="footer_new">
    <div class="container">
      <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
    </div>
  </footer>
</body>
<script>
    var dummyContent = $('.dummy-content').children(),
    i;


    $('#add-content').click(function(e){
      e.preventDefault();

      if($(dummyContent[0]).is(":visible")){
        for(i=0;i<dummyContent.length;i++){
          $(dummyContent[i]).fadeOut(600);
        }
      }
      else{
        for(i=0;i<dummyContent.length;i++){
          $(dummyContent[i]).delay(600*i).fadeIn(600);
        }
      }

    });
  </script>
  <!-- Demo ads. Please ignore and remove. -->
  <script src="http://cdn.tutorialzine.com/misc/enhance/v2.js" async></script>

  <!-- ====== Pie de pagina ======-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="/assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
