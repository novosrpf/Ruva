<?php
  require('conexion.php');
  require('fpdf/fpdf.php');

  $query = "SELECT id, numero, rin, marca modelo, existencia FROM llantas";
  $resultado = $mysqli->query($query);
  
  
  

?>