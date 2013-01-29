<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/23
 * Time: 2:54 PM
 */

require_once 'vendor/autoload.php';

require("lib/globalinstances.php");
require("lib/utilities.php");
require_once("lib/GripModel.php");

//$grip = new GripModel();
//$data = $grip->getBorehole("2228DCV0008");
//$data = $grip->getBoreholes();
//$data = $grip->getHAreas();
//$data = $grip->getDistricts();
//$data = $grip->getCatchments();
//$data = $grip->getMunicipalities();
//$data = $grip->getSettlements();
//$data = $grip->getMunicipalityFromDistrict(3);

$grip = new GripModel();

$data = $grip->getBoreholes();

$hareas = $grip->getHAreas();
$districts = $grip->getDistricts();
$catchments = $grip->getCatchments();
$municipalities = $grip->getMunicipalities();
$settlements = $grip->getSettlements();

/*echo"<pre>";
print_r($settlements);
die();*/


// Render all the Borehole Detail Pages

function renderBoreholeDetails($data,$municipalities,$settlements,$hareas,$districts){

global $twig;

    foreach ($data as $borehole){

        $navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

        $borehole->municipality = $municipalities[(int)$borehole->municipality]->name;
        $borehole->settlement = $settlements[(int)$borehole->settlement]->name;
        $borehole->h_area = $hareas[(int)$borehole->h_area]->name;
        $borehole->district = $districts[(int)$borehole->district]->name;

        $template = $twig->loadTemplate('boreholedetail.html');
        $buffer = $template->render(array('navigation' => $navigation, 'data'=>$borehole));

        renderHTML($buffer,$borehole->bh.'.html');
    }
}

renderBoreholeDetails($data,$municipalities,$settlements,$hareas,$districts);

// Wrangle the Data and build an List Page


$data = $grip->getBoreholes();
/*echo"<pre>";
print_r($municipalities);
die();*/

function prepareData($data,$municipalities,$settlements,$hareas,$districts){

    $boreholeList = array();

    foreach ($data as $borehole){

        //if ((int)$borehole->settlement != 0 && (int)$borehole->settlement != null && (int)$borehole->settlement == 2454 ){
        if ((int)$borehole->settlement == 242 ){

            $borehole->municipality = $municipalities[(int)$borehole->municipality]->name;
            $borehole->settlement = $settlements[(int)$borehole->settlement]->name;
            $borehole->h_area = $hareas[(int)$borehole->h_area]->name;
            $borehole->district = $districts[(int)$borehole->district]->name;

            $boreholeList [] = $borehole;
        }
    }

    return $boreholeList;
}

$boreholeList = prepareData($data,$municipalities,$settlements,$hareas,$districts);

$message =  "I rendered ".count($data)." pages for you :)";

// VARS passed to TWIG to change the persistent menu bar
$navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

$template = $twig->loadTemplate('borehole.html');
$buffer = $template->render(array('navigation' => $navigation, 'message'=>$message, 'boreholelist'=>$boreholeList, 'hareas'=>$hareas , 'districts'=>$districts, 'catchments'=>$catchments, 'municipalities'=>$municipalities, 'settlements'=>$settlements ));

renderHTML($buffer,'borehole.html');

//renderPDF($buffer,'index.pdf');

//$fileNames = array("bootstrap","responsive");
//autoCompileBootstrap($fileNames);

echo $buffer;