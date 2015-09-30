<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelationshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\Relationship;


$this->title = Yii::t('app', 'Friends');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/site1.css');

?>
<div class="relationship-index">
    <div class="col-lg-3">
        <p>
            <?= Html::a(Yii::t('app', 'Find Friends'), ['search'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


    <div class="col-lg-4">
            <h3><?= Html::encode($this->title) ?></h3>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php
        $relation = new Relationship();
        //print_r($dataProvider);
        if (!empty($friendslist)) {
            echo '<ul class="conv-list">';
            foreach ($friendslist as $rel) {
                if ($rel->user_one_id > $rel->user_two_id)
                    {
                        $temp =$rel->user_one_id;
                        $rel->user_one_id=$rel->user_two_id;
                        $rel->user_two_id=$temp;
                    }
                $friend = $relation->getFriend($rel);
                $model= new \app\models\UserSetting;
                echo '<li><div class="status">

                            <figure class="status__avatar">
                                <img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->findOne($friend->id)->avatar .'" class="profile-image" />
                            </figure>
                            <div class="meta">
                                <div class="meta__name"><a href="profile/view?id=' . $friend->id .'">' . ucfirst($friend->username) . '</a></div>
                                <div class="meta__sub--dark">Hi there :)</div>
                            </div>
                </div></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6 class="err">You don\'t have any friends yet!</h6>';
        }
        ?>




        </div>

</div>
