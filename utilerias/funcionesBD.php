<?php
  /**
   * @Proposito: Funciones de base de datos generales 
   * @author Rubén Palos Flores
   * @copyright 10/06/2017
   * @version 1
   * @archivo funBD.php
  */ 

  // Constantes de base de datos
  define("DB_SERVER",   "localhost");
  define("DB_NAME",     "almacen");
  define("DB_USERNAME", "ruben");
  define("DB_PASSWORD", "ruben");
  define("DB_CHARSET", "utf8");
     
  $conexion = null;
  
  
  /* 
  * Realiza la conexion a la base de datos
  */
  function abrirConexion(){
    
    global $conexion;
    
    // conexion al servidor
    $conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($conexion, DB_CHARSET);
  }
  
   
  /* 
    Realiza el cierre de la conexion con la base de datos
  */
  function cerrarConexion(){
   // global $conexion;
    
    mysqli_close($GLOBALS['conexion']);    
  }
  
  
  function getAlmacenes(){
    
    abrirConexion();
    global $conexion;
    $query = "SELECT * FROM tblalmacenes";
    $resultSet = mysqli_query($conexion, $query);
    return $resultSet->fetch_all();
  }

?>