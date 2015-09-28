<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserSetting;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

   <!-- -->
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
        <h3><?= Html::encode($this->title).' profile' ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'public_email:email',
                    'gravatar_email:email',

                    'location',
                    'website',
                    'bio:ntext',
                ],
            ]) ?>

    <p>

        <?= Html::a(Yii::t('app', 'Send Friend Request'), ['/relationship/friend', 'user_two_id' =>  $model->user_id ], ['class' => 'btn btn-inverse']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <!--<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>-->
    </p>
    </div>

</div>
