<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relationship */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Relationship',
]) . ' ' . $model->user_one_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_one_id, 'url' => ['view', 'user_one_id' => $model->user_one_id, 'user_two_id' => $model->user_two_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="relationship-update">

    <div class="col-lg-2"></div>


    <div class="col-lg-5">
            <h3><?= Html::encode($this->title) ?></h3>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

</div>
