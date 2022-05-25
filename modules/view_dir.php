<?php


function getDirContent($path){
    $currentPath = $path;
    $dirContents = scandir($currentPath);

    foreach($dirContents as $item){
        if($item === '.' || $item === '..'){
            continue;
        }
        if(is_dir("$currentPath/$item")){
            echo "<div class='dirContents__folder border border-dark bi bi-folder col-5'> $item</div><br>";
        }
    }

    foreach($dirContents as $item){
        if($item === '.' || $item === '..'){
            continue;
        }
        if(is_file("$currentPath/$item")){
        echo "<div class='dirContents__file border border-dark bi bi-folder col-5'> $item</div><br>";
    }
}};


