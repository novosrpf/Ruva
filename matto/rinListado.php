<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado de rines (Tamaños)</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="../assets/css/estiloAzul.css" />
      <script src="../assets/js/jquery.js"></script>
  </head>
  <body>   
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="jumbotron">
            <h1>Listado de Rines</h1>
          </div>
          <div id="list"></div>
        </div>
      </div>
      <div class="text-center well">
      </div>
    </div>    
      
    <script>
      $(document).ready(function(){
        $("#list").anexGrid({
          class: 'table-striped table-bordered table-condensed table-hover',
          columnas: [                            
            { leyenda: 'Tamaño',       style: 'width:1140px;',  ordenable: true,  filtro: true,  columna: 'tamano'  },
            { leyenda: 'Editar',       style: 'width:30px;',  ordenable: false, filtro: false, columna: 'editar' }              
          ],
          modelo: [
            { propiedad: 'tamano' }, 
            { formato: function(tr, obj, celda){
              return anexGrid_link({
                class: 'btn-warning btn-xs btn-block',
                contenido: 'Editar',
                href: 'formRinActualiza.php?id=' + obj.id
              });    
            }},                                           
          ],   
          url: 'Rinesdata.php',
          paginable: true,
          filtrable: true,
          limite: [20, 60, 100],
          columna: 'tamano',
          columna_orden: 'ASC'
        });
      })
    </script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.anexgrid.js"></script>
  </body>
</html>