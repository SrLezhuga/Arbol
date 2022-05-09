<?php

header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH');
define('WSDL_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$vehicleModelSeriesIds = (!empty($_POST['vehicleModelSeriesIds'])) ? $_POST['vehicleModelSeriesIds'] : 14669; 
$mfrIds = (!empty($_POST['mfrIds'])) ? $_POST['mfrIds'] : 3854; //1505 //3854

$params = array(

  //1505 3854

  "provider" => 22273,
  "linkageTargetCountry" => "MX",
  "linkageTargetType" => "P",
  "lang" => "qd",
  "mfrIds" => $mfrIds,
  "vehicleModelSeriesIds" => $vehicleModelSeriesIds,
  "perPage" => 100,
  "page" => 1,
  "includeYearFacets" => true

);

try {
  $result = $client->getLinkageTargets($params);
  //print_r($result);
  if ($result->status === 200) {
    $output = $result;

    //print_r($output);
    $arr_json = json_decode(json_encode($output), true);
    $items = array();

    foreach ($arr_json['yearFacets']['counts'] as $t_items) {

      $items[] = array(
        'year' => $t_items['year']
      );
    }
  } else {
    $outuput = [$result->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}

echo json_encode($items);
