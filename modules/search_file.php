<?php
$fileSearchName = $_POST["search_file"];
$files = scandir('../root');

$results = array_filter($files, function ($v) use ($fileSearchName) {
return strpos($v, $fileSearchName) !== false;
});


foreach($results as $file){
  echo $file;
}




