var $menuTrigger = $('.js-menuToggle');
var $topNav = $('.js-topPushNav');
var $openLevel = $('.js-openLevel');
var $closeLevel = $('.js-closeLevel');
var $closeLevelTop = $('.js-closeLevelTop');
var $navLevel = $('.js-pushNavLevel');

function openPushNav() {
    $topNav.addClass('isOpen');
    $('body').addClass('pushNavIsOpen');
}

function closePushNav() {
    $topNav.removeClass('isOpen');
    $openLevel.siblings().removeClass('isOpen');
    $('body').removeClass('pushNavIsOpen');
}

$menuTrigger.on('click', 'touchstart', function(e) {
    e.preventDefault();
    if ($topNav.hasClass('isOpen')) {
        closePushNav();
    } else {
        openPushNav();
    }
});

$openLevel.on('click', 'touchstart', function(){
    $(this).next($navLevel).addClass('isOpen');
});

$closeLevel.on('click', 'touchstart', function(){
    $(this).closest($navLevel).removeClass('isOpen');
});

$closeLevelTop.on('click', 'touchstart', function(){
    closePushNav();
});

$('.screen').click(function() {
    closePushNav();
});


/* Abrir y cerrar menu burguer */
jQuery(document).on('click', '#hamburgerMenu', function (){

    //obtenerEvento(jQuery(this));
    jQuery('.pushNav.js-topPushNav').toggleClass('isOpen')
    console.log("nuevo js menu")
});

/* tambien asi */

/* var $menuTrigger = jQuery('#hamburgerMenu .js-menuToggle');
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

jQuery('.screen').click(function() {
    closePushNav();
});
 */