<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion= new Conexion();
$con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
if (isset($_SESSION['logueado'])) 
{

    $sql2 = "SELECT * FROM vuelos";
    $lista3 = $con -> prepare($sql2);
    $lista3 -> execute();
    //filas es un array asociativo 
    $filas3 = $lista3 -> fetchAll();


    echo '<html>
        <head>
            <title>TODO supply a title</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <table class="datos">
                <form action="borrar.php" method="POST">
                    <tr><td>Introduzca el DNI :</td><td><input type="text" name="dni"></input></td></tr>
                                    <tr>
                                        <td align="right">Numero de Vuelo :</td><td>
                                        <div align="left">
                                            <select name="tipo">';
                                            foreach($filas3 as $clave => $valor)
											{
												echo '<option value="'.$valor[0].'">'.$valor[0].'</option>';
											}
                                            echo '</select>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr><td>Fecha:(aa/mm/dd)</td><td><input type="date" name="fecha"></input> </td></tr>
                    <tr><td  colspan="2"><input type="submit" value="Cancelar Reserva" name="Cancelar"></td></tr>
                                    
                </form>
            </table>
        </body>
    </html>';
}

include ('pie.php');