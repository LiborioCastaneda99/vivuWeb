<?php
session_start();

require('config.php');
$result = $connexion->query('SELECT COUNT(*) as total_products FROM grupos');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];

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
<html lang="es">
<head>
  <meta charset="UFT-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Cursos | Oferta Complementaria</title>
  <link rel="icon" href="assets/logoSena.png">
  <meta property="og:title" content="Cursos | Oferta Complementaria">
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

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
  .col-xs-6{
    width: 50%;
    }.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
      }.efectoa img {
        border-radius: 20px 20px 0px 0px;
        -webkit-transition: .2s;
        -moz-transition: .2s;
        -o-transition: .2s;
        -ms-transition: .2s;
        transition: .2s;
      }
    </style>
  </head>
  <body>
    <?php if(!empty($user) && ($user['rol']=='ORIENTADOR')): ?>
    <!-- ====== Barra de navegacion ======-->
    <?php  include 'header_orientador.php';?>


    <div class="mt-1 PopUpContainer">
      <div class="contentContainer">
        <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
      </div>
      <!-- ====== PopUpLogin ======-->
      <?php  include 'popupLogin_orientador.php';?>

    </div>


  </div>
  <div class="container down">
    <section class="down">
      <h2 class="text-center"> Ofertas por área</h2>
      <form method="post" class="form" action="buscar.php">
        <div class="col-md-9">
          <label class="sr-only" for="inlineFormInput">Curso</label>
          <input  name="PalabraClave" type="text" class="form-control" id="inlineFormInput"  placeholder="Busca por palabra o el curso que deseas..." value="">  
        </div>

        <div class="col-md-3">
         <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>     
       </div>
     </form>
     
     <div class="container">
      <?php
      if ($num_total_rows > 0) {
        $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        }

        if (!$page) {
          $start = 0;
          $page = 1;
        } else {
          $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
        }
    //calculo el total de paginas
        $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
        
        $result = $connexion->query(
          'SELECT nombre_grupo, nombre_archivo FROM grupos LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
        );
        if ($result->num_rows > 0) {
          echo '<ul class="row items">';

          while ($row = $result->fetch_assoc()) {
            {
              ?>
              <div class="col-lg-2 col-md-4 col-sm-3 col-xs-6">
                <a href="view_cursos.php?name=<?php echo $row['nombre_grupo'];?>">
                  <div class="full-width post">
                   <figure class="full-width post-img">
                     <!-- Tamaño de la imagen 248x186 pixeles-->
                     <img src="assets/<?php echo $row['nombre_archivo'];?>" alt="Defaultimage" />
                     <div class="divider"></div>
                   </figure>
                   <div class="full-width post-info">
                    <p class="full-width post-info-price nom_gru" style="font-size: 13px;"><?php $nombre=$row['nombre_grupo']; echo $nombre;?></p>
                    <p class="full-width color_norm nom_gru" style="font-size: 13px;">Cursos Abiertos: <?php 
                    include ("conexion.php");
                    $sql_c="SELECT COUNT(curso) As contar_1 FROM cursos where nombre_grupo='$nombre' and estado='Activo'";
                    $res_c=mysqli_query($cn,$sql_c);

                    $data_C=mysqli_fetch_array($res_c);

                    echo $data_C['contar_1'];
                    ?></p>
                  </div>
                </div>
              </a>                 
            </div>
            <?php
          }
        }
        echo "</ul>";
      }

      echo '<nav>';
      echo '<ul class="pagination pagination-sm">';

      if ($total_pages > 1) {
        if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.$i.'">'.$i.'</a></li>';
          }
        }

        if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
      }
      echo '</ul>';
      echo '</nav>';
    }
    ?>
  </div>
</div>
</section>
</div>
</div>


<?php elseif(!empty($user) && ($user['rol']=='Administrador')): ?>
<!-- menu-->
<?php include 'header_admin.php'; ?>

<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
  </div>
  <?php include 'popupLogin_admin.php'; ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-book" aria-hidden="true"></i> CREAR NUEVO GRUPO<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>

      </div>
      <div class="modal-body">
        <form action="save_grupo.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="txtNombre" class="col-form-label"><i class="fa fa-vcard" aria-hidden="true"></i> Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombrerequired="">
          </div>   
          <div class="form-group">
            <label for="archivo" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i> Imagen de presentación:</label>
            <input type="file" class="form-control" name="archivo" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <input type="submit" value="Guardar grupo" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container down">
  <section class="down">
    <h2 class="text-center"> Ofertas por área</h2>
    <form method="post" class="form" action="buscar.php">

      <div class="col-md-6">
        <label class="sr-only" for="inlineFormInput">Curso</label>
        <input  name="PalabraClave" type="text" class="form-control" id="inlineFormInput"  placeholder="Busca por palabra o el curso que deseas..." value="">  
      </div>

      <div class="col-md-3">
       <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>     
     </div>

   </form>

   <div class="col-md-3">
    <a href="" class="btn"  data-toggle="modal" data-target="#exampleModal"  style="background-color: #FF6C00; color: white;"><i class="fa fa-plus"></i> Nuevo grupo</a>
  </div>
  <div class="container">
    <?php
    if ($num_total_rows > 0) {
      $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
      if (isset($_GET["page"])) {
        $page = $_GET["page"];
      }

      if (!$page) {
        $start = 0;
        $page = 1;
      } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
      }
    //calculo el total de paginas
      $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra

      $result = $connexion->query(
        'SELECT id,nombre_grupo,nombre_archivo FROM grupos LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE);
      if ($result->num_rows > 0) {
        echo '<ul class="row items">';

        while ($row = $result->fetch_assoc()) {
          {
            ?>
            <div class="col-lg-2 col-md-4 col-sm-3 col-xs-6">
              <a href="view_cursos.php?name=<?php echo $row['nombre_grupo'];?>">
                <div class="full-width post">
                 <figure class="full-width post-img">
                   <!-- Tamaño de la imagen 248x186 pixeles-->
                   <img src="assets/<?php echo $row['nombre_archivo'];?>" alt="Defaultimage" />
                   <div class="divider"></div>

                 </figure>

                 <div class="full-width post-info">
                  <p class="full-width post-info-price nom_gru" style="font-size: 13px;"><?php $id_grupo=$row['id']; $nombre=$row['nombre_grupo']; echo ($nombre);?></p>
                  <p class="full-width color_norm nom_gru" style="font-size: 13px;">Cursos Abiertos: <?php 
                  include ("conexion.php");
                  $sql_c="SELECT COUNT(curso) As contar_1 FROM cursos where nombre_grupo='$nombre' and estado='Activo'";
                  $res_c=mysqli_query($cn,$sql_c);

                  $data_C=mysqli_fetch_array($res_c);

                  echo $data_C['contar_1'];
                  ?></p>
                  <p class="full-width post-info-price nom_gru"><a href="edit_grupo.php?id=<?php echo $id_grupo; ?>" class="" style="color: #ff6c00;" style="font-size: 13px;"> Editar grupo</a> </p>
                </div>
              </div>
            </a>                 
          </div>
          <?php
        }
      }
      echo "</ul>";
    }


    echo '<nav>';
    echo '<ul class="pagination pagination-sm">';

    if ($total_pages > 1) {
      if ($page != 1) {
        echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
        if ($page == $i) {
          echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
        } else {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.$i.'">'.$i.'</a></li>';
        }
      }

      if ($page != $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
    }
    echo '</ul>';
    echo '</nav>';
  }
  ?>
</div>
</div>
</section>
</div>
</div>
<?php elseif(!empty($user) && ($user['rol']=='Aprendiz')): ?>
<!-- menu-->
<?php include 'header_aprendiz.php'; ?>


<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
  </div>
  <!-- ====== PopUpLogin ======-->
  <?php include 'popupLogin_aprendiz.php'; ?>
</div>
<div class="container down">
  <section class="down">
    <h2 class="text-center"> Ofertas por área</h2>
    <form method="post" class="form" action="buscar.php">
      <div class="col-md-9">
        <label class="sr-only" for="inlineFormInput">Curso</label>
        <input  name="PalabraClave" type="text" class="form-control" id="inlineFormInput"  placeholder="Busca por palabra o el curso que deseas..." value="">  
      </div>

      <div class="col-md-3">
       <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>     
     </div>
   </form>

   <div class="container">
    <?php
    if ($num_total_rows > 0) {
      $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
      if (isset($_GET["page"])) {
        $page = $_GET["page"];
      }

      if (!$page) {
        $start = 0;
        $page = 1;
      } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
      }
    //calculo el total de paginas
      $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra

      $result = $connexion->query(
        'SELECT nombre_grupo,nombre_archivo FROM grupos LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
      );
      if ($result->num_rows > 0) {
        echo '<ul class="row items">';

        while ($row = $result->fetch_assoc()) {
          {
            ?>
            <div class="col-lg-2 col-md-4 col-sm-3 col-xs-6">
              <a href="view_cursos.php?name=<?php echo $row['nombre_grupo'];?>">
                <div class="full-width post">
                 <figure class="full-width post-img">
                   <!-- Tamaño de la imagen 248x186 pixeles-->
                   <img src="assets/<?php echo $row['nombre_archivo'];?>" alt="Defaultimage" />
                   <div class="divider"></div>
                 </figure>
                 <div class="full-width post-info">
                  <p class="full-width post-info-price nom_gru" style="font-size: 13px;"><?php $nombre=$row['nombre_grupo']; echo $nombre;?></p>
                  <p class="full-width color_norm nom_gru" style="font-size: 13px;">Cursos Abiertos: <?php 
                  include ("conexion.php");
                  $sql_c="SELECT COUNT(curso) As contar_1 FROM cursos where nombre_grupo='$nombre' and estado='Activo'";
                  $res_c=mysqli_query($cn,$sql_c);

                  $data_C=mysqli_fetch_array($res_c);

                  echo $data_C['contar_1'];
                  ?></p>
                </div>
              </div>
            </a>                 
          </div>
          <?php
        }
      }
      echo "</ul>";
    }

    echo '<nav>';
    echo '<ul class="pagination pagination-sm">';

    if ($total_pages > 1) {
      if ($page != 1) {
        echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
        if ($page == $i) {
          echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
        } else {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.$i.'">'.$i.'</a></li>';
        }
      }

      if ($page != $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
    }
    echo '</ul>';
    echo '</nav>';
  }
  ?>
</div>
</div>
</section>
</div>
</div>
<?php else: ?>
  <!-- menu-->
  <?php include 'header.php'; ?>


  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
    </div>
  </div>
  <div class="container down">
    <section class="down">
      <h2 class="text-center"> Ofertas por área</h2>
      <form method="post" class="form" action="buscar.php">
        <div class="col-md-9">
          <label class="sr-only" for="inlineFormInput">Curso</label>
          <input  name="PalabraClave" type="text" class="form-control" id="inlineFormInput"  placeholder="Busca por palabra o el curso que deseas..." value="">  
        </div>

        <div class="col-md-3">
         <button type="submit" name="search" id="search-btn" class="btn form-control" style="background-color: #FF6C00; color: white; font-size: 13px;"><i class="fa fa-search"></i></button>     
       </div>
     </form>
     
     <div class="container">
      <?php
      if ($num_total_rows > 0) {
        $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        }

        if (!$page) {
          $start = 0;
          $page = 1;
        } else {
          $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
        }
    //calculo el total de paginas
        $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
        
        $result = $connexion->query(
          'SELECT nombre_grupo, nombre_archivo FROM grupos LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
        );
        if ($result->num_rows > 0) {
          echo '<ul class="row items">';

          while ($row = $result->fetch_assoc()) {
            {
              ?>
              <div class="col-lg-2 col-md-4 col-sm-3 col-xs-6">
                <a href="view_cursos.php?name=<?php echo $row['nombre_grupo'];?>">
                  <div class="full-width post">
                   <figure class="full-width post-img">
                     <!-- Tamaño de la imagen 248x186 pixeles-->
                     <img src="assets/<?php echo $row['nombre_archivo'];?>" alt="Defaultimage" />
                     <div class="divider"></div>
                   </figure>
                   <div class="full-width post-info">
                    <p class="full-width post-info-price nom_gru" style="font-size: 13px;"><?php $nombre=$row['nombre_grupo']; echo $nombre;?></p>
                    <p class="full-width color_norm nom_gru" style="font-size: 13px;">Cursos Abiertos: <?php 
                    include ("conexion.php");
                    $sql_c="SELECT COUNT(curso) As contar_1 FROM cursos where nombre_grupo='$nombre' and estado='Activo'";
                    $res_c=mysqli_query($cn,$sql_c);

                    $data_C=mysqli_fetch_array($res_c);

                    echo $data_C['contar_1'];
                    ?></p>
                  </div>
                </div>
              </a>                 
            </div>
            <?php
          }
        }
        echo "</ul>";
      }

      echo '<nav>';
      echo '<ul class="pagination pagination-sm">';

      if ($total_pages > 1) {
        if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.$i.'">'.$i.'</a></li>';
          }
        }

        if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="cursos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
      }
      echo '</ul>';
      echo '</nav>';
    }
    ?>
  </div>
</div>
</section>
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
