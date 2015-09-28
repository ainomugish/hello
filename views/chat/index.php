<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
$this->registerJsFile('http://code.jquery.com/jquery-1.9.0.js');
$this->registerJsFile('@web/js/mqttws31.js');
$this->registerJsFile('@web/js/app1.js');



$this->registerCssFile('@web/css/site1.css');

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chats');
$this->params['breadcrumbs'][] = $this->title;

?>



<div class="window">
    <aside class="conv-list-view">
        <header class="conv-list-view__header">
            <div class="cf">
                <ul class="close-button-list">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul class="function-list">
                    <li class="icon-lupe"></li>
                </ul>
            </div>
        </header>
        <ul class="conv-list">
            <li>
                <div class="status">
                    <i class="status__indicator--unread-message"></i>
                    <figure class="status__avatar">
                        <img src="http://1.gravatar.com/avatar/7ec0cac01b6d505b2bbb2951a722e202?size=80" />
                    </figure>
                    <div class="meta">
                        <div class="meta__name">uSER TWO</div>
                        <div class="meta__sub--dark">Hi there :)</div>
                    </div>
                </div>
            </li>
            <li class="selected">
                <div class="status">
                    <i class="status__indicator--replied-message"></i>
                    <figure class="status__avatar">
                        <img src="http://1.gravatar.com/avatar/34735b367f6bf8d5d2f38cb3d20d5e36?size=80" />
                    </figure>
                    <div class="meta">
                        <div class="meta__name">uSER ONE</div>
                        <div class="meta__sub--dark">looks great!</div>
                    </div>
                </div>
            </li>
            <li>
                <div class="status">
                    <i class="status__indicator--read-message"></i>
                    <figure class="status__avatar">
                        <img src="http://0.gravatar.com/avatar/729edf889ced7863dedba95452272bca?size=80" />
                    </figure>
                    <div class="meta">
                        <div class="meta__name">HugoGiraudel</div>
                        <div class="meta__sub--dark">Ok!</div>
                    </div>
                </div>
            </li>
        </ul>
    </aside>
    <section class="chat-view">
        <header class="chat-view__header">
            <div class="cf">
                <div class="status" >
                    <i class="status__indicator" id="status"></i>
                    <div class="meta">
                        <div class="meta__name"><?php echo Yii::$app->user->identity->username;?></div>
                        <div class="meta__sub--light" id="status1">OFFLINE !</div>
                    </div>
                </div>
                <ul class="function-list">
                    <li class="icon-cloud"></li>
                    <li class="icon-clock"></li>
                    <li class="icon-dots"></li>
                </ul>
            </div>
        </header>
        <section class="message-view" id="messagelist">

        </section>
        <footer class="chat-view__input" id="ent">
            <form action="#"  id="mainform"  >
                <div class="input">
                    <input id="messagebox" /><span class="input__emoticon"></span></div>
                <div class="" >
                    <input id="name" name="name" type="hidden" width="40" value="<?php echo Yii::$app->user->identity->username;?>"/>
                    <input type="submit"  value="SEND"/>

                </div>
            </form
        </footer>
    </section>


</div>















<!--

<div class="chat-index">

    <div id="messages"><ul id="messagelist">

        </ul></div>

<?php echo Yii::$app->user->identity->username;?>

    <form id='mainform' action="#" class="">

        <div class="Area">
            <span class='label'>Status</span> <div id="status" class="disconnected">Pending</div>

            <input type="text" class="" id="name" placeholder="<?php echo Yii::$app->user->identity->username;?>" width="200">



            <!--<textarea placeholder="Participate in coversation" id="message"></textarea>-->
           <!-- <input id="message" name="message" type="text" width="200" placeholder="Participate in coversation">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>

            <div class="validation">You Are Not Registered</div>
            <p class="note">* for any help return to Mobisqui adminstrator..</p>
        </div>


        <!--<label for="name">Name</label>
        <input id="name" name="name" type="text" width="40" value="anonymous"/> <br/>
        <label for="message">Message</label>
        <textarea id="message" name="message" type="text" rows="6"></textarea>
        <input id="submit" type="submit" value="Send" class="btn btn-success"/>
    </form>

</div>
-->