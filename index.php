<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>file managaer page - Bootdey.com</title>
  </head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand">Navbar</a>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
        </ul>
      </form>
    </nav>
    <nav>
      <form action="./root/" method="POST">
        <input type="text" name="search" />
      </form>
    </nav>
    <aside>
        <form class="custom-input-file col-md-2 col-sm-2 col-xs-2 rounded" action="./modules/upload.php" method="POST" enctype="multipart/form-data" >
          <input type="file" id="fichero-tarifas" class="input-file" name="add_file">
          NEW
        </form>
        <button type="submit" name="submit">Add file</button>
        <?php include './modules/view_dir.php';
        getDirContent("./root/")?>
    </aside>
  </body>
</html>
