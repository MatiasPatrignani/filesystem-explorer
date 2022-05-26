<?php
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


function getDirContent($path){
    $currentPath = $path; //   ./root/
    $dirContents = scandir($currentPath);
    renderContents($currentPath, $dirContents);
}

function renderContents ($currentPath, $array) {
    foreach($array as $item){
        if($item !== '.' && $item !== '..') {
            if(is_dir("$currentPath/$item")) {
                echo nl2br("<div class=' border border-dark bi bi-folder col-5'> $item</div><br>");
                // echo "<td class='dirContents__folder col-sm text-center'></td>";
                // echo "<td class='dirContents__folder col-sm text-center'></td>";
                // echo "<td class='dirContents__folder col-sm text-center'></td>";
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

