$(document).ready(function ($) {

    $("#palPriceHidden").hide();
    countdown();

    setInterval(function () {
        moveRight();
    }, 3000);

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });

    $('#slider ul').css({ width: sliderUlWidth, marginLeft: -slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');


    function moveRight() {
        $('#slider ul').animate({
            left: -slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };
});


var displayChart = function (chartName) {
    var chart = new CanvasJS.Chart(chartName,
        {
            data: [
                {
                    type: "pie",
                    showInLegend: true,
                    dataPoints: [
                        {  y: 20, legendText: "Fifa", indexLabel: "Fifa" },
                        {  y: 5, legendText: "Cards", indexLabel: "Cards" },
                        {  y: 15, legendText: "Ping Pong", indexLabel: "Ping Pong" },
                        {  y: 25, legendText: "Tennis", indexLabel: "Tennis"},
                        {  y: 10, legendText: "Chess", indexLabel: "Chess" },
                        {  y: 10, legendText: "Soccer", indexLabel: "Soccer"},
                        {  y: 15, legendText: "Pool", indexLabel: "Pool"}
                    ]
                }
            ]
        });

    chart.render();
}


var displayPalPricing = function () {
    $("#palPriceHidden").slideUp("fast");
    $("#palPriceHidden").slideDown("slow");

}


function countdown() {
    var target_date = new Date("Feb 10, 2014").getTime();
    var days, hours, minutes, seconds;
    var countdown = document.getElementById("countdown");
    setInterval(function () {
        var current_date = new Date().getTime();
        var seconds_left = (target_date - current_date) / 1000;
        days = parseInt(seconds_left / 86400);
        seconds_left = seconds_left % 86400;
        hours = parseInt(seconds_left / 3600);
        seconds_left = seconds_left % 3600;
        minutes = parseInt(seconds_left / 60);
        seconds = parseInt(seconds_left % 60);
        countdown.innerHTML = days + "d, " + hours + "h, " + minutes + "m, " + seconds + "s";
    }, 1000);
}




