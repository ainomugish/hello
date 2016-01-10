<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Profile;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'On your Mind!';
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-view">
    <div class="col-lg-2"></div>

    <div class="col-lg-5">
        <h3><?= Html::encode($this->title) ?></h3>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'message:ntext',

                'updated_at',

            ],
        ]) ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    </div>


    <div class="col-lg-5">

        <?php
        #$cmtx_parameters = 'id';
        $cmtx_set_name_value = Yii::$app->user->identity->profile->name;
        #$cmtx_set_email_value = Yii::$app->user->identity->profile->public_email;
        #$cmtx_set_website_value = Yii::$app->user->identity->profile->website;
        #$cmtx_set_town_value = '';
        #$cmtx_set_country_value = '';
        $cmtx_identifier = 'cmtx_filename';
        $cmtx_reference = 'cmtx_identifier';
        $cmtx_path = '../comments/';
        require $cmtx_path.'includes/commentics.php'; //don't edit this line

        ?>
        </div>

</div>

