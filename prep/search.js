$(document).ready(function() {
    $('#searchInput').keyup(function() {
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: 'search.php',
                type: 'GET',
                data: { query: query },
                dataType: 'json',                 success: function(data) {
                    if (!Array.isArray(data)) {
                        console.error('Data is not an array:', data);
                        return;
                    }
                    var items = '';
                    data.forEach(function(item) {
                        items += '<li onclick="alert(\'You selected ' + item + '\');">' + item + '</li>';
                    });
                    $('#searchResults').html(items);
                },
                error: function(xhr, status, error) {
                    console.error("Error: ", xhr.responseText);
                }
            });
        } else {
            $('#searchResults').html('');
        }
    });
});
