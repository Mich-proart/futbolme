tinymce.init({
    selector: 'textarea',
    plugins: '     autolink lists  media     table    image',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table image undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    height: 500,
    setup: function (ed) {
        ed.on("change", function () {
            rellenarTextsAreas();
        })
    }
});


$('#noticias_temporada').select2({
    maximumSelectionLength: 40,
});

initPartidosSelect2();

initEquiposSelect2();

$('#noticias_comunidad').select2({
    maximumSelectionLength: 40,
});

$('#noticias_division').select2({
    maximumSelectionLength: 40,
});

function initPartidosSelect2()
{
    $('#noticias_partido').select2({
        maximumSelectionLength: 40,
    });
}

function initEquiposSelect2()
{
    $('#noticias_equipos').select2({
        maximumSelectionLength: 40,
    });
}

$(document).on('change', '#noticias_temporada', function (){
    cambioEnCampoTemporada();
});

cambioEnCampoTemporada();

function cambioEnCampoTemporada()
{
    var temporadas = $('#noticias_temporada').select2('val');
    var partidos = $('#noticias_partido').select2('val');
    var equipos = $('#noticias_equipos').select2('val');

    var data = {
        temporadas: temporadas,
        partidos: partidos,
        equipos: equipos,
    };

    $.ajax({
        method: 'POST',
        url: jQuery('#url_cambio_campo_temporada').val(),
        data: data,
        cache: false
    }).done(function(data) {
        console.log(data);
        $('#contenedorCampoPartidos').html(data.campoPartidos);
        initPartidosSelect2();

        var labelPartidos = $('label[for="noticias_partido"]');
        var labelPartidosTxt = labelPartidos.text();

        var nPartidosSelect = $('#noticias_partido option').length;

        labelPartidos.html(labelPartidosTxt + ' <small>(' + nPartidosSelect + ' partidos encontrados)</small>');


        console.log(data.campoEquipo);

        $('#contenedorCampoEquipos').html(data.campoEquipo);
        initEquiposSelect2();

        var labelEquipos = $('label[for="noticias_equipos"]');
        var labelEquiposTxt = labelEquipos.text();

        var nEquiposSelect = $('#noticias_equipos option').length;

        labelEquipos.html(labelEquiposTxt + ' <small>(' + nEquiposSelect + ' equipos encontrados)</small>');
    });
}

function rellenarTextsAreas()
{
    $('#noticias_descripcionCorta').val(tinymce.get('noticias_descripcionCorta').getContent());
    $('#noticias_descripcion').val(tinymce.get('noticias_descripcion').getContent());
}