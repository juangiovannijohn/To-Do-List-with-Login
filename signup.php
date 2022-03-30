<?php
include('bd.php');

if (isset($_POST['register_submit'])) {
  if (!empty($_POST['input_name_signup']) && !empty($_POST['input_email_signup']) && !empty($_POST['input_password_signup']) ) {


  $user_name = strval($_POST['input_name_signup']);
  $user_email = $_POST['input_email_signup'];
  $pas_str = strval($_POST['input_password_signup']);
  $user_pass =  password_hash($pas_str, PASSWORD_BCRYPT);

  $query = "INSERT INTO crud_usuarios(`user_name`, `user_email`, `user_password`) VALUES ('$user_name','$user_email','$user_pass')";

  $result =  mysqli_query($conn, $query);


  if(!$result){
    die('El registro falló');
  };

//creamos la alerta para que se vea el mensaje de usuario creado correctamente
  $_SESSION['mensaje'] = 'El usuario ha sido registrado correctamente. Por favor inicie sesion';
  $_SESSION['registro_class'] = 'success';
  header("Location: index.php ");
  exit;
}}
 ?>
