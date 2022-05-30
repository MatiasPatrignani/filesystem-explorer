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
    <link rel="stylesheet" href="./src/main.css">
    <title>FileManager</title>
    <script src="main.js" defer></script>
  </head>
  <body>
    <main class="main m-3">
        <?php
          include './modules/layout/nav.php';
        ?>

          
          <!-- INPUT FILE -->
          <header class=" container col-8 mt-5 d-flex flex-column">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
              
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Next</a></li>
                <li class="breadcrumb-item"><a href="#">Third</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
              </ol>
            </nav>
            <section id="uploadRow" class="upload__row d-flex align-items-center justify-items-center gap-5 mt-3 mb-4">
              <div>
                <form action="./modules/create_folder.php" method="POST" class="m-auto">
                    <input type="text" name='folder_name'>
                   <button type="submit">New Folder</button>
                </form>
              </div>
                <!-- End create folder -->
              <form action="./modules/upload.php" method="POST" enctype="multipart/form-data" class="w-50 m-auto  d-flex">
                <div class="input-group">
                  <label class="input-group-btn">
                    <span class="btn__browse btn btn-primary">
                      Browse File <input id="inputFile" type="file" name="add_file" style="display: none;" multiple>
                    </span>
                  </label>
                  <div class="custom-file-label form-control">                  
                    <?php  
                      if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($_GET['msg'] === 'pass') {
                          echo 'Your upload was successful.';
                        } else if ($_GET['msg'] === 'limit'){
                          echo 'The file size limit is 500kb.';
                        } else if ($_GET['msg'] === 'fail') {
                          echo 'You cannnot upload this file.';
                        }
                      }
                    ?>
                  </div>
                  <button class="btn__add-file btn btn-success" type="submit" name="submit">Add file</button>
                </div>
              </form>
            </section>
            <!-- create folder -->
            
          </header>
          
              <!-- TABLE OF FILES -->
          <section class="tableFixHead table__section container col-10 mt-4">
            <table class="table__dir table table-striped bg-white" >
              <thead>
                  <tr>
                    <th class="col-sm" scope="col">Name</th>
                    <th class="col-sm text-center" scope="col">Label</th>
                    <th class="col-sm text-center" scope="col">Size</th>
                    <th class="col-sm text-center" scope="col">Modified</th>
                    <th class="col-sm text-center" scope="col">Create</th>
                    <th class="col-sm text-center" scope="col">Remove</th>

                  </tr>
              </thead>
              <tbody>
                <?php                  
                setDirectory();
                ?>

            </table>
          </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
