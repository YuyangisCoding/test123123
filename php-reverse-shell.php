<?php

function listFilesAndDirectories($path, $level = 0) {
    $dir = opendir($path);
    
    while (($entry = readdir($dir)) !== false) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        for ($i = 0; $i < $level; $i++) {
            echo '--';
        }
        
        echo $entry . PHP_EOL;

        $fullPath = $path . '/' . $entry;
        
        if (is_dir($fullPath)) {
            listFilesAndDirectories($fullPath, $level + 1);
        }
    }
    
    closedir($dir);
}

$path = '/';
listFilesAndDirectories($path);

?>
