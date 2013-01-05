<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/22
 * Time: 5:28 PM
 */

require_once('lib/main.php');
require_once 'vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
    'debug' => true
));