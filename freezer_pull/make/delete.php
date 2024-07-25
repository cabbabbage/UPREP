<?php
$filePath = '../active_prep_list.csv'; // Define the file path relative to the location of this script

// Check if the file exists
if (file_exists($filePath)) {
    unlink($filePath); // Delete the file if it exists
    echo 'File deleted successfully'; // Send success message back to the AJAX call
} else {
    echo 'File does not exist or already deleted'; // Send message back if file was not found
}
?>
