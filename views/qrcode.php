<?php

/* @var $this yii\web\View */
header('Content-Type: image/png');
//require_once 'vendor/autoload.php';
//use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$qr= new Endroid\QrCode\QrCode();

$qr->setText('http://google.co.ug');
$qr->setSize(200);
$qr->setPadding(10);

$qr->render();