$(document).ready(function() {

    $.post('delete.php', function(response) {});
    // Show the first modal on page load
    $('.modal').first().modal('show');
    var currentDate = new Date();
    var dateString = currentDate.toLocaleString();
    var data = dateString + "\n";
    $.post('save_data.php', { data: data }, function(response) {


    });
    var data = "Item, Percent Remaining, Needed, Unit \n"
    $.post('save_data.php', { data: data }, function(response) {


    });

    $('.save-data').click(function() {
        var index = $(this).data('index'); // Get the index of the current modal
        var input = $('#input' + index); // Get the input field from the current modal
        var inputVal = input.val(); // Get the value from the input field
        var targetAmount = input.data('target'); // Get the target amount from data attribute
        var percent = (inputVal / targetAmount) * 100; // Calculate the percentage
        var data = input.closest('.modal-content').find('.modal-title').text() + "," + inputVal + "\n"; // Construct the data string for saving
        $.post('save_data.php', { data: data }, function(response) {
            $('#modal' + index).modal('hide'); // Close the current modal
            if ($('#modal' + (index + 1)).length) {
                $('#modal' + (index + 1)).modal('show'); // Show the next modal if it exists
            } else {
                // If no more modals, sort the CSV and redirect
                $.post('sort_csv.php', function(response) {
                    window.location.href = '../prep_list.html'; // Redirect after sorting is complete
                });
            }
        });
    });
});

