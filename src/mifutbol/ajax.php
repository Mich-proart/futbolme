<script>
  
function verFormGestor(){ $('#formReg').toggle(); }
function verFormCuenta(){ $('#formCuenta').toggle(); }
function verFormEditEquip(grupo){ $('#formEditEquip'+grupo).toggle();}
function verFormEditCalendario(grupo){ $('#formEditCalendario'+grupo).toggle();}
function clasColor(grupo,posicion){ $('#posicion-'+grupo+'-'+posicion).toggle();}
function clasSancion(grupo,posicion){$('#sancion-'+grupo+'-'+posicion).toggle();}

function verNover(id, gestor_id, mostrar){
    var url = "/mifutbol.php";
    console.log(id);
    console.log(gestor_id);
    console.log(mostrar);
    $.ajax({
            type: 'POST',
            url: url,
            data: "&mostrar="+mostrar+"&id="+id+"&gestor_id="+gestor_id,
            success: function(data){
              console.log(data);
              if(mostrar==0){
                $('#torneo'+id).html('ocultar');                                
              } else {
                $('#torneo'+id).html('mostrar');
              } 
            },
            error: function(){

            }
        });
        return false;
    };  


function sanciono(event, form, posicion, grupo){
  event.preventDefault();        
  var url = "/mifutbol.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){  
      console.log(data);     
          $('#sanciones'+grupo).html(data); 
          $('#sancion-'+grupo+'-'+posicion).toggle();
      },
      error: function(){
      }
  });
  return false;
};     

function coloreo(event, form, posicion, grupo){
  event.preventDefault();        
  var url = "/mifutbol.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){ 
      var css = data.split('+');
      console.log(css);             
          $('#fila-'+grupo+'-'+posicion).css('background-color',css[0]); 
          $('#fila-'+grupo+'-'+posicion).css('color',css[1]); 
          $('#posicion-'+grupo+'-'+posicion).toggle();
      },
      error: function(){
      }
  });
  return false;
};        

function pasoCarga(event, form, grupo, paso){
        event.preventDefault();        
        var url = "/mifutbol.php"; 
        if (paso==1){
            $('#carga-'+grupo+'-'+paso).html('Obteniendo <b>jornadas</b>... espera unos segundos hasta que desaparezca este mensaje');
        }
        if (paso==2){
            $('#carga-'+grupo+'-'+paso).html('Obteniendo <b>equipos</b>... espera unos segundos hasta que desaparezca este mensaje');
        }
        if (paso==3){
            $('#carga-'+grupo+'-'+paso).html('Obteniendo <b>partidos</b>... espera unos segundos hasta que desaparezca este mensaje');
        }
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
               var n = data.length; 
               console.log(n);
               console.log(grupo);
               console.log(paso);               
               if (n>9){
                 location.href ='/mifutbol.php';
                 //$('#carga-'+grupo+'-'+paso).html(data); 
               } else { 
                 $('#carga-'+grupo+'-'+paso).html(data); 
               }            
            },
            error: function(){
            }
        });
        return false;
    };

function editActiva(event, form, grupo){
  event.preventDefault();        
  var url = "/mifutbol.php"; 
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){              
          $('#formEditCalendario'+grupo).html(data); 
      },
      error: function(){
      }
  });
  return false;
};              

function editCalendario(event, form, grupo){
        event.preventDefault();        
        var url = "/mifutbol.php"; 
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              var n = data.length; 
               console.log(n);
               if (n>5){
                $('#formEditCalendario'+grupo).html(data); 
               } else { 
                 location.href ='/mifutbol.php';
               }             
            },
            error: function(){
            }
        });
        return false;
    }; 

function editEquipos(event, form, grupo){
        event.preventDefault();        
        var url = "/mifutbol.php"; 
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              var n = data.length; 
               console.log(n);
               if (n>5){
                $('#formEditEquip'+grupo).html(data); 
               } else { 
                 location.href ='/mifutbol.php';
               }  
                
            },
            error: function(){
            }
        });
        return false;
    }; 

function aAgregarTorneo(torneo_id, gestor_id, contador){
    var url = "/mifutbol.php";
    console.log(torneo_id);
    console.log(gestor_id);
    $.ajax({
            type: 'POST',
            url: url,
            data: "&m=t-a&torneo_id=" + torneo_id + "&gestor_id=" + gestor_id,
            success: function(data){
              console.log(data);
              if(gestor_id>0){
                $('#torneos').html(data);
                $('#tablaComunidades').css('display','none');
                $("html,body").animate({scrollTop: $('#torneosSalto').offset().top}, 300);
              } else {
                $('#selector'+contador).html(data);
              } 
            },
            error: function(){

            }
        });
        return false;
    };  



function submitComunidad (event, form, fila, comunidad_id){
        event.preventDefault(); 
        console.log('fila:'+fila);
        console.log('comunidad_id:'+comunidad_id);

        var url = "/mifutbol.php"; 
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#fila'+fila).html(data);             
            },
            error: function(){
              console.log("error de servidor");
            }
        });
        return false;
    }; 

function regGestor (event, form){
        event.preventDefault();        
        var url = "/mifutbol.php"; 
        console.log(form);
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);              
                var n = data.length; 
                console.log(n);
              if (n<5){
                location.reload(); 
              } else { 
                $('#mensajeGestor').html(data); 
              }
                           
            }
        })
          .fail(function (jqXHR, textStatus, error) {
	        console.log("Post textStatus: " + textStatus);
	        console.log("Post error: " + error);
	    });


      return false;
}; 

function regCuenta (event, form){
        event.preventDefault(); 
        var url = "/mifutbol.php"; 
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#formCuenta').html(data);             
            },
            error: function(){
              console.log("error formCuenta");
            }
        });
        return false;
    }; 
</script>

