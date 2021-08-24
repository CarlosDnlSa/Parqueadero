<?php

include('db.php');

if (isset($_POST['select_salida'])) {
  $placa = $_POST['placa'];
  $query = "SELECT * FROM RegistrarEntrada WHERE 'Placa' = " + $placa;
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
 

  while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Placa']; ?></td>
      <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Hora_Entrada']; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
          <i class="fas fa-marker"></i>
        </a>
        <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
          <i class="far fa-trash-alt"></i>
        </a>
      </td>
    </tr>
    <?php }

  $_SESSION['message'] = 'Salida registrada correctamente';
  $_SESSION['message_type'] = 'Correcto';
  header('Location: RegistrarSalida.php');

}

?>