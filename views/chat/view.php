<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserSetting;
use app\models\User;
use yii\web\View;
$this->registerJsFile('http://code.jquery.com/jquery-1.9.0.js');
$this->registerJsFile('@web/js/mqttws31.js');
$this->registerJsFile('@web/js/app.js');
$this->registerCssFile('path/to/file.css');
/* @var $this yii\web\View */
/* @var $model app\models\Chat
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

    <div id="messages"><ul id="messagelist">

        </ul></div>


    <span class='label'>Status</span> <div id="status" class="disconnected">Pending</div>
    <form id='mainform' action="#">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" width="40" value="anonymous"/> <br/>
        <label for="message">Message</label>
        <input id="message" name="message" type="text" width="200" height="200"/>
        <input id="submit" type="submit" value="go"/>
    </form>

<?/*
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


