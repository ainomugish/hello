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
$size=300;
$session = Yii::$app->session;
$session->open();
$session->set('secret', $secret);
$session->close();
/*$session = new Session;
$session->open();
$session['secret'] = $secret;
$session->close();*/
use app\controllers\ProfileController;

?>
<div class="site-index">

    <!--  <div class="">
          <h2 class="text">MobiSquid</h2>

         <p class="lead">MobiSquid Social Network.</p>

       <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->
   <?php if (Yii::$app->user->isGuest) {?>
    <div class="jumbotron">

        <div class="row">
            <div class="col-lg-4 text-center">
                <h2 class="text">Scan QR Code to Login.</h2>
                <br><br>
                <p class="err"><b><?= Html::encode($th) ?></b></p>
                <p >Pull out you phone</p><br>
                <p>Open Mobisquid App</p><br>
                <p>Scan the picture on the right</p><br>
                <p>Voila, you will be authenticated</p>


                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>

            <div class="col-lg-4 pull-right">

                    <?php if (Yii::$app->user->isGuest) {?>
                        <?= Html::img($tfa->getQRCodeImageAsDataUri('Isaac Tumusiime', $secret, $size), ['alt'=>'Scan Code', 'class'=>'']);

                            ?>
                    <?php } else {


                }
                ?>
            </div>

        </div>

    </div>
<?php }
    else{


    }?>
</div>
