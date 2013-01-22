<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/21
 * Time: 10:29 PM
 * To change this template use File | Settings | File Templates.
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");
require_once("lib/main.php");
require_once("lib/GripModel.php");

$grip = new GripModel();
//$data = $grip->getBorehole(11);
//$data = $grip->getBoreholes();
//$data = $grip->getHAreas();
//$data = $grip->getDistricts();
//$data = $grip->getCatchments();
$data = $grip->getMunicipalityFromDistrict(3);
echo "<pre>";
print_r($data);
die();

$main = new Main();
$messages = $main->getVars();

// VARS passed to TWIG to change the persistent menu bar
$navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

$template = $twig->loadTemplate('index.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation, 'messages' => $messages));

//renderHTML($buffer,'index.html');

//renderPDF($buffer,'index.pdf');

$fileNames = array("bootstrap","responsive");
autoCompileBootstrap($fileNames);

echo $buffer;