<?php

include './vendor/autoload.php';

use Endroid\QrCode\QrCode;

$qrCode = new QrCode();
$qrCode
    ->setText('The quick brown fox jumps over the little lazy dog.')
    ->setSize(300)
    ->setPadding(10)
    ->setErrorCorrection('high')
    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
    ->setLabel('Scan the code')
    ->setLabelFontSize(16)
    ->setImageType(QrCode::IMAGE_TYPE_PNG)
;

// now we can directly output the qrcode
header('Content-Type: '.$qrCode->getContentType());
$qrCode->render();

// or create a response object
$response = new Response($qrCode->get(), 200, array('Content-Type' => $qrCode->getContentType()));
