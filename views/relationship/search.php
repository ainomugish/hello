<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use app\models\Relationship;


$this->title = Yii::t('app', 'Friends Results');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/site1.css');
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
                $url3 = Url::to(['relationship/frienda', 'user_two_id' => $friend->id]);
                $url2 = Url::to(['profile/view', 'id' => $friend->id]);
                echo '<li><a href="'.$url2.'"' . $friend->id .'">' . ucfirst($friend->username) . '</a>';
                echo ''.''.'</a>';
                $model= new \app\models\UserSetting;
                $mod=$model->findOne($friend->id);
                if ($mod) {
                    echo'<div class="meta__name"><a href="'.$url2.'">' . $friend->username . '</a></div>';
                    echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$mod->avatar.'" />';
                } else {
                    echo \cebe\gravatar\Gravatar::widget([
                        'email' => app\models\User::find()->where(['id'=>$friend->id])->one()->email,
                        'options' => [
                            'class'=>'profile-image',
                            'alt' => app\models\User::find()->where(['id'=>$friend->id])->one()->username,
                        ],
                        'size' => 30,
                    ]);

                }
                echo'</figure>';
                echo' <div class="meta">

                        <div class="meta__name"><a href="'.$url3.'">' . "Accept Freind Request" . '</a></div>

                    </div></div></li>';

            }
            echo '</ul>';
        } else {
            echo '<h6 class="err">You don\'t have any friend Requests yet!</h6>';
        }
        ?>

    </div>


    <div class="col-lg-5">
        <h3><?= Html::encode($this->title) ?></h3>
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?><br>

        <?php

        //print_r($friendsearch);
        if (!empty($friendsearch)) {
            echo '<ul class="conv-list">';

                foreach ($friendsearch as $rel) {

                    $rel;
                    $url = Url::to(['profile/view', 'id' => $rel->user_id]);
                    $url1 = Url::to(['relationship/friend', 'user_two_id' => $rel->user_id]);

                    //echo '<li><a href="'.$url1.'">' . 'Send Friend Request' . '</a><br>';
                   $model1= new \app\models\UserSetting;
                    $mod=$model1->findOne($rel->user->getId());
                    echo '<li><div class="status">';
                    echo'<figure class="status__avatar">';
                    if ($mod) {
                        echo '<img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$mod->avatar.'" />';
                    } else {
                        echo \cebe\gravatar\Gravatar::widget([
                            'email' => app\models\User::find()->where(['id'=>$rel->user->getId()])->one()->email,
                            'options' => [
                                'class'=>'profile-image',
                                'alt' => app\models\User::find()->where(['id'=>$rel->user->getId()])->one()->username,
                            ],
                            'size' => 30,
                        ]);

                    }
                    echo'</figure>';
                   echo' <div class="meta">
                        <div class="meta__name"><a href="'.$url.'">' . $rel->name . '</a></div>
                        <div class="meta__sub--dark">Hi there :)</div>
                    </div></div></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6 class="err">No Friends with that name found</h6>';
        }
        ?>
    </div>

    <div class="col-lg-3 pull-right">

        <?= $this->render('_friends', [
            'friendslist' => $friendslist,
        ]) ?>

    </div>

</div>
