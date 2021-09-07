<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, fechaRegistro,rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Inscritos | Oferta Complementaria</title>
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/home.css" />
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
</head>
<body> 
  <?php if(!empty($user) && ($user['rol']=='Administrador')): ?>
  <!-- menu-->
  <?php include 'header_admin.php'; ?>

  <?php 
  include ("conexion.php");
  $codigo_curso=$_GET['codigo'];

  $sql_c="SELECT curso,`nombre_grupo` FROM cursos where codigo_curso=$codigo_curso";
  $res_c=mysqli_query($cn,$sql_c);

  $data_C=mysqli_fetch_array($res_c);

  $ncurso=$data_C['curso'];
  $ngrupo=$data_C['nombre_grupo'];
  ?>
  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li class="active"><?php echo $ngrupo; ?></li></ol>
    </div>
    <?php include 'popupLogin_admin.php'; ?>
  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container ">
      <div class="container ">
        <section class="">
          <h3 class="text-center font-weight-bold">Inscritos en el grupo  de <?php echo strtolower($ngrupo); ?> <br>en el curso de <?php echo strtolower($ncurso); ?></h3>
          <div class="row">
            <div class="table-responsive">
              <form action="update_cursos.php" method="POST">
                <div class="col-lg-12">
                  <div class="col-md-6">
                  <a href="excel/report_inscritos.php?codigo=<?php echo $codigo_curso;?>&grupo=<?php echo $ngrupo; ?>&curso=<?php echo $ncurso; ?>" class="btn btn-nar w-100"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Generar Excel</a>
                  </div>
                  <div class="col-md-6">
                  <input type="submit" name="boton" value="Vaciar tabla" class="btn btn-nar w-100">
                  </div>
                  <table class="table table-striped table-hover small">
                    <thead>
                      <tr >
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
                    <tbody>
                     <?php 
                     include ("conexion.php");
                     $codigo_curso=$_GET['codigo'];
                     $sql="SELECT users.nombres, users.apellidos, users.tipodocumento, users.documento, users.tipoPoblacion, users.email, users.telefono, users.fechaRegistro, `inscritos-cursos`.`codigo_curso` As codigoCurso,`inscritos-cursos`.`id` As id_inscrito FROM users,`inscritos-cursos` WHERE users.documento=`inscritos-cursos`.`documento` and `inscritos-cursos`.codigo_curso=$codigo_curso and `inscritos-cursos`.estado='Inscrito'";
                     $res=mysqli_query($cn,$sql);

                     $contar=0;

                     while ($data=mysqli_fetch_array($res))
                     {
                      ?>
                      <tr class="text-center">
                        <td><?php $contar=$contar+1; echo $contar;?></td>
                        <td><?php $n=strtolower($data['nombres']); $a=strtolower($data['apellidos']); echo ucwords($n)." ".ucwords($a);?></td>                        
                        <td><?php echo $data['tipodocumento'];?></td>
                        <td><?php echo $data['documento'];?></td>
                        <td><?php echo $data['tipoPoblacion'];?></td>
                        <td><?php echo $data['telefono'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['fechaRegistro'];?></td>
                        <td><a href="delete-inscritos.php?id=<?php echo $data['id_inscrito'];?>">Eliminar</a></td>
                      </tr>
                      <input type="hidden" name="txtCodigoCurso" value="<?php echo $data['codigoCurso']; ?>">
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </section>

    </div>

  </div>
  <?php elseif(!empty($user) && ($user['rol']=='ORIENTADOR')): ?>
  <!-- ====== Barra de navegacion ======-->
  <?php  include 'header_orientador.php';?>


  <?php 
  include ("conexion.php");
  $codigo_curso=$_GET['codigo'];

  $sql_c="SELECT curso,`nombre_grupo` FROM cursos where codigo_curso=$codigo_curso";
  $res_c=mysqli_query($cn,$sql_c);

  $data_C=mysqli_fetch_array($res_c);

  $ncurso=$data_C['curso'];
  $ngrupo=$data_C['nombre_grupo'];
  ?>
  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li class="active"><?php echo $ngrupo; ?></li></ol>
    </div>
    <?php  include 'popupLogin_orientador.php';?>

  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container down">

      <div class="container down">
        <section class="down">
          <h1 class="text-center font-weight-bold down">Inscritos en el grupo  de <?php echo $ngrupo; ?> <br>En el curso de <?php echo $ncurso; ?></h1>
          <div class="row">
            <div class="col-lg-12">
              <a href="excel/report_inscritos.php?codigo=<?php echo $codigo_curso;?>&grupo=<?php echo $ngrupo; ?>&curso=<?php echo $ncurso; ?>" class="btn btn-nar"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Generar Excel</a>
<div class=" table-responsive">
      <table class="table table-striped small">
                          <thead>
                  <tr >
                    <th class="text-center">No.</th>
                    <th class="text-center">TIPO DOCUMENTO</th>
                    <th class="text-center">DOCUMENTO</th>
                    <th class="text-center">NOMBRES Y APELLIDOS</th>
                    <th class="text-center">TIPO DE POBLACIÓN</th>
                    <th class="text-center">TELEFONO</th>
                    <th class="text-center">FECHA DE NACIMIENTO</th>

                    <th class="text-center">EMAIL</th>
                    <th class="text-center">ACCIÓN</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 include ("conexion.php");
                 $codigo_curso=$_GET['codigo'];
                 $sql="SELECT users.nombres, users.apellidos, users.tipodocumento, users.documento, users.tipoPoblacion, users.email, users.telefono, users.fechaNacimiento, `inscritos-cursos`.`codigo_curso`,`inscritos-cursos`.`id` As id_inscrito FROM users,`inscritos-cursos` WHERE users.documento=`inscritos-cursos`.`documento` and `inscritos-cursos`.codigo_curso=$codigo_curso";
                 $res=mysqli_query($cn,$sql);

                 $contar=0;

                     while ($data=mysqli_fetch_array($res))
                     {
                      ?>
                      <tr class="text-center">
                        <td><?php $contar=$contar+1; echo $contar;?></td>
                    <td><?php echo $data['tipodocumento'];?></td>
                    <td><?php echo $data['documento'];?></td>
                    <td><?php echo $data['nombres']." ".$data['apellidos'];?></td>
                    <td><?php echo $data['tipoPoblacion'];?></td>
                    <td><?php echo $data['telefono'];?></td>
                    <td><?php echo $data['fechaNacimiento'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><a href="delete-inscritos.php?id=<?php echo $data['id_inscrito'];?>">Eliminar</a></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </section>

    </div>

  </div>

  <?php elseif(!empty($user) && ($user['rol']=='Gestor')): ?>
  <!-- ====== Barra de navegacion ======-->
  <?php  include 'header_gestor.php';?>


  <?php 
  include ("conexion.php");
  $codigo_curso=$_GET['codigo'];

  $sql_c="SELECT curso,`nombre_grupo` FROM cursos where codigo_curso=$codigo_curso";
  $res_c=mysqli_query($cn,$sql_c);

  $data_C=mysqli_fetch_array($res_c);

  $ncurso=$data_C['curso'];
  $ngrupo=$data_C['nombre_grupo'];
  ?>
  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li class="active"><?php echo $ngrupo; ?></li></ol>
    </div>
    <?php  include 'popupLogin_gestor.php';?>

  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container down">

      <div class="container down">
        <section class="down">
          <h1 class="text-center font-weight-bold down">Inscritos en el grupo  de <?php echo $ngrupo; ?> <br>En el curso de <?php echo $ncurso; ?></h1>
          <div class="row">
            <div class="col-lg-12">
              <a href="excel/report_inscritos.php?codigo=<?php echo $codigo_curso;?>&grupo=<?php echo $ngrupo; ?>&curso=<?php echo $ncurso; ?>" class="btn btn-nar"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Generar Excel</a>
              <table class="table table-striped">
                <thead>
                  <tr >
                    <th class="text-center">TIPO DOCUMENTO</th>
                    <th class="text-center">DOCUMENTO</th>
                    <th class="text-center">NOMBRES Y APELLIDOS</th>
                    <th class="text-center">TIPO DE POBLACIÓN</th>
                    <th class="text-center">TELEFONO</th>
                    <th class="text-center">FECHA DE NACIMIENTO</th>

                    <th class="text-center">EMAIL</th>
                    <th class="text-center">ACCIÓN</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 include ("conexion.php");
                 $codigo_curso=$_GET['codigo'];
                 $sql="SELECT users.nombres, users.apellidos, users.tipodocumento, users.documento, users.tipoPoblacion, users.email, users.telefono, users.fechaNacimiento, `inscritos-cursos`.`codigo_curso`,`inscritos-cursos`.`id` As id_inscrito FROM users,`inscritos-cursos` WHERE users.documento=`inscritos-cursos`.`documento` and `inscritos-cursos`.codigo_curso=$codigo_curso";
                 $res=mysqli_query($cn,$sql);

                 while ($data=mysqli_fetch_array($res))
                 {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $data['tipodocumento'];?></td>
                    <td><?php echo $data['documento'];?></td>
                    <td><?php echo $data['nombres']." ".$data['apellidos'];?></td>
                    <td><?php echo $data['tipoPoblacion'];?></td>
                    <td><?php echo $data['telefono'];?></td>
                    <td><?php echo $data['fechaNacimiento'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><a href="delete-inscritos.php?id=<?php echo $data['id_inscrito'];?>">Eliminar</a></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>

    </div>

  </div>

  <?php else: ?>
    <?php echo "<script>window.location='sign_in.php';</script>"; ?>

  <?php endif; ?>  
  <footer class="footer_new">
    <div class="container">
      <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
    </div>
  </footer>
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
  <script src="assets/nombre_grupos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
  <!-- ====== Pie de pagina ======-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="assets/main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>