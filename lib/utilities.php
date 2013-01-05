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