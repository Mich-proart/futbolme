<?php $static_v=10;
//$raiz="";
?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="https://futbolme.com/img/logo.png" />
<meta name="ga-site-verification" content="UPgOhn36Odw90H6CQqECMmTG" />
<?php if (isset($metaDescripcion)) {
    ?>
    <meta name="description" content="<?php echo $metaDescripcion; ?>" />
<meta property="og:description" content="<?php echo $metaDescripcion; ?>" />
<?php
} ?>

<?php if (0 == $_SESSION['app']) { ?>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<?php } else { ?>
<link rel="shortcut icon" href="/touch-icon.png">
<?php  } ?>

<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png" />

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">


<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

