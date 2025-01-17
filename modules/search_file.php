<?php

function runSearch ($fileSearchName, $path) {
  $dir = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS);  // Create recursive dir iterato, skips dot folderss
  $it  = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST); //   // Flatten iterator, folders before files
  $it->setMaxDepth(-1);   // max depth;
  $contentsArray = [];
  foreach ($it as $item) {
    array_push($contentsArray, $item);
  }
  $searchResults = array_filter($contentsArray, function ($v) use ($fileSearchName) {
      return strpos(strtolower($v), strtolower($fileSearchName)) !== false;
  });
  return $searchResults;
};

function listSearchResults ($array) {
    foreach($array as $item) {
        if (is_dir($item)) {
            echo '<tr>';
            echo nl2br("<td class='dir-contents__folder border border-dark bi bi-folder col-5'><a href='./index.php' class='w-100'> $item</a></td><br>");
            echo "<td class='dirContents__folder col-sm text-center'></td>";
            echo "<td class='dirContents__folder col-sm text-center'></td>";
            echo "<td class='dirContents__folder col-sm text-center'></td>";
            echo "</tr>";
        } else if (is_file($item)) {
            $fileName = pathinfo($item, PATHINFO_FILENAME);   // gets only filename, removing extension
            $ext = pathinfo($item, PATHINFO_EXTENSION);
            echo '<tr>';
            echo "<td class='dirContents__file bi bi-file-earmark col-sm'> $fileName</td>";
            echo "<td class='dirContents__file col-sm text-center'> $ext</td>";
            echo "<td class='dirContents__file col-sm text-center'> -</td>";
            echo "<td class='dirContents__file col-sm text-center'> -</td>";
            echo "</tr>";
        }
    }
};