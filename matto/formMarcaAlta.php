<!DOCTYPE html>
<html lang="es">
	<head>
    <!-- Cargar los archivos externos -->
		<meta charset="UTF-8">
    <!--     <meta http-equiv="refresh" content="5" /> -->
  
        <link rel="stylesheet" 
              type="text/css" 
              href="../assets/css/estiloAzul.css" >
        
        <link rel="stylesheet" 
              type="text/css" 
              href="../assets/css/bootstrap.min.css" >

        <script src="../assets/js/funciones.js"></script>
     
		<title>Alta de Marcas.</title>
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
            <h2>Alta de Marcas.</h2>
          </div>
          <div class="panel-body">

            <!-- Campos necesarios para el formulario -->
            <fieldset>  
              <label  for="marcaDescripcion"	class="etiq">Marca:</label>
              <input  id="marcaDescripcion" 
                      type="text" 
                      class="textbox"
                      name="marcaDescripcion" 
                      placeholder="Escriba la marca." 
                      maxlength="50" 
              >
              <br /><br />
           
              <button class ="btn btn-success" 
                      type="submit"/>Guardar</button>    
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
    if (!isset( $_POST['marcaDescripcion'] ) ) 
    {
      echo 'Falta llenar datos del formulario, '.
               'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
               '<a href="formactualizallanta.php">Regresar a formulario anterior.</a>';
    } else {
      require_once('../utilerias/login.php');
      
      $marcaDescripcion = trim( (string) $_POST['marcaDescripcion']);

      $conexion     = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
      $query = "INSERT INTO tblmarcas (descripcion) VALUES ('". $marcaDescripcion. "')"; 
            
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
               '<strong>Marca modificada exitosamente.</strong>'.
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
         '<a href="marcalistado.php" class="alert-link">Listado</a>'.
         '</div>';
  }
?>