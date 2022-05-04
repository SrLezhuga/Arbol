<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$brandCode = (!empty($_GET['id_make'])) ? $_GET['id_make'] : "FLLK ";  //FVCM|VT207.71  BFBQ|210-0170  BCSJ|MX510  BCNB|19211
$partNumber = (!empty($_GET['id_part'])) ? $_GET['id_part'] : "338";  //FVCM|VT207.71  BFBQ|210-0170  BCSJ|MX510  BCNB|19211
$i = 1;

$params = array(
  "brandCode" => $brandCode,
  "partNumber" => $partNumber,
  "includeResults" => 1,
  "includeMatchingBaseVehicles" => 1,
  "perPage" => 100,
  "page" => $i,
  'tecDocDataSupplierFacets' => array('enabled' => true),
  'autoCareBrandFacets' => array('enabled' => true)
);

try {
  $result = $client->getAutoCarePartApplications($params);
  if ($result->status === 200) {
    $output = $result;

    $countmax = ceil(($result->total) / 100);

    $marcas = array();
    $marcas[] = array('total' => $result->total);
    $count = 1;

    for ($i = 1; $i < $countmax + 1; $i++) {

      $params = array(
        "brandCode" => $brandCode,
        "partNumber" => $partNumber,
        "includeResults" => 1,
        "includeMatchingBaseVehicles" => 1,
        "perPage" => 100,
        "page" => $i,
        'tecDocDataSupplierFacets' => array('enabled' => true),
        'autoCareBrandFacets' => array('enabled' => true)
      );
      $result = $client->getAutoCarePartApplications($params);
      $arr_json = json_decode(json_encode($output), true);

      foreach ($arr_json['results'] as $t_marcas) {
        $vehicle = explode(" ", $t_marcas['acesApp']['baseVehicleName'], 2);
        $marcas[] = array(
          'count' => $count,
          'vehicle' => $vehicle[1],
          'year' => $vehicle[0]
        );
        $count++;
      }
    }




    //print_r($result);

    sort($marcas);
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
