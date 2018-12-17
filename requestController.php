<?php
/**
 * En est archivo realizamos la logica de lo que llega en las peticiones
 * */

$_POST['numagencia'] = 413;
$_POST['cod_ofer'] = 628079;
$_POST['numfotos'] = 3;
$_POST['foto1'] = 'https://fotos10.apinmo.com/413/6984992/1-1.jpg';
$_POST['foto2'] = 'https://fotos10.apinmo.com/413/6984992/1-2.jpg';
$_POST['foto3'] = 'https://fotos10.apinmo.com/413/6984992/1-3.jpg';
$_POST['foto4'] = 'https://fotos10.apinmo.com/413/6984992/1-4.jpg';
$_POST['nbtipo'] = 'Piso';
$_POST['zona'] = 'ZONA A BAÑA';
$_POST['ciudad2'] = 'A Baña - ZONA A BAÑA';
$_POST['energialetra'] = 'tramites';
$_POST['energiarecibido'] = 0;
$_POST['emisionesletra'] = 'G';
$_POST['energiavalor'] = 0;
$_POST['emisionesvalor'] = 0;
$_POST['acciones'] = 'Alquilar';
$_POST['precio'] = 250055;
$_POST['precioalq'] = 321;
$_POST['habitaciones'] = 4;
$_POST['ascensor'] = 1;
$_POST['banyos'] = 1;
$_POST['ref'] = 1231;
$_POST['m_cons'] = 1;
$_POST['titulo_Castellano'] = mb_strtoupper('Finca rústica en Valldemossa');
$_POST['texto_Castellano'] = 'Valldemossa, situado en el corazón del valle y con unas vistas espectaculares a las montañas al pueblo y la Cartuja, se encuentra esta impresionante Finca Rústica de 250m2 que dispone de Casa Principal , Casa de invitados y Salón anexo de estar. Con un total de 2 cocinas amueblada y equipadas, 3 salones comedor, 3 baños completos, 7 habitaciones, armarios. Y por último tenemos un pabellón anexo con amplio salón comedor situado en el jardín para disfrutar del relajado paisaje. Todas las estancias con vigas vistas suelos rústicos y de piedra original, Amplio y extenso jardín consolidado, con cesped, 150 árboles frutales y olivos, Parking para 6 coches, Barbacoa y exuberante vegetación en un total de 8.300 m2. Es una finca de ensueño con todas las comodidades ideal para vivir en familia, y/o para explotar como hotel rural (Bed-Breakfast). DIGNO DE VER!!…PRECIO 1.570.000 EUROS!!…SOLO A 3 MINUTOS DEL PUEBLO!.-';
$_POST['fotoagente'] = 'https://fotos10.apinmo.com/413/usuarios/2.jpg';
$_POST['nombre_agente'] = 'nombre_agente';
$_POST['tipomensual'] = 'MESSSS';

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


$zona = ($_POST['zona']) ? "en $_POST[zona]" : '';
$encabezado = "$_POST[nbtipo], $_POST[ciudad2]";
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
        'ascensor'     => 'ascensor',
        'banyos'       => 'baños',
        'm_cons'       => 'm_cons'
    ];

    $calidades_check = ['ascensor'];
    foreach ($request as $nombre => $valor) {
        // in array - comprueba que este en el array
        // si es esta, comprobamos que el valor sea mayor a 0
        if ($listado_calidades[$nombre] && $valor > 0 && count($calidades) < 6) {
            $label = $listado_calidades[$nombre];
            if (in_array($nombre, $calidades_check)) {
                $calidades[ucfirst($label)] = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
            }else {
                $calidades[ucfirst($label)] = $valor;
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
    if (intval(get_http_response_code($request['fotoagente'])) > 400) {
        $url = 'agente-default.png';
    }
    return $url;
}