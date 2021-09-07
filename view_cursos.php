<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, fechaRegistro,rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;


  //$Documento=$results['documento'];
  //$Correo_m=$results['email'];


  if (count($results) > 0) {
    $user = $results;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Cursos | Oferta Complementaria</title>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <meta name="csrf-param" content="authenticity_token" />
  <meta name="csrf-token" content="y89R2gmuDftYUad7o8YvKCfdNJjeBmbwBjnegFgJScQmpv0ZB7wfcoFcEB+4ntV3L2n4rt51kvgazL9alnHpxQ==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />

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
  <?php if(!empty($user) && ($user['rol']=='Aprendiz')):?>
  <?php 
  $Documento=$user['documento'];
  $Correo_m=$user['email'];
  $Nombres_m=$user['nombres'];
  $Apellidos_m=$user['apellidos'];

  ?>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-envelope-open" aria-hidden="true"></i> Enviar Sugerencia <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></h5>

        </div>
        <div class="modal-body">
          <form action="save_solicitar_curso.php" method="POST">
            <div class="form-group">
              <label for="txtNombres" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Nombres</label>
              <input type="text" class="form-control" id="txtNombres" name="txtNombres">
            </div>   
            <div class="form-group">
              <label for="txtApellidos" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Apellidos</label>
              <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
            </div>
            <div class="form-group">
              <label for="txtTelefono" class="col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Telefono:</label>
              <input type="number" class="form-control" id="txtTelefono" name="txtTelefono">
            </div> 
            <div class="form-group">
              <label for="txtCorreo" class="col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Correo electronico:</label>
              <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
            </div>
            <div class="form-group">
              <label for="txtNombreDelCurso" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i> Nombre del Curso Solicitado:</label>
              <input type="text" class="form-control" id="txtNombreDelCurso" name="txtNombreDelCurso">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" value="Enviar Sugerencia" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
          </div></form>
        </div>
      </div>
    </div>


    <?php  include 'header_aprendiz.php';?>


    <div class="mt-1 PopUpContainer">
      <div class="contentContainer">
       <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li><?php if ($name_curso=$_GET['name']=='Agricola') {
        echo "Agrícola";
      }else{
        echo $name_curso=$_GET['name'];
      };?></li><li class="active">Cursos</li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->
    <?php  include 'popupLogin_aprendiz.php';?>

  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container">
      <h2 class="text-center font-weight-bold">Cursos disponibles en el <br> área de <?php if ($name_curso=$_GET['name']=='Agricola') {
        echo strtolower("Agrícola");
      }else{
        echo strtolower($name_curso=$_GET['name']);
      };?> </h2>
      <hr>
      <form class="form" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
        <div class="row">
         <div class="col-md-4">
          <input type="text" name="q" class="form-control" placeholder="Busca aquí el curso que deseas..." value="">
        </div>
        <div class="col-md-2">
          <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>            
        </div>
        <div class="col-md-6 text-center">
          <a class="btn form-control" data-toggle="modal" data-target="#exampleModal" style="color: white; background-color: #FF6C00; border-color: #FF6C00;"><i class="fa fa-envelope" aria-hidden="true"></i> Si no está tu curso, solicitalo aquí.</a>
        </div>
      </div>
    </form>

    <div class="col-md-12 text-center">
      <div class=" table-responsive">
      <table class="table table-striped small">
        <thead>
          <tr>
            <th class="text-center">Curso</th>
            <th class="text-center">Jornada</th>
            <th class="text-center">Horario</th>
            <th class="text-center">Intensidad</th>
            <th class="text-center">Inicia</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Dirección</th>
            <th class="text-center">Descripción</th>
            <th class="text-center" colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         include ("conexion.php");
         $name_curso=$_GET['name'];
         $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='$name_curso' and estado='Activo'";
         $res=mysqli_query($cn,$sql);

         while ($data=mysqli_fetch_array($res))
         {
          ?>
          <tr>  
            <td><?php echo utf8_encode($data['curso']); $codigo_curso=$data['codigo_curso'];?></td>
            <td><?php echo $data['jornada'];?></td>
            <td><?php echo $data['horario'];?></td>
            <td><?php echo $data['intensidad'];?></td>
            <td><?php echo $data['fecha_inicio'];?></td>
            <td><?php echo $data['municipio'];?></td>
            <td><?php echo $data['direccion'];?></td>
            <td><?php echo $data['descripcion'];?></td>
            <td><?php 
            include ("conexion.php");
            $sql_c="SELECT Estado FROM `inscritos-cursos` where documento='$Documento' And codigo_curso=$codigo_curso";
            $res_c=mysqli_query($cn,$sql_c);

            $data_C=mysqli_fetch_array($res_c);

            ?>
            <?php if($data_C['Estado']=='Inscrito'): ?>
              Inscrito
              <?php else: ?>
                <form action="save_asignar.php" method="POST">
                  <input type="hidden" name="txt" value="<?php echo $data['id'];?>">
                  <input type="hidden" name="txtDocumento" value="<?php echo $Documento;?>">
                  <input type="hidden" name="txtCorreo_m" value="<?php echo $Correo_m;?>">
                  <input type="hidden" name="txtNombres_m" value="<?php echo $Nombres_m;?>">
                  <input type="hidden" name="txtApellidos_m" value="<?php echo $Apellidos_m; ?>">
                  <input type="hidden" name="txtCodigo" value="<?php echo $data['codigo_curso'];?>">
                  <input type="hidden" name="txtCurso" value="<?php echo $data['curso'];?>">
                  <input type="hidden" name="txtJornada" value="<?php echo $data['jornada'];?>">
                  <input type="hidden" name="txtCentro" value="<?php echo $data['centro'];?>">
                  <input type="hidden" name="txtHorario" value="<?php echo $data['horario'];?>">
                  <input type="hidden" name="txtIntensidad" value="<?php echo $data['intensidad'];?>">
                  <input type="hidden" name="txtFecha" value="<?php echo $data['fecha_inicio'];?>">
                  <input type="hidden" name="txtMunicipio" value="<?php echo $data['municipio'];?>">
                  <input type="hidden" name="txtDireccion" value="<?php echo $data['direccion'];?>">
                  <input type="hidden" name="txtTipoFormacion" value="<?php echo $data['formacion'];?>">
                  <input type="hidden" name="txtDescripcion" value="<?php echo $data['descripcion'];?>">
                  <input type="submit" value="Inscribir" class="btn" style="background-color: #FF6C00; color: white;">
                </form>
              <?php endif; ?>

            </td>

              <td>
                <a class="btn btn-success" href="view_curso.php?id=<?php echo $data['codigo_curso'];?>"><i class="fa fa-eye"></i></a>
              </td>
          </tr> 
          <?php
        }
        ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
<?php elseif(!empty($user) && ($user['rol']=='Administrador')): ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-envelope-open" aria-hidden="true"></i> Enviar Sugerencia <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>

      </div>
      <div class="modal-body">
        <form action="save_solicitar_curso.php" method="POST">
          <div class="form-group">
            <label for="txtNombres" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Nombres</label>
            <input type="text" class="form-control" id="txtNombres" name="txtNombres">
          </div>   
          <div class="form-group">
            <label for="txtApellidos" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Apellidos</label>
            <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
          </div>
          <div class="form-group">
            <label for="txtTelefono" class="col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Telefono:</label>
            <input type="number" class="form-control" id="txtTelefono" name="txtTelefono">
          </div> 
          <div class="form-group">
            <label for="txtCorreo" class="col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Correo electronico:</label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
          </div>
          <div class="form-group">
            <label for="txtNombreDelCurso" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i> Nombre del Curso Solicitado:</label>
            <input type="text" class="form-control" id="txtNombreDelCurso" name="txtNombreDelCurso">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <input type="submit" value="Enviar Sugerencia" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
        </div></form>
      </div>
    </div>
  </div>

  <!-- menu-->
  <?php include 'header_admin.php'; ?>

  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
     <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li><?php if ($name_curso=$_GET['name']=='Agricola') {
      echo "Agrícola";
    }else{
      echo $name_curso=$_GET['name'];
    };?></li><li class="active">Cursos</li></ol>
  </div>
  <!-- ====== PopUpLogin ======-->
  <?php include 'popupLogin.php'; ?>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container">
    <h2 class="text-center font-weight-bold">Cursos disponibles en el <br> área de <?php if ($name_curso=$_GET['name']=='Agricola') {
      echo utf8_decode(strtolower("Agrícola"));
    }else{
      echo strtolower($name_curso=$_GET['name']);
    };?> </h2>
    <form class="form" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
      <div class="row">
       <div class="col-md-4">
        <input type="text" name="q" class="form-control" placeholder="Busca aquí el curso que deseas..." value="">
      </div>
      <div class="col-md-2">
        <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>            
      </div>
      <div class="col-md-6 text-center">
        <a class="btn form-control" data-toggle="modal" data-target="#exampleModal" style="color: white; background-color: #FF6C00; border-color: #FF6C00;"><i class="fa fa-envelope" aria-hidden="true"></i> Si no está tu curso, solicitalo aquí.</a>
      </div>
    </div>
  </form>

  <div class="col-md-12 text-center">
    <div class="table-responsive">
      <table class="table table-striped table-hover small">
        <thead>
          <tr>
            <th class="text-center">Curso</th>
            <th class="text-center">Jornada</th>
            <th class="text-center">Horario</th>
            <th class="text-center">Intensidad</th>
            <th class="text-center">Inicia</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Dirección</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Estado</th>
            <th class="text-center" colspan="3">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include ("conexion.php");
          $name_curso=$_GET['name'];
          $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='$name_curso'";
          $res=mysqli_query($cn,$sql);

          while ($data=mysqli_fetch_array($res))
          {
            ?>
            <tr>  
              <td><?php echo $data['curso'];?></td>
              <td><?php echo $data['jornada'];?></td>
              <td><?php echo $data['horario'];?></td>
              <td><?php echo $data['intensidad'];?></td>
              <td><?php echo $data['fecha_inicio'];?></td>
              <td><?php echo $data['municipio'];?></td>
              <td><?php echo $data['direccion'];?></td>
              <td><?php echo $data['descripcion'];?></td>
              <td><?php echo $data['estado'];?></td>
              <td>
                <a class="btn btn-warning" href="edit_curso.php?id=<?php echo $data['codigo_curso'];?>"><i class="fa fa-edit"></i></a>
              </td> 
              <td>
                <a class="btn btn-success" href="view_curso.php?id=<?php echo $data['codigo_curso'];?>"><i class="fa fa-eye"></i></a>
              </td>
              <td>
                <a class="btn btn-danger" href="delete-cursos.php?id=<?php echo $data['codigo_curso'];?>"><i class="fa fa-trash"></i></a>
              </td>
            </tr> 
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
                <a class="btn btn-nar" href="new_curso.php?name=<?php echo $name_curso=$_GET['name'];?>"><i class="fa fa-plus"></i> Crear nuevo curso</a>

  </div>

</div>
<?php elseif(!empty($user) && ($user['rol']=='ORIENTADOR')): ?>
<!-- ====== Barra de navegacion ======-->
<?php  include 'header_orientador.php';?>


<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
  </div>
  <!-- ====== PopUpLogin ======-->
  <?php  include 'popupLogin_orientador.php';?>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-envelope-open" aria-hidden="true"></i> Enviar Sugerencia <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>

      </div>
      <div class="modal-body">
        <form action="save_solicitar_curso.php" method="POST">
          <div class="form-group">
            <label for="txtNombres" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Nombres</label>
            <input type="text" class="form-control" id="txtNombres" name="txtNombres">
          </div>   
          <div class="form-group">
            <label for="txtApellidos" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Apellidos</label>
            <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
          </div>
          <div class="form-group">
            <label for="txtTelefono" class="col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Telefono:</label>
            <input type="number" class="form-control" id="txtTelefono" name="txtTelefono">
          </div> 
          <div class="form-group">
            <label for="txtCorreo" class="col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Correo electronico:</label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
          </div>
          <div class="form-group">
            <label for="txtNombreDelCurso" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i> Nombre del Curso Solicitado:</label>
            <input type="text" class="form-control" id="txtNombreDelCurso" name="txtNombreDelCurso">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <input type="submit" value="Enviar Sugerencia" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
        </div></form>
      </div>
    </div>
  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container down">
      <h2 class="text-center font-weight-bold down">Cursos disponibles en el <br> área de <?php if ($name_curso=$_GET['name']=='Agricola') {
        echo strtolower("Agrícola");
      }else{
        echo strtolower($name_curso=$_GET['name']);
      };?> </h2>
      <form class="form" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
        <div class="row">
         <div class="col-md-4">
          <input type="text" name="q" class="form-control" placeholder="Busca aquí el curso que deseas..." value="">
        </div>
        <div class="col-md-2">
          <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>            
        </div>
        <div class="col-md-6 text-center">
          <a class="btn form-control" data-toggle="modal" data-target="#exampleModal" style="color: white; background-color: #FF6C00; border-color: #FF6C00;"><i class="fa fa-envelope" aria-hidden="true"></i> Si no está tu curso, solicitalo aquí.</a>
        </div>
      </div>
    </form>

    <div class="col-md-12 text-center">
<div class="table-responsive">
      <table class="table table-striped table-hover small">
                  <thead>
          <tr>
            <th class="text-center">Curso</th>
            <th class="text-center">Jornada</th>
            <th class="text-center">Horario</th>
            <th class="text-center">Intensidad</th>
            <th class="text-center">Inicia</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Dirección</th>
            <th class="text-center">Descripción</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         include ("conexion.php");
         $name_curso=$_GET['name'];
         $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='$name_curso'";
         $res=mysqli_query($cn,$sql);

         while ($data=mysqli_fetch_array($res))
         {
          ?>
          <tr>  
            <td><?php echo $data['curso'];?></td>
            <td><?php echo $data['jornada'];?></td>
            <td><?php echo $data['horario'];?></td>
            <td><?php echo $data['intensidad'];?></td>
            <td><?php echo $data['fecha_inicio'];?></td>
            <td><?php echo $data['municipio'];?></td>
            <td><?php echo $data['direccion'];?></td>
            <td><?php echo $data['descripcion'];?></td>
          </tr> 
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  </div>
  </div><?php else: ?>

  <?php include 'header.php'; ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-envelope-open" aria-hidden="true"></i> Enviar Sugerencia <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></h5>

        </div>
        <div class="modal-body">
          <form action="save_solicitar_curso.php" method="POST">
            <div class="form-group">
              <label for="txtNombres" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Nombres</label>
              <input type="text" class="form-control" id="txtNombres" name="txtNombres">
            </div>   
            <div class="form-group">
              <label for="txtApellidos" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Apellidos</label>
              <input type="text" class="form-control" id="txtApellidos" name="txtApellidos">
            </div>
            <div class="form-group">
              <label for="txtTelefono" class="col-form-label"><i class="fa fa-phone" aria-hidden="true"></i> Telefono:</label>
              <input type="number" class="form-control" id="txtTelefono" name="txtTelefono">
            </div> 
            <div class="form-group">
              <label for="txtCorreo" class="col-form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Correo electronico:</label>
              <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
            </div>
            <div class="form-group">
              <label for="txtNombreDelCurso" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i> Nombre del Curso Solicitado:</label>
              <input type="text" class="form-control" id="txtNombreDelCurso" name="txtNombreDelCurso">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" value="Enviar Sugerencia" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
          </div></form>
        </div>
      </div>
    </div>

    <!--<div class="contenedor-vistas">-->
      <div class="container down">
        <h2 class="text-center font-weight-bold down">Cursos disponibles en el <br> área de <?php if ($name_curso=$_GET['name']=='Agricola') {
          echo strtolower("Agrícola");
        }else{
          echo strtolower($name_curso=$_GET['name']);
        };?> </h2>
        <form class="form" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
          <div class="row">
           <div class="col-md-4">
            <input type="text" name="q" class="form-control" placeholder="Busca aquí el curso que deseas..." value="">
          </div>
          <div class="col-md-2">
            <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>            
          </div>
          <div class="col-md-6 text-center">
            <a class="btn form-control" data-toggle="modal" data-target="#exampleModal" style="color: white; background-color: #FF6C00; border-color: #FF6C00;"><i class="fa fa-envelope" aria-hidden="true"></i> Si no está tu curso, solicitalo aquí.</a>
          </div>
        </div>
      </form>

      <div class="col-md-12 text-center">
<div class="table-responsive">
      <table class="table table-striped table-hover small">
                    <thead>
            <tr>
              <th class="text-center">Curso</th>
              <th class="text-center">Jornada</th>
              <th class="text-center">Horario</th>
              <th class="text-center">Intensidad</th>
              <th class="text-center">Inicia</th>
              <th class="text-center">Municipio</th>
              <th class="text-center">Dirección</th>
              <th class="text-center">Descripción</th>
              <th colspan="2" class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           include ("conexion.php");
           $name_curso=$_GET['name'];
           $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where nombre_grupo='$name_curso'";
           $res=mysqli_query($cn,$sql);

           while ($data=mysqli_fetch_array($res))
           {
            ?>
            <tr>  
              <td><?php echo $data['curso'];?></td>
              <td><?php echo $data['jornada'];?></td>
              <td><?php echo $data['horario'];?></td>
              <td><?php echo $data['intensidad'];?></td>
              <td><?php echo $data['fecha_inicio'];?></td>
              <td><?php echo $data['municipio'];?></td>
              <td><?php echo $data['direccion'];?></td>
              <td><?php echo $data['descripcion'];?></td>
              <td><a href="sign_in.php" class="btn" style="background-color: #FF6C00;color: white;">Inscribir</a></td>
              <td>
                <a class="btn btn-success" href="view_curso.php?id=<?php echo $data['codigo_curso'];?>"><i class="fa fa-eye"></i></a>
              </td>
            </tr> 
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>
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
<script src="assets/grupos/cursos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
<!-- ====== Pie de pagina ======-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="assets/main.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
