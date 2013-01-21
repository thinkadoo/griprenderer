<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/22
 * Time: 11:14 AM
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");

// VARS passed to TWIG to change the persistent menu bar
$navigation[6] = array('href' => 'customize.php', 'caption' => 'Customize', 'class'=>'active');

$template = $twig->loadTemplate('customize.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

//renderHTML($buffer,'customize.html');

//renderPDF($buffer,'customize.pdf');

$fileNames = array("bootstrap","responsive");
autoCompileBootstrap($fileNames);

echo $buffer;