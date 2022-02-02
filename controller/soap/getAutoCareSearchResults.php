<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$baseVehicleId = (!empty($_GET['baseVehicleId'])) ? $_GET['baseVehicleId'] : 118800;

//Obten listado de marcas en formato Aces/Pies
/*
[status] => 200
[total] => 325
[maxAllowedPage] => 4
*/
$params = array(
  "includeParts" => 1,
  "includePartFitments" => 1,
  "baseVehicleId" => $baseVehicleId,
  "perPage" => 100,
  "page" => 1
);

try {
  $result = $client->getAutoCareSearchResults($params);
  if ($result->status === 200) {
    $output = $result;
    //mostrar valores	  

    //print_r($output);

    //imprime el arreglo en PHP
    //var_dump($output);

    $arr_json = json_decode(json_encode($output), true);
    $marcas = array();

    foreach ($arr_json['parts'] as $t_marcas) {
      //trae solo los campos que requieres
      $marcas[] = array(

        'partNumber' => $t_marcas['piesItem']['partNumber'],
        'brandCode' => $t_marcas['piesItem']['brandCode'],
        'brandName' => $t_marcas['piesItem']['brandName'],
        'partTypeName' => $t_marcas['piesItem']['partTypeName'],
        'logo' => $logo  = (isset($t_marcas['piesItem']['brandAdditionalInfo']['logoImageURL100x40'])) ? $t_marcas['piesItem']['brandAdditionalInfo']['logoImageURL100x40'] : 'assets/media/img/loader/PlaceholderCatalogo.png',
        //'quantityOfEaches' => $quantityOfEaches  = (isset($t_marcas['piesItem']['packages']['quantityOfEaches'])) ? $t_marcas['piesItem']['packages']['quantityOfEaches'] : 'Sin definir',
        //'uomCode' => $uomCode  = (isset($t_marcas['piesItem']['packages']['dimensions']['uomCode'])) ? $t_marcas['piesItem']['packages']['dimensions']['uomCode'] : 'Sin definir',
        //'height' => $height  = (isset($t_marcas['piesItem']['packages']['dimensions']['height'])) ? $t_marcas['piesItem']['packages']['dimensions']['height'] : 'Sin definir',
        //'width' => $width  = (isset($t_marcas['piesItem']['packages']['dimensions']['width'])) ? $t_marcas['piesItem']['packages']['dimensions']['width'] : 'Sin definir',
        //'length' => $length  = (isset($t_marcas['piesItem']['packages']['dimensions']['length'])) ? $t_marcas['piesItem']['packages']['dimensions']['length'] : 'Sin definir',
        'imageURL' => $imgURL = (isset($t_marcas['piesItem']['digitalAssets']['imageURL800'])) ? $t_marcas['piesItem']['digitalAssets']['imageURL800'] : 'assets/media/img/loader/PlaceholderCatalogo.png'



        //'makeName' => $t_marcas['makeName'],
        //'modelName' => $t_marcas['modelName'] . ' ' . $t_marcas['subModelName'] . ' ' . $t_marcas['year']

      );
    }


    //genera json completo para limpiarlo en https://codebeautify.org/json-to-text-converter
    $arr_json = json_encode($marcas);

    echo $arr_json;
    exit;

    exit;
  } else {
    $output = [$result->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}
