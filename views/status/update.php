<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
use app\models\Relationship;

$this->title = 'Whats on your mind? '/* . ' ' . $model->id*/;
//$this->title1 = 'what your friends think';
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'See status', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->registerCssFile('@web/css/site1.css');
?>
<div class="status-update">
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


