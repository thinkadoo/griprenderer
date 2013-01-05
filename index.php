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

$main = new Main();
$messages = $main->getVars();

// VARS passed to TWIG to change the persistent menu bar
$navigation[0] = array('href' => 'index.php', 'caption' => 'Home', 'class'=>'active');

$template = $twig->loadTemplate('index.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation, 'messages' => $messages));

//renderHTML($buffer,'index.html');

//renderPDF($buffer,'index.pdf');

echo $buffer;