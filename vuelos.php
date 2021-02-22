<?php
session_start();
require_once ('head.php');
require_once 'clases/Conexion.php';
$obj_conexion = new Conexion(); //Conexion a la BD
$con = $obj_conexion -> conectar();
if (isset($_SESSION['logueado'])) 
{
    try
    {   

        //Consulta que hacemos sobre vuelos
        $sqlls = "SELECT * FROM reservasvuelos.vuelos;";
        $listado = $con -> prepare($sqlls);
        $listado -> execute();

        //filas del array 
        $filas = $listado -> fetchAll();
        echo '<table>
        <tr> 
        <th>Num_Vuelo</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Hora_Salida</th>
        <th>Modelo_Avión</th>
        <th>Num_Plazas_Turista</th>
        <th>Num_Plazas_Business</th>
        </tr>';

        // La Variable valor es otro array
        // CUIDADO CON LOS VALORES!
        foreach ($filas as $clave => $valor)
        {
            echo '<tr>';
                echo   '<td>'.$valor[0].'</td>';
                echo   '<td>'.$valor[1].'</td>';
                echo   '<td>'.$valor[2].'</td>';
                echo   '<td>'.$valor[3].'</td>';
                echo   '<td>'.$valor[4].'</td>';
                echo   '<td>'.$valor[5].'</td>';
                echo   '<td>'.$valor[6].'</td>';
            echo '</tr>';
        }

    
    }
    catch (PDOException $e)
    {
        print "Fallo en la inserción" . $e->getMessage();
    }
}
include('pie.php');


