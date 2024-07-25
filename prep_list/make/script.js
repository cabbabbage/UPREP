$(document).ready(function() {

    $.post('delete.php', function(response) {});
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
        var index = $(this).data('index');         var input = $('#input' + index);         var inputVal = input.val();         var targetAmount = input.data('target');         var percent = (inputVal / targetAmount) * 100;         var data = input.closest('.modal-content').find('.modal-title').text() + "," + percent.toFixed(2)+ "," +  (targetAmount - inputVal)   + "\n";        $.post('save_data.php', { data: data }, function(response) {
            $('#modal' + index).modal('hide');             if ($('#modal' + (index + 1)).length) {
                $('#modal' + (index + 1)).modal('show');             } else {
                                $.post('sort_csv.php', function(response) {
                    window.location.href = '../prep_lists.html';                 });
            }
        });
    });
});

