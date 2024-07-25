<?php
$directory = '../recipes';

$files = scandir($directory);

$files = array_diff($files, array('.', '..'));

$query = $_GET['query'] ?? '';

function searchItems($query, $files) {
    $filteredFiles = [];
    foreach ($files as $file) {
                if (stripos($file, $query) !== false) {
                        $filenameWithoutExt = pathinfo($file, PATHINFO_FILENAME);
            $filteredFiles[] = $filenameWithoutExt;
        }
    }
    return $filteredFiles;
}

$result = searchItems($query, $files);

header('Content-Type: application/json');

echo json_encode($result);
