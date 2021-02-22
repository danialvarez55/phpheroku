<?php
session_start();
if (isset($_SESSION['logueado'])){
    include('head.php');
    echo '<p><center><img src="imagenes/aviones.jpg" alt="Imagen de un avión" height = "350" width="800"></center></p>';
}
else {
    include('pie.php');
}






