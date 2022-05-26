<?php
  include './modules/view_dir.php';
  include './modules/create_folder.php';
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
    <!-- INPUT FILE -->
    <header class="col-lg-6 col-sm-6 col-12">
      <form action="./modules/upload.php" method="POST" enctype="multipart/form-data" >
          <div class="input-group">
              <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Browse File <input type="file" name="add_file" style="display: none;" multiple>
                  </span>
              </label>
              <input type="hidden" class="form-control" readonly>
              <button type="submit" name="submit">Add file</button>
          </div>
      </form>
    </header>
    <section class="container col-12">
      <strong><?php echo $msg ?></strong>
    <form action="./modules/create_folder.php" method="POST">
          <input type="text" name="folder_name">
      <input type="hidden" value="directory">
      <input type="submit" value="New folder"></input>
    </form>
    <!-- create folder -->
    <aside d-flex>
    </aside>
    <!-- TABLE OF FILES -->
      <table class="table table-dark w-100 overflow-scroll" >
        <thead>
          <tr>
            <th class="col-sm" scope="col">Name</th>
            <th class="col-sm text-center" scope="col">Label</th>
            <th class="col-sm text-center" scope="col">Size</th>
            <th class="col-sm text-center" scope="col">Modified</th>
          </tr>
        </thead>
        <tbody>
            <?php
              getDirContent("./root/");
            ?>
      </table>
    </section>
  </body>
</html>
