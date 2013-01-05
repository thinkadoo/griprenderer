<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/22
 * Time: 11:17 AM
 */

require("lib/globaldata.php");
require("lib/globalinstances.php");
require("lib/utilities.php");

// VARS passed to TWIG to change the persistent menu bar
$navigation[1] = array('href' => 'getting-started.php', 'caption' => 'Get started', 'class'=>'active');

$template = $twig->loadTemplate('getting-started.html');

$buffer = $template->render(array('name' => $name, 'navigation' => $navigation));

//renderHTML($buffer,'getting-started.html');

//renderPDF($buffer,'getting-started.pdf');

echo $buffer;