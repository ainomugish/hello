<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\UserSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-setting-form">
    <?php
    $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']]); // important         
    ?>

    <div class="col-md-8">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#general" role="tab" data-toggle="tab"><?= Yii::t('app','General Settings') ?></a></li>
            <li><a href="#photo" role="tab" data-toggle="tab"><?= Yii::t('app','Upload Photo') ?></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active vertical-pad" id="general">
                <?= $form->field($model, 'reminder_eve')->checkBox(['label' => Yii::t('app','Send final reminder the day before a meeting'), 'uncheck' =>  $model::SETTING_NO, 'checked' => $model::SETTING_YES]); ?>

                <?= $form->field($model, 'reminder_hours')
                    ->dropDownList(
                        $model->getEarlyReminderOptions(),
                        ['prompt'=>Yii::t('app','When would you like your early reminder?')]
                    )->label(Yii::t('app','Early reminders')) ?>

                <?= $form->field($model, 'contact_share')->checkbox(['label' =>Yii::t('app','Share my contact information with meeting participants'),'uncheck' =>  $model::SETTING_NO, 'checked' => $model::SETTING_YES]); ?>

                <?= $form->field($model, 'no_email')->checkbox(['label' =>Yii::t('app','Turn off all email'),'uncheck' =>  $model::SETTING_NO, 'checked' => $model::SETTING_YES]); ?>
            </div>
            <div class="tab-pane vertical-pad" id="photo">
                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']],
                ]);   ?>

                <?php /*=$form->field($model, 'image')->widget(FileInput::classname(), [
                 'options' => ['accept' => 'image/*'],
                  'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']],
             ]);  */ ?>
            </div> <!-- end of upload photo tab -->
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save Settings'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div> <!-- end tab content -->
    </div> <!--end left col -->
    <div class="col-md-4">
        <?php
        if ($model->avatar<>'') {
            echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->avatar.'" class="profile-image"/>';
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

    </div> <!--end rt col -->
    <?php ActiveForm::end(); ?>

</div>