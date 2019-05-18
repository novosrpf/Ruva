<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Cargar los archivos externos -->
    <meta charset="UTF-8">
    
    <!--     <meta http-equiv="refresh" content="5" /> -->
  
    <link rel="stylesheet" 
          type="text/css" 
              href="../assets/css/bootstrap.min.css" >
        
    
    <!--
    <script src="../assets/js/funciones.js"></script>-->
      
      
     
	<title>Alta de Entrada.</title>
  </head>
  
  <body role="document">
    <div class="container theme-showcase"  role="main">
      <div class="page-header">
        <h3>Alta de entradas</h3>
      </div> <!-- page-header -->
      
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">Datos entrada:</h2>
          </div> <!-- container -->
          <div class="panel-body">
            <form method="post" action="">
              <div class="form-group">
                <label for="fechaEntrada"	class="etiq">Fecha:</label>
                <input  id="fechaEntrada" 
                        type="date" 
                        class="textbox"
                        name="fechaEntrada" 
                        size="10"
                >
                <br /><br />
              </div>
              
              <div class="form-group">
                <label  for="almacenEntrada"	class="etiq">Almacen:</label>
                
                <select name="almacenEntrada">
                  <option selected value="0"> Elige una opción </option>
                  <option value="1">Almacen</option> 
                  <option value="2">Casa</option> 
                  <option value="3">Petroleos</option>
                  <option value="4">Ventas</option> 
                </select>
                <br /><br />
              </div>
              
              <div class="form-group">
                <label for="tablaEntradas">Entradas:
                  <div class="btn btn-success" id="btnNuevaEntrada">Nueva</div>
                </label>
                
                <table class="table table-bordered table-hover" id="tablaEntradas">
                  <tr>
                    <th>Numero</th>
                    <th>Rin</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Opciones</th>
                  </tr>
                  <tr>
                    <td>Numero</td>
                    <td>Rin</td>
                      <td>Descripcion</td>
                    <td>
                      <input  id="cantidadEntrada" 
                      type="number" 
                      min = "0"
                      class="form-control"
                      name="cantidadEntrada[]" 
                      placeholder="Escriba la cantidad." 
                      maxlength="50" 
                      >
                    </td>
                    <td class="text-center">
                      <div class="btn btn-primary">Buscar</div>                       
                      <div class="btn btn-danger">Eliminar</div>
                    </td>
                  </tr>
                </table>
              </div> <!-- form-group -->  
              <button type="submit" class ="btn btn-md btn-success pull-left">Guardar datos</button>      
            </form> 
          </div> <!-- panel body -->
        </div> <!-- panel primary -->
      </div> <!-- row -->
    </div > <!-- container -->
    
    <!--  value="<?php echo date("d/m/Y"); ?>"  -->
    
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/funcEntrada.js"></script>
    
    
  </body>
</html>
