

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
    <script src="main.js" defer></script>
  </head>
  <body>
    <?php
      include './modules/layout/nav.php';
    ?>
    <!-- INPUT FILE -->
    <header class=" container col-8 mt-3">
      <form action="./modules/upload.php" method="POST" enctype="multipart/form-data" >
          <div class="input-group">
              <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Browse File <input id="inputFile" type="file" name="add_file" style="display: none;" multiple>
                  </span>
              </label>
              <!-- <input type="file" class="custom-file-input" id="inputGroupFile01"
                  aria-describedby="inputGroupFileAddon01"> -->
              <label class="custom-file-label form-control" readonly id="labelFile" for="file">Name file</label>
              <!-- <input type="text" class="form-control" readonly> -->
              <button class="btn btn-success" type="submit" name="submit">Add file</button>
          </div>
      </form>
    </header>
    <!-- TABLE OF FILES -->
    <section class="container col-8 mt-3">
      <table class="table table-striped w-100">
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
            include './modules/view_dir.php';
          ?>
      </table>
    </section>
  </body>
</html>
