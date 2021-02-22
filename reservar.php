<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
if (isset($_SESSION['logueado'])) 
{
    if(isset($_REQUEST['Reservar']))
	{
		try 
		{ 
            //Variable DNI:
            $DNI = htmlspecialchars($_REQUEST['dni']);
            //Variable tipo de vuelo:
            $tipo_vuelo = htmlspecialchars($_REQUEST['tipo']);
            //Variable tipo de pasajero:
            $tipo_pasajero = htmlspecialchars($_REQUEST['tipo1']);
            //Variable introducir fecha:
            $fecha = htmlspecialchars($_REQUEST['fecha']);
            
			if($tipo_pasajero = 1)
			{
				$pasajero = "Business";
			}
			else
			{
				$pasajero = "Turista";
            }
            // Sentencia SQL:
            $sql2 = "INSERT INTO reservas (DNI,Num_Vuelo,Fecha,Tipo) VALUES (?,?,?,?)";
            //Preparamos:
            $listado2 = $con -> prepare($sql2);
            //Ejecutamos:
            $listado2 -> execute(array($DNI,$tipo_vuelo,$fecha,$tipo_pasajero));
            //Sacamos un aviso por pantalla si está bien introducida:
            echo '<script>alert("Se ha introducido correctamente.");</script>';
            echo '<a href="formularioReservar.php"><p>Volver a introducir una nueva reserva.</p></a>';
		}
		catch (PDOException $e)
      	{
            print "Fallo en la inserción." . $e->getMessage();
        }
	}
}