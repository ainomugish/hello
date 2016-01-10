<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-index">
    <div class="col-lg-1"></div>


    <div class="col-lg-8">
        <h3><?= Html::encode($this->title) ?></h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],


                'contact_type:ntext',
                'info:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Add Contact'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        </div>

</div>
