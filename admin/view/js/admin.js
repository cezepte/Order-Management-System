$(document).ready(function () {
    $('.activable').click(function () {
        $('a.activable').removeClass('active');
        $(this).addClass('active');
    });
    $('#hide-sidebar').click(function () {
        $('.sidenav').toggle('fast', function () {
            if ($('.sidenav').is(':visible')) {
                $('.content').css({ 'padding-left': '280px', "transtion": "padding-left 0.5s ease-in-out" });
                $('.content').find('#mainContainer').removeClass('container');
                $('.content').find('#mainContainer').addClass('container-fluid');
            } else {
                $('.content').css({ 'padding-left': '0px', "transtion": "padding-left 0.5s ease-in-out" });
                $('.content').find('#mainContainer').removeClass('container-fluid');
                $('.content').find('#mainContainer').addClass('container');
            };
        });
    });
});
