<?php
/**
 * En est archivo realizamos la logica de lo que llega en las peticiones
 * */

$_POST["solicitadopor"] = "2";
$_POST["cod_ofer"] = "628079";
$_POST["acciones"] = "Vender";
$_POST["ref"] = "01142";
$_POST["numfotos"] = "4";
$_POST["fotoletra"] = "2";
$_POST["latitud"] = "38.3467031";
$_POST["altitud"] = "-0.4988905";
$_POST["tipomensual"] = "MES";
$_POST["precio"] = "85000";
$_POST["estadoficha"] = "1";
$_POST["precioalq"] = "0";
$_POST["nbtipo"] = "Casa";
$_POST["ciudad"] = "Alicante";
$_POST["zona"] = "San blas";
$_POST["ciudad2"] = "Alicante - San blas";
$_POST["nbconservacion"] = "Para reformar";
$_POST["comunidadincluida"] = "0";
$_POST["gastos_com"] = "50";
$_POST["tgascom"] = "";
$_POST["nborientacion"] = "";
$_POST["banyos"] = "2";
$_POST["aseos"] = "0";
$_POST["planta"] = "17";
$_POST["energialetra"] = "tramites";
$_POST["energiarecibido"] = "0";
$_POST["emisionesletra"] = "G";
$_POST["energiavalor"] = "0";
$_POST["emisionesvalor"] = "0";
$_POST["m_parcela"] = "0";
$_POST["m_uties"] = "100";
$_POST["m_cons"] = "120";
$_POST["jardin"] = "0";
$_POST["m_terraza"] = "10";
$_POST["antiguedad"] = "1982";
$_POST["habitaciones"] = "8";
$_POST["numagencia"] = "413";
$_POST["numplanta"] = "0";
$_POST["keyacci"] = "1";
$_POST["balcon"] = "1";
$_POST["plaza_gara"] = "0";
$_POST["patio"] = "0";
$_POST["linea_tlf"] = "0";
$_POST["solarium"] = "0";
$_POST["terraza"] = "1";
$_POST["ascensor"] = "1";
$_POST["arma_empo"] = "0";
$_POST["montacargas"] = "1";
$_POST["trastero"] = "0";
$_POST["puerta_blin"] = "0";
$_POST["electro"] = "0";
$_POST["muebles"] = "0";
$_POST["calefaccion"] = "0";
$_POST["aire_con"] = "0";
$_POST["video_port"] = "0";
$_POST["primera_line"] = "0";
$_POST["piscina_com"] = "1";
$_POST["piscina_prop"] = "1";
$_POST["luz"] = "1";
$_POST["agua"] = "0";
$_POST["gasciudad"] = "0";
$_POST["hilomusical"] = "0";
$_POST["trifasica"] = "0";
$_POST["cajafuerte"] = "0";
$_POST["chimenea"] = "0";
$_POST["barbacoa"] = "0";
$_POST["apartseparado"] = "0";
$_POST["alarma"] = "0";
$_POST["bar"] = "0";
$_POST["buardilla"] = "0";
$_POST["depoagua"] = "0";
$_POST["diafano"] = "0";
$_POST["galeria"] = "1";
$_POST["habjuegos"] = "0";
$_POST["gimnasio"] = "0";
$_POST["jacuzzi"] = "0";
$_POST["mirador"] = "0";
$_POST["ojobuey"] = "0";
$_POST["parking"] = "0";
$_POST["pergola"] = "0";
$_POST["puertasauto"] = "0";
$_POST["riegoauto"] = "0";
$_POST["aconsultar"] = "0";
$_POST["satelite"] = "0";
$_POST["sauna"] = "0";
$_POST["todoext"] = "0";
$_POST["tv"] = "0";
$_POST["vallado"] = "0";
$_POST["vestuarios"] = "0";
$_POST["distmar"] = "0";
$_POST["estadofichatxt"] = "Libre";
$_POST["vado"] = "0";
$_POST["vistas"] = "Al Mar";
$_POST["keycalefa"] = "0";
$_POST["conservacion"] = "5";
$_POST["keyori"] = "0";
$_POST["keyfachada"] = "0";
$_POST["keyvista"] = "1";
$_POST["keycarpin"] = "2";
$_POST["keycarpinext"] = "5";
$_POST["cocina_inde"] = "0";
$_POST["keysuelo"] = "8";
$_POST["key_tipo"] = "399";
$_POST["keyagente"] = "62741";
$_POST["telefono_agente"] = "666666666";
$_POST["nombre_agente"] = "Manuel inmovilla";
$_POST["email_agente"] = "";
$_POST["foto1"] = "https://fotos10.apinmo.com/413/628079/2-1.jpg";
$_POST["foto2"] = "https://fotos10.apinmo.com/413/628079/2-2.jpg";
$_POST["foto3"] = "https://fotos10.apinmo.com/413/628079/2-3.jpg";
$_POST["foto4"] = "https://fotos10.apinmo.com/413/628079/2-4.jpg";
$_POST["fotoagente"] = "https://fotos10.apinmo.com/413/usuarios/62741.jpg";
$_POST["titulo_Castellano"] = "Piso en Venta en San Blas, para reformar, planta 17, 4 habitaciones,   junto a renfe";
$_POST["texto_Castellano"] = "Piso en Venta en San Blas, Alicante, junto a la estación de Renfe y la Avenida Salamanca. Situado en la planta 17.  Piso de 100m2,  cuatro habitaciones, dos baños, salón comedor, cocina independiente exterior a galería y balcón grande. La vivienda se encuentra para reformar. Inmejorables vistas, alta de agua gas y luz.";

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