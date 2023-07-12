<?php
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selector Editor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    

                <div style="padding:20px">
                  <table><tr><td valign="top" width="40%" style="text-align: left">
                  <a href="logout.php" class="btn btn-danger">Cierra la sesión</a> -

                  <select name="categoria" onchange="cargar_torneos(this.value,1,<?php echo $_SESSION['id']?>)">
                  <option value="0" selected>Categorias</option>
                  <option value="1">RFEF</option>
                  <option value="4">Autonómica</option>
                  <option value="5">Juvenil</option>                
                  <option value="7">Femenino</option> 
                  <option value="9">Europa</option>
                  <option value="17">Fútbol Sala</option>           
                  </select>


                  <div id="listaTorneos"></div>
                    </td><td valign="top" width="60%">
                          <a href="reset-password.php" class="btn btn-warning" style="display: none">Cambia tu contraseña</a>
                          
                      
                        <div id="listaTorneoFutbolme"></div>
                    </td></tr></table>
                  </div>

</body></html>

<script>
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
xmlhttp.open("POST","select_torneos.php",true); //str3 es la carpeta donde va a leer el script
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
      document.getElementById("listaTorneoFutbolme").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","select_torneo_futbolme.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("temporada="+str+"&tipo_torneo="+str2+"&fecha="+fecha+"&usuario_id="+usuario_id);
}

function filtrarComandes(local,visitante,partido) {

  var data = {
        div: jQuery('#id_division').val(),
        co: jQuery('#id_comunidad').val(),
        t: jQuery('#id_temporada').val(),
        id_usuario: jQuery('#id_usuario').val(),
        l: local,
        vis: visitante,
        p: partido
    };
    console.log(data);
    var form = document.createElement('form');
    form.style.visibility = 'hidden';
    form.method = 'POST';
    //form.action = window.location.href;
    form.action = 'editor2.php';
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

function submitForm (event, form, partido_id){
event.preventDefault();
var url = "grabarMovimiento.php"; // El script a dónde se realizará la petición.
  $.ajax({
      type: 'POST',
      url: url,
      data: form,
      success: function(data){
        $('#mensaje').html(data);
        //var dt = new Date();
        //var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        //$('#mensaje').html('<p><b>Guardado con éxito a las '+time+'</b></p>');      
      }
  });
};

function estadoPartido(val,id){
  console.log (val);
  console.log (id);
  if(val==2 || val==6){
    $('#estado-partido-'+id).show();
  } else {
    $('#estado-partido-'+id).hide();
  }
};



</script>
