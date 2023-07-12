
function cargar_clubes(str)//str3 es la carpeta donde va a leer el script
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
xmlhttp.open("POST","cargar_clubes.php",true); //str3 es la carpeta donde va a leer el script
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("pais_id="+str);

}

function cargar_por_comunidad(event, pais_id, comunidad_id){
        event.preventDefault();        
        var url = "cargar_clubes.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'GET',
            url: url,
            data: "pais_id=" + pais_id + "&comunidad_id=" + comunidad_id,
            success: function(data){
              console.log(data);
              $('#listaClubes').html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargar_por_provincia(event, pais_id, comunidad_id, provincia_id){
        event.preventDefault(); 
        var url = "cargar_clubes.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'GET',
            url: url,
            data: "pais_id=" + pais_id + "&comunidad_id=" + comunidad_id + "&provincia_id=" + provincia_id,
            success: function(data){
              console.log(data);
              $('#listaClubes').html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 

function cargar_equipo(id) {
  $.ajax({
    type: 'GET',
    url: 'equipo.php',
    data: "id=" + id,
    success: function(data){
      $('#equipo').html(data);
    },
    error: function(){
    }
  });
  return false;
}

function cargar_equipos(club_id){
        var url = "cargar_equipos.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: "club_id=" + club_id,
            success: function(data){
              console.log(data);
              $('#carga-equipos-'+club_id).html(data);
            },
            error: function(){
            }
        });
        return false;
    }; 
