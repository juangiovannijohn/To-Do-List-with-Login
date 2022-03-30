//DataTable
var dataTable = new DataTable("#table_jgj",{
  perPage: 3,
  perPageSelect: [3, 6, 9, 12, 15],
  labels: {
      placeholder: "Buscar...",
      perPage: "{select} tareas por página",
      noRows: "No se encuentran tareas",
      info: "Mostrando {start} desde {end} de {rows} tareas",
  }
});

//Formularios
var password = document.getElementById("input_password_signup")
, confirm_password = document.getElementById("input_confirm_password_signup");

function validatePassword(){
if(password.value != confirm_password.value) {
  confirm_password.setCustomValidity("Los password no coinciden");
} else {
  confirm_password.setCustomValidity('');
}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
