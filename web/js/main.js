$(document).ready(function() {
//Ouvrir le menu utilisateur au hover
    $('#infos-user').hover(function() {
        $(this).addClass('open');
    }, function() {
        $(this).removeClass('open');        
    });
    $('#header-menu-user').on("touchstart", function (e) {
        var selector = $('#infos-user'); //preselect the selector
        if (selector.hasClass('open')) {
            selector.removeClass("open");
        } else {
            selector.addClass("open");
        }
        e.stopImmediatePropagation();
        e.preventDefault();
    });
     });