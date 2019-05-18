<?php
  require_once '../utilerias/anexgrid.php';
  
  try
  {
    $anexGrid = new AnexGrid();
  
    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";
    
    foreach($anexGrid->filtros as $f)
    {
      if($f['columna'] == 'descripcion') $wh .= " AND descripcion LIKE '%" . addslashes ($f['valor']) . "%'";
    }
    
    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=almacen;host=localhost;charset=utf8", "ruben", "ruben" );
    
    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT * FROM tblmarcas
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
     );
    
    $total = $db->query("
        SELECT COUNT(*) Total
        FROM tblmarcas
        WHERE $wh
    ")->fetchObject()->Total;
    
    header('Content-type: application/json');
    print_r($anexGrid->responde($registros, $total));    
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>