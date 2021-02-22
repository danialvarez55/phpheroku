<?php
require_once 'clases/Conexion.php';
session_start();

if (isset($_REQUEST['iniciar']))// pulsamos el boton login
{
    try
    {
      $obj_conexion= new Conexion();
      $con=$obj_conexion->conectar();//Variable de conexion
      $usuario= htmlspecialchars($_REQUEST['u']);
      $pass= htmlspecialchars(sha1($_REQUEST['p']));//La encriptamos con sha1.
      $sql="SELECT * FROM usuarios_login WHERE usuario=? and pass=?";
      $lista=$con->prepare($sql);
      $lista->execute(array($usuario,$pass));
      //$filas es un array asociativo 
      $filas=$lista->fetchAll();
      if (count($filas)>0){
        $_SESSION['logueado'] =true;
        header("Location: inicio.php");
      }
      else {
      echo '<script>alert("No tenemos nigun usuario registrado con ese nombre y contraseña.");</script>';
      }
    }
    catch (PDOException $e) 
    {
      echo "Fallo en el acceso a la BD" . $e->getMessage();
    }  
}
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="login">
<h1>Login</h1>
<form method="post">
    <input type="text" name="u" placeholder="Username" required="required" />
    <input type="password" name="p" placeholder="Password" required="required" />
    <button type="submit" name="iniciar" class="btn btn-primary btn-block btn-large">Log in.</button>
</form>
</div>
</body>
</html>';