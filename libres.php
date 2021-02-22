<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();// variable la conexion
if (isset($_SESSION['logueado'])) 
{
    $sql5 = "SELECT * FROM vuelos";
    $listado5 = $con -> prepare($sql5);
    $listado5 -> execute();
    //Filas es un array asociativo 
    $filas5 = $listado5 -> fetchAll();


    echo '<html>
        <head>
            <title>TODO supply a title</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <form action="listar.php" method="POST">
                    <table class="datos">
                
                    
                                    <tr>
                                        <td align="right">Numero de Vuelo :</td><td>
                                    
                                            <select name="tipo">';
                                            foreach($filas5 as $clave => $valor)
											{
												echo '<option value="'.$valor[0].'">'.$valor[0].'</option>';
											}
                                            echo '</select>
                                        
                                    </td>
                                    </tr>
                                    <tr><td>Fecha:(aa/mm/dd)</td><td><input type="date" name="fecha"></input> </td></tr>
                    
                                    
                
            </table>
                    <center>
                        <br><input type="submit" value="Ver" name="Ver">
                    </center>
            </form>
                    
        </body>
    </html>';
}
include ('pie.php');

