<?php
header("Content-Type: application/json; charset=UTF-8");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

define('API_KEY', '2BeBXg6D45nvSbwiQxWYVoGE7kexWtDr84Tr5dYnG2EqMG6vBShH'); // Su API_KEY
define('WSDL_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?wsdl');
define('SERVICE_URL', 'https://webservice.tecalliance.services/catalog/v1/services/Catalog.soapEndpoint?api_key=' . API_KEY);

$client = new SoapClient(WSDL_URL, array('location' => SERVICE_URL));

//piezas
/*
BDBL | 638PG      1 arm N modelos
BCSJ | BD125917   2 arm N modelos
BCSJ | BD61468    2 arm N modelos
BCSJ | MX510      1 arm 3 modelos
BFBQ | 210-0170   3 arm 3 modelos 
BBDH | 4467       5 arm 1 modelo

BCNB | 19211      N arm N modelos    ***
FVCM | VT207.71   N arm car - truck N modelos ***

*/

$brandCode = (!empty($_POST['id_make'])) ? $_POST['id_make']  : "BFJG";
$partNumber = (!empty($_POST['id_part'])) ? $_POST['id_part'] : "SS10200";

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

    $arr_armadoras = json_decode(json_encode($result1), true);
    $tot_1 = $arr_armadoras['makes']['total'];

    switch ($tot_1) { // abre switch 1 
      case 0:     // sin armadoras

        echo ("No se encontraron aplicaciones disponibles");
        break;

      case 1:     // 1 armadoras

        echo ("\n" . "-> " . $arr_armadoras['makes']['counts']['makeName'] . "\n");

        //Identifica modelos
        $params2 = array(
          "brandCode" => $brandCode,
          "partNumber" => $partNumber,
          "makeIds" => $arr_armadoras['makes']['counts']['makeId'],
          'modelFacets' => array('enabled' => true, 'page' => 1, 'perPage' => 100)
        );

        $result2 = $client->getAutoCarePartApplications($params2);
        $arr_modelos = json_decode(json_encode($result2), true);

        if ($result2->models->total <= 1) {

          $prm0 = $brandCode;
          $prm1 = $partNumber;
          $prm2 = $arr_armadoras['makes']['counts']['makeId'];
          $prm3 = $arr_modelos['models']['counts']['modelId'];
          $r_years = get_years($prm0, $prm1, $prm2, $prm3);

          echo ($arr_modelos['models']['counts']['modelName'] . ":" . $r_years . "\n");
        } else {

          //abre for modelos
          foreach ($arr_modelos['models']['counts'] as $t_modelos) {

            $prm0 = $brandCode;
            $prm1 = $partNumber;
            $prm2 = $arr_armadoras['makes']['counts']['makeId'];
            $prm3 = $t_modelos['modelId'];
            $r_years = get_years($prm0, $prm1, $prm2, $prm3);

            echo ($t_modelos['modelName'] . ":" . $r_years . "\n");
          }
          //cierra for modelos
        } //cierra else 

        break;

      default:  // N armadoras

        //abre for armadoras
        foreach ($arr_armadoras['makes']['counts'] as $t_armadoras) {

          echo ("\n" . "-> " . $t_armadoras['makeName'] . "\n");

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

            echo ($arr_modelos['models']['counts']['modelName'] . ":" . $r_years . "\n");
          } else {

            //abre for modelos
            foreach ($arr_modelos['models']['counts'] as $t_modelos) {

              $prm0 = $brandCode;
              $prm1 = $partNumber;
              $prm2 = $t_armadoras['makeId'];
              $prm3 = $t_modelos['modelId'];
              $r_years = get_years($prm0, $prm1, $prm2, $prm3);

              echo ($t_modelos['modelName'] . ":" . $r_years . "\n");
            }
            //cierra for modelos
          } //cierra else 
        }
        //cierra for armadoras
        break;
    }
    //abre switch 1 


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
  global $client;
  $y_years = array();

  $params3 = array(
    "brandCode" => $prm0,
    "partNumber" => $prm1,
    "makeIds" => $prm2,
    "modelIds" => $prm3,
    'yearFacets' => array('enabled' => true, 'page' => 1, 'perPage' => 100)
  );

  $result3 = $client->getAutoCarePartApplications($params3);
  $arr_years = json_decode(json_encode($result3), true);

  $x_years = "";

  if ($result3->years->total <= 1) {
    $x_years = $arr_years['years']['counts']['year'];
  } else {

    foreach ($arr_years['years']['counts'] as $t_year) {
      $y_years[] = array(
        'year' => $t_year['year']
      );
    }

    sort($y_years);
    $y1 = implode(min($y_years));
    $y2 = implode(max($y_years));
    $x_years = $y1 . " - " . $y2;
  }

  return ($x_years);
}
/******************/
