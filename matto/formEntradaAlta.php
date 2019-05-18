<!DOCTYPE html>
<html lang="es">
	<head>
    <!-- Cargar los archivos externos -->
		<meta charset="UTF-8">
    <!--     <meta http-equiv="refresh" content="5" /> -->
  
       <!-- <link rel="stylesheet" 
              type="text/css" 
              href="../assets/css/estiloAzul.css" >
        
        <link rel="stylesheet" 
              type="text/css" 
              href="../assets/css/bootstrap.min.css" >

        <script src="../assets/js/funciones.js"></script>-->
      
      
     
		<title>Alta de Entrada.</title>
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
            <h2>Alta de Entradas.</h2>
          </div>
          <div class="panel-body">

            <!-- Campos necesarios para el formulario -->
            <fieldset>
               
              <label  for="fechaEntrada"	class="etiq">Fecha:</label>
              <input  id="fechaEntrada" 
                      type="date" 
                      class="textbox"
                      name="fechaEntrada" 
                      size="10"
              >
               <!--  value="<?php echo date("d/m/Y"); ?>"  -->
              <br /><br />
              
              <label  for="almacenEntrada"	class="etiq">Almacen:</label>
              <select name="almacenEntrada">
                <option selected value="0"> Elige una opción </option>
                <option value="1">Almacen</option> 
                <option value="2">Casa</option> 
                <option value="3">Petroleos</option>
                <option value="4">Ventas</option> 
              </select>

              <br /><br />
              
              <label  for="articuloEntrada"	class="etiq">Articulo:</label>
              <input  id="articuloEntrada" 
                      type="text" 
                      class="textbox"
                      name="articuloEntrada" 
                      placeholder="Escriba el articulo." 
                      maxlength="50" 
              >
              <br /><br />
              
              <label  for="cantidadEntrada"	class="etiq">Cantidad:</label>
              <input  id="cantidadEntrada" 
                      type="number" 
                      min = "0"
                     
                      class="textbox"
                      name="cantidadEntrada" 
                      placeholder="Escriba la cantidad." 
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
    if (!isset( $_POST['fechaEntrada'], $_POST['almacenEntrada'], 
               $_POST['articuloEntrada'], $_POST['cantidadEntrada'] 
        ) ) 
    {
      echo 'Falta llenar datos del formulario, '.
               'favor de regresar con el siguiente enlace y llenear los datos';
      echo '<br />'.
               '<a href="formEntradaAlta.php">Regresar a formulario anterior.</a>';
    } else {
             
      $fechaEntrada = $_POST['fechaEntrada'];
      $fechaEntrada = date("d/m/Y", strtotime("$fechaEntrada"));
      $almacenEntrada = (int) $_POST['almacenEntrada'];
      $articuloEntrada = (int)  $_POST['articuloEntrada'];
      $cantidadEntrada = (int) $_POST['cantidadEntrada'];
      
      // Preparar una consulta para traer los valores de ese articulo y setearlos
      
      
      // Llegada de los valores por medio de la consulta.
      $almacen1 = 0;
      $almacen2 = 0;
      $almacen3 = 0;
      $almacen4 = 0;
          
      switch ($almacenEntrada){
          
        case 1: $almacen1 = $almacen1 + $cantidadEntrada;
                break;
        case 2: $almacen2 = $almacen2 + $cantidadEntrada;
                break;
        case 3: $almacen3 = $almacen3 + $cantidadEntrada;
                break;
        case 4: $almacen4 = $almacen4 + $cantidadEntrada;
                break;        
      }
    }
         
      $existencia = $almacen1 + $almacen2 + $almacen3 + $almacen4;
      echo "Almacen1 = ".$almacen1."<br>";
      echo "Almacen2 = ".$almacen2."<br>";
      echo "Almacen3 = ".$almacen3."<br>";
      echo "Almacen4 = ".$almacen4."<br>";
      echo "Existencia = ".$existencia."<br>";
    }

      

    



?>