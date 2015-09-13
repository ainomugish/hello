<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\UserSetting;
$this->title = 'MobiSquid Chat';


?>
<div class="site-index">


                <?php
                echo \sintret\chat\ChatRoom::widget([
                        'url' => \yii\helpers\Url::to(['/chat/send-chat']),
                        'userModel'=>  \app\models\User::className(),
                        'userField'=>'avatar'
                    ]
                );
                ?>



</div>


