<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\Relationship;
$this->title = 'Statuses';
$this->params['breadcrumbs'][] = $this->title;
//$this->params['new'][] = $this
//$this->params['breadcrumbs'][] = $dProvider;
$this->registerCssFile('@web/css/site1.css');
?>
<div class="status-index">
    <div class="col-lg-2"></div>

    <div class="col-lg-5">
    <h3><?= Html::encode($this->title) ?></h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app','Create Status'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_vie',
        /*'filterModel' => $searchModel,
        'layout'=>"{summary}\n{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'message:ntext',
            'permissions',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],*/
        ]
    );?>

    <p>

    </p>
    </div>
<div class="col-lg-3 pull-right">



        <?= $this->render('_friends', [
            'friendslist' => $friendslist,
        ]) ?>


</div>
