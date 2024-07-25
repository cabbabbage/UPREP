<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prep List</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <a class="home-button" href="../uprep.php">&#9666;</a>
    <div class="header-container">
        <img class="logo" src="../src/logo.png" alt="logo">
    </div>
</header>


    <h1>Active Prep List</h1>
    <h2 id="lastModified" class = "table"></h2>
    <table border="0" id="prepTable">

    </table>
    <button class = "saveBtn" id="saveBtn">Save</button>
    <button id="startListBtn" class = "startListBtn">New Prep List</button>

    <div id="modifyItem" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="itemTitle"></h2>
            <div class = "modal-tag">
                <input type="text" id="itemValue" placeholder="Enter value">
                <h2 id="itemUnit"></h2>
            </div>

            <button id="doneBtn">Done</button> <!-- Add the Done button here -->
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
