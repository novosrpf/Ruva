<!DOCTYPE html>
<html lang="es">
  <?php
    require_once('utilerias/cabecera.php');
  ?>
  <body>
    <?php
      require_once('utilerias/barraDeNavegacion.php');
    ?>
    
    <div class="container">
      <div id="container">
        <form action="utilerias/autentificar.php" method="post">
		      <div class="login">LOGIN</div>
          <div class="username-text">Usuario:</div>
		      <div class="password-text">Contraseña:</div>
		      <div class="username-field">
            <input type="text" name="username" value="" />
		      </div>
		      <div class="password-field">
		        <input type="password" name="password" value="" />
		      </div>
		      <input type="checkbox" name="remember-me" id="remember-me" />
          <label for="remember-me">Recuerdame...</label>
		      <div class="forgot-usr-pwd">¿Olvido su <a href="#">usuario</a> o <a href="#">contraseña.</a>?</div>
		      <input type="submit" name="submit" value="   Ir..." />
        </form>    
      </div>
    </div><!-- /.container -->
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>    
  </body>
</html>
