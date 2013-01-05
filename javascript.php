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
$navigation[5] = array('href' => 'javascript.php', 'caption' => 'JavaScript', 'class'=>'active');

$template = $twig->loadTemplate('javascript.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

//renderHTML($buffer,'javascript.html');

//renderPDF($buffer,'javascript.pdf');

echo $buffer;