<?php

  /**
  * Proposito: Formulario para actualizar un alamcen 
  * en la base de datos
  *
  * @author Rubén Palos Flores
  * @copyright 16/5/2017
  * @version 1
  * @archivo formAlmacenActualiza.php
  */ 

  if (!isset($_GET['id']) ) {
		echo "No existe la variable.....";
    header('Location: http://localhost:8080/almanuevo/index.php');
	} else{
		// Cargar el id
    $id = $_GET['id'];
        
    // hacer la conexion valida
    require_once('../utilerias/login.php');
		$db_conexion = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    
    // Verificar la conexion
    if (!$db_conexion) {
			die ('No se pude conectar a MySql: ' .mysql_error());
		}

    // Seleccionar la base de datos
    mysql_select_db(DB_NAME)
			or die('No se puede seleccionar la base de datos ' . mysql_error());

    // recuperar los datos de la id, enviada por el metodo GET
    $query = "SELECT descripcion, observaciones ".
             "FROM tblalmacenes WHERE idAlmacen='$id'";
    $result = mysql_query($query, $conexion) 
			or die ('No se pudo seleccionar registros.'.mysql_error());
      
    $descripcion   = (string) mysql_result($result, 0, 'descripcion');
		$observaciones = (string) mysql_result($result, 0, 'observaciones'); 
    mysql_close($conexion);
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" 
            type="text/css" 
            href="../assets/css/estiloAzul.css" >
      
      <link rel="stylesheet" 
            type="text/css" 
            href="../assets/css/bootstrap.min.css" >
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
                  <input type="hidden" 
                         class="textbox"
                         name="id" 
                         value="<?php echo $id; ?>"
                  >
                </div> <!-- form-group  -->
                   
                <div class="form-group">
                  <label for="descripcion">Descripci&oacute;n:</label>
                  <input  id="descripcion" 
                          type="text" 
                          class="form-control"
                          name="descripcion" 
                          value="<?php echo $descripcion ?>"
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
                          value="<?php echo $observaciones ?>"
                          size="30"
                          required 
                  >
                  <br />
                </div> <!-- form-group  -->                       
                <button type="submit" class ="btn btn-md btn-success pull-left" name="submit">Actualiza datos</button>      
              </form> <!-- form -->
            </div> <!-- panel-body -->
          </div> <!-- panel panel-primary -->
        </div>
      </div> <!-- row  -->
    </div> <!-- container -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/funcEntrada.js"></script>
  </body>
</html>