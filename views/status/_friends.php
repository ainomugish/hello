<?php
/**
 * Created by PhpStorm.
 * User: i
 * Date: 1/10/16
 * Time: 3:37 PM
 */

use yii\helpers\Url;
use app\models\Relationship;

        $relation = new Relationship();
        //print_r($dataProvider);
        if (!empty($friendslist)) {
            echo '<ul class="conv-list">';
            foreach ($friendslist as $rel) {
                if ($rel->user_one_id > $rel->user_two_id)
                {
                    $url5 = Url::to(['profile/view', 'id' => $friend->id]);
                    $temp =$rel->user_one_id;
                    $rel->user_one_id=$rel->user_two_id;
                    $rel->user_two_id=$temp;
                }
                $friend = $relation->getFriend($rel);
                $url5 = Url::to(['profile/view', 'id' => $friend->id]);
                $model= new \app\models\UserSetting;
                echo '<li><div class="status">

                            <figure class="status__avatar">
                                <img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->findOne($friend->id)->avatar .'" class="profile-image" />
                            </figure>
                            <div class="meta">
                                <div class="meta__name"><a href="' . $url5 .'">' . ucfirst($friend->username) . '</a></div>
                                <div class="meta__sub--dark">Hi there :)</div>
                            </div>
                </div></li>';
            }
            echo '</ul>';
        } else {
            echo '<h6 class="err">You don\'t have any friends yet!</h6>';
        }
        ?>