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

		$query = "SELECT numero, rin, marca, modelo, ".
             "almacen1, almacen2, almacen3, almacen4, ".
             "existencia, minimo, localizacion, ".
             "estado, avisado ".
             "FROM tblllantas WHERE Id='$id'";
		$result = mysql_query($query, $conexion) 
			or die ('No se pudo seleccionar registros.'.mysql_error());
	
		$numero       = (string) mysql_result($result, 0, 'numero');
		$rin          = (int)    mysql_result($result, 0, 'rin');
		$marca        = (string) mysql_result($result, 0, 'marca');
    $modelo       = (string) mysql_result($result, 0, 'modelo');
    $almacen1     = (int)    mysql_result($result, 0, 'almacen1');
    $almacen2     = (int)    mysql_result($result, 0, 'almacen2');
    $almacen3     = (int)    mysql_result($result, 0, 'almacen3');
    $almacen4     = (int)    mysql_result($result, 0, 'almacen4');
		$existencia   = (int)    mysql_result($result, 0, 'existencia');
    $minimo       = (int)    mysql_result($result, 0, 'minimo');
    $localizacion = (string) mysql_result($result, 0, 'localizacion');
    $estado       = (string) mysql_result($result, 0, 'estado');
    $avisado      = (string) mysql_result($result, 0, 'avisado');
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
		<title>Actualizacion de Llantas.</title>
	</head>
	<body>
    <header></header>
    <section>
      <form class="formulario"  
          action="" 
          method="post" >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2>Actualizacion de llantas.</h2>
          </div>
          <div class="panel-body">
            <fieldset>
              <input type="hidden" 
                     class="textbox"
                           name="id" 
                           value="<?php echo $id; ?>"
              >
              <br />
              <label  for="numero"	class="etiq">Numero:</label>
              <input  type="text" 
                      class="textbox"
                      name="numero" 
                      value="<?php echo $numero; ?> " 
                      required
              >
              <br /><br />
              <label  for="rin" class="etiq">Rin:</label>
              <input  type="text" 
                      class="textbox"
                      name="rin" 
                      value="<?php echo $rin; ?> " 
                      required
              >
              <br /><br />
              <label  for    ="marca"	class="etiq">Marca:</label>
              <input  type="text" 
                      class="textbox"
                      name="marca" 
                      value="<?php echo $marca; ?> " 
                      required
              >
              <br /><br />
              <label  for    ="modelo" class="etiq">Modelo:</label>
              <input  type="text"
                      class="textbox"
                      name="modelo" 
                      value="<?php echo $modelo; ?> " 
                      required
              >
              <br /><br />
              
              <label  for    ="almacen1" class="etiq">Almacén:</label>
              <input  type="text"
                      class="textbox"
                      name="almacen1" 
                      value="<?php echo $almacen1; ?> " 
                      required
              >
              <br /><br />

              <label  for    ="almacen2" class="etiq">Bodega:</label>
              <input  type="text"
                      class="textbox"
                      name="almacen2" 
                      value="<?php echo $almacen2; ?> " 
                      required
              >
              <br /><br />

              <label  for    ="almacen3" class="etiq">Ventas:</label>
              <input  type="text"
                      class="textbox"
                      name="almacen3" 
                      value="<?php echo $almacen3; ?> " 
                      required
              >
              <br /><br />

              <label  for    ="almacen4" class="etiq">Petróleos:</label>
              <input  type="text"
                      class="textbox"
                      name="almacen4" 
                      value="<?php echo $almacen4; ?> " 
                      required
              >
              <br /><br />
             
            <label  for ="existencia" class="etiq">Existencia:</label>
              <input  type="text" 
                      class="textbox"
                      name="existencia"  
                      value="<?php echo $existencia; ?> " 
                      required
              >
              <br /><br />
             
         
              <label  for    ="minimo" class="etiq">Minimo:</label>
              <input  type="text" 
                      class="textbox"
                      name="minimo" 
                      value="<?php echo $minimo; ?> " 
              >
              
              <br /><br />
              <label  for    ="localizacion" class="etiq">Localizacion:</label>
              <input  type="text" 
                      class="textbox"
                      name="localizacion" 
                      value="<?php echo $localizacion; ?> " 
              >
              
              <br /><br />
              <label  for    ="estado" class="etiq">Estado:</label>
              <input  type="text" 
                      class="textbox"
                      name="estado" 
                      value="<?php echo $estado; ?> " 
              >
              
              <br /><br />
              <label  for    ="avisado" class="etiq">Avisado:</label>
              <input  type="text" 
                      class="textbox"
                      name="avisado" 
                      value="<?php echo $avisado; ?> " 
              >
              <br /> <br />
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
    if (!isset( $_POST['numero'], $_POST['rin'], $_POST['marca'], 
                $_POST['modelo'], $_POST['almacen1'], 
                $_POST['almacen2'], $_POST['almacen3'], 
                $_POST['almacen4'], $_POST['existencia'], 
                $_POST['minimo'], $_POST['localizacion'], 
                $_POST['estado'], $_POST['avisado'] 
        ) ) 
    {
      echo 'Falta llenar datos del formulario, '.
               'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
               '<a href="formllantaactualiza.php">Regresar a formulario anterior.</a>';
    } else {
      require_once('../utilerias/login.php');
      
      $numero       = (string) $_POST['numero'];
      $rin          = (int)    $_POST['rin'];
      $marca        = (string) $_POST['marca'];
      $modelo       = (string) $_POST['modelo'];
      $almacen1     = (int)    $_POST['almacen1'];
      $almacen2     = (int)    $_POST['almacen1'];
      $almacen3     = (int)    $_POST['almacen1'];
      $almacen4     = (int)    $_POST['almacen1'];
      $existencia   = (int)    $_POST['existencia'];
      $minimo       = (int)    $_POST['minimo'];
      $localizacion = (string) $_POST['localizacion'];
      $estado       = (string) $_POST['estado'];
      $avisado      = (string) $_POST['avisado'];
         
      $existencia = $almacen1 + $almacen2 + $almacen3 + $almacen4;

      if ($existencia < $minimo){
        $estado = "Pedir";
      } else {
        $estado = ""; 
      }
      
      $conexion     = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
      $query = "UPDATE tblllantas SET numero='$numero', rin='$rin', marca='$marca', ".
               "modelo='$modelo', ".
               "almacen1='$almacen1', ".
               "almacen2='$almacen2', ".
               "almacen3='$almacen3', ".
               "almacen4='$almacen4', ".
               "existencia='$existencia', ".
               "minimo='$minimo', " .
               "localizacion='$localizacion', estado='$estado', ".
               "avisado='$avisado' ".
               "WHERE id='$id'"; 
            
      if (!$conexion) 
      {
        die ('No se pude conectar a MySql: ' .mysql_error()." ".
        mysql_errno());
      } else {
        if (!mysql_select_db(DB_NAME))
        {
          echo 'No se puede seleccionar la base de datos '.
                     " Error: ".mysql_error();
        } else {

            mysql_query($query, $conexion)
              or die ('No se pudo actualizar el registro.');
          
            if (mysql_affected_rows($conexion) == 1) 
            {
             
               echo '<div class="alert alert-success alert-dismissible" role="alert">'.
               '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
               '<span aria-hidden="true">&times;</span></button>'. 
               '<strong>Llanta modificada exitosamente.</strong>'.
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
         '<a href="llantaListado.php" class="alert-link">Listado</a>'.
         '</div>';
  }
?>
		