<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$searchQuery = (!empty($_POST['textQuery'])) ? $_POST['textQuery'] : '10'; //WBP23517A

//Obten listado de marcas en formato Aces/Pies
$params = array(
  "lang" => "es-MX",
  "searchQuery" =>  "$searchQuery",
  "searchQueryType" =>  "freetext",
  "searchMatchType" =>  "exact",
  "dataFormats" => "autocare",
  //"includeGenericPartData" => 1,
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
        "searchQuery" =>  "$searchQuery",
        "searchQueryType" =>  "freetext",
        "searchMatchType" =>  "exact",
        "dataFormats" => "autocare",
        //"includeGenericPartData" => 1,
        "includeAutoCarePartData" =>  1,
        "perPage" =>  100,
        "page" =>  $i
      );

      $result = $client->getSearchResults($params);
      $arr_json = json_decode(json_encode($result), true);

      //var_dump($result);

      //print_r($result);

      foreach ($arr_json['parts'] as $t_marcas) {

        if (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets']['imageURL800'])) {
          $img = $t_marcas['autoCarePart']['piesItem']['digitalAssets']['imageURL800'];
        } else if (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'])) {
          $img = $t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'];
        } else if (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][1]['imageURL800'])) {
          $img = $t_marcas['autoCarePart']['piesItem']['digitalAssets'][1]['imageURL800'];
        } else {
          $img = 'assets/media/img/loader/PlaceholderCatalogo.png';
        }

        $marcas[] = array(
          'count' => $count++,
          'partNumber' => $t_marcas['autoCarePart']['piesItem']['partNumber'],
          'brandCode' => $t_marcas['autoCarePart']['piesItem']['brandCode'],
          'brandName' => $t_marcas['autoCarePart']['piesItem']['brandName'],
          'logo' => (isset($t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'])) ? $t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'] : 'assets/media/img/loader/PlaceholderLogo.png',
          'imageURL' => $img
        );
      }
    }

    $arr_json = json_encode($marcas);

    //print_r($marcas);
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
