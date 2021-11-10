<?php

// Validamos el campo post: numagencia
if (!isset($_POST['numagencia']) || empty($_POST['numagencia'])) {
    die('Falta el campo numagencia, consulta con el soporte de Inmovilla.');
}
// Validamos el campo post: cod_ofer
if (!isset($_POST['cod_ofer']) || empty($_POST['cod_ofer'])) {
    die('Falta el cod_ofer, consulta con el soporte de Inmovilla.');
}

define('NUMAGENCIA', $_POST['numagencia']);
define('COD_OFER', $_POST['cod_ofer']);
define('WEB', "https://www.mallorcasa.es");
define('AGENCIA', "Mallorcasa");
define('TELEFONO', "+34 971 901 109");
define('EMAIL', "info@mallorcasa.es");


$logo = WEB . '/img/header/logo.png';
// Validamos la ruta del logo tipo
if (intval(get_http_response_code($logo)) > 200) {
    die('No se ha encontraldo logo en la ruta: ' . $logo);
}

// Validamos que la propiedad tenga fotos y que la primera sea accesible
if ($_POST['numfotos'] == 0 || intval(get_http_response_code($_POST['foto1'])) > 400) {
    die('Debe de existir al menos la primer foto');
}

$_POST['texto_Castellano'] = str_replace('~', '<br>', $_POST['texto_Castellano']);
$zona = ($_POST['zona']) ? "en $_POST[zona]" : '';
$encabezado = "$_POST[nbtipo] en $_POST[ciudad2]";
$calidades = getCalidades($_POST);
$precio = precio($_POST);
$qr = getImagenQr($_POST);
$certificado = getCertEnergetico($_POST);
$fotoAgente = fotoAgente($_POST);

// Definimos las fotos del escaparate, en el caso de que no haya mas de 4 se repetira la 1
$slider[2] = $_POST['foto1'];
$slider[3] = $_POST['foto1'];
$slider[4] = $_POST['foto1'];
for ($i = 2; $i <= $_POST['numfotos']; $i++) {
    $slider[$i] = $_POST["foto$i"];
}

$nombre_agente = ($_POST['nombre_agente']) ? $_POST['nombre_agente'] : AGENCIA;
$telefono_agente = ($_POST['telefono_agente']) ? $_POST['telefono_agente'] : TELEFONO;
$email_agente = ($_POST['email_agente']) ? $_POST['email_agente'] : EMAIL;
$datos_agente = [
    'nombre'   => $nombre_agente,
    'telefono' => $telefono_agente,
    'email'    => $email_agente,
];

function getCalidades($request)
{
    $calidades = [];
    $listado_calidades = [
        'habitaciones' => 'habitaciones',
        'banyos'       => 'baños',
        'aseos'        => 'aseos',
        'ascensor'     => 'ascensor',
        'balcon'       => 'balcon',
        'm_cons'       => 'm.cons',
        'm_uties'      => 'm.utiles',
        'jardin'       => 'jardin',
        'terraza'      => 'terraza',
        'plaza_gara'   => 'garaje',
        'alarma'       => 'alarma',
        'piscina'      => 'piscina',
        'piscina_com'  => 'piscina com.',

    ];
    $maxCalidades = 6;
    if (preg_match('/vertical/',$_SERVER['SCRIPT_NAME'])) {
        $maxCalidades = 12;
    }
    $calidades_check = ['ascensor', 'jardin', 'balcon', 'garaje', 'terraza', 'piscina', 'alarma'];

    foreach ($listado_calidades as $nombre => $valor) {
        if ($_POST[$nombre] && $_POST[$nombre] > 0 && count($calidades) < $maxCalidades) {
            $label = $valor;
            if (in_array($nombre, $calidades_check)) {
                $calidades[ucfirst($label)] = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
            }else {
                $calidades[ucfirst($label)] = $_POST[$nombre];
            }
        }
    }
    return $calidades;
}

function precio($request)
{
    $precio = 'Precio a consultar';
    if ($request['acciones'] == 'Vender') {
        if ($request['precio']) {
            $p = number_format($request['precio'], 0, ',', '.');
            $precio = "Precio de venta: $p €";
        }
    }
    if ($request['acciones'] == 'Alquilar') {
        if ($request['precioalq']) {
            $p = number_format($request['precioalq'], 0, ',', '.');
            $precio = "Precio de alquiler: $p € / $request[tipomensual]";
        }
    }

    return $precio;
}

function getImagenQr($request)
{
    $ref = $request['ref'];
    $cod_ofer = $request['cod_ofer'];
    $numagencia = $request['numagencia'];
    $web = WEB;
    return "https://ap.apinmo.com/app/qr/genqr.php?xcodigo=" . $numagencia . "_" . $cod_ofer . "&webx=$web&ref=$ref";
}

function getCertEnergetico($request)
{

    if ($request['energialetra'] == 'tramites') {
        return "http://ap.apinmo.com/certificado/tramites";
    }

    if ($request['energialetra'] == 'exento') {
        return "http://ap.apinmo.com/certificado/exento";
    }

    if ($request['energialetra'] == 'pendiente') {
        return "";
    }

    $letraenergia = $request['energialetra'];
    $letraemision = $request['emisionesletra'];
    $valorenergia = $request['energiavalor'];
    $valoremision = $request['emisionesvalor'];

    return "http://ap.apinmo.com/certificado/$letraenergia-$letraemision-$valorenergia-$valoremision";

}

function get_http_response_code($theURL)
{
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}

function fotoAgente($request)
{
    $url = $request['fotoagente'];
    if (!$request['fotoagente'] || intval(get_http_response_code($request['fotoagente'])) > 400) {
        $url = 'agente-default.png';
    }
    return $url;
}