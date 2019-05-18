<?php

  /**
   * @Proposito: Formulario para dar de alta un alamcen 
   *             en la base de datos
   *
   * @author Rubén Palos Flores
   * @copyright 16/05/2017
   * @version 1
   * @archivo formAlmacenAlta.php
   */ 

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" 
            type="text/css" 
            href="../../assets/css/estiloAzul.css" >
      
      <link rel="stylesheet" 
            type="text/css" 
            href="../../assets/css/bootstrap.min.css" >
    <title>Alta de almacenes</title>
  </head>
  
  <body role="document">
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h3>Alta de Almancenes</h3>
      </div> <!-- page-header -->
      
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del almac&eacute;n:</h2>
            </div> <!-- panel-heading  -->
            <div class="panel-body">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>">
                
                
                <div class="form-group">
                  <label for="descripcion">Descripci&oacute;n:</label>
                  <input  id="descripcion" 
                          type="text" 
                          class="form-control"
                          name="descripcion" 
                          size="30"
                          required
                  >
                  <br />
                </div> <!-- form-group  -->
                
                <div class="form-group">
                  <label for="obs"	>Observaciones:</label>
                  <input  id="obs" 
                          type="text" 
                          class="form-control"
                          name="obs" 
                          size="30"
                          required 
                  >
                  <br />
                </div> <!-- form-group  -->                       
                <button type="submit" class ="btn btn-md btn-success pull-left" name="submit">Guardar datos</button>      
              </form> <!-- form -->
            </div> <!-- panel-body -->
          </div> <!-- panel panel-primary -->
        </div> <!-- col-sm-offset-1 col-sm-10 -->
      </div> <!-- row  -->
    </div> <!-- container -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/funcEntrada.js"></script>
  </body>
</html>

<?php
  // require_once '../utilerias/funcionesGenerales.php';
  require_once('../../utilerias/funcionesBD.php');

  if (isset( $_POST['submit'] ) )
  { 
    // Cambiar este fragmento de codigo para hacer funciones
    // p ejemplo: funcion verificarCadenaDeEntrada(Cadena);
    
    $descripcion = $_POST['descripcion'];
    $obs = $_POST['obs'];
    
    if( !empty($descripcion))
    {
      $descripcion = trim($descripcion);
      $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
      $descripcion = htmlspecialchars($descripcion);
    }  
      
    if (!empty($obs))
    {
      $obs = trim($obs);
      $obs = filter_var($obs, FILTER_SANITIZE_STRING);
      $obs = htmlspecialchars($obs);
    } 
    abrirConexion();
    // Hacer una funcion que le envies los valores y la table para hacer la insercion y te regrese si fueron insertados  
    //$conexion     = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    $query = "INSERT INTO tblalmacenes (descripcion, observaciones) VALUES ('$descripcion', '$obs')"; 
            
    if (!$GLOBALS['conexion']) 
    {
      die ('No se pude conectar a MySql: ' .mysqli_error()." ".
        mysqli_errno());
    } else {
      
      $resultado = mysqli_query( $conexion, $query);
                
      if ($resultado == 1 )
      {
        echo '<div class="alert alert-success alert-dismissible" role="alert">'.
             '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
             '<span aria-hidden="true">&times;</span></button>'. 
             '<strong>Alta exitosamente.</strong>'.
             '</div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">'.
             '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
             '<span aria-hidden="true">&times;</span></button>'. 
             '<strong>Ocurrio un problema.</strong>'.
             '</div>';
      }
    }
      
    cerrarConexion();
    echo '<div class="alert alert-info" role="alert">'.
         '<a href="llantalistado.php" class="alert-link">Listado</a>'.
         '</div>';
  }

?>