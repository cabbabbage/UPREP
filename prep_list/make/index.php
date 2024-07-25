<?php
$filename = '../target_prep.csv';
$handleFile = '../active_prep_list.csv';
$rows = [];
if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rows[] = $data;
    }
    fclose($handle);
}

if (!file_exists($handleFile)) {
    $handleWrite = fopen($handleFile, 'a');
    fclose($handleWrite);
}


function sortCsvBySecondColumn($filePath) {
    $data = [];
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        while (($row = fgetcsv($handle)) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }

        usort($data, function($a, $b) {
        return $a[1] <=> $b[1];
    });

        $handle = fopen($filePath, "w");
    foreach ($data as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Reader and Writer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php foreach ($rows as $index => $row): ?>
<div class="modal fade" id="modal<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color: black;">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 90%; margin: 0 auto; height: 80vh;"> <!-- Increased modal size -->
        <div class="modal-content custom-modal" style="color: white; background-color: black;"> <!-- Text color and background color both set to black -->
            <div class="modal-header">
                <h5 class="modal-title"><?= htmlspecialchars($row[0]) ?></h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-light" style="font-size: 18px;">Remaining <?= htmlspecialchars($row[2]) ?> of <?= htmlspecialchars($row[0]) ?>: <input inputmode="numeric" type="number" id="input<?= $index ?>" class="form-control input-remaining" data-index="<?= $index ?>" data-target="<?= htmlspecialchars($row[1]) ?>" style="height: 40px;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom save-data" data-index="<?= $index ?>" style="height: 50px; width: 100%; padding-top: 10px; background-color: #cf676b;">Save</button> <!-- Removed opacity value -->
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
