var randOne, randTwo;

$(document).ready(function ($) {

    $("#palPriceHidden").hide();
    // countdown();
    generateRandomNumber();

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


function findMyPal() {
   // validatePal();
    sendMail();

}

function sendMail() {
    var link = "mailto:k.lohani01@gmail.com"
             + "?cc=jaochng@gmail.com"
             + "&subject=" + escape("This is my subject")
             + "&body=" + escape("asdfasdf")
    ;

    window.location.href = link;

    alert("after sendmail");

    return (true);
}






function validatePal() {
    if (document.findPal.nameByUser.value == "") {
        alert("Please provide your name!");
        document.findPal.nameByUser.focus();
        return false;
    }
    if (document.findPal.emailByUser.value == "") {
        alert("Please provide your Email!");
        document.findPal.emailByUser.focus();
        return false;
    } else {

        validateEmailOverallFormat(document.findPal.emailByUser.value);
        validateEmailHuskyFormat(document.findPal.emailByUser.value);
    }


    // if (document.findPal.totalByUser.value != randOne + randTwo) {
    //     alert("You failed in pal Spam check");
    //     return false;
    // }


    alert("Hello " +
        document.findPal.nameByUser.value +
        "your request for " +
        getPalSkillLevel(document.findPal.skillByUser.value) +
        " Pal has been received for " +
        document.findPal.dateByUser.value);


    return( true );


}

function getPalSkillLevel(skill) {
    var temp;
    if (skill == "100") {
        temp = "Novice";
    } else if (skill == "200") {
        temp = "Expert";
    } else if (skill == "300") {
        temp = "Professional"
    } else if (skill == "400") {
        temp == "Coach"
    }
    return temp;
}


function validateEmailOverallFormat(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        return (true)
    }
    alert("You have entered an invalid email address!")
    document.findPal.emailByUser.focus();
    return (false)
}

function validateEmailHuskyFormat(email) {
    var temp = email.indexOf("@");
    var huskyDomain = email.slice((temp + 1), email.length);
    console.log(huskyDomain);

    if (huskyDomain == "husky.neu.edu") {
        return (true)
    }
    alert("Only @husky email address allowed right now")
    document.findPal.emailByUser.focus();
    return (false)

}

function generateRandomNumber() {
    randOne = Math.floor((Math.random() * 5) + 1);
    randTwo = Math.floor((Math.random() * 9) + 6);
    $("#captchaOne").html(randOne);
    $("#captchaTwo").html(randTwo);
}




//
//function countdown() {
//    var target_date = new Date("Feb 10, 2014").getTime();
//    var days, hours, minutes, seconds;
//    var countdown = document.getElementById("countdown");
//    setInterval(function () {
//        var current_date = new Date().getTime();
//        var seconds_left = (target_date - current_date) / 1000;
//        days = parseInt(seconds_left / 86400);
//        seconds_left = seconds_left % 86400;
//        hours = parseInt(seconds_left / 3600);
//        seconds_left = seconds_left % 3600;
//        minutes = parseInt(seconds_left / 60);
//        seconds = parseInt(seconds_left % 60);
//        countdown.innerHTML = days + "d, " + hours + "h, " + minutes + "m, " + seconds + "s";
//    }, 1000);
//}


