<?php

header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH');
define('WSDL_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$params = array(
  "country" => "MX",
  "countryGroupFlag" => false,
  "lang" => "qd",
  "linkingTargetType" => "P",
  "provider" => 22273
);

try {
  $result = $client->getManufacturers($params);
  if ($result->status === 200) {
    $output = $result->data;

    //print_r($output);
    $arr_json = json_decode(json_encode($output), true);
    $items = array();

    foreach ($arr_json['array'] as $t_items) {

      $items[] = array(
        'manuId' => $t_items['manuId'],
        'manuName' => $t_items['manuName']
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






/*


header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$searchQuery = (!empty($_GET['searchQuery'])) ? $_GET['searchQuery'] : '510';

//Obten listado de marcas en formato Aces/Pies
$params = array(
  "lang" => "es-MX",
  "searchQuery" =>  $searchQuery,
  "searchQueryType" =>  "freetext",
  "searchMatchType" =>  "exact",
  "includeGenericPartData" => 1,
  "includeTecDocPartData"  => 1,
  "includeAutoCarePartData" =>  1,
  "perPage" =>  100,
  "page" =>  1
);

try {
  $result = $client->getSearchResults($params);
  if ($result->status === 200) {
    $marcas = array();

    $output = $result;
    $count = 1;

    $countmax = $result->maxAllowedPage;

    for ($i = 1; $i < $countmax + 1; $i++) {
      $params = array(
        "lang" => "es-MX",
        "searchQuery" =>  $searchQuery,
        "searchQueryType" =>  "freetext",
        "searchMatchType" =>  "exact",
        "includeGenericPartData" => 1,
        "includeTecDocPartData"  => 1,
        "includeAutoCarePartData" =>  1,
        "perPage" =>  100,
        "page" =>  $i
      );

      $result = $client->getSearchResults($params);
      $arr_json = json_decode(json_encode($result), true);

      print_r($result);

      foreach ($arr_json['parts'] as $t_marcas) {

        if (isset($t_marcas['autoCarePart']) && !empty($t_marcas['autoCarePart'])) {
          $marcas[] = array(
            'count' => $count++,
            'dataFormat' => 'autoCarePart',
            'partNumber' => $t_marcas['autoCarePart']['piesItem']['partNumber'],
            'brandCode' => $t_marcas['autoCarePart']['piesItem']['brandCode'],
            'brandName' => $t_marcas['autoCarePart']['piesItem']['brandName'],
            'partTypeName' => (isset($t_marcas['autoCarePart']['piesItem']['partTypeName'])) ? $t_marcas['autoCarePart']['piesItem']['partTypeName'] : 'Indefinido',
            'logo' => (isset($t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'])) ? $t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'] : 'assets/media/img/loader/PlaceholderCatalogo.png',
            'imageURL' => (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'] : 'assets/media/img/loader/PlaceholderCatalogo.png'


          );
        } else  if (isset($t_marcas['tecDocPart']) && !empty($t_marcas['tecDocPart'])) {
          $marcas[] = array(
            'count' => $count++,
            'dataFormat' => 'tecDocPart',
            'partNumber' => $t_marcas['tecDocPart']['articleNumber'],
            'brandCode' => (isset($t_marcas['tecDocPart']['brandId'])) ? $t_marcas['tecDocPart']['brandId'] : 'Sin brandCode',
            'brandName' => $t_marcas['tecDocPart']['mfrName'],
            'partTypeName' => $t_marcas['tecDocPart']['genericArticles']['genericArticleDescription'],
            'imageURL' => (isset($t_marcas['tecDocPart']['images']['imageURL800'])) ? $t_marcas['tecDocPart']['images']['imageURL800'] : 'assets/media/img/loader/PlaceholderCatalogo.png'

          );
        }
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

*/