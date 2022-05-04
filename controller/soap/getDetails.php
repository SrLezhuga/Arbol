<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$baseVehicleId = (!empty($_POST['baseVehicleId'])) ? $_POST['baseVehicleId'] : 156208; //33667 134226

//Obten listado de items en formato Aces/Pies
$params = array(
  "brandCode" => "FLLK",
  "partNumber" => 510
);

try {
  $result = $client->getAutoCarePartDetails($params);
  if ($result->status === 200) {
    $items = array();

    $output = $result;

    print_r($output);

    //var_dump($result);
    //count($result, COUNT_RECURSIVE);

    //print_r($result);

    foreach ($arr_json['piesItem'] as $t_items) {


       /* if (isset($t_items['digitalAssets']['imageURL800'])) {
          $img = $t_items['digitalAssets']['imageURL800'];
        } else if (isset($t_items['digitalAssets'][0]['imageURL800'])) {
          $img = $t_items['digitalAssets'][0]['imageURL800'];
        } else if (isset($t_items['digitalAssets'][1]['imageURL800'])) {
          $img = $t_items['digitalAssets'][1]['imageURL800'];
        } else {
          $img = 'assets/media/img/loader/PlaceholderCatalogo.png';
        }*/

        $items[] = array(
          'partNumber' => $t_items['partNumber'],
          'brandName' => $t_items['brandName'],
          'websiteURL' =>  $t_items['websiteURL'],
          'logo' => (isset($t_items['brandAdditionalInfo']['logoImageURL100x40'])) ? $t_items['brandAdditionalInfo']['logoImageURL100x40'] : 'assets/media/img/loader/PlaceholderCatalogo.png',
          'PDF' =>
          'GTIN/EAN' 
          'quantity'
          'uomCode'
          'height'
          'width'
          'length'
          'weight'
          'partInterchanges'
          
          
          
        );
      }



    //$arr_json = json_encode($items);
    //print_r($items);
    //echo $arr_json;
    exit;

    exit;
  } else {
    $output = [$result->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}
