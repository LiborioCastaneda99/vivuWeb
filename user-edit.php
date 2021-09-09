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
  <title>Mi perfil | Oferta Complementaria</title>
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

  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Editar Perfil: <?php echo $user['nombres']." ".$user['apellidos']; ?></li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->
    <?php include 'popupLogin_admin.php'; ?>
  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container down">

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="container post-user-info text-center rounded ">
              <div class="d-flex justify-content-center">
                <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px" src="assets/<?php echo $user['img'];?>" />
              </div>
              <div class="pt-1 text-center">
                <?php echo $user['nombres']." ".$user['apellidos']; ?>
              </div>

              <!-- BOTONES LATERALES -->
            </div>
            <div class="full-width list-group" style="border-radius: 0;">
              <div class="list-group-item text-center">
                <?php echo $user['fecha_sesion']; ?>
              </div>
              <a href="user-edit.php" class="list-group-item active">
                <i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
              </a>
              <a href="mis-cursos.php" class="list-group-item">
                <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> MIS CURSOS
              </a>
            </div><br>
          </div>
          <!-- FORMULARIO -->
          <div class="col-md-6">
            <h2 class="text-center">Editar datos de usuario</h2>
            <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data" action="save-user-edit.php" accept-charset="UTF-8" method="post">
              <div class="form-inputs">
                <div class="form-group string required user_nombre">
                 <label class="control-label" for="user_nombre">Nombres</label>
                 <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtNombres" id="user_nombre" value="<?php echo $user['nombres']; ?>"/>
               </div>
               <div class="form-group user_apellidos">
                <label class="control-label" for="user_apellidos">Apellidos</label>
                <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtApellidos" id="user_apellidos" value="<?php echo $user['apellidos']; ?>" />
              </div>
            </div>
            <div class="form-group user_apellidos">
              <label class="control-label" for="user_apellidos">Sexo</label>
              <select class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtSexo" id="user_Sexo" >
                <option selected="true" value="<?php echo $user['sexo']; ?>"><?php echo $user['sexo']; ?></option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                <option value="Prefiero no decirlo">Prefiero no decirlo</option>
              </select>
            </div>
            <div class="form-group email required user_email">
              <label class="control-label email required" for="user_email"><abbr title="necesario">*</abbr> Dirección de correo electrónico</label>
              <input class="form-control string email required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="email" value="<?php echo $user['email'];?>" name="txtCorreo" id="user_email" /><p class="help-block">Se le enviará un correo de confirmación</p>
            </div>
            <div class="form-group">
              <label class="control-label" for="user_documento">Fecha de nacimiento</label>
              <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="" value="<?php echo $user['fechaNacimiento']; ?>" />
            </div>
            <div class="form-group string required user_telefono">
              <label class="control-label string required" for="user_telefono"><abbr title="necesario">*</abbr> Telefono</label>
              <input class="form-control string required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="text" value="<?php echo $user['telefono'];?>" name="txtTelefono" id="user_telefono" />
            </div>
            <div class="form-group">
              <div class="form-group select required user_tipo_documento">
                <label class="control-label select required" for="user_tipo_documento_id"><abbr title="necesario">*</abbr> Tipo documento</label>
                <select class="form-control select required form-control input-lg" name="txtTipoDocumento" id="user_tipo_documento_id">
                  <option value="<?php echo $user['tipodocumento'];?>" selected="selected" ><?php echo $user['tipodocumento'];?></option>
                  <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                  <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                  <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-group integer required user_documento">
                <label class="control-label integer required" for="user_documento"><abbr title="necesario">*</abbr> Documento</label>
                <input class="form-control numeric integer required form-control input-lg" min="1" autofocus="autofocus" required="required" aria-required="true" type="number" step="1" value="<?php echo $user['documento'];?>" name="txtDocumento" id="user_documento" />
              </div>
              <div class="form-group">
                <label class="control-label" for="user_email">Municipio</label>
                <input class="form-control" autocomplete="Municipio" autofocus="autofocus" required="" aria-required="true" type="text" value="<?php echo $user['municipio'] ?>" name="txtMunicipio" id="user_Municipio" />
              </div>
              <div class="form-group">
                <div class="form-group select required user_tipo_de_poblacion">
                  <label class="control-label select required" for="user_tipo_de_poblacion_id"><abbr title="necesario">*</abbr> Tipo de poblacion</label>
                  <select class="form-control select required form-control input-lg" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
                    <option value="<?php echo $user['tipoPoblacion']; ?>" selected="true" ><?php echo $user['tipoPoblacion']; ?></option>
                    <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                    <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                    <option value="Discapacitados">Discapacitados</option>
                    <option value="Indígenas">Indígenas</option>
                    <option value="Convenio INPEC">Convenio INPEC</option>
                    <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                    <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                    <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                    <option value="Negritudes">Negritudes</option>
                    <option value="Afrocolombianos">Afrocolombianos </option>
                    <option value="Palenques">Palenques</option>
                    <option value="Raizales">Raizales</option>
                    <option value="ROM">ROM</option>
                    <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                    <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                    <option value="Tercera edad">Tercera edad</option>
                    <option value="Adolescente trabajador">Adolescente trabajador</option>
                    <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                    <option value="Soldados campesinos">Soldados campesinos</option>
                    <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                    <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                  </select>
                </div>
              </div>
              <div class="form-group password optional user_password">
                <label class="control-label password optional" for="user_password">Contraseña</label>
                <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password]" id="user_password" /><p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla</p>
              </div>
              <div class="form-group password optional user_password_confirmation">
                <label class="control-label password optional" for="user_password_confirmation">Confirmación de la contraseña</label>
                <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password_confirmation]" id="user_password_confirmation" />
              </div>
              <div class="form-group password required user_current_password">
                <label class="control-label password required" for="user_current_password"><abbr title="necesario">*</abbr> Contraseña actual</label>
                <input class="form-control password required form-control input-lg" autocomplete="current-password"  aria-required="true" type="password" name="user[current_password]" id="user_current_password" /><p class="help-block">Se necesita su contraseña actual para confirmar</p>
              </div>
              <div class="form-group file optional user_perfil">
                <label class="control-label file optional" for="user_perfil">Foto de Perfil</label>
                <input class="file optional" type="file" name="archivo" id="user_perfil" />
              </div>
            </div>
            <input type="hidden" value="<?php echo $user['id'];?>" name="txtCodigo">
            <div class="form-actions">
              <input type="submit" name="commit" value="Actualizar datos" class="btn btn-default btn btn-nar btn-lg " data-disable-with="Actualizar datos" />
            </div>
          </div>
        </form>            
      </div>

    </div>
  </div>
</div>  
<?php elseif(!empty($user) && ($user['rol']=='ORIENTADOR')): ?>
<!-- ====== Barra de navegacion ======-->
<?php  include 'header_orientador.php';?>

<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Cursos</a></li><li class="active"><?php echo $ngrupo; ?></li></ol>
  </div>
  <?php  include 'popupLogin_orientador.php';?>

</div>
<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="container post-user-info text-center rounded ">
            <div class="d-flex justify-content-center">
              <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px" src="assets/<?php echo $user['img'];?>" />
            </div>
            <div class="pt-1 text-center">
              <?php echo $user['nombres']." ".$user['apellidos']; ?>
            </div>

            <!-- BOTONES LATERALES -->
          </div>
          <div class="full-width list-group" style="border-radius: 0;">
            <div class="list-group-item text-center">
              <?php echo $user['fecha_sesion']; ?>
            </div>
            <a href="user-edit.php" class="list-group-item active">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
            </a>
            <a href="mis-cursos.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> MIS CURSOS
            </a>
          </div><br>
        </div>
        <!-- FORMULARIO -->
        <div class="col-md-6">
          <h2 class="text-center">Editar datos de usuario</h2>
          <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data" action="save-user-edit.php" accept-charset="UTF-8" method="post">
            <div class="form-inputs">
              <div class="form-group string required user_nombre">
               <label class="control-label" for="user_nombre">Nombres</label>
               <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtNombres" id="user_nombre" value="<?php echo $user['nombres']; ?>"/>
             </div>
             <div class="form-group user_apellidos">
              <label class="control-label" for="user_apellidos">Apellidos</label>
              <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtApellidos" id="user_apellidos" value="<?php echo $user['apellidos']; ?>" />
            </div>
          </div>
          <div class="form-group user_apellidos">
            <label class="control-label" for="user_apellidos">Sexo</label>
            <select class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtSexo" id="user_Sexo" >
              <option selected="true" value="<?php echo $user['sexo']; ?>"><?php echo $user['sexo']; ?></option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Prefiero no decirlo">Prefiero no decirlo</option>
            </select>
          </div>
          <div class="form-group email required user_email">
            <label class="control-label email required" for="user_email"><abbr title="necesario">*</abbr> Dirección de correo electrónico</label>
            <input class="form-control string email required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="email" value="<?php echo $user['email'];?>" name="txtCorreo" id="user_email" /><p class="help-block">Se le enviará un correo de confirmación</p>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_documento">Fecha de nacimiento</label>
            <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="" value="<?php echo $user['fechaNacimiento']; ?>" />
          </div>
          <div class="form-group string required user_telefono">
            <label class="control-label string required" for="user_telefono"><abbr title="necesario">*</abbr> Telefono</label>
            <input class="form-control string required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="text" value="<?php echo $user['telefono'];?>" name="txtTelefono" id="user_telefono" />
          </div>
          <div class="form-group">
            <div class="form-group select required user_tipo_documento">
              <label class="control-label select required" for="user_tipo_documento_id"><abbr title="necesario">*</abbr> Tipo documento</label>
              <select class="form-control select required form-control input-lg" name="txtTipoDocumento" id="user_tipo_documento_id">
                <option value="<?php echo $user['tipodocumento'];?>" selected="selected" ><?php echo $user['tipodocumento'];?></option>
                <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group integer required user_documento">
              <label class="control-label integer required" for="user_documento"><abbr title="necesario">*</abbr> Documento</label>
              <input class="form-control numeric integer required form-control input-lg" min="1" autofocus="autofocus" required="required" aria-required="true" type="number" step="1" value="<?php echo $user['documento'];?>" name="txtDocumento" id="user_documento" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_email">Municipio</label>
              <input class="form-control" autocomplete="Municipio" autofocus="autofocus" required="" aria-required="true" type="text" value="<?php echo $user['municipio'] ?>" name="txtMunicipio" id="user_Municipio" />
            </div>
            <div class="form-group">
              <div class="form-group select required user_tipo_de_poblacion">
                <label class="control-label select required" for="user_tipo_de_poblacion_id"><abbr title="necesario">*</abbr> Tipo de poblacion</label>
                <select class="form-control select required form-control input-lg" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
                  <option value="<?php echo $user['tipoPoblacion']; ?>" selected="true" ><?php echo $user['tipoPoblacion']; ?></option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                  <option value="Discapacitados">Discapacitados</option>
                  <option value="Indígenas">Indígenas</option>
                  <option value="Convenio INPEC">Convenio INPEC</option>
                  <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                  <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                  <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                  <option value="Negritudes">Negritudes</option>
                  <option value="Afrocolombianos">Afrocolombianos </option>
                  <option value="Palenques">Palenques</option>
                  <option value="Raizales">Raizales</option>
                  <option value="ROM">ROM</option>
                  <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                  <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                  <option value="Tercera edad">Tercera edad</option>
                  <option value="Adolescente trabajador">Adolescente trabajador</option>
                  <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                  <option value="Soldados campesinos">Soldados campesinos</option>
                  <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                  <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                </select>
              </div>
            </div>
            <div class="form-group password optional user_password">
              <label class="control-label password optional" for="user_password">Contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password]" id="user_password" /><p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla</p>
            </div>
            <div class="form-group password optional user_password_confirmation">
              <label class="control-label password optional" for="user_password_confirmation">Confirmación de la contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password_confirmation]" id="user_password_confirmation" />
            </div>
            <div class="form-group password required user_current_password">
              <label class="control-label password required" for="user_current_password"><abbr title="necesario">*</abbr> Contraseña actual</label>
              <input class="form-control password required form-control input-lg" autocomplete="current-password"  aria-required="true" type="password" name="user[current_password]" id="user_current_password" /><p class="help-block">Se necesita su contraseña actual para confirmar</p>
            </div>
            <div class="form-group file optional user_perfil">
              <label class="control-label file optional" for="user_perfil">Foto de Perfil</label>
              <input class="file optional" type="file" name="archivo" id="user_perfil" />
            </div>
          </div>
          <input type="hidden" value="<?php echo $user['id'];?>" name="txtCodigo">
          <div class="form-actions">
            <input type="submit" name="commit" value="Actualizar datos" class="btn btn-default btn btn-nar btn-lg " data-disable-with="Actualizar datos" />
          </div>
        </div>
      </form>            
    </div>

  </div>
</div>
</div>  
<?php elseif(!empty($user) && ($user['rol']=='Gestor')): ?>
<!-- ====== Barra de navegacion ======-->
<?php  include 'header_gestor.php';?>

<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="micuenta.php">Inicio</a></li><li><a>Editar usuario</a></li></ol>
  </div>
  <?php  include 'popupLogin_gestor.php';?>

</div>
<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="container post-user-info text-center rounded ">
            <div class="d-flex justify-content-center">
              <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px" src="assets/<?php echo $user['img'];?>" />
            </div>
            <div class="pt-1 text-center">
              <?php echo $user['nombres']." ".$user['apellidos']; ?>
            </div>

            <!-- BOTONES LATERALES -->
          </div>
          <div class="full-width list-group" style="border-radius: 0;">
            <div class="list-group-item text-center">
              <?php echo $user['fecha_sesion']; ?>
            </div>
            <a href="user-edit.php" class="list-group-item active">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
            </a>
            <a href="consultar_emprendimiento.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> EMPRENDIMIENTO
            </a>
            <a href="mis-cursos.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> MIS CURSOS
            </a>
          </div><br>
        </div>
        <!-- FORMULARIO -->
        <div class="col-md-6">
          <h2 class="text-center">Editar datos de usuario</h2>
          <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data" action="save-user-edit.php" accept-charset="UTF-8" method="post">
            <div class="form-inputs">
              <div class="form-group string required user_nombre">
               <label class="control-label" for="user_nombre">Nombres</label>
               <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtNombres" id="user_nombre" value="<?php echo $user['nombres']; ?>"/>
             </div>
             <div class="form-group user_apellidos">
              <label class="control-label" for="user_apellidos">Apellidos</label>
              <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtApellidos" id="user_apellidos" value="<?php echo $user['apellidos']; ?>" />
            </div>
          </div>
          <div class="form-group user_apellidos">
            <label class="control-label" for="user_apellidos">Sexo</label>
            <select class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtSexo" id="user_Sexo" >
              <option selected="true" value="<?php echo $user['sexo']; ?>"><?php echo $user['sexo']; ?></option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Prefiero no decirlo">Prefiero no decirlo</option>
            </select>
          </div>
          <div class="form-group email required user_email">
            <label class="control-label email required" for="user_email"><abbr title="necesario">*</abbr> Dirección de correo electrónico</label>
            <input class="form-control string email required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="email" value="<?php echo $user['email'];?>" name="txtCorreo" id="user_email" /><p class="help-block">Se le enviará un correo de confirmación</p>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_documento">Fecha de nacimiento</label>
            <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="" value="<?php echo $user['fechaNacimiento']; ?>" />
          </div>
          <div class="form-group string required user_telefono">
            <label class="control-label string required" for="user_telefono"><abbr title="necesario">*</abbr> Telefono</label>
            <input class="form-control string required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="text" value="<?php echo $user['telefono'];?>" name="txtTelefono" id="user_telefono" />
          </div>
          <div class="form-group">
            <div class="form-group select required user_tipo_documento">
              <label class="control-label select required" for="user_tipo_documento_id"><abbr title="necesario">*</abbr> Tipo documento</label>
              <select class="form-control select required form-control input-lg" name="txtTipoDocumento" id="user_tipo_documento_id">
                <option value="<?php echo $user['tipodocumento'];?>" selected="selected" ><?php echo $user['tipodocumento'];?></option>
                <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group integer required user_documento">
              <label class="control-label integer required" for="user_documento"><abbr title="necesario">*</abbr> Documento</label>
              <input class="form-control numeric integer required form-control input-lg" min="1" autofocus="autofocus" required="required" aria-required="true" type="number" step="1" value="<?php echo $user['documento'];?>" name="txtDocumento" id="user_documento" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_email">Municipio</label>
              <input class="form-control" autocomplete="Municipio" autofocus="autofocus" required="" aria-required="true" type="text" value="<?php echo $user['municipio'] ?>" name="txtMunicipio" id="user_Municipio" />
            </div>
            <div class="form-group">
              <div class="form-group select required user_tipo_de_poblacion">
                <label class="control-label select required" for="user_tipo_de_poblacion_id"><abbr title="necesario">*</abbr> Tipo de poblacion</label>
                <select class="form-control select required form-control input-lg" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
                  <option value="<?php echo $user['tipoPoblacion']; ?>" selected="true" ><?php echo $user['tipoPoblacion']; ?></option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                  <option value="Discapacitados">Discapacitados</option>
                  <option value="Indígenas">Indígenas</option>
                  <option value="Convenio INPEC">Convenio INPEC</option>
                  <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                  <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                  <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                  <option value="Negritudes">Negritudes</option>
                  <option value="Afrocolombianos">Afrocolombianos </option>
                  <option value="Palenques">Palenques</option>
                  <option value="Raizales">Raizales</option>
                  <option value="ROM">ROM</option>
                  <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                  <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                  <option value="Tercera edad">Tercera edad</option>
                  <option value="Adolescente trabajador">Adolescente trabajador</option>
                  <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                  <option value="Soldados campesinos">Soldados campesinos</option>
                  <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                  <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                </select>
              </div>
            </div>
            <div class="form-group password optional user_password">
              <label class="control-label password optional" for="user_password">Contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password]" id="user_password" /><p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla</p>
            </div>
            <div class="form-group password optional user_password_confirmation">
              <label class="control-label password optional" for="user_password_confirmation">Confirmación de la contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password_confirmation]" id="user_password_confirmation" />
            </div>
            <div class="form-group password required user_current_password">
              <label class="control-label password required" for="user_current_password"><abbr title="necesario">*</abbr> Contraseña actual</label>
              <input class="form-control password required form-control input-lg" autocomplete="current-password"  aria-required="true" type="password" name="user[current_password]" id="user_current_password" /><p class="help-block">Se necesita su contraseña actual para confirmar</p>
            </div>
            <div class="form-group file optional user_perfil">
              <label class="control-label file optional" for="user_perfil">Foto de Perfil</label>
              <input class="file optional" type="file" name="archivo" id="user_perfil" />
            </div>
          </div>
          <input type="hidden" value="<?php echo $user['id'];?>" name="txtCodigo">
          <div class="form-actions">
            <input type="submit" name="commit" value="Actualizar datos" class="btn btn-default btn btn-nar btn-lg " data-disable-with="Actualizar datos" />
          </div>
        </div>
      </form>            
    </div>

  </div>
</div>
</div>  
<?php elseif(!empty($user) && ($user['rol']=='Certificacion')): ?>
<!-- ====== Barra de navegacion ======-->
<?php  include 'header_certificacion.php';?>

<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="micuenta.php">Inicio</a></li><li><a>Editar usuario</a></li></ol>
  </div>
  <?php  include 'popupLogin_certificacion.php';?>

</div>
<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="container post-user-info text-center rounded ">
            <div class="d-flex justify-content-center">
              <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px" src="assets/<?php echo $user['img'];?>" />
            </div>
            <div class="pt-1 text-center">
              <?php echo $user['nombres']." ".$user['apellidos']; ?>
            </div>

            <!-- BOTONES LATERALES -->
          </div>
          <div class="full-width list-group" style="border-radius: 0;">
            <div class="list-group-item text-center">
              <?php echo $user['fecha_sesion']; ?>
            </div>
            <a href="user-edit.php" class="list-group-item active">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
            </a>
            <a href="consultar_certificaciones.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> CERTIFICACION
            </a>
            <a href="mis-cursos.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> MIS CURSOS
            </a>
          </div><br>
        </div>
        <!-- FORMULARIO -->
        <div class="col-md-6">
          <h2 class="text-center">Editar datos de usuario</h2>
          <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data" action="save-user-edit.php" accept-charset="UTF-8" method="post">
            <div class="form-inputs">
              <div class="form-group string required user_nombre">
               <label class="control-label" for="user_nombre">Nombres</label>
               <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtNombres" id="user_nombre" value="<?php echo $user['nombres']; ?>"/>
             </div>
             <div class="form-group user_apellidos">
              <label class="control-label" for="user_apellidos">Apellidos</label>
              <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtApellidos" id="user_apellidos" value="<?php echo $user['apellidos']; ?>" />
            </div>
          </div>
          <div class="form-group user_apellidos">
            <label class="control-label" for="user_apellidos">Sexo</label>
            <select class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtSexo" id="user_Sexo" >
              <option selected="true" value="<?php echo $user['sexo']; ?>"><?php echo $user['sexo']; ?></option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Prefiero no decirlo">Prefiero no decirlo</option>
            </select>
          </div>
          <div class="form-group email required user_email">
            <label class="control-label email required" for="user_email"><abbr title="necesario">*</abbr> Dirección de correo electrónico</label>
            <input class="form-control string email required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="email" value="<?php echo $user['email'];?>" name="txtCorreo" id="user_email" /><p class="help-block">Se le enviará un correo de confirmación</p>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_documento">Fecha de nacimiento</label>
            <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="" value="<?php echo $user['fechaNacimiento']; ?>" />
          </div>
          <div class="form-group string required user_telefono">
            <label class="control-label string required" for="user_telefono"><abbr title="necesario">*</abbr> Telefono</label>
            <input class="form-control string required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="text" value="<?php echo $user['telefono'];?>" name="txtTelefono" id="user_telefono" />
          </div>
          <div class="form-group">
            <div class="form-group select required user_tipo_documento">
              <label class="control-label select required" for="user_tipo_documento_id"><abbr title="necesario">*</abbr> Tipo documento</label>
              <select class="form-control select required form-control input-lg" name="txtTipoDocumento" id="user_tipo_documento_id">
                <option value="<?php echo $user['tipodocumento'];?>" selected="selected" ><?php echo $user['tipodocumento'];?></option>
                <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group integer required user_documento">
              <label class="control-label integer required" for="user_documento"><abbr title="necesario">*</abbr> Documento</label>
              <input class="form-control numeric integer required form-control input-lg" min="1" autofocus="autofocus" required="required" aria-required="true" type="number" step="1" value="<?php echo $user['documento'];?>" name="txtDocumento" id="user_documento" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_email">Municipio</label>
              <input class="form-control" autocomplete="Municipio" autofocus="autofocus" required="" aria-required="true" type="text" value="<?php echo $user['municipio'] ?>" name="txtMunicipio" id="user_Municipio" />
            </div>
            <div class="form-group">
              <div class="form-group select required user_tipo_de_poblacion">
                <label class="control-label select required" for="user_tipo_de_poblacion_id"><abbr title="necesario">*</abbr> Tipo de poblacion</label>
                <select class="form-control select required form-control input-lg" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
                  <option value="<?php echo $user['tipoPoblacion']; ?>" selected="true" ><?php echo $user['tipoPoblacion']; ?></option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                  <option value="Discapacitados">Discapacitados</option>
                  <option value="Indígenas">Indígenas</option>
                  <option value="Convenio INPEC">Convenio INPEC</option>
                  <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                  <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                  <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                  <option value="Negritudes">Negritudes</option>
                  <option value="Afrocolombianos">Afrocolombianos </option>
                  <option value="Palenques">Palenques</option>
                  <option value="Raizales">Raizales</option>
                  <option value="ROM">ROM</option>
                  <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                  <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                  <option value="Tercera edad">Tercera edad</option>
                  <option value="Adolescente trabajador">Adolescente trabajador</option>
                  <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                  <option value="Soldados campesinos">Soldados campesinos</option>
                  <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                  <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                </select>
              </div>
            </div>
            <div class="form-group password optional user_password">
              <label class="control-label password optional" for="user_password">Contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password]" id="user_password" /><p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla</p>
            </div>
            <div class="form-group password optional user_password_confirmation">
              <label class="control-label password optional" for="user_password_confirmation">Confirmación de la contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password_confirmation]" id="user_password_confirmation" />
            </div>
            <div class="form-group password required user_current_password">
              <label class="control-label password required" for="user_current_password"><abbr title="necesario">*</abbr> Contraseña actual</label>
              <input class="form-control password required form-control input-lg" autocomplete="current-password"  aria-required="true" type="password" name="user[current_password]" id="user_current_password" /><p class="help-block">Se necesita su contraseña actual para confirmar</p>
            </div>
            <div class="form-group file optional user_perfil">
              <label class="control-label file optional" for="user_perfil">Foto de Perfil</label>
              <input class="file optional" type="file" name="archivo" id="user_perfil" />
            </div>
          </div>
          <input type="hidden" value="<?php echo $user['id'];?>" name="txtCodigo">
          <div class="form-actions">
            <input type="submit" name="commit" value="Actualizar datos" class="btn btn-default btn btn-nar btn-lg " data-disable-with="Actualizar datos" />
          </div>
        </div>
      </form>            
    </div>

  </div>
</div>
</div>  
<?php elseif(!empty($user) && ($user['rol']=='Aprendiz')): ?>
<!-- menu-->
<?php include 'header_aprendiz.php'; ?>

<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Editar Perfil: <?php echo $user['nombres']." ".$user['apellidos']; ?></li></ol>
  </div>
  <!-- ====== PopUpLogin ======-->
  <?php include 'popupLogin_aprendiz.php'; ?>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="container post-user-info text-center rounded ">
            <div class="d-flex justify-content-center">
              <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px" src="assets/<?php echo $user['img'];?>" />
            </div>
            <div class="pt-1 text-center">
              <?php echo $user['nombres']." ".$user['apellidos']; ?>
            </div>

            <!-- BOTONES LATERALES -->
          </div>
          <div class="full-width list-group" style="border-radius: 0;">
            <div class="list-group-item text-center">
              <?php echo $user['fecha_sesion']; ?>
            </div>
            <a href="user-edit.php" class="list-group-item active">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
            </a>
            <a href="my-cursos.php" class="list-group-item">
              <i class="fa fa-object-group fa-fw" aria-hidden="true"></i> MIS CURSOS
            </a>
          </div><br>
        </div>
        <!-- FORMULARIO -->
        <div class="col-md-6">
          <h2 class="text-center">Editar datos de usuario</h2>
          <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data" action="save-user-edit.php" accept-charset="UTF-8" method="post">
            <div class="form-inputs">
              <div class="form-group string required user_nombre">
               <label class="control-label" for="user_nombre">Nombres</label>
               <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtNombres" id="user_nombre" value="<?php echo $user['nombres']; ?>"/>
             </div>
             <div class="form-group user_apellidos">
              <label class="control-label" for="user_apellidos">Apellidos</label>
              <input class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtApellidos" id="user_apellidos" value="<?php echo $user['apellidos']; ?>" />
            </div>
          </div>
          <div class="form-group user_apellidos">
            <label class="control-label" for="user_apellidos">Sexo</label>
            <select class="form-control" autofocus="autofocus" required="" aria-required="true" type="text" name="txtSexo" id="user_Sexo" >
              <option selected="true" value="<?php echo $user['sexo']; ?>"><?php echo $user['sexo']; ?></option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Prefiero no decirlo">Prefiero no decirlo</option>
            </select>
          </div>
          <div class="form-group email required user_email">
            <label class="control-label email required" for="user_email"><abbr title="necesario">*</abbr> Dirección de correo electrónico</label>
            <input class="form-control string email required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="email" value="<?php echo $user['email'];?>" name="txtCorreo" id="user_email" /><p class="help-block">Se le enviará un correo de confirmación</p>
          </div>
          <div class="form-group">
            <label class="control-label" for="user_documento">Fecha de nacimiento</label>
            <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="" value="<?php echo $user['fechaNacimiento']; ?>" />
          </div>
          <div class="form-group string required user_telefono">
            <label class="control-label string required" for="user_telefono"><abbr title="necesario">*</abbr> Telefono</label>
            <input class="form-control string required form-control input-lg" autofocus="autofocus" required="required" aria-required="true" type="text" value="<?php echo $user['telefono'];?>" name="txtTelefono" id="user_telefono" />
          </div>
          <div class="form-group">
            <div class="form-group select required user_tipo_documento">
              <label class="control-label select required" for="user_tipo_documento_id"><abbr title="necesario">*</abbr> Tipo documento</label>
              <select class="form-control select required form-control input-lg" name="txtTipoDocumento" id="user_tipo_documento_id">
                <option value="<?php echo $user['tipodocumento'];?>" selected="selected" ><?php echo $user['tipodocumento'];?></option>
                <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group integer required user_documento">
              <label class="control-label integer required" for="user_documento"><abbr title="necesario">*</abbr> Documento</label>
              <input class="form-control numeric integer required form-control input-lg" min="1" autofocus="autofocus" required="required" aria-required="true" type="number" step="1" value="<?php echo $user['documento'];?>" name="txtDocumento" id="user_documento" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_email">Municipio</label>
              <input class="form-control" autocomplete="Municipio" autofocus="autofocus" required="" aria-required="true" type="text" value="<?php echo $user['municipio'] ?>" name="txtMunicipio" id="user_Municipio" />
            </div>
            <div class="form-group">
              <div class="form-group select required user_tipo_de_poblacion">
                <label class="control-label select required" for="user_tipo_de_poblacion_id"><abbr title="necesario">*</abbr> Tipo de poblacion</label>
                <select class="form-control select required form-control input-lg" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
                  <option value="<?php echo $user['tipoPoblacion']; ?>" selected="true" ><?php echo $user['tipoPoblacion']; ?></option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                  <option value="Discapacitados">Discapacitados</option>
                  <option value="Indígenas">Indígenas</option>
                  <option value="Convenio INPEC">Convenio INPEC</option>
                  <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                  <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                  <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                  <option value="Negritudes">Negritudes</option>
                  <option value="Afrocolombianos">Afrocolombianos </option>
                  <option value="Palenques">Palenques</option>
                  <option value="Raizales">Raizales</option>
                  <option value="ROM">ROM</option>
                  <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                  <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                  <option value="Tercera edad">Tercera edad</option>
                  <option value="Adolescente trabajador">Adolescente trabajador</option>
                  <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                  <option value="Soldados campesinos">Soldados campesinos</option>
                  <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                  <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                </select>
              </div>
            </div>
            <div class="form-group password optional user_password">
              <label class="control-label password optional" for="user_password">Contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password]" id="user_password" /><p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla</p>
            </div>
            <div class="form-group password optional user_password_confirmation">
              <label class="control-label password optional" for="user_password_confirmation">Confirmación de la contraseña</label>
              <input class="form-control password optional form-control input-lg" autocomplete="new-password" type="password" name="user[password_confirmation]" id="user_password_confirmation" />
            </div>
            <div class="form-group password required user_current_password">
              <label class="control-label password required" for="user_current_password"><abbr title="necesario">*</abbr> Contraseña actual</label>
              <input class="form-control password required form-control input-lg" autocomplete="current-password"  aria-required="true" type="password" name="user[current_password]" id="user_current_password" /><p class="help-block">Se necesita su contraseña actual para confirmar</p>
            </div>
            <div class="form-group file optional user_perfil">
              <label class="control-label file optional" for="user_perfil">Foto de Perfil</label>
              <input class="file optional" type="file" name="archivo" id="user_perfil" />
            </div>
          </div>
          <input type="hidden" value="<?php echo $user['id'];?>" name="txtCodigo">
          <div class="form-actions">
            <input type="submit" name="commit" value="Actualizar datos" class="btn btn-default btn btn-nar btn-lg " data-disable-with="Actualizar datos" />
          </div>
        </div>
      </form>            
    </div>

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
