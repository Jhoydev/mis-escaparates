<?php
include 'requestController.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escaparate Vertical</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        html,body{
            height:296mm;
            width:210mm;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        #sec-1 {
            height: 50%;
        }
        #sec-2 {
            height: 35%;
            padding: 0 5mm;
        }
        #sec-3 {
            height: 15%;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        #sec-1 img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        #logo{
            height: 25%;
            display: flex;
            justify-content: center;
        }
        #logo > img {
            height: 100%;
            object-fit: contain;
        }
        #encabezado {
            height: 5%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            font-weight: bold;
        }
        #encabezado  h2{
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 2em;
        }
        #ref{
            height: 5%;
        }
        #ref span{
            display: inline-block;
            background: rgb(1, 46, 103);
            color: rgb(255,255,255);
            padding: 1mm 5mm;
            border-radius: 5px 5px 0 0;
            box-sizing: border-box;
            height: 100%;
            margin-left: 5mm;
            font-size: 1.2em;
        }
        #slider{
            height: 65%;
        }
        #slider>img{
            border-top: 5pt solid rgb(1, 46, 103);
            border-bottom: 5pt solid rgb(1, 46, 103);
            height: 75%;
        }
        #c-mini{
            display: flex;
            justify-content: space-around;
        }
        #c-mini > img{
            margin-top: -100px;
            width: 40mm;
            height: 40mm;
            border: 5pt solid rgb(1, 46, 103);
            border-radius: 50%;
        }

        #titulo{
            font-weight: bold;
            font-size: 1.3em;
            height:10%;
            display: flex;
            align-items: center;
        }
        #descripcion{
            height: 40%;
            text-align: justify;
            line-height: 7mm;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 6; /* number of lines to show */
        }
        #calidades{
            padding: 1mm 0;
            box-sizing: border-box;
            height:30%;
            font-size: 1.2em;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        #calidades div{
            padding-right: 10mm;
            box-sizing: border-box;
        }
        #calidades div i{
            margin-right: 2mm;
        }
        #calidades div span{
            font-family: 'Oswald', sans-serif;
            font-size: 1.1em;
        }
        #precio{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height:20%;
            margin: 0 -5mm;
            color: white;
        }
        #precio div{
            font-size: 2em;
            text-align: right;
            padding: 0 5mm;
            min-width: 60%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background-image: url("back-price.svg");
            background-position: center;
            background-size: cover;
            padding-left: 30mm;
        }
        #agente{
            display: flex;
        }
        #foto-agente {
            width: 35mm;
            height: 35mm;
            border: 3pt solid rgb(1, 46, 103);
            border-radius: 50%;
            object-fit: cover;
        }
        #datosagente{
            border: 3pt solid rgb(1, 46, 103);
            margin-left: -17.5mm;
            padding-left: 20mm;
            box-sizing: border-box;
            border-left: none;
            padding-right: 10px;
            display: flex;
            align-items: center;
            border-radius: 0 10px 10px 0;
        }
        #datosagente ul{
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="sec-1">
    <div id="logo">
        <img src="<?php echo $logo ?>" alt="">
    </div>
    <div id="encabezado">
        <h2><?php echo $encabezado ?></h2>
    </div>
    <div id="ref">
        <span>Ref: <?php echo $_POST['ref'] ?></span>
    </div>
    <div id="slider">
        <img src="<?php echo $_POST['foto1'] ?>" alt="">
        <div id="c-mini">
            <img src="<?php echo $slider[2] ?>" alt="">
            <img src="<?php echo $slider[3] ?>" alt="">
            <img src="<?php echo $slider[4] ?>" alt="">
        </div>
    </div>
</div>
<div id="sec-2">
    <span id="titulo"><?php echo $_POST['titulo_Castellano'] ?></span>
    <span id="descripcion"><?php echo $_POST['texto_Castellano'] ?></span>
    <div id="calidades">
        <?php if (count($calidades)): ?>
            <?php foreach ($calidades as $nombre => $valor): ?>
                <div>
                    <i class="fa fa-angle-right" style="font-weight: bold" aria-hidden="true"></i><?php echo "$nombre:"?> <span><?php echo "$valor" ?></span>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <div id="precio">
        <div><?php echo $precio ?></div>
    </div>
</div>
<div id="sec-3">
    <div id="agente">
        <img id="foto-agente" src="<?php echo $fotoAgente ?>" alt="">
        <div id="datosagente">
            <ul>
                <li style="margin-bottom: 0.5em; color: rgb(1, 46, 103); font-weight: bold"><?php echo $datos_agente['nombre'] ?></li>
                <li><?php echo $datos_agente['email'] ?></li>
                <li><?php echo $datos_agente['telefono'] ?></li>
                <li><?php echo WEB ?></li>
            </ul>
        </div>
    </div>

    <?php if ($qr): ?>
        <img style="width: 30mm" src="<?php echo $qr ?>" alt="">
    <?php endif; ?>

    <?php if ($certificado): ?>
    <img style="width: 30mm" src="<?php echo $certificado ?>" alt="">
    <?php endif; ?>
</div>

</body>
</html>