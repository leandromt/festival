// CONTAGEM REGRESSIVA
// Set the date we're counting down. Format to use [Nov 21, 2017 13:27:47]
var countDownDate = new Date("May 26, 2018 12:00:00").getTime();
var endDate = new Date("May 5, 2018 18:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with
    $('#days').html(days);
    $('#hours').html(hours);
    $('#minutes').html(minutes);
    $('#seconds').html(seconds);

    // Change the title if 1
    if (days === 1) {
        $('#days').addClass('singular');
    } else {
        $('#days').removeClass('singular');
    }
    if (hours === 1) {
        $('#hours').addClass('singular');
    } else {
        $('#hours').removeClass('singular');
    }
    if (minutes === 1) {
        $('#minutes').addClass('singular');
    } else {
        $('#minutes').removeClass('singular');
    }
    if (seconds === 1) {
        $('#seconds').addClass('singular');
    } else {
        $('#seconds').removeClass('singular');
    }

    // If the count down is over, write some text 
    if (distance < 0) {
        //clearInterval(x); - ativar caso o evento não tenha uma msg de fim
        $('#countDown').html('Maio chegooou!');
    }
    if (endDate < now) {
        clearInterval(x); // a contagem termina
        $('#countDown').html('FIM DO EVENTO');
    }
}, 1000);

// ADICIONA A CLASS ROLLING AO MENU E ANIMA IMAGENS DA HOME
$(document).scroll(function(){
    posTop = $('#navegation').offset().top;
    posYscreen = $(document).scrollTop();
    posPhotos = $('.sobre-imgs').offset().top;
    heightScreen = window.screen.height;
    heightScreenCalc = heightScreen / 2;
    console.log(heightScreenCalc);
    if (posTop > 0) {
        $('.float-nav').addClass('rolling');
    }
    if (posTop == 0) {
        $('.float-nav').removeClass('rolling');
    }
    // IMAGENS DA HOME
    if (posYscreen >= posPhotos - heightScreenCalc) {
        $('.sobre-imgs').addClass('look-at-me');
    }
    if (posYscreen < posPhotos - heightScreenCalc) {
        $('.sobre-imgs').removeClass('look-at-me');
    }
});

