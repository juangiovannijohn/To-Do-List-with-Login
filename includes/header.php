<!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- DataTable -->
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <!-- Juan CSS -->
    <link rel="stylesheet" href="css/style.css">

     <title>CRUD de Juan</title>
   </head>
   <body>
     <nav class="navbar  navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          Crud Juan
        </a>
        <div class="dropdown dropstart nav justify-content-end">
          <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <?php //mostrar u ocultar el item si el usuario esta conectado o no
            if (!isset($_SESSION['usuario'])) { ?>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="includes/login.php">Iniciar Sesion</a></li>
          <?php } ?>
          <?php //mostrar u ocultar el item si el usuario esta conectado o no
            if (isset($_SESSION['usuario'])) { ?>
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#">Desconectarse</a></li>
          <?php } ?>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#signinModal" href="#">Registro</a></li>
          </ul>
          <?php //Mostrar el nombre del usuario en el menu.
          if (isset($_SESSION['usuario'])) { ?>
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link active" href="#"><?php echo $_SESSION['usuario']['nombre'];  ?></a>
                </li>
              </ul>
          <?php } ?>
        </div>
      </div>

    </nav>

<?php if (!isset($_SESSION['usuario'])) { ?>
    <div class="alert alert-secondary alert-dismissible fade show mb-0" role="alert">
      <p class="mb-0">Para editar debe Iniciar Sesion o Crear un Usuario  </p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
    <?php
     if(isset($_SESSION['mensaje'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['registro_class'] ?> alert-dismissible fade show mb-0" role="alert">
        <?php if (isset($_SESSION['usuario'])) {
          echo 'Bienvenido '.$_SESSION['usuario']['nombre'].'. ';
        } ?>
        <?php echo $_SESSION['mensaje']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION["mensaje"]); } //borramos los datos en sesion para que no se vuelva a cargar el mensaje verde  ?>



    <!-- Modal-es login  -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTituloLogin">CRUD Juan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <main class="form-signin">
              <form class="" method="post" name="form_login" action="login.php" id="">
              <!--  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal text-center">Iniciar Sesion</h1>

                <div class="form-floating mb-4">
                  <input type="email" name="input_email_login" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Correo Electrónico</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="password" name="input_password_login" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="w-100 btn btn-lg btn-success" name="login_submit" type="submit">Iniciar Sesion</button>
              </form>
            </main>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal-es logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Desea Cerrar Sesión?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="" action="logout.php" method="post">
              <div class="d-grid">
                <input class="btn btn-warning" type="submit" name="logout_submit" value="Cerrar Sesión">
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- Modal-es register -->
    <div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CRUD Juan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <main class="form-signin">
              <form class="was-validated" method="post" name="form_register" action="signup.php" id="">
              <!--  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal text-center">Crear una cuenta</h1>

                <div class="form-floating mb-4">
                  <input required type="text" name="input_name_signup" class="form-control" id="floatingInput" placeholder="Nombre Completo">
                  <label for="floatingInput">Nombre y Apellido</label>
                </div>
                <div class="form-floating mb-4">
                  <input required type="email" name="input_email_signup" class="form-control" id="floatingInput" placeholder="email@email.com">
                  <label for="floatingInput">Correo Electrónico</label>
                </div>
                <div class="form-floating mb-4">
                  <input required type="password" name="input_password_signup" class="form-control" id="input_password_signup" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-2">
                  <input required type="password" name="input_password_signup" class="form-control" id="input_confirm_password_signup" placeholder="Password">
                  <label for="floatingPassword">Confirmar Password</label>
                </div>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Recuerdame
                  </label>
                </div>
                <button name="register_submit" class="w-100 btn btn-lg btn-success" type="submit">Crear Cuenta</button>
              </form>
          </div>
        </div>
      </div>
    </div>
