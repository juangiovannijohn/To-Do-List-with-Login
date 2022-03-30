<?php
include('bd.php');
include('includes/header.php');
 ?>
<!-- Header -->
<!-- Body -->



<div class="container p-4 jgj_body_margin_top">
  <div class="row jgj_responsive_inverse">
    <div class="col-md-4">

      <div class="card mb-1 ">
        <h3 class="text-center card-header  ">Nueva Tarea</h3>
        <div class="card-body">
          <!-- en action se dice a donde se envian los datos del form. y en method se coloca post, para poder recibirlos.-->
          <form class="" action="nueva_tarea.php" method="POST">
            <div class="mb-3">
            <input class="form-control" type="text" name="tarea_titulo" value="" placeholder="Escribir nueva tarea" autofocus>
            </div>
            <div class="mb-3">
            <textarea class="form-control" name="tarea_descripcion" rows="6" placeholder="Escribir descripcion de tarea"></textarea>
            </div>
            <div class="d-grid">
            <input <?php if (!isset($_SESSION['usuario'])) { echo 'disabled'; } ?>  class="btn btn-success " type="submit" name="submit_tarea" value="Enviar">
            </div>
          </form>
        </div>
      </div>
          <!-- mensaje debajo del card -->
      <?php //mensaje de tarea creada borrada o editada
       if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?php echo $_SESSION['message_class'] ?> alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['message']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION["message"]); } //borramos la sesion de mensaje para que no vuelva a aparecer el mensaje una vez cerrado.  ?>
        <!-- FIN  mensaje debajo del card -->
    </div>
    <div class="col-md-8">
      <div class="card mb-3">
        <h3 class="text-center card-header">Listado de Tareas   <?php if (isset($_SESSION['usuario'])) { echo 'de ' . $_SESSION['usuario']['nombre'];} ?></h3>
        <div class="card-body jgj_card_body_padding">
          <div class="table-responsive-md">
            <table id="table_jgj" class="table  table-bordered table-info table-striped table-responsive ">
              <thead class="align-middle">
                <tr>

                  <th scope="col">Titulo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Fecha Creacion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $usuario_id_filtroTabla = $_SESSION['usuario']['user_id'];
                  $query = "SELECT * FROM crud_tareas WHERE user_id = $usuario_id_filtroTabla";
                  $resultadoTabla = mysqli_query($conn, $query);

                  while ($columna = mysqli_fetch_array($resultadoTabla)) {   ?>

                    <tr>

                      <td><?php echo $columna['tarea_titulo']; ?></td>
                      <td><?php echo $columna['tarea_descripcion']; ?></td>
                      <td><?php echo $columna['tarea_tiempo']; ?></td>
                      <td>
                        <?php if (isset($_SESSION['usuario'])) { ?>
                          <a   href="editar_tarea.php?id=<?php echo $columna['tarea_id'];?>"><i class="bi bi-pencil-square btn btn-primary m-1 "></i></a>
                          <a href="borrar_tarea.php?id=<?php echo $columna['tarea_id'];?>"><i class="bi bi-trash btn btn-danger m-1"></i></a>
                        <?php } ?>
                      </td>
                    </tr>

                  <?php  }

                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






















<!-- End Body -->
<!-- Footer -->
<?php include('includes/footer.php'); ?>
