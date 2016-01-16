<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap ">
    <?php
    NavBar::begin([
        'brandLabel' => 'MobiSquid',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top',
            'style' => 'font-family:verdana;font-size: 15px; color: #555',
        ],
    ]);
    //$model= new \app\models\UserSetting();
    //echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sm_'.$model->findOne(Yii::$app->getUser()->id)->avatar .'" class="profile-image pull-right"/>';
     /*echo '<form class="navbar-form navbar-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search MobiSquid" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>';*/


    $menuItems[] = [
        'label' => 'Account',
        'items' => [
            [
                'label' => Yii::t('app','Friends'),
                'url' => ['/friend'],
            ],
            [
                'label' => Yii::t('app','Contact information'),
                'url' => ['/user-contact'],
            ],
            [
                'label' => Yii::t('app','Settings'),
                'url' => ['/user-setting'],
            ],
            /*[
                'label' => Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],*/
        ],
    ];
    $navItems=[];
    /*#330*0000#ok
    0792424297-kibo
    ##002#ok*/

    if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Contact Us', 'url' => ['/site/contact']],['label' => 'Sign In', 'url' => ['/user/login']],['label' => 'Sign Up', 'url' => ['/user/register']]);
    } else { $model= new app\models\UserSetting();
        array_push($navItems,
            /*['label' => '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sm_'.$model->findOne(Yii::$app->user->id)->avatar .'" class="profile-image"/>', 'url' => ['#']],*/
            
            ['label' => Yii::$app->user->identity->profile->name , 'url' => ['/profile/update?id='.Yii::$app->user->id]],
            ['label' => 'Home', 'url' => ['/status/index']],
            ['label' => Yii::t('app','Friends'), 'url' => ['/relationship']],
            ['label' =>  Yii::t('app','Chat'), 'url' => ['/chat']],
            ['label' => 'Account','items' => [
                ['label' => 'Notifications', 'url' => ['/site/notification'],],
                [
                    'label' => Yii::t('app','Messeages'),
                    'url' => ['#'],#/site/message
                ],
                [
                    'label' => Yii::t('app','Contact info'),
                    'url' => ['/user-contact'],
                ],
                [
                    'label' => Yii::t('app','Settings'),
                    'url' => ['/user-setting'],
                ],
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post',]]
                /*[
                    'label' => Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],*/
            ]
            ]
            /*['label' => 'Chat', 'url' => ['/site/chat1']]*/
        );

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,

    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; MobiSquid <?= date('Y') ?></p>

        <p class="pull-right"><?/*= Yii::powered()*/ ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
