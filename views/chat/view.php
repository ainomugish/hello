<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserSetting;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Chat */
$img=new app\models\User;
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
print_r($setting);
/*$setting = $setting->avatar;
$img=$Setting::findOne([
    'user_id' => $model->id,
]);
echo $setting->avatar;

/*$profile=new User;
$profile->findOne($model->id);// = User::findModel()->findByPk($model->id);

echo $model->avatar;*/

//$img = \app\models\UserSetting::findOne(['user_id'=>$model->id ])->avatar;
?>


    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php
    echo \sintret\chat\ChatRoom::widget([
            'url' => \yii\helpers\Url::to(['/chat/send-chat']),
            'userModel'=>  app\models\User::className(),
            'userField'=> $img['avatar']
        ]
    );
    ?>

</div>
