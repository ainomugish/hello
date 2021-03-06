<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserContact */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Contact',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-contact-update">
    <div class="col-lg-2"></div>


    <div class="col-lg-5">

        <h3><?= Html::encode($this->title) ?></h3>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>

</div>
