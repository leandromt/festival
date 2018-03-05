// CONTAGEM REGRESSIVA
// Defina a data em que a contagem termina. Formato para usar [Nov 21, 2019 13:27:47]
var countDownDate = new Date("Mar 26, 2018 12:00:00").getTime();
var endDate = new Date("Mar 5, 2018 18:00:00").getTime();

// atualiza a contagem a cada segundo
var x = setInterval(function() {

    // pega a data e hora de hoje
    var now = new Date().getTime();

    // Encontra a distância entre agora e a data de termino
    var distance = countDownDate - now;

    // calculo do tempo
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // saida de dados nos elementos
    $('#days').html(days);
    $('#hours').html(hours);
    $('#minutes').html(minutes);
    $('#seconds').html(seconds);

    // altera o titulo do campo caso valor=1
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

    // quando a contagem acaba remove o elemento 'countdown-wrap'
    if (distance < 0) {
        clearInterval(x);
        $('.countdown-wrap').remove();
    }
}, 1000);

// ADICIONA A CLASS ROLLING AO MENU E ANIMA IMAGENS DA HOME
$(document).scroll(function(){
    posTop = $('#navegation').offset().top;
    posYscreen = $(document).scrollTop();
    posPhotos = $('.sobre-imgs').offset().top;
    heightScreen = window.screen.height;
    heightScreenCalc = heightScreen / 2;
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

// CONFIGURA AS FOTOS DO FEED INSTAGRAM
// funcao 'loop': retorna as imagens pro palco 
function loop(elemento) {

    var randomTime = Math.floor((Math.random() * 20000) + 10000);

    $(elemento).animate({
        left: '110%'
    }, randomTime, 'linear', function(){
        elemento.style.left = '-25%';
        loop(elemento);
    });

}
// posiciona as imagens e chama a função 'loop'
$('.instagram-feed a').each(function(contador, elemento) {
    // define as posicoes TOP, LEFT e tamanho
    var randomTop = Math.floor((Math.random() * 100) * 2);
    var randomLeft = Math.floor((Math.random() * 500) * 2);
    var randomSize = Math.floor((Math.random() * 100) + 200);

    elemento.style.left = randomLeft + 'px';
    elemento.style.top = randomTop + 'px';
    elemento.style.width = randomSize + 'px';
    elemento.style.height = randomSize + 'px';

    // mostra as imagens aleatoriamente
    $(elemento).delay(randomLeft).fadeIn(300);
    // para a animacao quando mouse enter
    $(elemento).mouseenter(function(){
        $(this).stop();
    });
    // continua a animacao quando mouse out
    $(elemento).mouseout(function(){
        loop(elemento);
    });
    // espera os elementos aparecerem para animar
    setTimeout(function(){
        loop(elemento);        
    }, 300);

});

// CARROSSEL PATROCINADORES
$(".slider-sponsors").owlCarousel({
    loop:true,
    items:3,
    nav:true,
    dots:true,
    autoplay:true,
    autoplayHoverPause:true,
    center:true,
    navText: ["<img src='imgs/botao_esquerda.png' alt='Voltar' title='Voltar'>","<img src='imgs/botao_direita.PNG' alt='Avançar' title='Avançar'>"],
});
