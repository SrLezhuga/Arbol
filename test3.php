<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

//Obten listado de marcas en formato Aces/Pies
$params = array(
  //'makeIds' => 1,
  'regionIds' => 3,
  //s'modelIds' => 5,
  'includeVehicles' => 1,
  "perPage" => 100,
  "page" => 5,

  'vehicles' => array('enabled' => true)
  //'tecDocDataSupplierFacets' => array('enabled' => true)       
);

try {
  $result = $client->getAutoCareVehicleResults($params);
  if ($result->status === 200) {
    $output = $result;
    //mostrar valores	  

    //print_r($output);



    //imprime el arreglo en PHP
    //var_dump($output);

    $arr_json = json_decode(json_encode($output), true);
    $marcas = array();

    foreach ($arr_json['vehicles'] as $t_marcas) {
      //trae solo los campos que requieres
      $marcas[] = array(
        'vehicleId' => $t_marcas['vehicleId'],
        'makeName' => $t_marcas['makeName'],
        'modelName' => $t_marcas['modelName'] . ' ' . $t_marcas['subModelName'] . ' ' . $t_marcas['year']

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
