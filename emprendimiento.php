<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Emprendimiento | Oferta Complementaria</title>
  <meta property="og:title" content="Emprendimiento | Oferta Complementaria">
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
</style>
</head>
<body>
 <?php include 'header.php'; ?>

 <div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Gestion Por Emprendimiento</li></ol>
  </div>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="contentContainer">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="pservices text-justify">
              <h5 class="card-header info-color white-text text-center py-4">
                <strong>SERVICIO NACIONAL DE APRENDIZAJE SENA</strong><br>
                <strong>GESTION DE EMPRENDIMIENTO Y EMPRESARISMO</strong><br>
                <strong>FORMATO DE INSCRIPCI??N AL SERVICIO DE ASESORIA</strong>
              </h5>
            </div>
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">
            </div>
          </div>
          <form action="save_emprendimiento.php" method="POST">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default mt-2">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Sena.edu.co
                    </a>
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="col-md-10">INSCRIPCI??N AL SERVICIO DE ASESOR??A</a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Regional</label><br>
                        <input type="text" class="form-control" placeholder="Regional" required="" name="txtRegional">
                      </div>
                      <div class="col-md-5">
                        <label>Centro SBDC  (Centro de Formaci??n)</label><br>
                        <input type="text" class="form-control" placeholder="Centro de Formacion" required="" name="txtCentro">
                      </div>
                      <div class="col-md-3">
                        <label>C??digo del proyecto</label><br>
                        <input type="text" class="form-control" placeholder="Codigo del Proyecto" required="" name="txtCodigoProyecto">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default  mt-2">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Informaci??n del cliente
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nombres</label><br>
                        <input type="text" class="form-control" placeholder="Nombres" required="" name="txtNombres">
                      </div>

                      <div class="col-md-6">
                        <label>Apellidos</label><br>
                        <input type="text" class="form-control" placeholder="Apellidos" required="" name="txtApellidos">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label>Documento de Identidad</label><br>
                        <input type="text" class="form-control" placeholder="Documento de Identidad" required="" name="txtDocumento">
                      </div>
                      <div class="col-md-3">
                        <label>Fecha de Nacimiento</label><br>
                        <input type="date" class="form-control" placeholder="AAAA/MM/DD" required="" name="txtFechaNacimiento">
                      </div>
                      <div class="col-md-3">
                        <label>Ciudad Nacimiento</label><br>
                        <input id="" class="form-control" required="" name="txtCiudadNacimiento">
                      </div>
                      <div class="col-md-3">
                        <label>Departamento Nacimiento</label><br>
                        <input id="" class="form-control" required="" name="txtDepartamentoNacimiento">
                        
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Correo electr??nico (e-mail)</label>
                        <input type="email" class="form-control" placeholder="Correo electr??nico (e-mail):" required="" name="txtCorreo">
                      </div>

                      <div class="col-md-6">
                        <label>Genero</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtGenero" value="Masculino">Masculino</label>
                        <label class="checkbox-inline"><input type="radio" name="txtGenero" value="Femenino">Femenino</label>
                        <label class="checkbox-inline"><input type="radio" name="txtGenero" value="Prefiero no decirlo">Prefiero no decirlo</label>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <label>Tel??fono de Oficina</label><br>
                        <input type="text" class="form-control" placeholder="Tel??fono de Oficina" required="" name="txtTelefonoOficina">
                      </div>

                      <div class="col-md-6">
                        <label>Tel??fono Movil</label><br>
                        <input type="text" class="form-control" placeholder="Tel??fono Movil" required="" name="txtTelefonoMovil">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Direccion de Residencia</label>
                        <input type="text" class="form-control" placeholder="Digite su Direccion de Residencia Completa" required="" name="txtDireccion">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Ciudad de residencia</label><br>
                        <input type="text" class="form-control" required="" name="txtCiudadResidencia">
                      </div>
                      <div class="col-md-6">
                        <label>Departamento de residencia</label><br>
                        <input type="text" class="form-control" required="" name="txtDepartamentoResidencia">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Caracterizaci??n especial de la poblaci??n</label><br>                    
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Edad entre 15 y 18 A??os">Edad entre 15 y 18 A??os</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Desplazado por la violencia">Desplazado por la violencia</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Madre Cabeza de Familia">Madre Cabeza de Familia</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Minor??a ??tnica (Ind??gena o Negritud)">Minor??a ??tnica (Ind??gena o Negritud)</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Recluido c??rceles INPEC">Recluido c??rceles INPEC</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Desmovilizado o reinsertado">Desmovilizado o reinsertado</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Con Discapacidad">Con Discapacidad</label>
                        <label class="checkbox-inline"><input type="radio" name="txtCaracterizacion" value="Otro:">Otro:</label>
                        <label class="checkbox-inline">??Cual?</label><input type="text" value="" >
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <label>Formaci??n Acad??mica</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Aprendiz SENA">Aprendiz SENA</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="T??cnico">T??cnico</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Tecn??logo">Tecn??logo</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Profesional Universitario">Profesional Universitario</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Especialista">Especialista</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Maestr??a">Maestr??a</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Doctorado">Doctorado</label>
                        <label class="checkbox-inline"><input type="radio" name="txtFormacion" value="Otro">Otro:</label>
                        <label class="checkbox-inline">??Cual?</label><input type="text" value="">
                      </div>
                      <div class="col-md-4">
                        <label>Programa de Formaci??n</label><br>
                        <input type="text" class="form-control" placeholder="Programa de Formaci??n" name="txtProgramaFormacion" required="">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <label>Instituci??n Educativa</label><br>
                        <input type="text" class="form-control" required="" name="txtInstitucion">
                      </div>

                      <div class="col-md-4">
                        <label>Estado</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtEstadoInstitucion" value="En Curso">En Curso</label>
                        <label class="checkbox-inline"><input type="radio" name="txtEstadoInstitucion" value="Finalizado">Finalizado</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Servicio  Requerido: (Exclusivo para Gestor)</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Fortalecimiento Unidad Productiva">Fortalecimiento Unidad Productiva</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Creaci??n de Empresa Fondo Emprender">Creaci??n de Empresa Fondo Emprender</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Puesta en Marcha Empresa Fondo Emprender">Puesta en Marcha Empresa Fondo Emprender</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Creaci??n de Empresa Otras Fuentes de Financiaci??n">Creaci??n de Empresa Otras Fuentes de Financiaci??n</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Puesta en Marcha Empresa Otras Fuentes financiaci??n">Puesta en Marcha Empresa Otras Fuentes financiaci??n</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Fortalecimiento Empresarial">Fortalecimiento Empresarial</label>
                        <label class="checkbox-inline"><input type="radio" name="txtServicio" value="Otro">Otro:</label>
                        <label class="checkbox-inline">??Cual?</label><input type="text" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default  mt-2">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Informaci??n de la Empresa
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-8">
                        <label>Nombre de la Empresa o Idea de Negocio</label><br>
                        <input type="text" class="form-control" placeholder="Nombre de la Empresa o Idea de Negocio" required="" name="txtEmpresa">
                      </div>

                      <div class="col-md-4">
                        <label>Nit</label><br>
                        <input type="number" class="form-control" placeholder="Nit" required="" name="txtNit">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                        <label>Estatus</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtEstatus" value="Emprendedor (idea de negocio)">Emprendedor (idea de negocio)</label>
                        <label class="checkbox-inline"><input type="radio" name="txtEstatus" value="Empresa establecida">Empresa establecida</label>
                        <label class="checkbox-inline"><input type="radio" name="txtEstatus" value="Gacela">Gacela</label>
                        <label class="checkbox-inline"><input type="radio" name="txtEstatus" value="Emprendedor con Unidad Productiva">Emprendedor con Unidad Productiva</label>
                      </div>

                      <div class="col-md-5">
                        <label>Fecha de Constituci??n de la empresa</label>
                        <input type="date" class="form-control" required="" name="txtFechaConstitucion">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <label>Representante Legal</label><br>
                        <input type="text" class="form-control" placeholder="Representante Legal" required="" name="txtRepresentanteLegal">
                      </div>

                      <div class="col-md-4">
                        <label>Tama??o de la empresa</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtTamanoEmpresa" value="Micro">Micro</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTamanoEmpresa" value="Peque??a">Peque??a</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTamanoEmpresa" value="Mediana">Mediana</label>
                      </div>
                      <div class="col-md-3">
                        <label>Actividad Econ??mica (CIIU)</label><br>
                        <input type="text" class="form-control" required="" name="txtActividadEconomica"> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Sector Econ??mico</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtSectorEconomico" value="Agropecuario">Agropecuario</label>
                        <label class="checkbox-inline"><input type="radio" name="txtSectorEconomico" value="Servicios">Servicios</label>
                        <label class="checkbox-inline"><input type="radio" name="txtSectorEconomico" value="Industrial">Industrial</label>
                        <label class="checkbox-inline"><input type="radio" name="txtSectorEconomico" value="Comercio">Comercio</label>
                        <label class="checkbox-inline"><input type="radio" name="txtSectorEconomico" value="Otro">Otro</label>
                        <label class="checkbox-inline">??Cual?</label><input type="text" value="">
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Tipo de Sociedad</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="S.A.S.">S.A.S.</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="S.A.">S.A.</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="LTDA">LTDA</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="Fundaciones">Fundaciones</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="Cooperativas">Cooperativas</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="Persona Natural">Persona Natural</label>
                        <label class="checkbox-inline"><input type="radio" name="txtTipoSociedad" value="Otra">Otra</label>
                        <label class="checkbox-inline">??Cual?</label><input type="text" value="">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <label>Direcci??n Empresa</label><br>
                        <input type="text" class="form-control" placeholder="Direcci??n Empresa" required="" name="txtDireccionEmpresa">
                      </div>

                      <div class="col-md-4">
                        <label>P??gina web</label><br>
                        <input type="text" class="form-control" placeholder="P??gina web" name="txtPaginaWeb">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label>Ciudad</label><br>
                        <input id="" class="form-control" required="" name="txtCiudadEmpresa">
                      </div>
                      <div class="col-md-4">
                        <label>Departamento</label><br>
                        <input id="" class="form-control" required="" name="txtDepartamentoEmpresa">
                        
                      </div>
                      <div class="col-md-4">
                        <label>Correo Electr??nico</label><br>
                        <input type="email" name="txtCorreoEmpresa" value="" class="form-control">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label>N??mero Empleos Formales</label>
                        <input type="number" maxlength="1000" required="" name="txtNumeroEmpleosFormales" class="form-control">
                      </div>
                      <div class="col-md-4">
                        <label>N??mero de Empleos Informales</label>
                        <input type="number" maxlength="1000" required="" name="txtNumeroEmpleosInformales" class="form-control">
                      </div>
                      <div class="col-md-4">
                        <label>Descripci??n de Productos/Servicios</label><br>
                        <textarea required="" name="txtDescripcion" cols="44" rows="2"></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>??Realiza negocios por Internet?</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtVendeInternet" value="SI">SI</label>
                        <label class="checkbox-inline"><input type="radio" name="txtVendeInternet" value="NO">NO</label>
                      </div>
                      <div class="col-md-6">
                        <label>??El negocio est?? establecido en su casa?</label><br>
                        <label class="checkbox-inline"><input type="radio" name="txtNegocioCasa" value="SI">SI</label>
                        <label class="checkbox-inline"><input type="radio" name="txtNegocioCasa" value="NO">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container border-form  mt-2">
                <div class="row">
                  <div class="col-md-12">
                    <p class="pservices text-justify">CONFIDENCIALIDAD Las partes mantendr??n la confidencialidad de los datos e informaci??n intercambiados entre ellas, incluyendo informaci??n objeto de derecho de autor, patentes, t??cnicas, modelos, invenciones, know-how, procesos, algoritmos, programas, ejecutables, investigaciones, detalles de dise??o, informaci??n financiera, lista de clientes, inversionistas, empleados, relaciones de negocios y contractuales, pron??sticos de negocios, planes de mercadeo y cualquier informaci??n revelada sobre terceras personas. Toda informaci??n intercambiada es de propiedad exclusiva de la parte de donde proceda.  Toda la informaci??n previamente proporcionada es confidencial y se utilizar?? para reportes generales, consolidados y no de forma individual. El emprendedor o empresario facilitar?? la informaci??n requerida cuando se genere impacto econ??mico como resultado de la asesor??a recibida en el SENA-SBDC Centro de Desarrollo Empresarial. <strong>Recuerde que los servicios ofrecidos por los  SENA SBDC Centros de  Desarrollo Empresarial son gratuitos e indiscriminados, cualquier petici??n queja o reclamo lo puede hacer por nuestros  canales dispuestos en la p??gina web de la entidad <a href="http://www.sena.edu.co" target="_blank">www.sena.edu.co</a>, telef??nicamente al  5925555  o en los  buzones f??sicos dispuestos en nuestros  Centros de Formaci??n.</strong></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-9">
                    <label>Firma del Cliente </label><br>
                    <input type="text" class="form-control" placeholder="Firme Aqui" sname="txtFirmaCliente">
                  </div>
                  <div class="col-md-3">
                    <label>Fecha</label><br>
                    <input type="date" class="form-control" name="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-9">
                    <label>Firma del Gestor </label><br>
                    <input type="text" class="form-control" placeholder="Firme Aqui">
                  </div>
                  <div class="col-md-3">
                    <label>Fecha</label><br>
                    <input type="date" class="form-control">
                  </div>
                </div>
                <br>
              </div>
            </div>
            <input type="submit" name="enviar" class="btn form-control" value="Enviar Formulario" style="background-color: #FF6C00; color: white;"><br><br>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer_new">
    <div class="container">
      <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Pol??ticas de privacidad y condiciones uso Portal Web SENA</span>
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
  <script src="assets/send-877aef30ae1b040ab8a3aba4e3e309a11d7f2612f44dde450b5c157aa5f95c05.js"></script>
  <!-- ====== Pie de pagina ======-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="/assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
