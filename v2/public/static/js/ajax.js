
function validarResultado(id,partido_id,gl,gv,tipo){
  $.ajax({
        type: 'POST',
        url: '/src/funciones/validarResultado.php',
        data: "id="+id+"&partido_id="+partido_id+"&gl="+gl+"&gv="+gv+"&tipo="+tipo,
        success: function(data){
          console.log(data);
          console.log(id);
          console.log(tipo);
          if (tipo===0){
            $('#va-'+id).html('OK');
            $('#ig-'+id).html('---');
          } else {
            $('#ig-'+id).html('OK');
            $('#va-'+id).html('---');
          }
          
        }
    });

    return false;
}


function submitEnviarResultado (event, form, partido_id){
    event.preventDefault();
    var url = "/src/funciones/enviarResultado.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          console.log(data);
          $('#resultado-'+partido_id).html(data);              
        },
        error: function(){
        }
    });
    return false;
}; 

function submitFederacionGrabarId (event, form, temporada_id){
    event.preventDefault();
    var url = "/src/funciones/submitFederacionGrabarId.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          console.log(data);
          $('#mensaje-'+temporada_id).html(data);              
        },
        error: function(){
        }
    });
    return false;
};  

function submitFederacion (event, form, temporada_id){
    event.preventDefault();
    var url = "/src/funciones/submitFederacion.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          console.log(data);
          $('#mensaje-'+temporada_id).html(data);              
        },
        error: function(){
        }
    });
    return false;
};  



function play_clasi(temporada_id,jornada) {
    var data = {
        temporada_id: temporada_id,
        jornada: jornada,
    };

    console.log(data);

    $.ajax({
        type: 'POST',
        url: '/z_play_clasi',
        data: data,
        cache: false,
        success: function(data){
            console.log(data);
            $('#playClasi').html($(data).filter('#playClasi').html());
        },
        error: function(){

        }
    });
}


function submitForm (event, form, partido_id){
        event.preventDefault();
        var temporada = $('#partido-dia-'+partido_id+' .temporada_id').val();
        
        var url = "/src/funciones/grabarMovimiento.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              //$('#partido-dia-'+partido_id).remove();              
              console.log(data);
              $('#mensaje').html('');
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

function submitTwitters (event, form, club_id){
        event.preventDefault(); 
        var url = "/src/funciones/grabarTwittersClub.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              //$('#partido-dia-'+partido_id).remove();              
              console.log(data);
              $('#mensaje-'+club_id).html('<p><b>grabado</b></p>'); 
            },
            error: function(){
            }
        });
        return false;
    };  



function mostrarClasificacion(tipo_torneo, temporada){
  $.ajax({
        type: 'POST',
        url: '/src/funciones/mostrarClasificacion.php',
        data: "tipo_torneo="+tipo_torneo+"&temporada="+temporada,
        success: function(data){
          $('#clasificacion').html(data)
          window.location.hash = '#clasificacion';
        }
    });

    return false;
}

function mostrarSancion(id){
  $('#equipo' + id).toggle();
}
function mostrarColor(id){
  $('#posicion' + id).toggle();
}

function actualizarColor(torneo_id, color_id, posicion, tipo_torneo, temporada){
    $.ajax({
      type: 'POST',
      url: '/src/funciones/clasificacion/actualizarColor.php',
      data: "torneo_id="+torneo_id+"&color_id="+color_id+"&posicion="+posicion+"&temporada="+temporada,
      success: function(data){
        //console.log(data);
        $('#ostiaClasi').trigger('click');
        //location.reload(); 
      }
  });
  return false;
}





function submitPartidoApi (event, form, partido_id){
  event.preventDefault();
  var url = "/src/funciones/guardarPartidoApi.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alerta-'+partido_id).html('grabado');       
      },
      error: function(){
      }
  });

  return false;
}; 


function editar_partido(str1) {
      console.log(str1);
      var xmlhttp;
        if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("partido-"+str1).innerHTML=xmlhttp.responseText;
            }
        }
      xmlhttp.open("POST","/src/funciones/calendario/editar_partido.php",true); 
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+str1);
  }

function editar_jugador(str1) {
      console.log(str1);
      var xmlhttp;
        if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("jugador-"+str1).innerHTML=xmlhttp.responseText;
            }
        }
      xmlhttp.open("POST","/src/funciones/calendario/editar_jugador.php",true); 
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+str1);
  }

function api_partido(str1,str2,str3) {
      console.log(str1);
      var xmlhttp;
        if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("api_partido-"+str1).innerHTML=xmlhttp.responseText;
            }
        }
      xmlhttp.open("POST","/src/funciones/calendario/api_partido.php",true); 
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+str1+"&local="+str2+"&visitante="+str3);
  }


function submitEditarPartido (event, form, partido_id){
  event.preventDefault();
  var url = "/src/funciones/calendario/modificar_partido.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#partido-'+partido_id).html('Todo correcto OK');       
      },
      error: function(){
      }
  });

  return false;
}; 

function submitEditarJugador (event, form, jugador_id){
  event.preventDefault();
  var url = "/src/funciones/calendario/modificar_jugador.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#jugador-'+jugador_id).html('Todo correcto OK');       
      },
      error: function(){
      }
  });

  return false;
}; 





function eliminarEquipoTemporada(event, temporada_id, equipo_id){
        event.preventDefault();
        
        var url = "/src/funciones/calendario/eliminar_equipo_temporada.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id=" + temporada_id + "&equipo_id=" + equipo_id,
            success: function(data){
              console.log(data);
              $('#equipo-temporada-' + equipo_id).remove();
            },
            error: function(){

            }
        });

        return false;
    }; 



function modificarFechas (event, form, temporada_id){
        event.preventDefault();
        
        var url = "/src/funciones/calendario/modificar_jornadas.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#mensaje-fechas').html('Fechas modificadas');
              $.ajax({
                  type: 'POST',
                  url: '/src/funciones/calendario/recargarCalendario.php',
                  data: 'temporada_id=' + temporada_id,
                  success: function(data){
                    console.log(data);
                    $('#calendario-central').html(data);
                  },
                  error: function(){

                  }
              });
            },
            error: function(){

            }
        });

        return false;
    }; 




function submitInsertarClub (event, form) {
  event.preventDefault();
  var url = "/src/funciones/insertarClub.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alertaInsertarClub').html('Club y equipo grabado');       
      },
      error: function(){
      }
  });

  return false;
}



function submitAsociarTorneo (event, form){
  event.preventDefault();
  var url = "/src/funciones/asociarTorneo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alertaAsociar').html('torneo asociado');       
      },
      error: function(){
      }
  });

  return false;
}; 

function submitInicioTorneo (event, form){
  event.preventDefault();
  var url = "/src/funciones/inicioTorneo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alertaInicio').html('Fecha de inicio insertada');       
      },
      error: function(){
      }
  });

  return false;
}; 


function submitCrearPartidos (event, form){
  event.preventDefault();
  var url = "/src/funciones/crearPartidos.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alerta').html('peticion realizada');       
      },
      error: function(){
      }
  });

  return false;
}; 


function submitEquipoApi (event, form, equipo_id){
  event.preventDefault();
  var url = "/src/funciones/guardarEquipoApi.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alerta-'+equipo_id).html('grabado');       
      },
      error: function(){
      }
  });

  return false;
}; 

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
    document.getElementById("listaTorneos").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/src/funciones/select_torneos.php",true); //str3 es la carpeta donde va a leer el script
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("categoria_torneo="+str+"&tipo_torneo="+str2+"&usuario_id="+str3);

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
xmlhttp.open("POST","/src/funciones/select_torneo_jornadas.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada="+str+"&tipo_torneo="+str2+"&fecha="+fecha);
}

function cargar_torneo_futbolme(str,str2,fecha) {
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
      document.getElementById("listaTorneoFutbolme").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/src/funciones/select_torneo_futbolme.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada="+str+"&tipo_torneo="+str2+"&fecha="+fecha);
}




//_**************************************************

function orden_torneo (id){
  var valor = $('#boton-apuestaMA-'+id).val(); 
  var valor2 = $('#boton-betsapi-'+id).val(); 
  console.log(valor);
   console.log(valor2);
  var url = "/src/funciones/ordenTorneo.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: "id="+id+"&apuestaMA="+valor+"&betsapi="+valor2,
      success: function(data){
        //console.log(data);
        location.reload(); 
      },
      error: function(){
      }
  });
  return false;
}; 

function orden_torneo2 (id){
  var valor = $('#boton-visible-'+id).val(); 
  var valor2 = $('#boton-betsapi-'+id).val(); 
  var valor3 = $('#boton-jornadas-'+id).val(); 
  console.log(valor);
   console.log(valor2);
   console.log(valor3);
  var url = "/src/funciones/ordenTorneo2.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: "id="+id+"&visible="+valor+"&betsapi="+valor2+"&jornadas="+valor3,
      success: function(data){
        //console.log(data);
        location.reload(); 
      },
      error: function(){
      }
  });
  return false;
}; 




function cargar_datos(str) {
  var xmlhttp;

  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      
      document.getElementById("listaDatos").innerHTML=xmlhttp.responseText; 

       
      
      
    }
  }
xmlhttp.open("POST","new_calendario/datos_new_calendario.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada_id="+str);
}






function submitCrearReferencia (event, form){
        event.preventDefault();
        
        var url = "new_calendario/crear_referencia.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#referencia').html(data);
            },
            error: function(){

            }
        });

        return false;
    }; 

function submitGuardarCalendario (event, form, temporada_id){
        event.preventDefault();
        
        var url = "new_calendario/guardar_calendario.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#guardarCalendario').html('Calendario guardado con éxito.');
              $.ajax({
                  type: 'POST',
                  url: 'new_calendario/recargarCalendario.php',
                  data: 'temporada_id=' + temporada_id,
                  success: function(data){
                    console.log(data);
                    $('#calendario-central').html(data);
                  },
                  error: function(){

                  }
              });
            },
            error: function(){

            }
        });

        return false;
    }; 
function borrarCalendario(event, temporada_id){
        event.preventDefault();
        
        var url = "new_calendario/borrar_calendario.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'GET',
            url: url,
            data: "temporada_id=" + temporada_id,
            success: function(data){
              console.log(data);
              $('#calendario-central').html("<h1>Calendario eliminado</h1>");
            },
            error: function(){

            }
        });

        return false;
    }; 


function insertarEquipo(event, temporada_id, equipo_id, nombre){
        event.preventDefault();
        
        var url = "new_calendario/insertar_equipo_temporada.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id=" + temporada_id + "&equipo_id=" + equipo_id,
            success: function(data){
              console.log(data);
              $('#equipos-temporada').append('<li id="equipo-temporada-' + equipo_id + '"> ' + nombre + ' - <a href="#" onclick="eliminarEquipo(event, ' + temporada_id + ', ' + equipo_id + ')">quitar</a></li>');
            },
            error: function(){

            }
        });

        return false;
    }; 

function generarCalendarioSubmit (event, form){
        event.preventDefault();
        
        var url = "new_calendario/generar_calendario.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#calendario-central').html(data);
            },
            error: function(){

            }
        });

        return false;
    }; 


function editar_campo(str1,str2) {
      var xmlhttp;
        if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        } else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            document.getElementById("editCampo-"+str1).innerHTML=xmlhttp.responseText;              
        }
      xmlhttp.open("POST","/src/funciones/editar_campo.php",true); 
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+str1+"&campo="+str2);
  }

function vincular_campo(str1,str2) {
      var xmlhttp;
        if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        } else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            document.getElementById("vinculCampo-"+str2).innerHTML=xmlhttp.responseText;              
        }
      xmlhttp.open("POST","/src/funciones/vincular_campo.php",true); 
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+str1+"&partidoAPI="+str2);
  }

function editar_campo_ok (event, form, partido_id){
  event.preventDefault();
  var url = "/src/funciones/editar_campo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#editCampo-'+partido_id).html('Todo correcto OK');       
      },
      error: function(){
      }
  });

  return false;
}; 

function vincular_campo_ok (event, form, partidoAPI){
  event.preventDefault();
  var url = "/src/funciones/vincular_campo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#vinculCampo-'+partidoAPI).html('Vinculado correcto OK');       
      },
      error: function(){
      }
  });

  return false;
}; 

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
        xmlhttp.open("POST","/src/funciones/alineaciones/alineacionPartido.php",true); //str3 es la carpeta donde va a leer el script
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("partido_id=" + id + "&modo=" + modo + "&jugador_id=" + valor);
} 

function editarApiId(event, form, equipo_id) {   
  event.preventDefault();
  var url = "/src/funciones/editarApiId.php"; // El script a dónde se realizará la petición.
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


function grabarTwitter (event, form, equipo_id){
  event.preventDefault();
  var url = "/src/funciones/grabarTwitters.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#alerta-'+equipo_id).html('grabado');       
      },
      error: function(){
      }
  });

  return false;
}; 

function equiposPais(id){
event.preventDefault();
var url = "/src/funciones/equiposPais.php"; // El script a dónde se realizará la petición.
$.ajax({
    type: 'POST',
    url: url,
    data: "id=" + id,
    success: function(data){
      console.log(data);
      $('#equipos-pais').html(data);
    },
    error: function(){

    }
});

return false;
}; 

function insertarPartidoBetsapi(event, form, id){
event.preventDefault();
var url = "/src/funciones/insertarPartidoBetsapi.php"; // El script a dónde se realizará la petición.
$.ajax({
    type: 'POST',
    url: url,
    data: form,
    success: function(data){
      console.log(data);
      $('#partido-'+id).html(data);
    },
    error: function(){

    }
});

return false;
}; 


function cargar_torneosU(str,str2) {      
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
      document.getElementById("listaTorneos").innerHTML=xmlhttp.responseText;
      }
    };
  xmlhttp.open("POST","/src/usuarios/select_torneos.php",true); //str3 es la carpeta donde va a leer el script
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("categoria_torneo="+str+"&modo="+str2);

}

function cargar_equiposU(str) {        
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
      document.getElementById("listaEquipos").innerHTML=xmlhttp.responseText;
      }
    };
  xmlhttp.open("POST","/src/usuarios/select_equipos.php",true); //str3 es la carpeta donde va a leer el script
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("temporada_id="+str);

}

function anadir_equipo(str) {
  console.log(str);
  $.ajax({
    type: 'POST',
    url: "/src/usuarios/anadirEquipoFavorito.php",
    data: "equipo_id="+str
    })

    .done(function(data) {
      //console.log(data);
        window.location.href = "/index.php?fm=1&n1=config&pest=equipos";                 
    }); 
    
} 

function insertarMedio (medio_id, partido_id, modo){
  var nombre = $('#medio-'+partido_id+' option[value='+medio_id+']').text();
  var url = "/src/funciones/insertarMedio.php"; // El script a dónde se realizará la petición.
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

function submitActiva (event, form){
        event.preventDefault();
        
        var url = "/src/funciones/cambiarActiva.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#mensaje').html('');
              var dt = new Date();
              var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
              $('#mensaje').html('<p>Jornada activa modificada a las '+time+'</p>'); 
              //cargar_torneos(1,1);
              //cargar_torneo_jornadas('1,38,2,0','1');
            
            },
            error: function(){

            }
        });

        return false;
    };  

function ver_apuestas(str1, str2, str3) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("odds-" + str1).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/src/funciones/apuestas.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + str1 + "&temporada_id=" + str2 + "&bd=" + str3);
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
    xmlhttp.open("POST", "/src/funciones/editarJornada.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("j=" + str1 + "&t=" + str2 + "&ct=" + str3);
}


function mostrarPlantilla(str1, str2, str3) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("p-" + str1).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/src/funciones/mostrarPlantilla.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + str1 + "&e=" + str2 + "&j=" + str3);
}


function ver_gol(local,partido,jugador){
      $('#'+local+'-gol-'+partido+'-'+jugador).toggle(); 
  }
function ver_tarjeta(local,partido,jugador){
      $('#'+local+'-tar-'+partido+'-'+jugador).toggle(); 
  }

function ocultar_alineacion(partido){
      $('#ver-alineacion-'+partido).hide(); 
  }

function submitFormGol (event, form, partido_id){
  event.preventDefault();
  var temporada = $('#temporada').val();
  var partido = $('#partido').val();
  console.log(partido);
  var url = "/src/funciones/guardarGol.php"; // El script a dónde se realizará la petición.
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

function submitFormTarjeta (event, form, partido_id){
  event.preventDefault();
  var temporada = $('#temporada').val();
  var partido = $('#partido').val();
  console.log(temporada);
  var url = "/src/funciones/guardarTarjeta.php"; // El script a dónde se realizará la petición.
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
 
  var url = "/src/funciones/guardarGol.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: "golId="+golId+"&temporada="+temporada_id+"&partido="+partido_id,
      success: function(data){
        console.log(data);
        $('#alineaciones-'+partido_id).trigger('click');  
      },
      error: function(){
      }
  });
  return false;
}; 

function QuitarTarjeta (golId, temporada_id, partido_id){
  
  var url = "/src/funciones/guardarTarjeta.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: "tarId="+golId+"&temporada_id="+temporada_id+"&partido_id="+partido_id,
      success: function(data){
        console.log(data);
        $('#alineaciones-'+partido_id).trigger('click');  
      },
      error: function(){
      }
  });
  return false;
}; 


$(document).on('click', '.CierreNotificacion', function() {
    var tipoSalida = '';
    tipoSalida = '-180px';
    //$(this).parent('div').parent('div').parent('div').parent('div').animate({
    $('.NotiLateralGOL').animate({
        marginLeft: tipoSalida,
        opacity: 0
    }, 500, function() {
        $(this).remove();
    });
});

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
        xmlhttp.open("POST","/src/funciones/verPartido.php",true); //str3 es la carpeta donde va a leer el script
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id=" + id + "&modo=" + modo);
} 

function visor_hoy(temporada_id,comunidad_id) {
  console.log(temporada_id);
    var xmlhttp;
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      } else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {                
              document.getElementById("visorHoy-"+temporada_id).innerHTML=xmlhttp.responseText;
          }
      }
    xmlhttp.open("POST","/z_visorHoy.php",true); //str3 es la carpeta donde va a leer el script
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("temporada_id="+temporada_id+'&comunidad_id='+comunidad_id);
}

function obtenerAlineacion(btnIdLiga){  

  jQuery.ajax({
    url: `./apiBetsapi.php`, // AJAX handler,
    type: 'POST',
    data: {
        id: jQuery(btnIdLiga).attr('attr-id-evento'),
    },
    // headers: {
    //      'X-CSRF-TOKEN': csrfToken
    // },
    beforeSend: function() {

    },
    complete: function () {

        //jQuery('.content-spiner-resultados-feed').addClass('ocultar-icon').removeClass('d-flex')
    },
    success: function (data) {

      console.log(data)        
      
      jQuery('.listado-locales').empty()

      jQuery('.listado-visitantes').empty()

      jQuery('.span-id-torneo-alineacion').closest('.pull-right').find('.content-alineaciones').removeClass('d-flex').addClass('d-none')

      jQuery('.span-id-torneo-alineacion').closest('.jorge-jorge').find('.content-alineaciones').removeClass('d-flex').addClass('d-none')

      jQuery('.title-alineacion').addClass('d-none')
      
      let result = JSON.parse(data)

      if (result.results.length == 0) {          

        jQuery('.title-alineacion').addClass('d-none')

        jQuery(btnIdLiga).closest('.pull-right').find('.content-alineaciones').find('p').remove()

        jQuery(btnIdLiga).closest('.jorge-jorge').find('.content-alineaciones').find('p').remove()
        
        jQuery(btnIdLiga).closest('.pull-right').find('.content-alineaciones').append('<p>No disponible</p>')

        jQuery(btnIdLiga).closest('.jorge-jorge').find('.content-alineaciones').append('<p>No disponible</p>')

        jQuery(btnIdLiga).closest('.pull-right').find('.content-alineaciones').removeClass('d-none').addClass('d-flex')

        jQuery(btnIdLiga).closest('.jorge-jorge').find('.content-alineaciones').removeClass('d-none').addClass('d-flex')
        
      }else{

        for (const iterator of result.results.home.startinglineup) {

          jQuery(btnIdLiga).closest('.pull-right').find('.listado-locales').append(
          `<li class="item-alineacion item-local">${iterator.player.name} - ${iterator.pos} - ${iterator.shirtnumber}</li>`)

          jQuery(btnIdLiga).closest('.jorge-jorge').find('.listado-locales').append(
            `<li class="item-alineacion item-local">${iterator.player.name} - ${iterator.pos} - ${iterator.shirtnumber}</li>`)

          console.log(iterator)          
        }

        for (const iterator of result.results.away.startinglineup) {

          jQuery(btnIdLiga).closest('.pull-right').find('.listado-visitantes').append(
          `<li class="item-alineacion item-visitantes">${iterator.player.name} - ${iterator.pos} - ${iterator.shirtnumber}</li>`)

          jQuery(btnIdLiga).closest('.jorge-jorge').find('.listado-visitantes').append(
            `<li class="item-alineacion item-visitantes">${iterator.player.name} - ${iterator.pos} - ${iterator.shirtnumber}</li>`)
          console.log(iterator)          
        }

        jQuery(btnIdLiga).closest('.pull-right').find('.content-alineaciones').removeClass('d-none').addClass('d-flex')

        jQuery(btnIdLiga).closest('.jorge-jorge').find('.content-alineaciones').removeClass('d-none').addClass('d-flex')

        jQuery(btnIdLiga).closest('.pull-right').find('.title-alineacion').removeClass('d-none')

        jQuery(btnIdLiga).closest('.jorge-jorge').find('.title-alineacion').removeClass('d-none')
      }      
    }
})
  
};

jQuery(document).on('click', '.span-id-torneo-alineacion', function(){

  obtenerAlineacion(jQuery(this))

})

jQuery(document).on('click', '.cerrar-alineacion', function(){

  jQuery(this).closest('.content-alineaciones').removeClass('d-flex').addClass('d-none')
})