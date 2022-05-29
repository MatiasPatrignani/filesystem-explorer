<?php


if (isset($_POST['file_delete'])) {
  $path = $_POST['file_delete'];
  echo ".$path";
  if (is_dir(".$path")) {
    recursiveDelete($path);
  } elseif (is_file(".$path")) {
    unlink(".$path");
  };
  unset($_POST['file_delete']);
  header("Location: ../index.php");
};
  


function recursiveDelete($path) {
  $str = ".$path";
  if (is_file($str)) {
      return @unlink($str);
  }
  elseif (is_dir($str)) {
      $scan = glob(rtrim($str,'/').'/*');
      foreach($scan as $index=>$path) {
          recursiveDelete($path);
      }
      return @rmdir($str);
  }
}



?>