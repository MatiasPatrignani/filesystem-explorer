<?php

if (isset($_POST['submit'])) {
  $file = $_FILES['add_file'];
};

$fileName = $_FILES['add_file']['name'];
$fileTmpName = $_FILES['add_file']['tmp_name'];
$fileSize = $_FILES['add_file']['size'];
$fileError = $_FILES['add_file']['error'];
$fileType = $_FILES['add_file']['type'];

$fileActualExt = pathinfo($fileName, PATHINFO_EXTENSION);

$typesAllowed = array('doc', 'docx', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4');

if(in_array($fileActualExt,$typesAllowed,true)) {
  if($fileError === 0) {
    if($fileSize < 500000) {
      $fileDestination = "../root/$fileName";
      move_uploaded_file($fileTmpName, $fileDestination);
    }
  }
} else {
  echo "You cannot upload";
}

