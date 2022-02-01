<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$idMakeFacets = $_POST['idMakeFacets'];
$idYearFacets = $_POST['idYearFacets'];

//Obten listado de marcas en formato Aces/Pies
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
    $marcas = array();

    foreach ($arr_json['vehicles'] as $t_marcas) {
      //trae solo los campos que requieres

      $marcas[] = array(
        

        'baseVehicleId' => $t_marcas['baseVehicleId'],
        'modelName' => $t_marcas['modelName'],
        'subModelName' => $t_marcas['subModelName']

      );
    }

    //print_r($marcas);

    echo json_encode($marcas);


    exit;
  } else {
    $output = [$result->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}
