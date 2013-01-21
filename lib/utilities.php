<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2013/01/05
 * Time: 9:11 AM
 */

include("lib/MPDF54/mpdf.php");

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

function renderPDF($buffer,$fileName){

    $pdfFolderLocation = __DIR__ . '/../pdf/';

    if (!is_dir($pdfFolderLocation)){
        @mkdir($pdfFolderLocation);
    }

    $mpdf=new mPDF('c','A4', '', '', 0, 0, 20, 20, 20, 20);
    $mpdf->SetDisplayMode('fullpage');
    //$mpdf->WriteHTML(file_get_contents( $htmlFolderLocation . 'javascript.html'));
    $mpdf->WriteHTML($pdfFolderLocation . $buffer);
    $mpdf->Output($pdfFolderLocation . $fileName,'F');

}

require_once("lib/lessc/lessc.inc.php");

function autoCompileBootstrap($fileNames) {

    $less = new lessc;

    //$less->setFormatter("compressed");
    $less->setFormatter("classic");

    foreach($fileNames as $fileName){

        $inputFile = __DIR__ .'/../assets/less/'.$fileName.'.less';
        $outputFile = __DIR__ .'/../assets/css/'.$fileName.'.css';
        $cacheFile = __DIR__ .'/../assets/cache/'.$fileName.'.cache';

        if (file_exists($cacheFile)) {
            $cache = unserialize(file_get_contents($cacheFile));
        } else {
            $cache = $inputFile;
        }

        $newCache = $less->cachedCompile($cache);

        if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            file_put_contents($cacheFile, serialize($newCache));
            file_put_contents($outputFile, $newCache['compiled']);
        }
    }
}