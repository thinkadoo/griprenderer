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

$grip = new GripModel();
//$data = $grip->getBorehole("2228DCV0008");
$data = $grip->getBoreholes();
//$data = $grip->getHAreas();
//$data = $grip->getDistricts();
//$data = $grip->getCatchments();
//$data = $grip->getMunicipalityFromDistrict(3);

foreach ($data as $borehole){

    $navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

    $template = $twig->loadTemplate('borehole.html');
    $buffer = $template->render(array('navigation' => $navigation, 'data'=>$borehole));

    renderHTML($buffer,$borehole->id.'.html');
}


die();



// VARS passed to TWIG to change the persistent menu bar
$navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

$template = $twig->loadTemplate('borehole.html');
$buffer = $template->render(array('navigation' => $navigation, 'data'=>$data));

renderHTML($buffer,'borehole.html');

//renderPDF($buffer,'index.pdf');

//$fileNames = array("bootstrap","responsive");
//autoCompileBootstrap($fileNames);

echo $buffer;