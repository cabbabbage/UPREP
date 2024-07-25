<?php
$filePath = '../active_prep_list.csv'; 
if (file_exists($filePath)) {
    unlink($filePath);     echo 'File deleted successfully'; } else {
    echo 'File does not exist or already deleted'; }
?>
