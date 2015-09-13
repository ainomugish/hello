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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'MobiSquid',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top tx',
        ],
    ]);
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
    $navItems=[
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Status', 'url' => ['/status/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']]
    ];

    if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Sign In', 'url' => ['/user/login']],['label' => 'Sign Up', 'url' => ['/user/register']]);
    } else {
        array_push($navItems,
            ['label' => 'Account','items' => [
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
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]
                /*[
                    'label' => Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],*/
            ]
            ],
            ['label' => 'Chat', 'url' => ['/site/chat1']]
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
