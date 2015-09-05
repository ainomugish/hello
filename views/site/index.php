<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'MobiSquid Application';


/*$mp = new RobThree\Auth\Providers\Qr\MyProvider();
$tfa = new RobThree\Auth\TwoFactorAuth('My Company', 6, 30, 'sha1', $mp);
$secret = $tfa->createSecret();*/
use RobThree\Auth\TwoFactorAuth;
$tfa = new TwoFactorAuth('MobiSquid', 6, 30, 'sha256');
$secret = $tfa->createSecret();
$size=400;

?>
<div class="site-index">

    <div class="jumbotron">
        <h2>MobiSquid</h2>

        <!-- <p class="lead">MobiSquid Social Network.</p>

       <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">
                <h2>Scan QR Code to Login.</h2>
                <ul>Pull out you phone</ul>
                <ul>Open Mobisquid app</ul>
                <ul>Scan the picture on the right</ul>
                <ul>Voila, you will be authenticated</ul>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>

            <div class="col-lg-6 pull-right">

                    <?php if (Yii::$app->user->isGuest) {?>
                        <?= Html::img($tfa->getQRCodeImageAsDataUri('Isaac Tumusiime', $secret, $size), ['alt'=>'Scan Code', 'class'=>'']);

                            ?>
                    <?php } else {

                }
                ?>
            </div>

        </div>

    </div>
</div>
