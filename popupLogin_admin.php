 <section class="full-width PopUpLogin PopUpLogin-2">
  <div class="full-width">
    <a href="user-edit.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
    <a href="mis-cursos.php"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Cursos ofertados</a>
    <?php if ($user['documento']=='104545661'): ?>
    <a href="sign_up_orientadores.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Registrar</a>
    <?php endif ?>
    <div role="separator" class="divider"></div>
    <a rel="nofollow" data-method="delete" href="logout.php">
      <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
    </a>            
  </div>
</section>