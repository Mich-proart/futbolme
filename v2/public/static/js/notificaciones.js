

function ver_alineaciones(str1, str2, str3) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("alineaciones-" + str1).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/src/funciones/alineaciones.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + str1 + "&temporada_id=" + str2 + "&bd=" + str3);
}

/*
$(document).on('click', '.CierreNotificacionGOL', function() {
    var tipoSalida = '';
    tipoSalida = '-180px';
    $(this).parent('div').animate({
        marginLeft: tipoSalida,
        opacity: 0
    }, 500, function() {
        $(this).remove();
    });
});
*/

