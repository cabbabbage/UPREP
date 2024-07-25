$(document).ready(function() {
        $('.menu-icon, .more-btn, .back-btn').click(function(event) {
                $('.options-nav').toggleClass('show-nav');
        $('main').toggleClass('blur-content');
        $('.menu-icon').toggleClass('show-menu');
        $('.logo').toggleClass('centered');         $('main button').prop('disabled', $('.options-nav').hasClass('show-nav'));         event.stopPropagation();     });

        $(document).click(function(event) {
        if ($('.options-nav').hasClass('show-nav') && !$(event.target).closest('.options-nav, .menu-icon').length) {
            closeNavigation();         }
    });

        function closeNavigation() {
        $('.options-nav').removeClass('show-nav');
        $('main').removeClass('blur-content');
        $('.logo').removeClass('centered');
        $('main button').prop('disabled', false);     }

        $('.prep-btn').click(function() {
        window.location.href = 'prep/prep.html';
    });
    $('.prep-list-btn').click(function() {
        window.location.href = 'prep_list/prep_lists.php';
    });
    $('.freezer-pull-btn').click(function() {
        window.location.href = 'freezer_pull/prep_list.html';
    });

        $('.more-btn, .back-btn, .menu-icon').click(function(event) {
        event.stopPropagation();
    });
});
