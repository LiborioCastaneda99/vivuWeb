<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Oferta Complementaria</title>
  <meta name="csrf-param" content="authenticity_token" />
  <meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/home.css" />
  <script src="assets/general.js" data-turbolinks-track="reload"></script>
</head>
</head>
<body>
  <!-- ====== Barra de navegacion ======-->
  <div class="navHeader">
    <div class = "container">
      <div class="row">
        <div class="col-md-12">        
          <div class="logo ml-1">
            <a href="index.php"><img src="assets/logoSena.png" alt="Logosena" /></a>
          </div>

          <nav class=" full-width NavBar-Nav">
            <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
            <ul class="list-unstyled menu-mobile-c mr-1">
              <div class="full-width hidden-md hidden-lg header-menu-mobile">
                <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <a href="/users/sign_in" class="btn btn-nar header-menu-mobile-btn">INICIAR SESIÓN</a>
                      <a class="btn btn-nar header-menu-mobile-btn" href="/users/sign_up">REGISTRARME</a>
                    </center>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
              <li class="menu">
                <a href="/grupos">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
                </a>
              </li>
              <li class="menu">
                <a href="/users/sign_in">
                  <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>INICIAR SESIÓN
                </a>
              </li>
              <li class="menu">
                <a href="/users/sign_up">
                  <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>REGISTRARME
                </a>                    </li>
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
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Cursos</li></ol>
    </div>
  </div>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container down">s
    <div class="container down">
      <section class="down">
        <h2 class="text-center text-light"> Oferta Por Area.</h2>
        <form class="form-inline" action="/grupos" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
          <div class="form-group">
            <input type="text" name="q" class="form-control" placeholder="Buscar..." type="text" value="">
            <span class="form-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>        <div class="container">
          <div class="full-width container-category">
            <a href="/grupos/1/cursos">
              <div class="full-width post">
               <figure class="full-width post-img">
                 <!-- Tamaño de la imagen 248x186 pixeles-->
                 <img src="assets/DefaultImage.png" alt="Defaultimage" />
               </figure>
               <div class="full-width post-info">
                <p class="full-width post-info-price nom_gru">Agrícola</p>
                <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
              </div>
            </a>                  
          </div>
          <a href="/grupos/2/cursos">
            <div class="full-width post">
             <figure class="full-width post-img">
               <!-- Tamaño de la imagen 248x186 pixeles-->
               <img src="assets/DefaultImage.png" alt="Defaultimage" />
             </figure>
             <div class="full-width post-info">
              <p class="full-width post-info-price nom_gru">Agroindustria</p>
              <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
            </div>
          </a>                  
        </div>
        <a href="/grupos/3/cursos">
          <div class="full-width post">
           <figure class="full-width post-img">
             <!-- Tamaño de la imagen 248x186 pixeles-->
             <img src="assets/DefaultImage.png" alt="Defaultimage" />
           </figure>
           <div class="full-width post-info">
            <p class="full-width post-info-price nom_gru">Artes Graficas</p>
            <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
          </div>
        </a>                  
      </div>
      <a href="/grupos/4/cursos">
        <div class="full-width post">
         <figure class="full-width post-img">
           <!-- Tamaño de la imagen 248x186 pixeles-->
           <img src="assets/DefaultImage.png" alt="Defaultimage" />
         </figure>
         <div class="full-width post-info">
          <p class="full-width post-info-price nom_gru">Artesanías</p>
          <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
        </div>
      </a>                  
    </div>
    <a href="/grupos/5/cursos">
      <div class="full-width post">
       <figure class="full-width post-img">
         <!-- Tamaño de la imagen 248x186 pixeles-->
         <img src="assets/DefaultImage.png" alt="Defaultimage" />
       </figure>
       <div class="full-width post-info">
        <p class="full-width post-info-price nom_gru">Atencion Integral A La Primera Infancia</p>
        <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
      </div>
    </a>                  
  </div>
  <a href="/grupos/6/cursos">
    <div class="full-width post">
     <figure class="full-width post-img">
       <!-- Tamaño de la imagen 248x186 pixeles-->
       <img src="assets/DefaultImage.png" alt="Defaultimage" />
     </figure>
     <div class="full-width post-info">
      <p class="full-width post-info-price nom_gru">Automotriz</p>
      <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
    </div>
  </a>                 
</div>
<a href="/grupos/7/cursos">
  <div class="full-width post">
   <figure class="full-width post-img">
     <!-- Tamaño de la imagen 248x186 pixeles-->
     <img src="assets/DefaultImage.png" alt="Defaultimage" />
   </figure>
   <div class="full-width post-info">
    <p class="full-width post-info-price nom_gru">Basico De Mantenimiento</p>
    <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
  </div>
</a>                  
</div>
<a href="/grupos/8/cursos">
  <div class="full-width post">
   <figure class="full-width post-img">
     <!-- Tamaño de la imagen 248x186 pixeles-->
     <img src="assets/DefaultImage.png" alt="Defaultimage" />
   </figure>
   <div class="full-width post-info">
    <p class="full-width post-info-price nom_gru">Calzado</p>
    <p class="full-width color_norm nom_gru">Cursos Abiertos: 0</p>
  </div>
</a>                  
</div>
</div>
</div>
</section>
<ul class="pagination pagination-sm">


  <li class="page active">
    <a href="/grupos">1</a>
  </li>

  <li class="page">
    <a rel="next" href="/grupos?page=2">2</a>
  </li>

  <li class="page">
    <a href="/grupos?page=3">3</a>
  </li>

  <li class="page">
    <a href="/grupos?page=4">4</a>
  </li>

  <li class="next_page">
    <a rel="next" href="/grupos?page=2">Next &rsaquo;</a>
  </li>

  <li class="last next">
    <a href="/grupos?page=4">Last &raquo;</a>
  </li>

</ul>

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
<script src="assets/grupos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
<!-- ====== Pie de pagina ======-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
