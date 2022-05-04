<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$idMakeFacets = $_POST['vehicleMake'];
$idYearFacets = $_POST['vehicleYear'];

//Obten listado de items en formato Aces/Pies
$params = array(

  "regionIds" => 3,
  "vehicleTypeIds" => 5,
  "makeIds" => $idMakeFacets,
  "years" => $idYearFacets,
  "includeVehicles" => 1,
  "perPage" => 100,
  "page" => 1

);

try {
  $result = $client->getAutoCareVehicleResults($params);
  if ($result->status === 200) {
    $output = $result;

    //print_r($output);

    $arr_json = json_decode(json_encode($output), true);
    $items = array();

    foreach ($arr_json['vehicles'] as $t_items) {
      //trae solo los campos que requieres

      $items[] = array(
        

        'baseVehicleId' => $t_items['baseVehicleId'],
        'modelName' => $t_items['modelName'],
        'subModelName' => $t_items['subModelName']

      );
    }

    //print_r($items);

    echo json_encode($items);


    exit;
  } else {
    $output = [$result->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}
