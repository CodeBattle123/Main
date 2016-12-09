$(document).ready(function() {
    $(".btn").on("click", function( e ) {
        e.preventDefault();
        $("body, html").animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 600);
    });
});