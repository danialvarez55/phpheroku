<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
if (isset($_SESSION['logueado'])) 
{
    if(isset($_REQUEST['Cancelar']))
	{
		try
		{ 
            //Variable  DNI:
            $DNI = htmlspecialchars($_REQUEST['dni']);
            //Variable  introducir  fecha:
            $fecha = htmlspecialchars($_REQUEST['fecha']);
            //Variable tipo vuelo:
			$tipo_vuelo = htmlspecialchars($_REQUEST['tipo']);
            
            $sql1 = "DELETE FROM reservas WHERE DNI=? AND Fecha=? AND Tipo=?";
            $lista2 = $con -> prepare($sql1);
            $lista2 -> execute(array($DNI,$fecha,$tipo_vuelo));
           
            echo '<script>alert("Se ha borrado la reserva correctamente.");</script>';
            echo '<a href="formulariocancelar.php"><p>Volver a cancelar una reserva.</p></a>';
		}
		catch (PDOException $e)
      	{
            print "Fallo en la inserción." . $e->getMessage();
        }
	}
}
include ('pie.php');