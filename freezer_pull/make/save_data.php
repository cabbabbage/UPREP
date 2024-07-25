<?php
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $file = fopen('../active_prep_list.csv', 'a');
    fwrite($file, $data);
    fclose($file);
    echo 'Data saved successfully';
}
?>
