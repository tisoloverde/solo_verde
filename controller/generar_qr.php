<?php
//html PNG location prefix
$PNG_WEB_DIR = 'qr/';

include "phpqrcode/qrlib.php";

$filename = $PNG_TEMP_DIR.'test.png';

$matrixPointSize = 10;
$errorCorrectionLevel = 'L';

$filename = $PNG_WEB_DIR . 'qr_' . md5(rand()) . '.png';

QRcode::png('información', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

echo '<img src="' . $PNG_WEB_DIR.basename($filename) . '" /><hr/>';

?>
