<?php

use yii\helpers\Html;
use app\models\UserSetting;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
use app\models\Relationship;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->registerCssFile('@web/css/site1.css');
?>
<div class="profile-update">

    <div class="col-lg-2">
        <?php $model1=new UserSetting();
        $mod=$model1->findOne($model->user->getId());
        if ($mod) {
            echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$mod->avatar.'" class="profile-image"/>';
        } else {
            echo \cebe\gravatar\Gravatar::widget([
                'email' => app\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->email,
                'options' => [
                    'class'=>'profile-image',
                    'alt' => app\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()->username,
                ],
                'size' => 128,
            ]);

        }
        ?>
    </div>


    <div class="col-lg-5">

        <h3><?= Html::encode($this->title) ?></h3>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

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
                                <img src="'.Yii::getAlias('@web').'/uploads/avatar/sm_'.$model->findOne($friend->id)->avatar .'" class="profile-image" />
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
