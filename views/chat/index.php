<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
$this->registerJsFile('http://code.jquery.com/jquery-1.9.0.js');
$this->registerJsFile('@web/js/mqttws31.js');
$this->registerJsFile('@web/js/chat.js');
$this->registerJsFile('@web/js/app1.js');



$this->registerCssFile('@web/css/site1.css');
use app\models\Relationship;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chats');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-lg-8">
    <div><input id="user_id" name="name" type="hidden" width="" value="<?php echo Yii::$app->user->getId(); ?>"/></div>
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
                $loged_on_user = Yii::$app->user->getId();
                $friend = $relation->getFriend($rel);
                $model= new \app\models\UserSetting;
                echo '<li><div class="status">
                            <div class="meta">
                                <div class="meta__sub--light" id="status1">OFFLINE !</div>
                            </div>
                            <figure class="status__avatar">
                                <img src="'.Yii::getAlias('@web').'/uploads/avatar/sqr_'.$model->findOne($friend->id)->avatar .'" class="profile-image" />
                            </figure>
                            <div class="meta">
                                <div class="meta__name"><a href="javascript:register_popup('."'$friend->id'".', '."' $friend->username '".', '."'$loged_on_user'".');">' . ucfirst($friend->username) . '</a></div>
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

    <!--
       <div class="sidebar-name">
           Pass username and display name to register popup
        <a href="javascript:register_popup('narayan-prusty', 'Narayan Prusty');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>Narayan Prusty</span>
        </a>
    </div>
    <div class="sidebar-name">
        <a href="javascript:register_popup('qnimate', 'QNimate');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>QNimate</span>
        </a>
    </div>
    <div class="sidebar-name">
        <a href="javascript:register_popup('qscutter', 'QScutter');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>QScutter</span>
        </a>
    </div>
    <div class="sidebar-name">
        <a href="javascript:register_popup('qidea', 'QIdea');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>QIdea</span>
        </a>
    </div>
    <div class="sidebar-name">
        <a href="javascript:register_popup('qazy', 'QAzy');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>QAzy</span>
        </a>
    </div>
    <div class="sidebar-name">
        <a href="javascript:register_popup('qblock', 'QBlock');">
            <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />
            <span>QBlock</span>
        </a>
    </div>
</div>-->
