<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'MobiSquid Application';


/*$mp = new RobThree\Auth\Providers\Qr\MyProvider();
$tfa = new RobThree\Auth\TwoFactorAuth('My Company', 6, 30, 'sha1', $mp);
$secret = $tfa->createSecret();*/

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>MobiSquid</h1>

        <!-- <p class="lead">MobiSquid Social Network.</p>

       <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">
                <h2>How to scan QR Code.</h2>

                <ul>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et</ul>
                <ul>dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</ul>
                <ul>   ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</ul>
                <ul>   fugiat nulla pariatur.</ul>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-6 pull-right">
                <h2>Scan this code</h2>
<?php
                if (Yii::$app->user->isGuest) {?>
                    <?= $this->render('_qr') ?>
                <?php
                } else {
                }
?>




            </div>

        </div>

    </div>
</div>
