<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If it's a POST request, it means we are saving data
    $data = $_POST['data'];

    $file = fopen('active_prep_list.csv', 'w'); // Open file for writing, overwriting existing content
    fwrite($file, $data);
    fclose($file);
    echo "Data saved successfully!";
    exit; // Stop further execution
}

// If it's not a POST request, generate the prep list
$file = fopen('active_prep_list.csv', 'r');
$data = fgetcsv($file); // Get the first row
$date_var = $data[0]; // Assuming the date is in the first column

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
header('Content-Type: application/json'); // Set the header to indicate JSON content
echo json_encode($response);
?>
