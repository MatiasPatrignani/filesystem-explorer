<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FileManager</title>
  </head>
  <body>
    <nav>
      <form action="./root/" method="POST">
        <input type="text" name="search" />
      </form>
    </nav>
    <aside>
        <form action="./modules/upload.php" method="POST" enctype="multipart/form-data" >
          <input type="file" name="add_file">
          <button type="submit" name="submit">Add file</button>
        </form>
    </aside>
  </body>
</html>
