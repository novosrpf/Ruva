<?php
  
  /**
   * @author Ruben Palos Flores 
   * @copyright 10/06/2017 
   * @version: 1 
   * @Proposito: Formato para dar de alta una llanta en la base 
   * datos.
   */   
   
   require_once('../../utilerias/funcionesBD.php');
   $almacenes = getAlmacenes();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
    <!-- Cargar los archivos externos -->
		<meta charset="UTF-8">
    <!--     <meta http-equiv="refresh" content="5" /> -->
  
    <link rel="stylesheet" 
            type="text/css" 
            href="../../assets/css/estiloAzul.css" >
      
    <link rel="stylesheet" 
            type="text/css" 
            href="../../assets/css/bootstrap.min.css" >

    <script src="../../assets/js/validaciones.js"></script>
     
		<title>Alta de LLantas.</title>
	</head>
	<body role="document">
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h3>Alta de llantas</h3>
      </div> <!-- page-header -->
      <div class="row"> 
        <div class="col-sm-offset-1 col-sm-10">  
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del almac&eacute;n:</h2>
            </div> <!-- panel-heading  -->
            <div class="panel-body">
              <form name="formLlantaAlta" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>">
                <!-- 
                    onsubmit="return validacion();" 
                -->
                <div class="form-group">
                  <label for="numero">Numero:</label>
                  <input  id="numero" 
                          type="text" 
                          class="form-control"
                          name="numero" 
                          size="8"
                          required
                  >
                </div> <!-- form-group  -->
  
                <div class="form-group">
                  <label for="rin">Rin:</label>
                  <input  id="rin" 
                          type="number" 
                          class="form-control"
                          min ="13"
                          max="30"
                          name="rin" 
                          required
                  >
                </div> <!-- form-group  -->
  
                <div class="form-group">
                  <label for="marca">Marca:</label>
                  <input  id="marca" 
                          type="text" 
                          class="form-control"
                          name="marca" 
                          size="50"
                          required
                  >
                </div> <!-- form-group  -->
  
                <div class="form-group">
                  <label for="modelo">Modelo:</label>
                  <input  id="modelo" 
                          type="text" 
                          class="form-control"
                          name="modelo" 
                          size="50"
                          required
                  >
                </div> <!-- form-group  -->
  
                <?php
                  
                 for ($i = 0; $i < sizeof($almacenes); $i++){
                    // Impresion de la etiqueta
                    echo "<div class='form-group'>";
                    echo "<label for='almacen";
                    echo $almacenes[$i][0];
                    echo "'>";
                    echo $almacenes[$i][1];
                    echo "</label>";
                    // impresion del textbox
                    echo "<input  id='almacen";
                    echo $almacenes[$i][0];
                    echo "' ";
                    echo "type='number' class='form-control'";
                    echo "name='almacen";
                    echo $almacenes[$i][0];
                    echo "' ";
                    echo "required>";
                    echo "</div> <!-- form-group  -->"; 
                 }
                ?>
                
                
                
                
                
                
                
                  
                <button type="submit" class ="btn btn-md btn-success pull-left" name="submit">Guardar datos</button>    
              </form> <!-- form -->
            </div> <!-- panel-body  -->
          </div> <!-- panel panel-primary -->
        </div> <!-- col-sm-offset-1 col-sm-10 -->
      </div> <!-- row -->  
    </div> <!-- container theme-showcase -->
  </body> 
</html>

<?php
  if ($_POST)
  {
    if (!isset( $_POST['numero'], $_POST['rin'], $_POST['marca'], $_POST['modelo'],
                 $_POST['almacen1'], $_POST['almacen2'], $_POST['almacen3'], 
                 $_POST['almacen4']) ) 
    {
      echo 'Falta llenar datos del formulario, '.
               'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
               '<a href="formllantaAlta.php">Regresar a formulario anterior.</a>';
    } else {
      require_once('../utilerias/login.php');
      
      $numero   = trim( (string) $_POST['numero']);
      $rin      = (int)          $_POST['rin'];
      $marca    = trim( (string) $_POST['marca']);
      $modelo   = trim( (string) $_POST['modelo']);
      $almacen1 = (int)          $_POST['almacen1'];
      $almacen2 = (int)          $_POST['almacen2'];
      $almacen3 = (int)          $_POST['almacen3'];
      $almacen4 = (int)          $_POST['almacen4'];
      $existencia = $almacen1 + $almacen2 + $almacen3 + $almacen4;

      $conexion     = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
     
      $query = "INSERT INTO tblllantas (numero, rin, marca, modelo, almacen1, almacen2, almacen3, almacen4, existencia) VALUES ('$numero', '$rin', '$marca', '$modelo', '$almacen1', '$almacen2', '$almacen3', '$almacen4', '$existencia')"; 
            
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
              or die ('No se pudo dar de alta el registro.');
          
            if (mysql_affected_rows($conexion) == 1) 
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
      }
    }
    mysql_close($conexion);
    echo '<div class="alert alert-info" role="alert">'.
         '<a href="llantalistado.php" class="alert-link">Listado</a>'.
         '</div>';
  }
  
  
  
/*   
 * <!--
 *               <button class ="btn btn-success" 
 *                       type="submit"/>Guardar</button>  
 *           
 * -->
 *   
            <!--<input type="button" id="enviar" class="cambio" name="enviar_btn" value="Enviar" onclick="validarForm()">
            
             <input type="button" id="limpiar" class="cambio" name="limpiar-btn" value="Limpiar" onclick="limpiarForm()">-->
          
              
            <input type="button" id="enviar" class="cambio" name="enviar_btn" value="Enviar" >
            
            <input type="button" id="limpiar" class="cambio" name="limpiar-btn" value="Limpiar" >
            
            
 * 
 * 
 * 
 */
?>