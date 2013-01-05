<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/23
 * Time: 12:25 PM
 */

$htmlFolderLocation = __DIR__ . '/../html/';

if (is_dir($htmlFolderLocation)){
    @rmdir($htmlFolderLocation);
}else{
    @mkdir($htmlFolderLocation);
}

$filename = ( $htmlFolderLocation . 'example.html');
$fp = fopen($filename, 'w+');
fwrite($fp, $buffer);
fclose($fp);

echo $buffer;