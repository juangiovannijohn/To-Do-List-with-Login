<?php
//iniciamos sesion para guardar informacion de usuarios
session_start();

//conexion a base de datos 
$conn = mysqli_connect(
  'localhost',
  'root',
  'root',
  'crud_usuarios_restriccion'
);
