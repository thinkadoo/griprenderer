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
$navigation[4] = array('href' => 'components.php', 'caption' => 'Components', 'class'=>'active');

$template = $twig->loadTemplate('components.html');
$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

renderHTML($buffer,'components.html');

renderPDF($buffer,'components.pdf');

echo $buffer;