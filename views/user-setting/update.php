<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserSetting */

$this->title = Yii::t('app', 'Update Your Settings');/*{modelClass}: ', [
    'modelClass' => 'User Setting',
]) . ' ' . $model->id;*/
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Settings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-setting-update">

    <div class="col-lg-2"></div>


    <div class="col-lg-8">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>

</div>
