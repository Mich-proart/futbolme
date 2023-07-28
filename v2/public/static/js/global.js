$(document).on('click', '#menuEnlacepromocion2RFEF,#menuEnlacePrimeraRFEF,#menuEnlaceSegundaRFEF,#menuEnlaceTerceraRFEF,#menuEnlaceSegundaB, #menuEnlaceTercera, #menuEnlacePromo, #menuEnlaceAutonomica, #menuEnlaceTorneos, #menuEnlaceEuropa, #menuEnlaceJuvenil, #menuEnlaceFemenino, #menuEnlaceFutbolSala', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var el = $(this);

    var menu = el.data('menu');

    console.log('el');
    console.log(el);

    console.log('menu');
    console.log(menu);

    cerrarMenuTorneos();
    abrirMenuTorneos(menu);
});
/*
$(document).on('mouseover', '#menuEnlaceTorneos', function (e) {
    console.log('hii');

    abrirMenuTorneos();
});
 */
$(document).on('mouseover', '#contenedorGlobal', function (e) {
    cerrarMenuTorneos();
});


function abrirMenuTorneos(menu) {
    $('#menu' + menu).fadeIn(300);
    $('#menuLi' + menu +' .flechaTorneos').fadeIn(300);
}

function cerrarMenuTorneos() {
    $('.menuDesplegable').fadeOut(300);
    $('.flechaTorneos').fadeOut(300);
}

/* AQUI ESTOY REPITIENDO LO DE ABRIR MENU MOVIL PORQUE NO ESTA FUNCIONANDO */

var $menuTrigger = jQuery('#hamburgerMenu .js-menuToggle');
var $topNav = jQuery('.js-topPushNav');
var $openLevel = jQuery('.js-openLevel');
var $closeLevel = jQuery('.js-closeLevel');
var $closeLevelTop = jQuery('.js-closeLevelTop');
var $navLevel = jQuery('.js-pushNavLevel');

function openPushNav() {
    $topNav.addClass('isOpen');
    jQuery('body').addClass('pushNavIsOpen');
}

function closePushNav() {
    $topNav.removeClass('isOpen');
    $openLevel.siblings().removeClass('isOpen');
    jQuery('body').removeClass('pushNavIsOpen');
}

$menuTrigger.on('click', function(e) {
    e.preventDefault();
    if ($topNav.hasClass('isOpen')) {
        closePushNav();
    } else {
        openPushNav();
    }
});

$openLevel.on('click ', function(){
    jQuery(this).next($navLevel).addClass('isOpen');
});

$closeLevel.on('click ', function(){
    jQuery(this).closest($navLevel).removeClass('isOpen');
});
//$closeLevelTop.on('click touchstart', function(){
$closeLevelTop.on('click', function(){
    closePushNav();
});

$('.screen').click(function() {
    closePushNav();
});

console.log('Aqui llega');