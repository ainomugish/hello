<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model user-contact\models\UserContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-contact-form">

    <div class="user-contact-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'contact_type')
            ->dropDownList(
                $model->getUserContactTypeOptions(),
                ['prompt'=>Yii::t('user-contact','What type of contact is this?')]
            )->label(Yii::t('user-contact','Type of Contact')) ?>

            <?= $form->field($model, 'info')->textInput(['maxlength' => 255])->label(Yii::t('user-contact','Contact Information'))->hint(Yii::t('user-contact','e.g. phone number, skype address, et al.')) ?>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('user-contact', 'Create') : Yii::t('user-contact', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>

</div>
