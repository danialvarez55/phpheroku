<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
if (isset($_SESSION['logueado'])) 
{
		$sql1 = "SELECT * FROM vuelos";
		$lista1 = $con -> prepare($sql1);
		$lista1 -> execute();
		//filas es un array asociativo 
		$filas1 = $lista1 -> fetchAll();
		
		print'<!DOCTYPE html>
			<html>
			<head>
			</head>
			<body>
				<table class="datos">
					<form action="reservar.php" method="POST">
						<tr><td>DNI:</td><td><input type="text" name="dni"></input></td></tr>
						
						<tr>
											<td align="right">Numero de Vuelo :</td><td>
											<div align="left">
												<select name="tipo">';
												foreach($filas1 as $clave => $valor)
												{
													echo '<option value="'.$valor[0].'">'.$valor[0].'</option>';
												}
												echo '</select>
											</div>
										</td>
										</tr>
										<tr><td>Fecha: (aa/mm/dd)</td><td><input type="date" name="fecha"></input></td></tr>  
						<tr><td colspan="2">Elije la clase del pasaje:</td></tr>
						<tr><td>Business: <input type="radio" name="tipo1" value="1"></td><td>Turista: <input type="radio" name="tipo1" value="2" checked></td></tr>
						<tr><td colspan="2"><input type="submit" value="Reservar" name="Reservar"></td></tr>
					</form>
				</table>
			</body>
		</html>';
}
include ('pie.php');