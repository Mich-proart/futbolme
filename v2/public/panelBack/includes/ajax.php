<script>

   _add_tw = function(){   

          var color = $(this).css('background-color');
          var texto = $('#addTw').text();
          var twLocal = $(this).attr('data-l');
          var twVisitante = $(this).attr('data-v');
          var cadena = twLocal+' OR '+twVisitante+' OR ';
          
          $('#addTw').css('background-color', 'white');

          if (color==='rgb(255, 0, 0)') {
              $('#addTw').text(function(a, reemplaza) {
                  return reemplaza.replace(cadena, '');
              });
              $(this).css('background-color','white');
          } else {
              $('#addTw').text(texto+cadena);
              $(this).css('background-color','red');
          }; 
        }

    _abrir_tw = function(){
      url = 'https://twitter.com/search?q=';
      busqueda = $('#addTw').text();
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-3);
      url2 = url+busqueda;      
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }

    _abrir_tw2 = function(){
      url = 'https://twitter.com/search?q=';
      busqueda = $('#addTw').text();
      busqueda = busqueda.replace(/ OR /gi,' OR from:'); 
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-9);
      url2 = url+'from:'+busqueda;
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }

    /*_abrir_tw3 = function(){
      url = '/panel/apiTwitter/configuracion.php?cadena=';
      busqueda = $('#addTw').text();
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-3);
      console.log(busqueda);
      url2 = url+'from:'+busqueda;
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }*/

   
   $(document).on('click', '.add-tw', _add_tw);
   $(document).on('click', '.ventanaTW', _abrir_tw);
   $(document).on('click', '.ventanaTW2', _abrir_tw2);


function ocultar_alineacion(partido){ $('#ver-alineacion-'+partido).hide(); }
function ver_gol(local,partido,jugador){ $('#'+local+'-gol-'+partido+'-'+jugador).toggle(); }



function verTorneo(id){ $('#torneo-'+id).toggle(); }
function verGesProxis(){ $('#gesProxis').toggle(); }
function verMiFutbol(){ $('#miFutbol').toggle(); }
function verEquipos(){ $('#crear-equipos').toggle(); }
function verCalendario(){ $('#crear-calendario').toggle(); }
function verFechas(){ $('#crear-jornadas').toggle(); }

//function verTempHistorico(id){ $('#temp-historico-'+id).toggle(); }


function refrescarLigas(){ 
  $('#listaTorneos1').html('');
  $('#listaTorneoFutbolme1').html('');
  $('#ligaClick').trigger('click'); 
};

function refrescarTorneos(){ 
  $('#listaTorneos2').html('');
  $('#listaTorneoFutbolme2').html('');
  $('#torneoClick').trigger('click'); 
};


$('.content-inicio').click(function(){
    //alert('Si entre');
    var identity = $(this).attr('data-related');
    console.log("Identity: " + identity);
    $('#main-content-inicio').find('.container-inicio').each(function(){
        var theId = $(this).attr('id');            
        if(theId === identity){
            
            console.log("Id: " + theId);
            
            if (theId=='agenda'){
              var url = "/panelBack/agenda.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#agenda').html(data);
                  }             
              });
            }

            if (theId=='calLiga'){
              var url = "/panelBack/crearCalendario.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#calLiga').html(data);
                  }             
              });
            }

            if (theId=='calTorneo'){
              var url = "/panelBack/partidosTorneo.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#calTorneo').html(data);
                  }             
              });
            }

            if (theId=='fichajes'){
              var url = "/panelBack/fichajes.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#fichajes').html(data);
                  }             
              });
            }

            if (theId=='clubs'){
              var url = "/panelBack/club/index.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#clubs').html(data);
                  }             
              });
            }

            if (theId=='historico'){
              var url = "/panelBack/historico/index.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#historico').html(data);
                  }             
              });
            }

            if (theId=='activa'){
              var url = "/panelBack/jornadaActiva.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#activa').html(data);
                  }             
              });
            }

            if (theId=='medios'){
              var url = "/panelBack/medios.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#medios').html(data);
                  }             
              });
            }

            if (theId=='whatsapp'){
              var url = "/panelBack/whatsapp.php";
              $.ajax({
                  type: 'POST',
                  url: url,
                  data: 'id='+identity,
                  success: function(data){ 
                    //console.log(data);
                  $('#whatsapp').html(data);
                  }             
              });
            }

            

            $(this).show();

        } else {
            $(this).hide();
        }
    });
});

$('.content-fed').click(function(){
    //alert('Si entre');
    var identity = $(this).attr('data-related');
    var id = $(this).attr('data-id');
    var url = "federacion/listarPartidos.php";
    $.ajax({
            type: 'POST',
            url: url,
            data: 'comunidad_id='+id,
            success: function(data){               
              //console.log(data);
              $('#main-content-fed').find('.container-fed').each(function(){
                  var theId = $(this).attr('id');
                  if(theId === identity){
                      $(this).html(data);
                      $(this).show();
                      console.log("Id: " + theId);
                  } else {
                      $(this).hide();
                  }
              }); 
            }    
    });
});

function nuevoDetras (event, form,id,m,c){
    event.preventDefault();
    var url = "index.php"; // El script a dónde se realizará la petición.  
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          if (m==0){
            $('#nuevo-detras-'+id).html(data);
          } else {
            //location.reload();
              $.ajax({
                  type: 'POST',
                  url: '/panelBack/federacion/listarPartidos.php',
                  data: "comunidad_id="+c,
                  success: function(data){
                    $('#fed-'+c).html(data)
                  }
              });
          }
          
        }
    })
}; 

//LIGAS
function cargar_torneos(str,str2,str3){
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("listaTorneos"+str2).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/panelBack/funciones/select_torneos.php",true); //str3 es la carpeta donde va a leer el script
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("categoria_torneo="+str+"&tipo_torneo="+str2+"&usuario_id="+str3);

}

function cargar_torneo_futbolme(str,str2,fecha,usuario_id) {
  console.log(str);
  console.log(str2);
  console.log(fecha);
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {      
      document.getElementById("listaTorneoFutbolme"+str2).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/panelBack/funciones/select_torneo_futbolme.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada="+str+"&tipo_torneo="+str2+"&fecha="+fecha+"&usuario_id="+usuario_id);
}

function cargar_torneo_jornadas(str,str2,fecha) {
  console.log(str);
  console.log(str2);
  console.log(fecha);
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {      
      document.getElementById("listaTorneoJornadas").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/panelBack/funciones/select_torneo_jornadas.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada="+str+"&tipo_torneo="+str2+"&fecha="+fecha);
}

function submitActiva (event, form){
        event.preventDefault();
        
        var url = "/panelBack/funciones/cambiarActiva.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              
              $('#mensaje').html(data);
              var dt = new Date();
              var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();                         
            },
            error: function(){

            }
        });

        return false;
    };  

function submitForm (event, form, partido_id){
        event.preventDefault();
        var temporada = $('#partido-dia-'+partido_id+' .temporada_id').val();
        
        var url = "/panelBack/funciones/grabarMovimiento.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              //$('#partido-dia-'+partido_id).remove();              
              
              $('#mensaje').html('data');
              var dt = new Date();
              var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
              $('#mensaje-'+partido_id).css('background-color','gainsboro');
              $('#mensaje-'+partido_id).html('<p><b>Guardado con éxito a las '+time+'</b></p>');
              $('#mensaje').html('<p><b>Guardado con éxito a las '+time+'</b></p>');
              $('#boton-filtro-'+temporada).trigger('click');
              //$('#gd'+partido_id).css('display','none');
              setTimeout(function() {
                  $('#mensaje-'+partido_id).css('background-color','#F2E0F7');
              },5000);
            },
            error: function(){
            }
        });
        return false;
    };  


function insertarPartidoBetsapi(event, form, id){
  event.preventDefault();
  var url = "/panelBack/funciones/insertarPartidoBetsapi.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        console.log(data);
        if (id>0){
          $('#partido-'+id).html(data);
        }else {
          location.reload();
        }
        
      },
      error: function(){

      }
  });

  return false;
}; 

function mostrarClasificacion(tipo_torneo, temporada){
  $.ajax({
        type: 'POST',
        url: '/panelBack/funciones/mostrarClasificacion.php',
        data: "tipo_torneo="+tipo_torneo+"&temporada="+temporada,
        success: function(data){
          $('#clasificacion').html(data)
          window.location.hash = '#clasificacion';
        }
    });

    return false;
}

function mostrarSancion(id,temporada_id,tipo_torneo){
  $('#equipo' + id).toggle();
  $.ajax({
      type: 'POST',
      url: '/panelBack/funciones/sancion/puntosAnteriores.php',
      data: "equipo="+id+'&temporada_id='+temporada_id+'&tipo_torneo='+tipo_torneo,
      success: function(data){
        $('#sancion'+id).html(data);
        
      }
  });



}
function mostrarColor(id){
  $('#posicion' + id).toggle();
}

function actualizarColor(torneo_id, color_id, posicion, tipo_torneo, temporada){
    $.ajax({
      type: 'POST',
      url: '/panelBack/funciones/clasificacion/actualizarColor.php',
      data: "torneo_id="+torneo_id+"&color_id="+color_id+"&posicion="+posicion+"&temporada="+temporada,
      success: function(data){
        //console.log(data);
        $('#ostiaClasi').trigger('click');
        //location.reload(); 
      }
  });
  return false;
}

function editarApiId(event, form, equipo_id) {   
  event.preventDefault();
  var url = "/panelBack/funciones/editarApiId.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#ver-alineacion-'+equipo_id).html('editado');       
      },
      error: function(){
      }
  });

  return false;
}; 

function agendaMas(fecha){
  console.log(fecha);
  $.ajax({
        type: 'GET',
        url: '/panelBack/agenda.php',
        data: "fecha="+fecha,
        success: function(data){
          $('#agenda').html(data)
        }
    });
    return false;
}

function agendaPendientes(){
  $.ajax({
        type: 'GET',
        url: '/panelBack/agenda/agendaPendientes.php',
        data: "fecha=0",
        success: function(data){
          $('#agenda').html(data)
        }
    });
    return false;
}


function buscarJugador(event, form) { 
  event.preventDefault(); 
  var url = "/panelBack/funciones/jugadores/buscarJugador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#buscar-jugador').html(data);       
      },
      error: function(){
      }
  });

  return false;
}; 

function buscarJugadorTemporada(id){
  $.ajax({
        type: 'POST',
        url: "/panelBack/funciones/jugadores/buscarJugadorTemporada.php",
        data: "temporada_id="+id,
        success: function(data){
          $('#buscar-jugador-temporada').html(data)
        }
    });
    return false;
};

function buscarJugadorPlantilla(id,t){
  console.log(id);
  console.log(t);

  $('#buscar-jugador-temporada').find('.jugador').each(function(){  $(this).hide(); }); 

  $.ajax({
        type: 'POST',
        url: "/panelBack/funciones/jugadores/buscarJugadorPlantilla.php",
        data: "equipo_id="+id+"&temporada_id="+t,
        success: function(data){  
          $('#buscar-jugador-plantilla-'+id).show();        
          $('#buscar-jugador-plantilla-'+id).html(data);
        }
    });
    return false;
};

function buscarJugadorDatos(id,e,t){
  console.log(id);
  console.log(e);

  $('#buscar-jugador-plantilla-'+e).find('.jugador-'+e).each(function(){  $(this).hide(); }); 

  $.ajax({
        type: 'POST',
        url: "/panelBack/funciones/jugadores/buscarJugadorDatos.php",
        data: "jugador_id="+id+"&equipo_id="+e+"&temporada_id="+t,
        success: function(data){  
          $('#buscar-jugador-datos-'+id).show();        
          $('#buscar-jugador-datos-'+id).html(data);
        }
    });
    return false;
};

function modificarJugador(event, form, id) { 
  event.preventDefault(); 
  var url = "/panelBack/funciones/jugadores/modificarJugador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#modificar-jugador-'+id).html(data);       
      },
      error: function(){
      }
  });

  return false;
}; 

function traspasarJugador(event, form, id) { 
  event.preventDefault(); 
  var url = "/panelBack/funciones/jugadores/traspasarJugador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#traspasar-jugador-'+id).html(data);       
      },
      error: function(){
      }
  });

  return false;
}; 

function grabarJugador(event, form, id,t) { 
  event.preventDefault(); 
  var url = "/panelBack/funciones/jugadores/grabarJugador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
       console.log(data);      
       buscarJugadorPlantilla(id,t);       
      },
      error: function(){
      }
  });

  return false;
}; 

function borrarFicheroCache(event, form, id,t) { 
  event.preventDefault(); 
  var url = "/panelBack/funciones/borrarFicheroCache.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
           $('#cache').html(data)  
      },
      error: function(){
      }
  });

  return false;
}; 

function jugadorClub(id){
  $.ajax({
        type: 'POST',
        url: "/panelBack/club/club.php",
        data: "id="+id,
        success: function(data){
          $('#fichajes').hide();
          $('#clubs').show();
          $('#clubs').html(data);
        }
    });
    return false;
};

function subirFichero(f,id){ 
    console.log(f);
    console.log(id);
  var url = "/panelBack/funciones/xel_form.php";  
    $.ajax({
        type: 'POST',
        url: url,
        data: 'f='+f+'&id='+id,
        success: function(data){ 
          $('#subir-fichero-'+id).html(data);
        }
    });  
};

function borrarFichero (f,id){  
    var url = "/panelBack/funciones/xel_upload.php";   
    $.ajax({
        type: 'POST',
        url: url,
        data: 'borrar=1&f='+f+'&id='+id,
        success: function(data){ 
          $('#borro-'+id).html('');              
          $('#subir-fichero-'+id).html(data);
        }
    });  
} 

function borrarJson (id){  
    var url = "/panelBack/funciones/borrarJson.php";   
    $.ajax({
        type: 'POST',
        url: url,
        data: '&id='+id,
        success: function(data){ 
          $('#borrar-json').html('jsons borrados'); 
        }
    });  
} 

$('body').on('submit', '.formImg', function(e){ 
        e.preventDefault();
        var f = $(this);
        var fName = f.attr('name');
        console.log(fName);
        var formData = new FormData(document.getElementById("formFicheroUnico-"+fName));
        //formData.append("dato", "valor"); para añadir campos al formulario.
        $.ajax({
            url: "/panelBack/funciones/xel_upload.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res){
            $('#muestro-'+fName).html(''); 
            $('#formFicheroUnico-'+fName).hide();
            $('#subirFichero-'+fName).html(res);
        });
});

function accionesTorneo(c,t,ac){
  $.ajax({
        type: 'POST',
        url: '/panelBack/federacion/listarPartidos.php',
        data: "modo=accion&ac="+ac+"&comunidad_id="+c+"&torneo_id="+t,
        success: function(data){
          $('#fed-'+c).html(data)
        }
    });
}

function editarCalendario(t,tt){

  if (tt==1){
    var ruta='/panelBack/crearCalendario.php';
  } else {
    var ruta='/panelBack/partidosTorneo.php';
  }
   $.ajax({
        type: 'POST',
        url: ruta,
        data: "temporada_id="+t,
        success: function(data){
          $('#federaciones').hide();
          if (tt==1){
            $('#calLiga').show();
            $('#calLiga').html(data);
          } else {
            $('#calTorneo').show();
            $('#calTorneo').html(data);
          }
        }
    });
    return false;
};

function generarCalendarioSubmit (event, form, temporada){
        event.preventDefault();
        var url = "/panelBack/includes/crearCalendario/generar_calendario.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              refrescarTemporada(temporada);
            },
            error: function(){

            }
        });
    }; 

function submitSustituirEquipo (event, form){
        event.preventDefault();
        var url = "/panelBack/includes/crearCalendario/sustituir_equipo_temporada.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              $('#crear-equipos').html(data);
            }
        });
    }; 

function submitAgregarEquipo (event, form, t=0){
  console.log(t);
        event.preventDefault();
        var url = "/panelBack/includes/crearCalendario/insertar_equipo_temporada.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              if (t>0){
                refrescarTorneo(t);
              } else {
                $('#crear-equipos').html(data);
              }
              
            }
        });
    }; 
function eliminarEquipoTemporada(event, temporada_id, equipo_id,ct,tt){
        event.preventDefault();
        var url = "/panelBack/includes/crearCalendario/eliminar_equipo_temporada.php"; 
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id=" + temporada_id + "&equipo_id=" + equipo_id + "&categoria_torneo=" + ct + "&tipo_torneo=" + tt,
            success: function(data){
              if (tt==2){
                refrescarTorneo(temporada_id);
              } else {
                $('#crear-equipos').html(data);
              }
            }
        });
    }; 

function verEquiposAgregar(id) {
  $.ajax({
    type: 'POST',
    url: '/panelBack/includes/crearCalendario/verEquiposAgregar.php',
    data: "temporada_id=" + id,
    success: function(data){
      $('#ver-equipos-agregar').html(data);
    }
  });
}

function submitEliminarCalendario (event, form, temporada){
    event.preventDefault();
    var url = "/panelBack/includes/crearCalendario/borrar_calendario.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          refrescarTemporada(temporada);
        }
    });
}; 

$('.equipo-seleccionable').on('change', function(){
    var equipoId = $(this).val();
    var equipoNombre = $(this).children('option:selected').html();
    console.log('equipo: ' + equipoNombre + ' ' + equipoId);
    var posicion = $(this).attr('data-posicion');
    var temporada = $('#seleccionables').attr('data-temporada');
    console.log('posicion '+posicion);        
    $('.equipo-' + posicion).html(equipoNombre);
    $('.equipo-' + posicion).attr('data-id', equipoId);
    if (equipoId == '') {
        $('option').show();
    } else {
        $('option[value="' + equipoId + '"]').not('.equipo-seleccionable[data-posicion="' + posicion + '"] option[value="' + equipoId + '"]').hide();
    };
    
    $.ajax({
        type: 'POST',
        url: '/panelBack/includes/crearCalendario/actualizarCalendarioTemporada.php',
        data: 'temporada=' + temporada +'&combinacion=' + posicion + '&equipoId=' + equipoId,
        success: function(data){
          console.log(data); 
        }
    });
    
});

function refrescarTemporada(t){
  var ruta='/panelBack/crearCalendario.php';
   $.ajax({
        type: 'POST',
        url: ruta,
        data: "temporada_id="+t,
        success: function(data){
          console.log(data);
            $('#calLiga').html(data);          
        }
    });
};

function refrescarTorneo(t,f=0,g=0){
  var ruta='/panelBack/partidosTorneo.php';
   $.ajax({
        type: 'POST',
        url: ruta,
        data: "temporada_id="+t+"&fase_id="+f+"&grupo_id="+g,
        success: function(data){
          console.log(data);
            $('#torneos').hide();
            $('#calTorneo').show();
            $('#calTorneo').html(data);          
        }
    });
};

function modificarFechas (event, form, t){    
    event.preventDefault();
    var url = "/panelBack/includes/crearCalendario/modificar_jornadas.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          refrescarTemporada(t);
        }
    });
}; 

function compararPartidos(b,t){
  event.preventDefault();
    var url = "/panelBack/funciones/apis/comprobando.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: "temporada_id="+t+"&api_id="+b,
        success: function(data){
          $('#calLiga').html(data);
        }
    });
}

function editarJornada(str1, str2, str3) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("j" + str1 + "-t" + str2).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/panelBack/funciones/editarJornada.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("j=" + str1 + "&t=" + str2 + "&ct=" + str3);
}

function submitEditarJornada (event, form, j, t){ 
console.log(t);  
console.log(j);   
    event.preventDefault();
    var url = "/panelBack/funciones/editarJornada.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
            refrescarTemporada(t);        
        }
    });
}; 




function quitarPartido(id){
    var url = "/panelBack/funciones/quitarPartido.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id,
        success: function(data){
          $('#quitar-partido-'+id).html(data);
        }
    });
}

function grabarPartido (event, form, t, tt){ 
console.log(t);  
console.log(tt);   
    event.preventDefault();
    var url = "/panelBack/funciones/grabarPartido.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          if (tt==1){
            refrescarTemporada(t);
          } else {
            refrescarTorneo(t);
          }
          
        }
    });
}; 

//m=0 insertar - m=1 quitar
function gestionFases(t,tor,f,m,g=0){ 
    var url = "/panelBack/funciones/gestionFases.php"; 
    $.ajax({
        type: 'POST',
        url: url,
        data: "tor="+tor+"&fase_id="+f+"&m="+m+"&grupo_id="+g,
        success: function(data){
          //$('#calTorneo').html(data);  
          refrescarTorneo(t,f);
        }
    });
}

function alineaciones(id,modo,valor) {   
   $('#ver-alineacion-'+id).show();  
      //$('#ver-alineacion-'+id).toggle(); 
      var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            document.getElementById('ver-alineacion-'+id).innerHTML=xmlhttp.responseText;
            }
          }
        xmlhttp.open("POST","/panelBack/funciones/alineaciones/alineacionPartido.php",true); //str3 es la carpeta donde va a leer el script
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("partido_id=" + id + "&modo=" + modo + "&jugador_id=" + valor);
} 


function partidosProximos(betsapi, t, tt){
  event.preventDefault();
  var url = "/panelBack/partidosProximos.php"; // El script a dónde se realizará la petición.
  $.ajax({
        type: 'POST',
        url: url,
        data: "id="+betsapi+"&temporada_id="+t+"&tipo_torneo="+tt,
        success: function(data){

          if (tt==2){
            $('#liga').hide();
            $('#torneos').html('');
            $('#torneos').show(data); 
          } else {
            $('#torneos').hide();
            $('#liga').html(data); 
            $('#liga').show(); 
          }
          
        }
    });
}; 

function verPartido(id,modo) {
  var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if (modo==1){
            document.getElementById('betsapi-'+id).innerHTML=xmlhttp.responseText;            
            } else {
            document.getElementById('apifootball-'+id).innerHTML=xmlhttp.responseText; 
            }
        }
      }
    xmlhttp.open("POST","/panelBack/funciones/verPartido.php",true); //str3 es la carpeta donde va a leer el script
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&modo=" + modo);
} 

function verTW2(cadena){
  event.preventDefault();
  var url = "/panelBack/apiTwitter/configuracion.php"; // El script a dónde se realizará la petición.
  $.ajax({
        type: 'POST',
        url: url,
        data: "cadena="+cadena,
        success: function(data){
            $('#cache').html(data);
        }
    });
}; 

function grabarTwitter (event, form, equipo_id){
  event.preventDefault();
  var url = "/panelBack/funciones/grabarTwitters.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alerta-'+equipo_id).html(data+'...grabado');       
      },
      error: function(){
      }
  });

  return false;
}; 

function insertarMedio (medio_id, partido_id, modo){
  var nombre = $('#medio-'+partido_id+' option[value='+medio_id+']').text();
  var url = "/panelBack/funciones/insertarMedio.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "medio_id="+medio_id+"&partido_id="+partido_id+"&modo="+modo,
        success: function(data){
          console.log(data);
          if (modo == 0) {
            $('#partido-medios-' + partido_id).append('<span id="partido-medio-' + medio_id + '">' + nombre + ' - <a href="#" onclick="insertarMedio(' + medio_id + ',' + partido_id + ', 1)">quitar</a></span><br />');
          } else {
            $('#partido-medio-' + medio_id).remove();
          }
        },
        error: function(){

        }
    });
    return false;
}; 

function clubRFEF (event, form){
  event.preventDefault();
  var url = "/panelBack/club/clubRFEF.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#listaClubes').html(data);       
      }
  });
}; 

function jornadaActiva (event, form){
  event.preventDefault();
  var url = "/panelBack/jornadaActiva.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#activa').html(data);       
      }
  });
}; 

function ordenTorneo (id){
  var valor = $('#boton-apuestaMA-'+id).val(); 
  var valor2 = $('#boton-betsapi-'+id).val(); 
  console.log(valor);
   console.log(valor2);
  var url = "/panelBack/funciones/ordenTorneo.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: "id="+id+"&apuestaMA="+valor+"&betsapi="+valor2,
      success: function(data){
        cargar_torneos(1,3,0);
      }
  });
}; 

function cargarClubes(str)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("listaClubes").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/panelBack/club/cargar_clubes.php",true); //str3 es la carpeta donde va a leer el script
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("pais_id="+str);

}


function enfrentamientos(e1,e2,et1,et2){
  event.preventDefault();
  var url = "/panelBack/utiles/enfrentamientos.php"; // El script a dónde se realizará la petición.
  $.ajax({
        type: 'POST',
        url: url,
        data: "e1="+e1+"&e2="+e2+"&et1="+et1+"&et2="+et2,
        success: function(data){
            $('#liga').hide();
            $('#pruebas').html(data);
        }
    });
};  

function verClub(id){
  var url = "/panelBack/club/club.php"; // El script a dónde se realizará la petición.
  $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id,
        success: function(data){
            $('#club-id').html(data);
        }
    });
}; 

function verEquipo(id) {
  $.ajax({
    type: 'POST',
    url: '/panelBack/club/equipo.php',
    data: "id=" + id,
    success: function(data){
      $('#equipo-id').html(data);
    }
  });
}

function codigoRfef (event, form,id){
  event.preventDefault();
  var url = "/panelBack/club/codigoRFEF.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
        verClub(club_id) 
      }
  });
}; 

function guardarClub (event, form,id){
        event.preventDefault();
        var url = "/panelBack/club/guardarClub.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              verClub(id) 
            }
        });
    };  


function crearClub (event, form){
        event.preventDefault();
        var url = "/panelBack/club/crearClub.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              cargarClubes(60);
            }
        });
    };  

function crearEquipo (event, form,club_id){
        event.preventDefault();
        var url = "/panelBack/club/nuevoEquipo.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              verClub(club_id)
            }
        });
    }; 


function orden_torneo2 (id){
  var valor = $('#boton-visible-'+id).val(); 
  var valor2 = $('#boton-betsapi-'+id).val(); 
  var valor3 = $('#boton-jornadas-'+id).val(); 
  
  console.log(valor);
   console.log(valor2);
   console.log(valor3);
  var url = "/panelBack/funciones/ordenTorneo2.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: "id="+id+"&visible="+valor+"&betsapi="+valor2+"&jornadas="+valor3,
      success: function(data){
        refrescarTemporada(id);
      },
      error: function(){
      }
  });
  return false;
}; 

function submitFormGol (event, form, partido_id){
  event.preventDefault();
  var temporada = $('#temporada').val();
  var partido = $('#partido').val();
  console.log(partido);
  var url = "/panelBack/funciones/guardarGol.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        console.log(data); 
        $('#alineaciones-'+partido).trigger('click');             
      },
      error: function(){
      }
  });
  
  return false;
}; 

function QuitarGol (golId, temporada_id, partido_id){
 
  var url = "/panelBack/funciones/guardarGol.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: "golId="+golId+"&temporada_id="+temporada_id+"&partido_id="+partido_id,
      success: function(data){
        console.log(data);
        $('#alineaciones-'+partido_id).trigger('click');  
      },
      error: function(){
      }
  });
  return false;
}; 


function crearCalendario(id){  
  var url = "/panelBack/crearCalendario.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'temporada_id='+id,
        success: function(data){ 
        $('#calLiga').html(data);
        }             
    });
};  


function guardarDatos(id){  
  var url = "/panelBack/historico/index.php";
    $.ajax({
        type: 'GET',
        url: url,
        data: 'modo=guardarDatos&temporada='+id,
        success: function(data){ 
        $('#historico').html(data);
        }             
    });
};  

function guardarExcepciones(id){  
  var url = "/panelBack/historico/index.php";
    $.ajax({
        type: 'GET',
        url: url,
        data: 'modo=guardarExcepciones&temporada='+id,
        success: function(data){ 
        $('#historico').html(data);
        }             
    });
};  


function buscadorEquipos (event, form, t){
  event.preventDefault();
   console.log(t); 
  var url = "/panelBack/funciones/buscadorEquipos.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        $('#partidos-torneo-'+t).html(data);             
      }
  });
}; 


function editarTemporada (event, form, id){
  event.preventDefault();
  var url = "/panelBack/funciones/modificarTorneo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        $('#torneo-'+id).show(); 
        $('#torneo-'+id).html(data);            
      }
  });
}; 

function guardarEquipo (event, form, e){
  event.preventDefault();
  var url = "/panelBack/club/guardarEquipo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        verEquipo(e);            
      }
  });
}; 

function addSancion (event, form, tt,t,j){
  event.preventDefault();  
  var url = "/panelBack/funciones/clasificacion/addSancion.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        mostrarClasificacion(tt, ''+t+',0,'+j+',0');         
      }
  });
}; 

function addAscenso (event, form, tt,t,j){
  event.preventDefault();  
  var url = "/panelBack/funciones/clasificacion/addAscenso.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
         mostrarClasificacion(tt, ''+t+',0,'+j+',0');         
      }
  });
}; 

function dieSancion(id,tt,t,j){  
  var url = "/panelBack/funciones/clasificacion/addSancion.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'modo=quitar&id='+id,
        success: function(data){ 
          mostrarClasificacion(tt, ''+t+',0,'+j+',0'); 
        }             
    });
};  

function dieAscenso(id,tt,t,j){  
  var url = "/panelBack/funciones/clasificacion/addAscenso.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'modo=quitar&id='+id,
        success: function(data){ 
          mostrarClasificacion(tt, ''+t+',0,'+j+',0'); 
        }             
    });
};  

function editarEstadio(id){  
  var url = "/panelBack/club/estadio.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'id='+id,
        success: function(data){ 
          $('#editar-estadio').html(data);
        }             
    });
};  

function crearEstadio(id){
  console.log('crearEstadio');  
  var url = "/panelBack/club/crearEstadio.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'id='+id,
        success: function(data){ 
          $('#editar-estadio').html(data);
        }             
    });
};  

function nuevoEstadio (event, form){
  event.preventDefault();  
  var url = "/panelBack/club/nuevoEstadio.php";
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        $('#editar-estadio').html(data); 
      }
  });
}; 

function guardarEstadio (event, form, id){
  event.preventDefault();  
  var url = "/panelBack/club/guardarEstadio.php";
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        $('#editar-estadio').html('Registro modificado');        
        editarEstadio(id);         
      }
  });
}; 


$('#estadio_id').on('change', function(){
  var id = $(this).val();
  if (id == '(NULL)') {
    $('#enlace-estadio').attr('href', '/panelBack/club/crearEstadio.php');
    $('#enlace-estadio').text('Crear estadio');
  } else {
    $('#enlace-estadio').attr('href', '/panelBack/club/estadio.php?id=' + id);
    $('#enlace-estadio').text('Editar estadio');
    $('#imagen-estadio').attr('src', '/img/estadios/estadio' + id + '.png');
  };      
  var nombre = $("#estadio_id option[value='" + id + "']").text()
  console.log(nombre);

});
$('#equipacion_id').on('change', function(){
  var id = $(this).val();
  if (id == '(NULL)') {
    $('#enlace-equipacion').attr('href', '/panelBack/club/crearEquipacion.php');
    $('#enlace-equipacion').text('Crear equipacion');
  } else {
    $('#enlace-equipacion').attr('href', '/panelBack/club/equipacion.php?id=' + id);
    $('#enlace-equipacion').text('Editar equipacion');
    $('#imagen-equipacion').attr('src', '/img/equipaciones/equipacion' + id + '.jpg');
  };      
  var nombre = $("#equipacion_id option[value='" + id + "']").text()
  console.log(nombre);

});

function editor (event, form){
  event.preventDefault();  
  var url = "/panelBack/editor.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          //location.reload(); 
          $('#mensaje').html(data);        
        }           
    });
};

function quitarNoticia(id){
  var url = "/panelBack/editor.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'modo=quitar&id='+id,
        success: function(data){ 
          $('#noticia-'+id).html('Noticia eliminada');
        }             
    });
};  

function procesar(event, form){
  event.preventDefault();
  var url = "/panelBack/federacion/procesador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
        $('#clasificacion').html(data);
      }
  });
};   

function filtrarComandes(local,visitante,partido) {

    var data = {
        div: jQuery('#id_division').val(),
        co: jQuery('#id_comunidad').val(),
        t: jQuery('#id_temporada').val(),
        id_usuario: jQuery('#id_usuario').val(),
        l: local,
        v: visitante,
        p: partido
    };
    console.log(data);
    var form = document.createElement('form');
    form.style.visibility = 'hidden';
    form.method = 'POST';
    //form.action = window.location.href;
    form.action = '/panelBack/editor.php';
    form.target = '_blank';
    Object.keys(data).map(function(objectKey, index) {
        var value = data[objectKey];
        var input = document.createElement('input');
        input.setAttribute('name', objectKey);
        input.setAttribute('value', value);
        console.log(value);
        form.appendChild(input);
    });

    console.log(form);
    document.body.appendChild(form);
    form.submit();

};


function submitTwitters (event, form, club_id){
        event.preventDefault(); 
        var url = "/panelBack/funciones/grabarTwittersClub.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              //$('#partido-dia-'+partido_id).remove();              
              console.log(data);
              $('#mensaje').html('<p><b>grabado</b></p>'); 
            },
            error: function(){
            }
        });
        return false;
    };  

function enviarMensajeWFM(id){                
    var url = "/panelBack/chatapi/acceso.php";
    var texto = $('#whatsapp-'+id).val();
    console.log(id);
    console.log(texto);
    $.ajax({
        type: 'GET',
        url: url,
        data: 'sendMessage=1&temporada_id='+id+'&txt='+texto,
        success: function(data){ 
                       
              $('#whatsapp-'+id).val(data);             
            
        }
          
    });
};  

function crearWhatsappFM(id){                
    var url = "/panelBack/chatapi/acceso.php";
    var texto = $('#new-whatsapp-'+id).val();
    console.log(id);
    console.log(texto);
    $.ajax({
        type: 'GET',
        url: url,
        data: 'group=1&torneo_id='+id+'&txt='+texto,
        success: function(data){ 

              console.log(data);
                       
              $('#new-whatsapp2-'+id).html(data);             
            
        }
          
    });
};  

function verTelevisados(){
  var url = "/panelBack/funciones/verTelevisados.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'modo=ver',
        success: function(data){ 
          $('#pagina-whatsapp').html(data);
        }             
    });
}; 

function enviarHorarios(idChat,txt){
  var url = "/panelBack/funciones/enviarHorarios.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: 'idChat='+idChat+'&txt='+txt,
        success: function(data){ 
          $('#chat-'+idChat).html(data);
        }             
    });
}; 

function generarPDF(temporada_id){
  var url = "/panelBack/funciones/generarPDF.php";
  
  $.ajax({
      type: 'POST',
      url: url,
      data: 'temporada_id='+temporada_id,
      success: function(data){ 
        $('#pdf-'+temporada_id).html(data);
      }             
  });
}; 

function loginNew(){

  var url = "/panelBack/funciones/login.php";

  const formData = {
    'trigger':'validacionDatosLogin',
    'user':jQuery('#exampleInputEmailLogin').val(),
    'password':jQuery('#exampleInputPasswordLogin').val()
  }
  console.log("ejecutando")
  
   $.ajax({
     type: 'POST',
     url: url,
     data: formData,
    success: function(data){ 
      console.log(data)
      let response = JSON.parse(data)
      if(response == 'true'){
        location.reload();
      }
    }             
  });  
}

jQuery(document).on('click', '.btn-login-panel',function(){
  loginNew()
})

</script>

