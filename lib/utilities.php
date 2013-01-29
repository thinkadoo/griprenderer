<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/05
 * Time: 9:11 AM
 */

function renderHTML($buffer,$fileName){

    $htmlFolderLocation = __DIR__ . '/../html/';

    if (!is_dir($htmlFolderLocation)){
        @mkdir($htmlFolderLocation);
    }

    $filename = ( $htmlFolderLocation . $fileName);
    $fp = fopen($filename, 'w+');
    fwrite($fp, $buffer);
    fclose($fp);

}