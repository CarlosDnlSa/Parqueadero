<?php

include('db.php');

if (isset($_POST['save_tipo_vehiculo'])) {
  $placa = $_POST['placa'];
  $tipo_vehiculo = $_POST['tipo_vehiculo'];
  $query = "INSERT INTO DarDeAltaVehiculoOficial(Placa, Tipo_vehiculo) VALUES ('$placa', '$tipo_vehiculo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Entrada registrada correctamente';
  $_SESSION['message_type'] = 'Correcto';
  header('Location: DarDeAlta.php');

}

?>
