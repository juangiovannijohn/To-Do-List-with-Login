<?php
include('bd.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM crud_tareas WHERE tarea_id = $id";
  $resultado_delete = mysqli_query($conn, $query);

  if (!$resultado_delete) {
    die('Eliminación Fallida');
  }

//creamos la alerta para que se vea el mensaje de tarea eliminada correctamente
  $_SESSION['message'] = 'Tarea eliminada satisfactoriamente';
  $_SESSION['message_class'] = 'danger';
  header("Location: index.php ");

}





 ?>
