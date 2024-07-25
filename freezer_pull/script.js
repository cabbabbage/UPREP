function startList() {
    alert("Starting list...");
    }

function saveData() {

        var table = document.getElementById('prepTable');


        var csvData = "";
    var rows = table.rows;
    
        for (var i = 0; i < rows.length; i++) {
        for (var j = 0; j < rows[i].cells.length; j++) {
            csvData += '"' + rows[i].cells[j].innerText + '"';             if (j < rows[i].cells.length - 1) {
                csvData += ",";             }
        }
        csvData += "\n";     }

        fetch('prep_list.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'data=' + encodeURIComponent(csvData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        alert('Data saved successfully!');
    })
    .catch(error => console.error('Error:', error));
}


function fetchPrepList() {
    fetch('prep_list.php')
    .then(response => response.json())     .then(data => {
        document.getElementById('lastModified').innerText = "Last Freezer Pull " + data.date;
        attachModifyButtons();     })
    .catch(error => console.error('Error:', error));
}

function attachModifyButtons() {
    var table = document.getElementById('prepTable');
    var rows = table.rows;

    for (var i = 1; i < rows.length; i++) {         var button = document.createElement("button");
        var img = document.createElement("img");
        img.src = "../src/list.png";
        button.appendChild(img);
        button.className = "modifyBtn";
        button.addEventListener("click", function() {
            var rowIndex = this.parentNode.parentNode.rowIndex;
            openModifyItemModal(rowIndex);
        });
        rows[i].insertCell(-1).appendChild(button);
    }
}

function openModifyItemModal(rowIndex) {
    var table = document.getElementById('prepTable');
    var selectedRow = table.rows[rowIndex];
    var itemTitle = selectedRow.cells[0].innerText;
    var itemValue = selectedRow.cells[1].innerText;
    var itemUnit = selectedRow.cells[2].innerText;

    document.getElementById('itemTitle').innerText = itemTitle;
    document.getElementById('itemValue').value = itemValue;
    document.getElementById('itemUnit').innerText = itemUnit;

    var modal = document.getElementById("modifyItem");
    modal.style.display = "block";

    var closeBtn = document.getElementsByClassName("close")[0];
    closeBtn.onclick = function() {
        modal.style.display = "none";
    };

    var doneBtn = document.getElementById("doneBtn");
    if (!doneBtn) {
        doneBtn = document.createElement("button");
        doneBtn.id = "doneBtn";
        doneBtn.innerText = "Done";
        document.querySelector(".modal-content").appendChild(doneBtn);
    }
    doneBtn.onclick = function() {
        var newValue = document.getElementById('itemValue').value;
        if (newValue === "0" || newValue === "") {
            table.deleteRow(rowIndex);
        } else {
            selectedRow.cells[1].innerText = newValue;
        }
        modal.style.display = "none";
    };
}

document.addEventListener("DOMContentLoaded", function() {
    fetchPrepList();

    var saveBtn = document.getElementById("saveBtn");
    if (saveBtn) {
        saveBtn.addEventListener("click", saveData);
    }

    var startListBtn = document.getElementById("startListBtn");
    if (startListBtn) {
                startListBtn.addEventListener("click", function() {
            window.location.href = 'make/index.php';
        });
    }
});

