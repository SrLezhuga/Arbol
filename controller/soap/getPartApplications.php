<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

$brandCode = (!empty($_POST['id_make'])) ? $_POST['id_make'] : "BKNH";  //FVCM|VT207.71  BFBQ|210-0170  BCSJ|MX510  BCNB|19211
$partNumber = (!empty($_POST['id_part'])) ? $_POST['id_part'] : "510";  //FVCM|VT207.71  BFBQ|210-0170  BCSJ|MX510  BCNB|19211
$i = 1;

$params1 = array(
  "brandCode" => $brandCode,
  "partNumber" => $partNumber,
  "makeFacets" => array("enabled" => true)
);


try {

  $result1 = $client->getAutoCarePartApplications($params1);
  if ($result1->status === 200 and $result1->total > 0) {

    /*******************************************************************/

    $armadoras = array();
    $modelos   = array();

    $arr_armadoras = json_decode(json_encode($result1), true);

    foreach ($arr_armadoras['makes']['counts'] as $t_armadoras) {


      //Identifica modelos
      $params2 = array(
        "brandCode" => $brandCode,
        "partNumber" => $partNumber,
        "makeIds" => $t_armadoras['makeId'],
        'modelFacets' => array('enabled' => true, 'page' => 1, 'perPage' => 100)
      );

      $result2 = $client->getAutoCarePartApplications($params2);
      $arr_modelos = json_decode(json_encode($result2), true);

      if ($result2->models->total <= 1) {
        $prm0 = $brandCode;
        $prm1 = $partNumber;
        $prm2 = $t_armadoras['makeId'];
        $prm3 = $arr_modelos['models']['counts']['modelId'];

        $r_years = get_years($prm0, $prm1, $prm2, $prm3);

        $armadoras[] = array(
          'makeId' => $t_armadoras['makeId'],
          'makeName' => $t_armadoras['makeName'],
          'modelId' => $arr_modelos['models']['counts']['modelId'],
          'modelName' => $arr_modelos['models']['counts']['modelName'],
          'years' => $r_years

        );
      } else {

        foreach ($arr_modelos['models']['counts'] as $t_modelos) {
          $prm0 = $brandCode;
          $prm1 = $partNumber;
          $prm2 = $t_armadoras['makeId'];
          $prm3 = $t_modelos['modelId'];

          $r_years = get_years($prm0, $prm1, $prm2, $prm3);

          $armadoras[] = array(
            'makeId' => $t_armadoras['makeId'],
            'makeName' => $t_armadoras['makeName'],
            'modelId' => $t_modelos['modelId'],
            'modelName' => $t_modelos['modelName'],
            'years' => $r_years
          );
        } //cierra for modelos

      }
    }    //cierra for armadoras

    sort($armadoras);
    echo json_encode($armadoras);
    //print_r($armadoras);
    //var_dump($armadoras);


    /*******************************************************************/
  } else {
    $output = [$result1->status];
  }
} catch (Exception $ex) {
  die(json_encode($ex));
  exit;
}

/******************/
function get_years($prm0, $prm1, $prm2, $prm3)
{
  $client3 = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));
  $y_years = array();

  $params3 = array(
    "brandCode" => $prm0,
    "partNumber" => $prm1,
    "makeIds" => $prm2,
    "modelIds" => $prm3,
    'yearFacets' => array('enabled' => true, 'page' => 1, 'perPage' => 100)
  );

  $result3 = $client3->getAutoCarePartApplications($params3);
  $arr_years = json_decode(json_encode($result3), true);

  $x_years = "";
  if ($result3->years->total <= 1) {
    $x_years = $arr_years['years']['counts']['year'];
  } else {


    foreach ($arr_years['years']['counts'] as $t_year) {
      $x_years = $x_years . strval($t_year['year']) . " ";
    }

    //$x_years = implode(" ",$y_years);
    //rer mejorar
    //$x_years = json_encode($y_years);
  }

  return ($x_years);
}
/******************/
