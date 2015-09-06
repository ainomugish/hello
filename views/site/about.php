<?php

/* @var $this yii\web\View */
header('Content-Type: image/png');
//require_once 'vendor/autoload.php';
use yii\widgets\DetailView;
use yii\helpers\Html;
require_once 'qrcode.php';

$this->title = 'About MobiSquid';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="site-about">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>here is your qrcode</p>
    <?= Html::img('/site/qrcode?text=http://google.co.ug&size=200&padding=10', ['alt'=>'QR Code', 'class'=>'']);?>
    <img src="qrcode.php?text=http://google.co.ug&size=200&padding=10" alt="QR Code">





</div>
