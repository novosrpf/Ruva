<?php
	if (!isset($_GET['id']) ) {
		echo "No existe la variable.....";
	} else{
		$id = $_GET['id'];

		require_once('../utilerias/login.php');
		$db_conexion = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

		if (!$db_conexion) {
			die ('No se pude conectar a MySql: ' .mysql_error());
		}

		mysql_select_db(DB_NAME)
			or die('No se puede seleccionar la base de datos ' . mysql_error());

		$query = "SELECT tamano ".
             "FROM tbltamrin WHERE Id='$id'";
		$result = mysql_query($query, $conexion) 
			or die ('No se pudo seleccionar registros.'.mysql_error());
	
		$rinDescripcion = trim((string) mysql_result($result, 0, 'tamano'));
    
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
    <!--     <meta http-equiv="refresh" content="5" /> -->
    <link rel="stylesheet" 
          type="text/css" 
          href="../assets/css/estiloAzul.css" >
    
    <link rel="stylesheet" 
          type="text/css" 
          href="../assets/css/bootstrap.min.css" >

    <script src="../assets/js/funciones.js"></script>

		<title>Actualizacion de rines.</title>
	</head>
	<body>
    <header></header>
    <section>
      <form class="formulario"  
          action="" 
          method="post"
          onsubmit="return validacion();" 
      >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2>Actualizacion de Rines.</h2>
          </div>
          <div class="panel-body">
            <fieldset>
              <input type="hidden" 
                     class="textbox"
                           name="id" 
                           value="<?php echo $id; ?>"
              >
              <br />
              <label  for="rinDescripcion"	class="etiq">Rin:</label>
              <input  id="rinDescripcion" 
                      type="text" 
                      class="textbox"
                      name="rinDescripcion" 
                      maxlength="50"
                      value="<?php echo $rinDescripcion; ?>"       
              >
              <br /><br />
              
              <button class ="btn btn-success" 
                      type="submit"/>Actualizar</button>    

            </fieldset>
          </div>
        </div>
      </form>	
    </section>
  </body>
</html>

<?php
  if ($_POST)
  {
    if (!isset( $_POST['rinDescripcion']) ) 
    {
      echo 'Falta llenar datos del formulario, '.
            'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
            '<a href="formRinActualiza.php">Regresar a formulario anterior.</a>';
    } else {
      require_once('../utilerias/login.php');
        
      $rinDescripcion = (integer) $_POST['rinDescripcion'];
      $conexion = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
      $query = "UPDATE tbltamrin SET tamano='$rinDescripcion' WHERE id='$id'"; 
              
      if (!$conexion) 
      {
        die ('No se pude conectar a MySql: ' .mysql_error()." ".
        mysql_errno());
      } else {
        if (!mysql_select_db(DB_NAME))
        {
          echo 'No se puede seleccionar la base de datos '.
                ' Error: '.mysql_error();
        } else {

          mysql_query($query, $conexion)
             or die ('No se pudo actualizar el registro.');
            
          if (mysql_affected_rows($conexion) == 1) 
          {
               
            echo '<div class="alert alert-success alert-dismissible" role="alert">'.
                 '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                 '<span aria-hidden="true">&times;</span></button>'. 
                 '<strong>Rin modificada exitosamente.</strong>'.
                 '</div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">'.
                 '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                 '<span aria-hidden="true">&times;</span></button>'. 
                 '<strong>Ocurrio un problema.</strong>'.
                 '</div>';
          }
        }
      }
  	}
    mysql_close($conexion);
  		      echo '<div class="alert alert-info" role="alert">'.
           '<a href="rinListado.php" class="alert-link">Listado</a>'.
           '</div>';
  }
?>
	