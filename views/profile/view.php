<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

   <!-- <h1><?/*= Html::encode($this->title) */?></h1>-->
    <div class="col-lg-2"></div>


    <div class="col-lg-5">
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
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>

</div>
