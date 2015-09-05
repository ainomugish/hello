<?php
use Endroid\QrCode\QrCode;
use yii\helpers\Html;
//require_once 'vendor/autoload.php';
//require_once 'qrcode.php';


if(isset($_GET['text'])) {

    $size = isset($_GET['size']) ? (int)$_GET['size'] : 200;
    $padding= isset($_GET['padding']) ? $_GET['padding'] : 10;
    //ob_start();
    $qr = new QrCode();
    $qr->setText($_GET['text']);
    $qr->setSize($size);
    $qr->setPadding($padding);
    //ob_get_contents()
    //header ('Content-Type: image/png');
    $qr->render();

}?>

<?= Html::a('Profile', ['site/qrcode', 'text' =>'http://google.co.ug','size' => 200,'padding' =>10], ['class' => '']) ?>