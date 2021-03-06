<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Relationship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relationship-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_one_id')->textInput() ?>

    <?= $form->field($model, 'user_two_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'action_user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
