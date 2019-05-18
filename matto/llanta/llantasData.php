<?php
  require_once '../utilerias/anexgrid.php';
  try
  {
    $anexGrid = new AnexGrid();
  
    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";
    
    foreach($anexGrid->filtros as $f)
    {
        if($f['columna'] == 'numero')      $wh .= " AND numero LIKE     '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'rin')         $wh .= " AND rin LIKE        '"  . addslashes ($f['valor']) . "'" ;
        if($f['columna'] == 'marca')       $wh .= " AND marca LIKE      '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'existencia')  $wh .= " AND existencia LIKE '"  . addslashes ($f['valor']) . "'" ;
        if($f['columna'] == 'modelo')      $wh .= " AND modelo LIKE     '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'estado')      $wh .= " AND estado LIKE     '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'avisado')     $wh .= " AND avisado LIKE    '%" . addslashes ($f['valor']) . "%'";
         
    }
    
    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=testlistado;host=localhost;charset=utf8", "ruben", "ruben" );
    
    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT * FROM tblllantas
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
     );
    
    $total = $db->query("
        SELECT COUNT(*) Total
        FROM tblllantas
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