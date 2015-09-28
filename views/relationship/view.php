<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Relationship */

$this->title = 'Friends';//$model->user_one_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relationship-view">
    <div class="col-lg-2"></div>


    <div class="col-lg-5">

            <h3><?= Html::encode($this->title) ?></h3>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'user_one_id',
                    'user_two_id',
                    'status',
                    'action_user_id',
                ],
            ]) ?>


            <p>

                <?= Html::a(Yii::t('app', 'Update'), ['update', 'user_one_id' => $model->user_one_id, 'user_two_id' => $model->user_two_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'user_one_id' => $model->user_one_id, 'user_two_id' => $model->user_two_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>

</div>
