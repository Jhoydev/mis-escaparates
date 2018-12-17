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
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        html,body{
            width:296mm;
            height:209mm;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body{
            padding: 0 3mm;
        }
        #sec-1{
            height: 10%;
            display: flex;
            align-items: center;
        }
        #sec-2{
            display: flex;
            height: 50%;
        }
        #sec-3{
            height:20%;
            overflow: hidden;
        }
        #sec-4{
            display: flex;
            align-items: center;
            height:20%;
        }
        #logo{
            width: 20%;
            height:100%;
        }
        #logo img{
            height:100%;
            width: 100%;
            object-fit: contain;
        }
        #encabezado{
            width: 60%;
        }
        #encabezado h2{
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 2em;
        }
        #ref{
            width: 20%;
            height:100%;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }
        #ref span{
            background: rgb(1, 46, 103);
            color: rgb(255,255,255);
            padding: 1mm 5mm;
            border-radius: 5px 5px 0 0;
            box-sizing: border-box;
        }
        #main-img{
            height: 100%;
            width: 70%;
        }
        #main-img img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            border: 5pt solid rgb(1, 46, 103);
            box-sizing: border-box;
        }
        #precio{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height:20%;
            margin: 0 -1mm;
            color: white;
            margin-top: -22mm;
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
        #c-img{
            width: 30%;
            height:100%;
            display: flex;
            flex-direction: column;
        }
        #c-img img{
            width: 100%;
            height:50%;
            object-fit: cover;
            border: 5pt solid rgb(1, 46, 103);
            box-sizing: border-box;
        }
        #titulo{
            font-weight: bold;
            font-size: 1.3em;
            height:10%;
            display: flex;
            align-items: center;
            padding: 3mm 0;
            overflow: hidden;
        }
        #descripcion{
            height: 90%;
            text-align: justify;
            line-height: 8mm;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4; /* number of lines to show */
        }

        #agente{
            display: flex;
        }
        #foto-agente {
            width: 30mm;
            height: 30mm;
            border: 3pt solid rgb(1, 46, 103);
            border-radius: 50%;
            object-fit: cover;
        }
        #datosagente{
            border: 3pt solid rgb(1, 46, 103);
            margin-left: -15mm;
            padding-left: 20mm;
            height: 32mm;
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
        #calidades{
            padding: 6mm 3mm;
            box-sizing: border-box;
            height: 100%;
            font-size: 1.2em;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 50%;
        }
        #calidades div{
            padding-right: 5mm;
            box-sizing: border-box;
            width: 55mm;
        }
        #calidades div i{
            margin-right: 2mm;
        }
        #calidades div span{
            font-family: 'Oswald', sans-serif;
            font-size: 1.1em;
        }
        #documentos{
            display: flex;
            height: 70%;
            width: 30%;
        }
        #documentos img{
            width: 50%;
        }
        @media print{@page {size: landscape}}
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
    </div>
    <div id="sec-2">
        <div id="main-img">
            <img src="<?php echo $_POST['foto1']?>" alt="">
            <div id="precio">
                <div><?php echo $precio ?></div>
            </div>
        </div>
        <div id="c-img">
            <img src="<?php echo $slider[2]?>" alt="">
            <img src="<?php echo $slider[3]?>" alt="">
        </div>
    </div>
    <div id="sec-3">
        <div id="titulo">
            <?php echo $_POST['titulo_Castellano'] ?>
        </div>
        <div id="descripcion">
            <?php echo $_POST['texto_Castellano'] ?>
        </div>
    </div>
    <div id="sec-4">
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
        <div id="calidades">
            <?php if (count($calidades)): ?>
                <?php foreach ($calidades as $nombre => $valor): ?>
                    <div>
                        <i class="fa fa-angle-right" style="font-weight: bold" aria-hidden="true"></i><?php echo "$nombre:"?> <span><?php echo "$valor" ?></span>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div id="documentos">
            <?php if ($qr): ?>
                <img src="<?php echo $qr ?>" alt="">
            <?php endif; ?>

            <?php if ($certificado): ?>
                <img src="<?php echo $certificado ?>" alt="">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
