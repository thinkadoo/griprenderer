<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/22
 * Time: 11:18 AM
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");

// VARS passed to TWIG to change the persistent menu bar
$navigation[2] = array('href' => 'scaffolding.php', 'caption' => 'Scaffolding', 'class'=>'active');

$template = $twig->loadTemplate('scaffolding.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

renderHTML($buffer,'scaffolding.html');

renderPDF($buffer,'scaffolding.pdf');

echo $buffer;