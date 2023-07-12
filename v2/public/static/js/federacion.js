function ponerComprobado(id){        
    var url = "/panelBack/federacion/funciones/ponerComprobado.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id,
        success: function(data){
          //console.log(data);
          $('#comprobado-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 



function cargarPartidos(temporada_id){        
    var url = "/panelBack/federacion/funciones/cargarPartidos.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "temporada_id="+temporada_id,
        success: function(data){
          //console.log(data);
          $('#vFM-'+temporada_id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 

function cargarCalendarioInicio(grupo_id,comunidad_id){        
        var url = "/panelBack/federacion/funciones/cargarCalendarioInicio.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "grupo_id="+grupo_id+"&comunidad_id="+comunidad_id,
            success: function(data){
              console.log('cargando...');
              console.log(data);
              $('#v-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function codigoFederacion(clubs,grupo_id,comunidad_id){
      var url = "/panelBack/federacion/funciones/codigoFederacion.php"; // El script a dónde se realizará la petición.
      $.ajax({
            type: 'POST',
            url: url,
            data: {data : clubs}, 
            success: function(data){
              console.log('cargando...');
              console.log(data);
              $('#v-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 


function verClubsyEquipos(grupo_id,comunidad_id,temporada_id){        
        var url = "/panelBack/federacion/funciones/verClubsyEquipos.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "grupo_id="+grupo_id+"&comunidad_id="+comunidad_id+"&temporada_id="+temporada_id,
            success: function(data){
              //console.log(data);
              $('#v-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargarClubsyEquipos(grupo_id,comunidad_id,competicion_id){        
        var url = "/panelBack/federacion/funciones/cargarClubsyEquipos.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "grupo_id="+grupo_id+"&comunidad_id="+comunidad_id+"&competicion_id="+competicion_id,
            success: function(data){
              console.log('cargando...');
              console.log(data);
              $('#v-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function quitarCompeticion(id,temporada_id){        
    var url = "/panelBack/federacion/funciones/quitarCompeticion.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id+"&temporada_id="+temporada_id,
        success: function(data){
          //console.log(data);
          $('#visible-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 

function cambiarVisible(id,visible,temporada_id){        
    var url = "/panelBack/federacion/funciones/cambiarVisible.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id+"&visible="+visible+"&temporada_id="+temporada_id,
        success: function(data){
          //console.log(data);
          $('#visible-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 


function submitInsertarClub (event, form,id) {      
    event.preventDefault();
    var url = "/panelBack/federacion/funciones/submitInsertarClub.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: form,
        success: function(data){
          //console.log(data);
          $('#insertar-club-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 



function insertarClub(id,comunidad_id,categoria_id){        
    var url = "/panelBack/federacion/funciones/insertarClub.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id+"&comunidad_id="+comunidad_id+"&categoria_id="+categoria_id,
        success: function(data){
          //console.log(data);
          $('#insertar-club-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 

function crearEquipo(club_id,categoria_id,federacion_id,equipo_id){        
    var url = "/panelBack/federacion/funciones/crearEquipo.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "club_id="+club_id+"&categoria_id="+categoria_id+"&federacion_id="+federacion_id+"&equipo_id="+equipo_id,
        success: function(data){
          //console.log(data);
          $('#vincular-'+equipo_id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 

function submitVincularEquipo (event, form,id) {
  event.preventDefault();
  var url = "/panelBack/federacion/funciones/vincularEquipo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#vincular-'+id).html(data);       
      },
      error: function(){
      }
  });
  return false;
}


function crearTemporada(id,comunidad_id,grupo_id){        
    var url = "/panelBack/federacion/funciones/crearTemporada.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id+"&comunidad_id="+comunidad_id+"&grupo_id="+grupo_id,
        success: function(data){
          //console.log(data);
          $('#crear-temporada').html(data);
        },
        error: function(){
        }
    });
    return false;
}; 


function submitInsertarTorneo (event, form,id) {
  event.preventDefault();
  var url = "/panelBack/federacion/funciones/insertarTorneo.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);      
       $('#insertar-'+id).html(data);       
      },
      error: function(){
      }
  });

  return false;
}

function vincularTorneo(id,competicion_id, grupo_id,comunidad_id){        
        var url = "/panelBack/federacion/funciones/vincularTorneo.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "id="+id+"&competicion_id="+competicion_id+"&grupo_id="+grupo_id+"&comunidad_id="+comunidad_id,
            success: function(data){
              //console.log(data);
              $('#insertar-'+id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 


function insertarTorneo(id){        
        var url = "/panelBack/federacion/funciones/insertarTorneo.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "id="+id,
            success: function(data){
              //console.log(data);
              $('#insertar-'+id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 


function cambiarEstado(id,estado){        
    var url = "/panelBack/federacion/funciones/cambiarEstado.php"; // El script a dónde se realizará la petición.
    $.ajax({
        type: 'POST',
        url: url,
        data: "id="+id+"&estado="+estado,
        success: function(data){
          //console.log(data);
          $('#estado-'+id).html(data);
        },
        error: function(){
        }
    });
    return false;
}; 


function cargarCalendario(temporada_id,grupo_id,comunidad_id,competicion_id){        
        var url = "/panelBack/federacion/funciones/cargarCalendario.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id="+temporada_id+"&comunidad_id="+comunidad_id+"&grupo_id="+grupo_id+"&competicion_id="+competicion_id,
            success: function(data){
              //console.log(data);
              $('#v-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargarCalendarioFM(temporada_id,comunidad_id,id,apiRFEFgrupo){        
        var url = "/panelBack/federacion/funciones/cargarCalendarioFM.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id="+temporada_id+"&comunidad_id="+comunidad_id+"&id="+id+"&apiRFEFgrupo="+apiRFEFgrupo,
            success: function(data){
              //console.log(data);
              $('#vFM-'+temporada_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargarJornada(temporada_id, grupo_id,jornada){
        var url = "/panelBack/federacion/funciones/cargarJornada.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id="+temporada_id+"&grupo_id="+grupo_id+"&jornada="+jornada,
            success: function(data){
              //console.log(data);
              $('.jornadas').hide();
              $('#j-'+jornada+'-'+grupo_id).show();
              $('#j-'+jornada+'-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargarJornadaFM(temporada_id,jornada){
        var url = "/panelBack/federacion/funciones/cargarJornadaFM.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id=" + temporada_id+"&jornada=" + jornada,
            success: function(data){
              //console.log(data);
              $('.jornadasFM').hide();
              $('#j-'+jornada+'-'+temporada_id).show();
              $('#j-'+jornada+'-'+temporada_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 


function actualizarJornada2(jornada,torneo_id,grupo_id){        
        var url = "/panelCargador/asalto.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'GET',
            url: url,
            data: "modo=1&jornada="+jornada+"&torneo_id="+torneo_id,
            success: function(data){
              console.log('actualizando...');
              console.log(data);
              $('.jornadas').hide();
                $('#j-'+jornada+'-'+grupo_id).show();
                $('#j-'+jornada+'-'+grupo_id).html(data);                       
            },
            error: function(){
            }
        });
        return false;
    }; 



function cargarEquipo(grupo_id,equipo_id){        
        var url = "/panelBack/federacion/funciones/cargarEquipo.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "grupo_id=" + grupo_id+"&equipo_id=" + equipo_id,
            success: function(data){
              //console.log(data);
              $('.equipos').hide();
              $('#e-'+equipo_id+'-'+grupo_id).show();
              $('#e-'+equipo_id+'-'+grupo_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 
function cargarEquipoFM(temporada_id,equipo_id){        
        var url = "/panelBack/federacion/funciones/cargarEquipoFM.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "temporada_id=" + temporada_id+"&equipo_id=" + equipo_id,
            success: function(data){
              //console.log(data);
              $('.equiposFM').hide();
              $('#e-'+equipo_id+'-'+temporada_id).show();
              $('#e-'+equipo_id+'-'+temporada_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 


/*****************VIEJO********************/

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


function cargar_torneos(str,str2){
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
xmlhttp.send("categoria_torneo="+str+"&tipo_torneo="+str2);

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


function borrarCalendario(event, id){
        event.preventDefault();
        
        var url = "new_calendario/borrar_calendario.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'GET',
            url: url,
            data: "id=" + id,
            success: function(data){
              console.log(data);
              $('#v-'+id).html(data);
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
    $(this).parent('div').animate({
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


