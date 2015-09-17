<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
$this->registerJsFile('http://code.jquery.com/jquery-1.9.0.js');
$this->registerJsFile('@web/js/mqttws31.js');
$this->registerJsFile('@web/js/app.js');



$this->registerCssFile('@web/css/chat.css');

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chats');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="chat-index">

    <div id="messages"><ul id="messagelist">

        </ul></div>



    <form id='mainform' action="#" class="">

        <div class="Area">
            <span class='label'>Status</span> <div id="status" class="disconnected">Pending</div>

            <input type="text" class="" id="name" placeholder="annonymous/Name" width="200">



            <!--<textarea placeholder="Participate in coversation" id="message"></textarea>-->
            <input id="message" name="message" type="text" width="200" placeholder="Participate in coversation">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>

            <div class="validation">You Are Not Registered</div>
            <p class="note">* for any help return to Mobisqui adminstrator..</p>
        </div>


        <!--<label for="name">Name</label>
        <input id="name" name="name" type="text" width="40" value="anonymous"/> <br/>
        <label for="message">Message</label>
        <textarea id="message" name="message" type="text" rows="6"></textarea>
        <input id="submit" type="submit" value="Send" class="btn btn-success"/>-->
    </form>

</div>
