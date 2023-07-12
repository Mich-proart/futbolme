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