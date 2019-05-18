<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado de llantas (Mantenimiento)</title>
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
          <h1>Listado de llantas.</h1>
          <div id="list"></div>
        </div>
      </div>
      <div class="text-center well">
      <!--   -->
      </div>
    </div>
        
    <script>
      $(document).ready(function(){
        $("#list").anexGrid({
          class: 'table-striped table-bordered table-condensed table-hover',
          columnas: [                            
            { leyenda: 'Numero',       style: 'width:60px;',  ordenable: true,  filtro: true,  columna: 'numero'  },
            { leyenda: 'Rin',          style: 'width:30px;',  ordenable: true,  filtro: true,  columna: 'rin' },
            { leyenda: 'Marca',        style: 'width:100px;', ordenable: true,  filtro: true,  columna: 'marca' },
            { leyenda: 'Modelo',       style: 'width:100px;', ordenable: true,  filtro: true,  columna: 'modelo' },
            { leyenda: 'Existencia',   style: 'width:30px;',  ordenable: false, filtro: false, columna: 'existencia' },
            { leyenda: 'Minimo',       style: 'width:100px;', ordenable: false, filtro: false, columna: 'minimo' },
            { leyenda: 'Localizacion', style: 'width:150px;', ordenable: false, filtro: false, columna: 'localizacion' },
            { leyenda: 'Estado',       style: 'width:40px; ', ordenable: true,  filtro: true,  columna: 'estado' },
            { leyenda: 'Avisado',      style: 'width:40px;',  ordenable: true,  filtro: true,  columna: 'avisado' },
            { leyenda: 'Editar',       style: 'width:50px;',  ordenable: false, filtro: false, columna: 'editar' }              
          ],
          modelo: [
            { propiedad: 'numero' },
            { propiedad: 'rin', class: 'text-right' },
            { propiedad: 'marca' },
            { propiedad: 'modelo' },
            { propiedad: 'existencia', class: 'text-right' },
            { propiedad: 'minimo',     class: 'text-right' },
            { propiedad: 'localizacion' },
            { propiedad: 'estado', style: 'color: red; font-weight: bold' },
            { propiedad: 'avisado' },
 
            { formato: function(tr, obj, celda){
              return anexGrid_link({
                class: 'btn-warning btn-xs btn-block',
                contenido: 'Editar',
                href: 'formLlantaActualiza.php?id=' + obj.id
              });    
            }},                                           
          ],   
          
          url: 'llantasData.php',
          paginable: true,
          filtrable: true,
          limite: [20, 60, 100],
          columna: 'numero',
          columna_orden: 'ASC'
        });
      })
    </script>
        
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.anexgrid.js"></script>
  </body>
</html>