<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Oferta Complementaria</title>
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
  <!-- ====== Barra de navegacion ======-->
  <div class="navHeader">
    <div class = "container">
      <div class="row">
        <div class="col-md-12">
          <div class="logo ml-1">
            <a href="/"><img src="assets/logoSena.png" alt="Logosena" /></a>
          </div>

          <nav class=" full-width NavBar-Nav">
            <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>

            <ul class="list-unstyled menu-mobile-c">
              <div class="full-width hidden-md hidden-lg header-menu-mobile">
                <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
                <div class="row">
                  <div class="col-md-12">

                    <center>
                      <div class="logo ml-1">
                        <a href="/"><img src="assets/logoSena.png" alt="Logosena" /></a>
                      </div>
                    </center>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
              <li class="menu">
                <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/inicio-sofia-plus.html" target="_blank">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> SOFIAPLUS
                </a>
              </li>
              <li class="hidden-lg">
                <a href="/cursos">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> MIS CURSOS
                </a>
              </li>
              <li>
                <a href="/grupos">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
                </a>
              </li>
              <li>
                <a href="/users/edit">
                  <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>PEDRO PEREZ
                </a>
              </li>
              <li class="hidden-lg">
                <a href="/send/new">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> ASESORIA POR EMPRENDIMIENTO
                </a>
              </li>
              <li class="hidden-lg">
                <a href="/competencias">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CERTIFICACIÓN POR COMPETENCIAS U OFICIOS
                </a>
              </li>
              <li class="hidden-xs hidden-sm">
                <!--Verifica si el usuario actual tiene foto-->
                <i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true">
                </i>
              </li>
            </ul>

          </nav>
          <i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="/">Inicio</a></li><li><a href="/grupos">Grupos</a></li><li>Agrícola</li><li class="active">Cursos</li></ol>
  </div>
  <!-- ====== PopUpLogin ======-->
  <section class="full-width PopUpLogin PopUpLogin-2">
    <div class="full-width">
      <a href="/users/edit"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
      <a href="/users/2/cursos"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Mis Cursos</a>
      <div role="separator" class="divider"></div>
      <a rel="nofollow" data-method="delete" href="/users/sign_out">
        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
      </a>            
    </section>
  </div>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container down">
      <h1 class="text-center font-weight-bold down">Cursos Disponibles En
        Agrícola
      </h1>
      <form class="form-inline" action="/grupos/1/cursos" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
        <div class="col-md-7 mt-1 p-0">
          <div class="form-group">
            <input type="text" name="q" class="form-control mt-1" placeholder="Buscar..." type="text"
            value="">
            <span class="form-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat mt-1"><i
                class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
          <div class="col-md-5 col-sm-12 mt-1 text-right p-0">
            <a class="fa fa-envelope btn btn-nar w-100  mt-1" data-remote="true" href="/sugerencias/new"> No Encontraste Curso? Envianos tu Sugerencia</a>
          </div>
        </form>    <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-responsive text-center mt-1">
              <thead>
                <tr>
                  <th scope="col">Curso</th>
                  <th scope="col">Jornada</th>
                  <th scope="col">Horario</th>
                  <th scope="col">Intensidad</th>
                  <th scope="col">Inicia</th>
                  <th scope="col">Ambiente</th>
                  <!-- <th scope="col">Formacion</th> -->
                  <th scope="col">Centro</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Pecuaria</td>
                  <td>Mixta</td>
                  <td>12:30 pm - 2:30 pm</td>
                  <td>40 horas</td>
                  <td>2020-04-05</td>
                  <td>202</td>
                  <td>Centro de comercio y servicios</td>
                  <td>Formación virtual</td>
                  <td> Inscrito </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="new-sugerencia">
          </div>
        </div>

      </div>
    </div>

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
    <script src="assets/grupos.js"></script>
    <!-- ====== Pie de pagina ======-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>

  </html>
