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

      <!-- ADD TASK FORM -->
      <div class="w-full max-w-xs align-content: center">
        <form action="save_tipo_vehiculo.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="Placa">
        Placa
      </label>
      <input name= "placa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ingresa la placa">
      <label for="cars">Tipo vehiculo:</label>
      
      <select class="w-full border bg-white rounded px-3 py-2 outline-none" name= "tipo_vehiculo">
    <option class="py-1">Oficial</option>
    <option class="py-1">Residencia</option>
    <option class="py-1">No residencial</option>
</select>


    </div>
          <input type="submit" name="save_tipo_vehiculo" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Registrar Entrada">
        </form>
      </div>
    </div>
    <div class="col-md-8">

    <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Placa
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tipo vehiculo
              </th>
            
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200">
           
          <?php
          $query = "SELECT * FROM DarDeAltaVehiculoOficial";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Placa']; ?></td>
            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Tipo_vehiculo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


     
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
