<?php

include 'search_file.php';        
include 'delete.php';

// Set path for directory listing functions
function getPath () {
    if (isset($_GET['directory'])) {
        $path = $_GET['directory'];
    } else {
        $path = './root/';
    }
    return $path;
}




function setDirectory () {
    $path = getPath();
    
    if (isset($_POST['search_file'])) { 
        $fileSearchName = $_POST['search_file'];
        runSearch($fileSearchName, $path);
        $resultsArray = runSearch($fileSearchName, $path);
        listSearchResults($resultsArray);
        unset($_POST['search_file']);    
    } else {
        $contents = scandir($path);
        renderContents($path, $contents);
    };
}


function renderContents ($currentPath, $array) {
    addBreadcrumbs($currentPath, $array);

    foreach($array as $item){       
        $newPath = "$currentPath$item";        
        if($item !== '.' && $item !== '..') {
            if(is_dir("$currentPath/$item")) {
                $ext = 'folder';
                $folderArray = [];
                echo '<br>';
                echo "<tr>";
                echo "<td class='dir-contents__folder bi bi-folder col-5 clickable-row '>
                <a href='./index.php?directory=$newPath/' class='w-100 text-decoration-none text-dark'> $item</a></td>";
                echo "<td class='dirContents__folder col-sm text-center'>$ext</td>";
                echo "<td class='dirContents__folder col-sm text-center'></td>";
                echo "<td class='dirContents__folder col-sm text-center'></td>";
                echo "<td class='dirContents__folder col-sm text-center'></td>";
                echo "<td class='dirContents__file col-sm'>
                <form method='POST' action='./modules/delete.php'>
                    <input type='hidden' name='file_delete' value='$newPath' class='w-100 text-decoration-none text-dark'>
                    <button type='submit' class='btn__delete'><ion-icon name='trash-outline'></ion-icon></button>
                </form>
                </td>";
                echo "</tr>";
            } else if (is_file("$currentPath/$item")){
                $fileName = pathinfo($item, PATHINFO_FILENAME);   // gets only filename, removing extension
                $size = filesize("$currentPath/$item");
                $size = sizeFormat($size);
                $ext = pathinfo($item, PATHINFO_EXTENSION);
                $mod = date("F d Y H:i:s.",filemtime("$currentPath/$item")); // issues with date
                $cre = date("F d Y H:i:s.",filectime("$currentPath/$item")); // issues with date
                echo "<tr>";
                echo "<td class='dirContents__file bi bi-file-earmark col-sm'>
                <a href='$newPath' class='w-100 text-decoration-none text-dark'>$fileName</a>
                </td>";
                echo "<td class='dirContents__file col-sm text-center'> $ext</td>";
                echo "<td class='dirContents__file col-sm text-center'> $size</td>";
                echo "<td class='dirContents__file col-sm text-center'> $mod</td>";
                echo "<td class='dirContents__file col-sm text-center'> $cre</td>";
                echo "<td class='dirContents__file col-sm'>
                <form method='POST' action='./modules/delete.php'>
                    <input type='hidden' name='file_delete' value='$newPath' class='w-100 text-decoration-none text-dark'>
                    <button type='submit' class='btn__delete'><ion-icon name='trash-outline'></ion-icon></button>
                </form>
                </td>";
                echo "</tr>";
            }
        }
    }
}

function addBreadcrumbs ($currentPath) {
    ?><nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"><ol class='breadcrumb'><?php

    $breadcrumbsArray = array();
    $path = $currentPath;
   
    array_unshift($breadcrumbsArray, $path);
    while (dirname($path) !== '.') {
        array_unshift($breadcrumbsArray, dirname($path));
        $path = dirname($path);
    }
    foreach($breadcrumbsArray as $item) {
        $name = pathinfo($item, PATHINFO_FILENAME);
        echo "<li class='breadcrumb-item'><a href='./index.php?directory=$item'>$name</a></li>";
    }
    echo "</ol>";
    echo "</nav>";
};


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



