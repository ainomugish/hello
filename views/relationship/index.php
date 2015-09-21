<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelationshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\Relationship;

$this->title = Yii::t('app', 'Friends');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="relationship-index">
    <div class="col-lg-2"></div>
    <?php
    $relation = new Relationship();
    print_r($dataProvider);
    /*if (!empty($dataProvider)) {
        echo '<ul>';
        foreach ($dataProvider as $rel) {
            $friend = $relation->getFriend($rel);
            echo '<li><a href="/profile/view?id=' . $friend->id . '">' . ucfirst($friend->username) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<h6>You don\'t have any friends yet!</h6>';
    }*/
    ?>

    <div class="col-lg-8">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Relationship'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'user_one_id',
                    'user_two_id',
                    'status',
                    'action_user_id',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>

</div>
