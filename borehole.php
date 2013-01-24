<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/23
 * Time: 2:54 PM
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");
require_once("lib/main.php");
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
print_r($data);
die();*/


// Render all the Borehole Detail Pages

function renderBoreholeDetails($data,$municipalities,$settlements,$hareas){

global $twig;

    foreach ($data as $borehole){

        $navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

        $borehole->municipality = $municipalities[$borehole->municipality]->name;
        $borehole->settlement = $settlements[$borehole->settlement]->SetlName;
        $borehole->h_area = $hareas[(int)$borehole->h_area]->name;

        $template = $twig->loadTemplate('boreholedetail.html');
        $buffer = $template->render(array('navigation' => $navigation, 'data'=>$borehole));

        renderHTML($buffer,$borehole->id.'.html');
    }
}

renderBoreholeDetails($data,$municipalities,$settlements,$hareas);

// Wrangle the Data and build an List Page


$data = $grip->getBoreholes();
/*echo"<pre>";
print_r($municipalities);
die();*/

function prepareData($data,$municipalities,$settlements,$hareas){

    $boreholeList = array();

    foreach ($data as $borehole){
        if ($borehole->municipality = 13){
            $borehole->municipality = $municipalities[$borehole->municipality]->name;
            $borehole->settlement = $settlements[$borehole->settlement]->SetlName;
            $borehole->h_area = $hareas[(int)$borehole->h_area]->name;
            $boreholeList [] = $borehole;
        }
    }

    return $boreholeList;
}

$boreholeList = prepareData($data,$municipalities,$settlements,$hareas);

$message =  "I rendered ".count($data)." pages for you :)";

// VARS passed to TWIG to change the persistent menu bar
$navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

$template = $twig->loadTemplate('borehole.html');
$buffer = $template->render(array('navigation' => $navigation, 'message'=>$message, 'hareas'=>$hareas, 'districts'=>$districts, 'catchments'=>$catchments, 'boreholelist'=>$boreholeList, 'municipalities'=>$municipalities, 'settlements'=>$settlements));

renderHTML($buffer,'borehole.html');

//renderPDF($buffer,'index.pdf');

//$fileNames = array("bootstrap","responsive");
//autoCompileBootstrap($fileNames);

echo $buffer;