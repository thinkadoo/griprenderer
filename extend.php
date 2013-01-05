<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/22
 * Time: 11:15 AM
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");

$template = $twig->loadTemplate('extend.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

//renderHTML($buffer,'extend.html');

//renderPDF($buffer,'extend.pdf');

echo $buffer;