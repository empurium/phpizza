$(function() {
    $('nav.navbar').addClass('navbar-shrink');

    $('select.chosen-select').chosen({
        max_selected_options: 5,
        width: '100%'
    });
});
