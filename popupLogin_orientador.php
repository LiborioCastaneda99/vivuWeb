 <!-- ====== PopUpLogin ======-->
 <section class="full-width PopUpLogin PopUpLogin-2">
  <div class="full-width">
    <a href="perfil.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
    <a href="cursos_or.php?curs=<?php echo $user['centro'];?>"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Cursos ofertados</a>
    <div role="separator" class="divider"></div>
    <a rel="nofollow" data-method="delete" href="logout.php">
      <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
    </a>            
  </div>
</section>