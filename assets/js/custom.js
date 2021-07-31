// JS on top

$(document).ready(function() {

    var $btn = $('.car-top');

    $('#arriba').click(function() { //Id del elemento cliqueable
        $('html, body').animate({
            scrollTop: 0
        }, "fast");
        $(this).addClass("car-run");
        setTimeout(function() {
            $btn.removeClass('car-run');
        }, 1000);
        return false;
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() > 200) {
            $btn.addClass('show');
            $btn.addClass('car-down');
        } else {
            $btn.removeClass("show");
            setTimeout(function() {
                $btn.removeClass('car-down');
            }, 250);
        }
    });


    // JS Tooltips


    $('[data-toggle="tooltip"]').tooltip();


    // JS Social plus button function


    $('.plus-button').click(function() {
        $(this).toggleClass('open');
        $('.social-button').toggleClass('active');
    });


});