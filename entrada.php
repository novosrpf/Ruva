<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon_llantas.jpg">

    <title>Almacén Ruvalcaba.</title>

    <!-- Bootstrap core CSS -->
    <link href="../almanuevo/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="../almanuevo/assets/css/style.css" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon_llantas.jpg" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Almacén Ruvalcaba.(Rincón Petocho Matríz)</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Inicio</a></li>
            <li><a href="#about">Acerca de...</a></li>
            <li><a href="#contact">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../almanuevo/assets/js/bootstrap.min.js"></script>
  </body>
</html>
