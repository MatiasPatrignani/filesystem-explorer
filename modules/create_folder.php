<?php
$msg = null;

if(isset($_POST['folder_name']))
{
  $folder = $_POST["folder_name"];
  $path = '../root';
  $directory = $path. "/" . $folder;
  if(!is_dir($directory)) {
  $create = mkdir($directory, 0777, true);
    if($create){
    $msg = "Directory $directory was created.";
    } else {
    $msg = "An error ocurred during folder creation";
    }
  }
  else {
    $msg = "Directory already created.";
  }
  header("Location:../index.php");
}
?>


