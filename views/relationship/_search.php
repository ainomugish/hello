<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RelationshipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relationship-search">

    <?php $form = ActiveForm::begin([
        'layout' => 'inline',
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

