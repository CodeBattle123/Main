/**
 * Created by Antonia on 3.11.2016 г..
 */
$(window).load(function () {


    $("#mustache").css("left", $("#mustache").position().left).circulate({
        sizeAdjustment: 160,
        speed: 400,
        width: -440,
        height: 50,
        zIndexValues: [1,1,1,1],
        loop: false
    });
});
