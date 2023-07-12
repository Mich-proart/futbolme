<?php

$n=explode(' ', $editor['username_canonical']);

$from = 'futbolme@futbolme.com';
$to = $editor['email'];
$subject = "Colaboración en futbolme.com";
// Message
$message='Buenos días '.$n [0]."<br /><br />";
$message.= "Desde futbolme.com queremos agradecerte tu interés por haber contactado con nosotros para la función de editor de noticias.<br /><br />";
$message.= "Si eres seguidor nuestro, sabrás que para futbolme.com es una experiencia nueva la incorporación de noticias a nuestro sitio web, ya que desde hace 20 años nuestra especialidad ha sido la de ofrecer resultados y clasificaciones, especialmente del fútbol modesto, con rigor e inmediatez, lo cual ha sido nuestra seña de identidad y nos ha hecho ser una referencia entre los aficionados al fútbol.<br /><br />";
$message.= "Los tiempos cambian y nos tenemos que adaptar, este sistema de web solo con resultados y clasificaciones, es económicamente inviable ya que la publicidad por este tipo de contenido cotiza muy a la baja y nos obliga a meter cada vez más publicidad y cada vez menos ingresos, con lo cual el valor de la web se devalúa y ni siquiera se cubren los recursos básicos necesarios.<br /><br />";
$message.= "Como tantas veces en estos años, lo solución la tienen los usuarios y es por ello que necesitamos de tu colaboración para ayudarnos en la transición de esta web, y sin dejar de lado nuestra labor de resultados fiables e inmediatos, derivar a una web que además, acompañe esta información con noticias de calidad, exclusivas y de gran valor que anime a los publicistas a pujar mejor por nuestros espacios publicitarios. Con ello obtendremos una web más atractiva y menos cargada de publicidad.<br /><br />";
$message.= "Si quieres participar en este proyecto nosotros podemos ofrecerte un espacio exclusivo donde además de crearte un portafolio/curriculum para el presente, podrás crearte un perfil donde podrás poner tus estudios, foto, contacto y todo lo que necesites para proyectar tu personalidad en el campo del periodismo.<br /><br />";
$message.= "Para ello necesitamos conocer un poco más de ti, y nos gustaría nos hicieras llegar los documentos donde puedas acreditar tus estudios, conocimientos y experiencia en este sector.<br /><br />";
$message.= "Atentamente:<br /><br />Vicent Sanchis - futbolme.com<br />";

//echo $message;die;


		    $headers[] = 'MIME-Version: 1.0';
		    $headers[] = 'Content-type: text/html; charset=utf8';
		    // Additional headers
		    $headers[] = 'From: '.$from; 
		    mail($to,$subject,$message,implode("\r\n", $headers));

		    $sql='UPDATE usuario SET enabled=1 WHERE id='.$editor['id'];
		    mysqli_query($mysqli, $sql);







?>
