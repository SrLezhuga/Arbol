<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$id_button = (!empty($_GET['id_button'])) ? $_GET['id_button'] : "FBHK|TPM327";

$item = explode("|", $id_button);

$brandCode = $item[0];
$partNumber = $item[1];

$params = array(
  "brandCode" => $brandCode,
  "partNumber" => $partNumber,
  "includeResults" => 1,
  "includeMatchingBaseVehicles" => 1,
  "perPage" => 100,
  "page" => 1,
  'tecDocDataSupplierFacets' => array('enabled' => true),
  'autoCareBrandFacets' => array('enabled' => true)
);

try {
  $result = $client->getAutoCarePartApplications($params);
  if ($result->status === 200) {
    //sprint_r($result);
    $marcas = array();

    $output = $result;
    $count = 1;

    $countmax = ceil(($result->total)/100);

    for ($i = 1; $i < $countmax + 1; $i++) {

      $params = array(
        "brandCode" => $brandCode,
        "partNumber" => $partNumber,
        "includeResults" => 1,
        "includeMatchingBaseVehicles" => 1,
        "perPage" => 100,
        "page" =>  $i,
        'tecDocDataSupplierFacets' => array('enabled' => true),
        'autoCareBrandFacets' => array('enabled' => true)
      );

      $result = $client->getAutoCarePartApplications($params);
      $arr_json = json_decode(json_encode($result), true);

      //print_r($result);

      foreach ($arr_json['results'] as $t_marcas) {

        $marcas[] = array(
          'count' => $count++,
          'baseVehicleId' => $t_marcas['matchingBaseVehicles']['baseVehicleId'],
          'year' => $t_marcas['matchingBaseVehicles']['year'],
          'makeId' => $t_marcas['matchingBaseVehicles']['makeId'],
          'makeName' => $t_marcas['matchingBaseVehicles']['makeName'],
          'modelId' => $t_marcas['matchingBaseVehicles']['modelId'],
          'modelName' => $t_marcas['matchingBaseVehicles']['modelName'],
          'vehicleTypeId' => $t_marcas['matchingBaseVehicles']['vehicleTypeId'],
          'vehicleTypeName' => $t_marcas['matchingBaseVehicles']['vehicleTypeName']

        );
      }
    }

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
