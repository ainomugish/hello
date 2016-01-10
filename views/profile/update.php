<?php

use yii\helpers\Html;
use app\models\UserSetting;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
use app\models\Relationship;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->registerCssFile('@web/css/site1.css');
?>
<div class="profile-update">

    <div class="col-lg-2">
        <?php $model1=new UserSetting();
        $mod=$model1->findOne($model->user->getId());
        if ($mod) {
            echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$mod->avatar.'" class="profile-image"/>';
        } else {
            echo \cebe\gravatar\Gravatar::widget([
                'email' => app\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->email,
                'options' => [
                    'class'=>'profile-image',
                    'alt' => app\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->username,
                ],
                'size' => 128,
            ]);

        }
        ?>
    </div>


    <div class="col-lg-5">

        <h3><?= Html::encode($this->title) ?></h3>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

    </div>

    <div class="col-lg-3 pull-right">


    <?= $this->render('_friends', [
        'friendslist' => $friendslist,
    ]) ?>
        </div>

</div>
