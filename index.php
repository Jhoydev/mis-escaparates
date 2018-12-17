<?php
include 'requestController.php';
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
            font-size: 12pt;
            box-sizing: border-box;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            overflow: hidden;
            border: 1px solid black;
        }
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
                overflow: hidden;
            }
        }
        .row-content-hero{
            margin-right: -15px;
            margin-left: -15px;
            position: relative;
            height: 100mm;
        }
        #hero{
            width: 100%;height: 100%;
            object-fit: cover;
            background-size: cover;background-position: center;
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            border-top: 5pt solid rgb(1, 46, 103);
            border-bottom: 5pt solid rgb(1, 46, 103);
            z-index: 50;
        }
        .thumbnail-imgs{
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin-top: -100px;
        }
        .thumbnail-imgs img{
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 5pt solid rgb(1, 46, 103);
        }
        #content-price{
            background-image: url('tr.png');
            background-size: cover;
            background-position: center;
            font-family: 'Lato', sans-serif;
            font-weight: bold;
            font-size: 25pt;

        }
        #content-price > div{
            padding-left: 100pt;
            padding-right: 30pt;
            padding-top: 20pt;
            padding-bottom: 20pt;
        }
        #foto-agente{
            width: 50mm;
            height: 50mm;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid rgb(1, 46, 103);
            z-index: 50;
            position: absolute;
            top: 0;
        }
        #datosagente{
            position: absolute;
            height: 50mm;
            border: 5px solid rgb(1, 46, 103);
            top: 0;
            left: 35mm;
            width: calc(100% - 35mm);
            padding-left: 30mm;
            padding-top: 5mm;
            padding-right: 2mm;
            box-sizing: border-box;
            z-index: 20;
            border-radius: 0 10px 10px 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="page">
    <div style="max-height: 40%;box-sizing: border-box;">
        <div class="text-center">
            <img src="<?php echo $_POST['logo'] ?>" alt="">
        </div>
        <div class="text-center">
            <span class="h3"><?php echo $_POST['titulo_Castellano'] ?></span>
        </div>
        <div class="row-content-hero">
            <img id="hero" src="<?php echo $_POST['foto1'] ?>" alt="">
            <div class="thumbnail-imgs">
                <img src="<?php echo $_POST['foto2'] ?>" alt="">
                <img src="<?php echo $_POST['foto3'] ?>" alt="">
                <img src="<?php echo $_POST['foto4'] ?>" alt="">
            </div>
        </div>
    </div>
    <div style="height: 127mm;overflow: hidden; padding-top: 40mm;box-sizing: border-box;">
        <div style="padding: 5mm;height: 50mm; overflow: hidden;text-overflow: ellipsis; font-family: 'Roboto', sans-serif;">
            <span id="titulo" class="h4 font-weight-bold"><?php echo $_POST['titulo_Castellano'] ?></span>
            <p id="descripcion" style="text-align: justify;    line-height: 6.5mm;"><?php echo $_POST['texto_Castellano'] ?></p>
        </div>
        <div class="d-flex justify-content-around" style="padding: 5mm; font-size: 18pt;">
            <?php if (count($calidades)): ?>
                <?php foreach ($calidades as $nombre => $valor): ?>
                    <div>
                        <i class="fa fa-check" aria-hidden="true"></i><?php echo "$nombre: $valor" ?>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
    <div style="height: 100mm;overflow: hidden; box-sizing: border-box; padding: 0 10mm">
        <div style="height: 25mm;" class="row justify-content-end">
            <div id="content-price" class="col-auto text-white">
                <div>
                    <span>Precio de Venta: <?php echo $_POST['precio'] ?>€</span>
                </div>
            </div>
        </div>
        <div class="row" style="height: 50mm; margin-top: 5mm">
            <div class="col-7" style="padding-left: 10mm;box-sizing: border-box">
                <img id="foto-agente" src="<?php echo $_POST['fotoagente'] ?>" alt="">
                <div id="datosagente">
                    Lorem ipsum dolor sit amet, <br> consectetur adipisicing elit. Atque, non!
                </div>
            </div>
            <div id="content-crt-qr" class="col-5 d-flex justify-content-around align-items-end">
                <img style="width: 30mm" src="http://ap.apinmo.com/app/qr/genqr.php?xcodigo=413_7164246&webx=https://www.haypisos.com&ref=00014" alt="">
                <img style="width: 30mm" src="http://ap.apinmo.com/certificado/exento" alt="">
            </div>
        </div>
    </div>
</div>
</body>
</html>