<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();
if (isset($_SESSION['logueado'])) 
{
  if(isset($_REQUEST['Ver']))
	{
		try
		{
      //Variable introducir fecha:
      $fecha = htmlspecialchars($_REQUEST['fecha']);
      //Variable numero de vuelo:
      $num_vuelo = htmlspecialchars($_REQUEST['tipo']);
      
            
      $sql3 = "SELECT * FROM vuelos WHERE Num_Vuelo=?";
      $lista = $con -> prepare($sql3);
      $lista -> execute(array($num_vuelo));
      //Filas array asociativo
      $fila = $lista -> fetchAll();
      
      
      $business=0;
      $turista=0;

      
      $sql4 = "SELECT * FROM reservas WHERE Num_Vuelo=? AND Fecha=?";
      $reserva = $con -> prepare($sql4);
      $reserva -> execute (array ($num_vuelo, $fecha));
      $fila1 = $reserva-> fetchAll();

  
      foreach ($fila1 as $clave => $valor)

      {
        if("Business" == $valor[3]){

          $business++;

        }else{

          $turista++;
        }
       
      }

      echo '<h1> Plazas libres en: '.$num_vuelo.' Para el Día '.$fecha.'</h1>';
      echo '<table>
      <tr> 
        <th>Turista</th>
        <th>Business</th>
      </tr>';
      foreach ($fila as $clave1 => $valor1)
      {
        $operacionturista =$valor1[5]-$turista;
        $operacionbusiness =$valor1[6]-$business;
        echo '<tr>';
        echo  '<td>'.$operacionturista.'</td>';
        echo  '<td>'.$operacionbusiness.'</td>';
        echo '</tr>';
      }
      echo '</table>';

    }catch (PDOException $e){
     
      print "Fallo en la inserción." . $e->getMessage();
  }

	}
}
include('pie.php');