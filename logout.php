<?php
include('bd.php');
include('../includes/header.php');

if (isset($_POST['logout_submit'])) {

//cerramos sesion de usuario
  unset($_SESSION["usuario"]);

//creamos mensaje de sesion cerrada correctamente
  $_SESSION['mensaje'] = 'Has CERRADO sesion correctamente';
  $_SESSION['registro_class'] = 'warning';
  header("Location: index.php");
  exit;
}







 ?>
