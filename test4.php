<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

//Obten listado de marcas en formato Aces/Pies  maxAllowedPage

$searchQuery = (!empty($_GET['searchQuery'])) ? $_GET['searchQuery'] : "197";

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
    $output = $result->maxAllowedPage;
    //mostrar valores	
  

    for ($count = 1; $count < $output; $count++) {
      pages($searchQuery, $count, $client);
    }
    echo $arr_json;
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}

function pages($searchQuery, $count, $client)
{

  $params = array(

    "lang" => "es-MX",
    "searchQuery" =>  $searchQuery,
    "searchQueryType" =>  "freetext",
    "searchMatchType" =>  "exact",
    "includeGenericPartData" => 1,
    "includeTecDocPartData"  => 1,
    "includeAutoCarePartData" =>  1,
    "perPage" =>  10,
    "page" =>  $count

  );

  try {
    $result = $client->getSearchResults($params);
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

        if (isset($t_marcas['autoCarePart']) && !empty($t_marcas['autoCarePart'])) {
          $marcas[] = array(

            'partNumber' => $t_marcas['autoCarePart']['piesItem']['partNumber'],
            'brandCode' => $t_marcas['autoCarePart']['piesItem']['brandCode'],
            'brandName' => $t_marcas['autoCarePart']['piesItem']['brandName'],
            'partTypeName' => $t_marcas['autoCarePart']['piesItem']['partTypeName'],
            'logo' => (isset($t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'])) ? $t_marcas['autoCarePart']['piesItem']['brandAdditionalInfo']['logoImageURL100x40'] : 'assets/media/img/loader/PlaceholderCatalogo.png',
            'imageURL' => (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'] : 'assets/media/img/loader/PlaceholderCatalogo.png'


          );
        }
        if (isset($t_marcas['tecDocPart']) && !empty($t_marcas['tecDocPart'])) {
          $marcas[] = array(

            'partNumber' => $t_marcas['tecDocPart']['articleNumber'],
            'brandCode' => $t_marcas['autoCarePart']['piesItem']['brandCode'],
            'brandName' => $t_marcas['tecDocPart']['mfrName'],
            'partTypeName' => $t_marcas['tecDocPart']['genericArticles']['genericArticleDescription'],
            'imageURL' => $t_marcas['tecDocPart']['images']['imageURL800']

          );
        }
      }

      return $arr_json = json_encode($marcas);



      exit;

      exit;
    } else {
      $output = [$result->status];
    }
  } catch (Exception $ex) {
    die(json_encode($ex));
    exit;
  }
}
