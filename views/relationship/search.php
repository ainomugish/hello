<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use app\models\Relationship;


$this->title = Yii::t('app', 'Friends Results');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="relationship-index">
    <div class="col-lg-3">
        <p>

            <?= Html::a(Yii::t('app', 'Friend Requests'), [''], ['class' => 'btn btn-success']) ?>
        </p>
        <?php
        $relation = new Relationship();
        //print_r($friendrequests);
        if (!empty($friendrequests)) {
            echo '<ul class="list-unstyled">';
            foreach ($friendrequests as $rel) {
                if ($rel->user_one_id > $rel->user_two_id)
                {
                    $temp =$rel->user_one_id;
                    $rel->user_one_id=$rel->user_two_id;
                    $rel->user_two_id=$temp;
                }
                $friend = $relation->getFriend($rel);
                $url2 = Url::to(['profile/view', 'id' => $friend->id]);
                echo '<li><a href="'.$url2.'"' . $friend->id .'">' . ucfirst($friend->username) . '</a><br>';
                echo '<li><a href="profile/view?id=' . $friend->id .'">Accept Freind Request</a><br>';
                $model= new \app\models\UserSetting;
                echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->findOne($friend->id)->avatar .'" class="profile-image"/></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6>You don\'t have any friend Requests yet!</h6>';
        }
        ?>

    </div>


    <div class="col-lg-8">
        <h3><?= Html::encode($this->title) ?></h3>
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?><br>

        <?php

        //print_r($friendsearch);
        if (!empty($friendsearch)) {
            echo '<ul class="list-unstyled">';

            foreach ($friendsearch as $rel) {

                $rel;
                $url = Url::to(['profile/view', 'id' => $rel->user_id]);
                $url1 = Url::to(['relationship/friend', 'user_two_id' => $rel->user_id]);
                echo '<li><a href="'.$url.'">' . $rel->name . '</a><br>';
                echo '<li><a href="'.$url1.'">' . 'Send Friend Request' . '</a><br>';
               // $model= new \app\models\UserSetting;
                //$mod=$model->find($rel->user_id)->avatar;

                //echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$mod.'" class="profile-image"/></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6>No records found</h6>';
        }
        ?>




    </div>

</div>
