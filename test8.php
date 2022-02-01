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

  "lang" => "qd",
  "searchQuery" => "Z"

);





try {
  $result = $client->getAutoCompleteSuggestions($params);
  if ($result->status === 200) {
    $output = $result;
    //mostrar valores	  

    print_r($output);



    //imprime el arreglo en PHP
    //var_dump($output);

    $arr_json = json_decode(json_encode($output), true);
    $marcas = array();

    foreach ($arr_json['autoCareBrandFacets'] as $t_marcas) {
      //trae solo los campos que requieres

      if (isset($t_marcas['autoCareBrandFacets']) && !empty($t_marcas['autoCareBrandFacets'])) {
        $marcas[] = array(

          'brandCode' => $t_marcas['counts']['brandCode'],
          'brandName' => $t_marcas['counts']['brandName'],
          'websiteURL' => $t_marcas['counts']['brandAdditionalInfo']['websiteURL'],
          'logoImageURL50x20' => $t_marcas['counts']['brandAdditionalInfo']['logoImageURL50x20']
          /*
          'imageURL1' => $imgURL1 = (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][0]['imageURL800'] : 'Sin definir',
          'imageURL2' => $imgURL2 = (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][1]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][1]['imageURL800'] : 'Sin definir',
          'imageURL3' => $imgURL3 = (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][2]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][2]['imageURL800'] : 'Sin definir',
          'imageURL4' => $imgURL4 = (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][3]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][3]['imageURL800'] : 'Sin definir',
          'imageURL5' => $imgURL5 = (isset($t_marcas['autoCarePart']['piesItem']['digitalAssets'][4]['imageURL800'])) ? $t_marcas['autoCarePart']['piesItem']['digitalAssets'][4]['imageURL800'] : 'Sin definir'
          */

          //'makeName' => $t_marcas['makeName'],
          //'modelName' => $t_marcas['modelName'] . ' ' . $t_marcas['subModelName'] . ' ' . $t_marcas['year']

        );
      }
      if (isset($t_marcas['tecDocDataSupplierFacets']) && !empty($t_marcas['tecDocDataSupplierFacets'])) {
        $marcas[] = array(

          'partNumber' => $t_marcas['tecDocPart']['articleNumber'],
          'brandName' => $t_marcas['tecDocPart']['mfrName'],
          'partTypeName' => $t_marcas['tecDocPart']['genericArticles']['genericArticleDescription'],
          'imageURL1' => $t_marcas['tecDocPart']['images']['imageURL800']

          //'makeName' => $t_marcas['makeName'],
          //'modelName' => $t_marcas['modelName'] . ' ' . $t_marcas['subModelName'] . ' ' . $t_marcas['year']

        );
      }
    }

    print_r($marcas);

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
