<?php
if(!isset($_GET['id'])) {
    die();
}
$id = $_GET['id'];
if (searchIMG($id)) {
    header("Location: delete.php?id=$id");
}
function searchIMG($search) : bool
{
    $directory = '../database/images/';

    // Use scandir to get a list of filenames in the directory
    $files = scandir($directory);
    foreach ($files as $file) {
        // Exclude "." and ".." entries
        if ($file != "." && $file != "..") {
            if (str_contains($file, $search)){
                $filePath = "$directory$file";
                if (unlink($filePath)) {
                    return true;
                } else {
                    return false;
                }
            }        
        }
    }
    return false;
}
?>