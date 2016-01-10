<?php

use yii\helpers\Html;

?>

<p><?= Html::encode($model->message) ?>Permission: <?= Html::encode($model->permissions) ?></p>
<?= Html::encode($model->created_at) ?>,
<?= Html::a('see status', ['view?id='.$model->id]/*, ['class' => 'btn btn-success'])*/) ?>
