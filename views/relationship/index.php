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
    <div class="col-lg-3">
        <p>
            <?= Html::a(Yii::t('app', 'Find Friends'), ['search'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


    <div class="col-lg-8">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php
        $relation = new Relationship();
        //print_r($dataProvider);
        if (!empty($friendslist)) {
            echo '<ul>';
            foreach ($friendslist as $rel) {
                if ($rel->user_one_id > $rel->user_two_id)
                    {
                        $temp =$rel->user_one_id;
                        $rel->user_one_id=$rel->user_two_id;
                        $rel->user_two_id=$temp;
                    }
                $friend = $relation->getFriend($rel);
                echo '<li><a href="profile/view?id=' . $friend->id .'">' . ucfirst($friend->username) . '</a><br>';
                $model= new \app\models\UserSetting;
                echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->findOne($friend->id)->avatar .'" class="profile-image"/></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6>You don\'t have any friends yet!</h6>';
        }
        ?>




        </div>

</div>
