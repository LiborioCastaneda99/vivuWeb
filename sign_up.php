<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Registrarme | Oferta Complementaria</title>
  <meta property="og:title" content="Registrarme | Oferta Complementaria">
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  
  <meta content="sD0hPo5InGhre.php2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/grupos.css" />
  <script src="assets/general.js" data-turbolinks-track="reload"></script>
  <style type="text/css">
    .footer_new {
      bottom: 0;xt-alig.phpn: center;
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
  <!-- ====== Barra de navegacion ======-->
  <?php  include 'header.php';?>


  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Registrarme</li></ol>
    </div>
  </div>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <div class="full-width container-login">
          <i class="fa fa-user container-login-icon" aria-hidden="true"></i>
          <h2 class="text-center" >Registrarme</h2>
          <br>
          <form class="simple_form new_user" id="new_user" action="save_sign_up.php" accept-charset="UTF-8" method="post">

            <div class="form-group">
              <div class="form-group user_nombre">
                <label class="control-label" for="user_nombre">Nombres</label>
                <input class="form-control" required="" type="text" name="txtNombres" id="user_nombre" />
              </div>
              <div class="form-group user_apellidos">
                <label class="control-label" for="user_apellidos">Apellidos</label>
                <input class="form-control" required="" type="text" name="txtApellidos" id="user_apellidos" />
              </div>
              <div class="form-group">
                <label class="control-label" for="user_documento">Fecha de nacimiento</label>
                <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="user_FechaNacimiento" />
              </div>
              <div class="form-group">
                <label class="control-label" for="user_documento">Teléfono</label>
                <input class="form-control" min="1" required="" type="number" step="1" name="txtTelefono" id="user_FechaNacimiento" />
              </div>
              <div class="form-group user_apellidos">
                <label class="control-label" for="user_apellidos">Sexo</label>
                <select class="form-control" required="" type="text" name="txtSexo" id="user_Sexo" >
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-group user_tipo_documento">
                <label class="control-label" for="user_tipo_documento_id">Tipo documento</label>
                <select class="form-control" min="1" name="txtTipoDocumento" id="user_tipo_documento_id" required="">
                  <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                  <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                  <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="user_documento">Número de Documento</label>
              <input class="form-control" min="1" required="" type="number" step="1" name="txtDocumento" id="user_documento" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_tipo_de_poblacion_id">Tipo de población</label>
              <select class="form-control" name="txtTipoPoblacion" id="user_tipo_de_poblacion_id">
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
            <div class="form-group">
              <label class="control-label" for="user_email">Municipio</label>
              <input class="form-control" autocomplete="Municipio" required="" type="text" value="" name="txtMunicipio" id="user_Municipio" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_email">Email</label>
              <input class="form-control" autocomplete="email" required="" type="email" value="" name="txtCorreo" id="user_email" />
            </div>
            <div class="form-group">
              <label class="control-label" for="user_password">Password</label>
              <input class="form-control" autocomplete="new-password" required="" type="password" name="txtPassword" id="user_password" />
              <p class="help-block">6 caracteres minimo.</p>
            </div>

            <br>
            <center> 
              <button class="btn btn-nar btn-lg" type="submit"> Registrarme  </button><br>
            </center>
          </form>   
          <a href="sign_in.php" style="text-decoration: none; color: #fff; margin-right: 50px;"><button class="btn btn-nar btn-lg"> Iniciar sesión</button></a>      
        </div>
      </div>
    </div>
  </div>

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

  <!-- ====== Pie de pagina ======-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="/assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
