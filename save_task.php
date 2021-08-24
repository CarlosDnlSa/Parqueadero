<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $placa = $_POST['placa'];
  $query = "INSERT INTO RegistrarEntrada(Placa) VALUES ('$placa')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Entrada registrada correctamente';
  $_SESSION['message_type'] = 'Correcto';
  header('Location: RegistrarEntrada.php');

}

?>
