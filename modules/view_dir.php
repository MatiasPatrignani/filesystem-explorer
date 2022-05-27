<?php

include 'search_file.php';        

function sizeFormat($bytes){
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (($bytes >= 0) && ($bytes < $kb)) {
    return $bytes . ' B';

    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
    return ceil($bytes / $kb) . ' KB';

    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
    return ceil($bytes / $mb) . ' MB';

    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
    return ceil($bytes / $gb) . ' GB';

    } elseif ($bytes >= $tb) {
    return ceil($bytes / $tb) . ' TB';
    } else {
    return $bytes . ' B';
    }
}

// Set path for directory listing functions
function getPath () {
    if (isset($_GET['directory'])) {
        $path = $_GET['directory'];
    } else {
        $path = './root/';
    }
    return $path;
}

if (isset($_GET['directory'])) {
    $path = getPath();
    getDirContent(getPath());
}

if (isset($_POST['search_file'])) { 
        $path = getPath();   
    $fileSearchName = $_POST['search_file'];
    runSearch($fileSearchName, $path);
    $resultsArray = runSearch($fileSearchName, $path);
    listSearchResults($resultsArray);
    unset($_POST['search_file']);    
} else {
    getDirContent('./root/');
};

function getDirContent($path){
    $currentPath = $path; //   ./root/
    $dirContents = scandir($currentPath);
    renderContents($currentPath, $dirContents);
}

function renderContents ($currentPath, $array) {
    foreach($array as $item){
        if($item !== '.' && $item !== '..') {
            if(is_dir("$currentPath/$item")) {
                $newPath = "$currentPath$item/";
                echo $newPath;
                echo '<br>';
                echo nl2br("<td class='dir-contents__folder border border-dark bi bi-folder col-5'><a href='./index.php?directory=$newPath/' class='w-100'> $item</a></td><br>");
                echo "<td class='dirContents__folder col-sm text-center'></td>";
                echo "<td class='dirContents__folder col-sm text-center'></td>";
                echo "<td class='dirContents__folder col-sm text-center'></td>";
            } else if (is_file("$currentPath/$item")){
                $fileName = pathinfo($item, PATHINFO_FILENAME);   // gets only filename, removing extension
                $size = filesize("$currentPath/$item");
                $size = sizeFormat($size);
                $ext = pathinfo($item, PATHINFO_EXTENSION);
                $mod = date("F d Y H:i:s.",filemtime("$currentPath/$item")); // issues with date
                
                echo "<tr>";
                echo "<td class='dirContents__file bi bi-file-earmark col-sm'> $fileName</td>";
                echo "<td class='dirContents__file col-sm text-center'> $ext</td>";
                echo "<td class='dirContents__file col-sm text-center'> $size</td>";
                echo "<td class='dirContents__file col-sm text-center'> $mod</td>";
                echo "</tr>";
            }
        }
    }
}





