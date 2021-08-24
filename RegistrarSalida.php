<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      

     


      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
    
      <form action="" method="post">
<input type="text" name="search" placeholder="Placa ">
<input type="submit" name="submit" value="Buscar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
</form>


    <?php

          $search_value=$_POST["search"];
          $query = "SELECT *
          FROM RegistrarEntrada
          INNER JOIN DarDeAltaVehiculoOficial
          ON RegistrarEntrada.Placa = DarDeAltaVehiculoOficial.Placa WHere DarDeAltaVehiculoOficial.Placa =  '$search_value' ";
          $result_tasks = mysqli_query($conn, $query);    
          date_default_timezone_set('America/Los_Angeles');    
          $hourMin =date('m/d/Y h:i:s a', time());
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>

<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
  <div>
    <h2 class="text-gray-800 text-3xl font-semibold">Placa: <?php echo $row['Placa']; ?></h2>
  
    <?php
if ($row['Tipo_vehiculo'] == "Oficial") { ?>
  <p class="mt-2 text-gray-600">Hora entrada  <?php echo $row['Hora_Entrada']; ?></p>
  <p class="mt-2 text-gray-600">Hora Salida: <?php echo $hourMin ?></p>
  <?php } ?>


  <?php
if ($row['Tipo_vehiculo'] == "Residencia") { ?>

  <p class="mt-2 text-gray-600">Hora entrada  <?php echo $row['Hora_Entrada']; ?></p>
  <p class="mt-2 text-gray-600">Diferencia: <?php echo $diff ?></p>
  <?php } ?>


  <?php
if ($row['Tipo_vehiculo'] == "No residencial") { ?>
  <p class="mt-2 text-gray-600">Total cobrar:  <?php echo $row['Hora_Entrada']; ?></p>
  <?php } ?>


   
  </div>
  
</div>
        
          <?php } ?>
    

    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
