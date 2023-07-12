<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga Futbolme</title>
</head>
<body>
    <?php
    $carga = sys_getloadavg();
    ?>

    <h1>
        <?php echo $carga[0]; ?><br />
        <small>1 min</small>
    </h1>

    <h1>
        <?php echo $carga[1]; ?><br />
        <small>5 min</small>
    </h1>

    <h1>
        <?php echo $carga[2]; ?><br />
        <small>15 min</small>
    </h1>

    <script type="text/javascript">
        setTimeout(function() {
            location.reload();
        }, 10000);
    </script>
</body>
</html>