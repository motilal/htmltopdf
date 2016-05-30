<?php
$html = '<html><body><h1>Hello hoiw</h2></body></html>';
$tmphtmlfname = uniqid('pdfdata_') . ".html";
$handle = fopen($tmphtmlfname, "w");
if (fwrite($handle, $html)) {
    fclose($handle);
    $temppdffname = uniqid('dhpdf') . ".pdf";
    exec("phantomjs\phantomjs.exe phantomjs\pdf.js {$tmphtmlfname} {$temppdffname}", $output, $return);
    if (!$return) {
        header('Content-Type: application/pdf');
        header('Content-disposition: attachment; filename=ImageUploads.pdf');
        header('Content-Length: ' . filesize($temppdffname)); // provide file size
        header('Connection: close');
        readfile($temppdffname);
        unlink($temppdffname);
    } else {
        echo "Error $return. PDF failed to download! Please Try Again.";
    }
    unlink($tmphtmlfname);
}
exit();
?>