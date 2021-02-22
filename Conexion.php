<?php
//include, require, include_once y require_once
//en general las 4 funciones hacen lo mismo, importar en un documento php, funciones o variables de otros documentos escritos en php
//include: mostrara un warning y continuara con la ejecucion
//require: mostrara un fatal error y parara la ejecucion
//La función require_once, include_once: se comporta de manera similar a require,include, con la única diferencia
// que si el código ha sido ya incluido, no se volverá a incluir.
require_once 'webconfig.php';  
  
class Conexion  
{  
  public  $dns       = DNS;  
  public  $username  = USERNAME;  
  public  $password  = PASSWORD;  
  
      
  public function __construct() { 
                   
    }  
  public function conectar()
    { 
     
            
      try {             
          $base = new PDO($this->dns, $this->username, $this->password);
          $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          //echo 'Se ha establecido Conexion ';
          return $base;
      }catch (PDOException $e) {
          echo "Fallo la conexión" . $e->getMessage();
          
      }  
 
}//funcion conectar
} //class  

?>

		