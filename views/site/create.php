<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Status */
use app\models\Relationship;
$this->title = 'Create Status';
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/site1.css');
?>
<div class="status-create">
    <div class="col-lg-2"></div>


    <div class="col-lg-5">

        <h3><?= Html::encode($this->title) ?></h3>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

        <div>
            friends mind
        </div>
    </div>

    <div class="col-lg-3 pull-right">

        <?= $this->render('_friends', [
            'friendslist' => $friendslist,
        ]) ?>
    </div>
</div>
