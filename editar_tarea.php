<?php
include('bd.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM crud_tareas WHERE tarea_id = $id";
  $resultado_edit = mysqli_query($conn, $query);

  if (mysqli_num_rows($resultado_edit) == 1) {

    $fila = mysqli_fetch_array($resultado_edit);
    $titulo = $fila['tarea_titulo'];
    $descripcion = $fila['tarea_descripcion'];
  }
}
//codigo de edicion de POST
if (isset($_POST['edit'])) {
  $idTarea = $_GET['id'];
  $tituloTarea = $_POST['titulo'];
  $descripcionTarea = $_POST['descripcion'];

$query = "UPDATE crud_tareas set tarea_titulo = '$tituloTarea', tarea_descripcion = '$descripcionTarea' WHERE tarea_id = $idTarea";
$result = mysqli_query($conn, $query);

//creamos la alerta para que se vea el mensaje de tarea editada correctamente
$_SESSION['message'] = 'La tarea ha sido modificada satisfactoriamente';
$_SESSION['message_class'] = 'success';
header("Location: index.php ");
}
include('includes/header.php');

?>
<!-- HTML -->
<div class="container-md mt-4">
  <div class="row justify-content-md-center">
    <div class="col-md-4">
      <h3 class="text-center ">Editar Tarea</h3>
      <div class="card card-body" >

        <form class="" action="editar_tarea.php?id=<?php echo $_GET['id'];  ?>" method="POST">


          <div class="mb-3">
            <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>"  placeholder="Editar titulo">
          </div>
          <div class="mb-3">
            <textarea class="form-control" name="descripcion" placeholder="Editar descripcion" rows="6"><?php echo $descripcion; ?></textarea>
          </div>
          <div class="d-grid">
          <button class="btn btn-success" name="edit" type="submit">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>






<?php include('includes/footer.php'); ?>
