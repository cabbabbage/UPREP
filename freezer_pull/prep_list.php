<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST['data'];

    $file = fopen('active_prep_list.csv', 'w');     fwrite($file, $data);
    fclose($file);
    echo "Data saved successfully!";
    exit; }

$file = fopen('active_prep_list.csv', 'r');
$data = fgetcsv($file); $date_var = $data[0]; 
$table_html = "<tr>";
foreach ($data as $value) {
    $table_html .= "<th>$value</th>";
}
$table_html .= "</tr>";

while (($data = fgetcsv($file)) !== FALSE) {
    $table_html .= "<tr>";
    foreach ($data as $value) {
        $table_html .= "<td>$value</td>";
    }
    $table_html .= "</tr>";
}
fclose($file);

$response = array('date' => $date_var, 'table' => $table_html);
header('Content-Type: application/json'); echo json_encode($response);
?>
