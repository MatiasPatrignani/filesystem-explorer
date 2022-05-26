<?php
  include './modules/view_dir.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>FileManager</title>
  </head>
  <body>
    <?php
      include './modules/layout/nav.php';
    ?>
    <div class="col-2">
      <aside>
        <form action="./modules/upload.php" method="POST" enctype="multipart/form-data" >
          <input type="file" name="add_file">
          <button type="submit" name="submit">Add file</button>
        </form>
      </aside>
    </div>
    <section class="container col-12">
      <table class="table table-dark w-100">
        <thead>
          <tr>
            <th class="col-sm" scope="col">Name</th>
            <th class="col-sm" scope="col">Label</th>
            <th class="col-sm" scope="col">Size</th>
            <th class="col-sm" scope="col">Modified</th>
          </tr>
        </thead>
        <tbody>
            <?php 
              
              getDirContent("./root/");
            ?>
          
        </tbody>
  </table>
    </section>
    <!-- <nav>
      <form action="./root/" method="POST">
      <input type="text" name="search" />
      </form>
    </nav> -->
  </body>
</html>
