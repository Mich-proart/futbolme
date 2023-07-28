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