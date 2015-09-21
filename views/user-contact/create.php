<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserContact */

$this->title = Yii::t('app', 'Create User Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-create">

    <div class="col-lg-2"></div>


    <div class="col-lg-5">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

</div>
