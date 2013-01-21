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

// VARS passed to TWIG to change the persistent menu bar
$navigation[3] = array('href' => 'base-css.php', 'caption' => 'Base CSS', 'class'=>'active');

$template = $twig->loadTemplate('base-css.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

//renderHTML($buffer,'base-css.html');

//renderPDF($buffer,'base-css.pdf');

$fileNames = array("bootstrap","responsive");
autoCompileBootstrap($fileNames);

echo $buffer;