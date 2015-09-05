<?php
/**
 * Created by PhpStorm.
 * User: i
 * Date: 9/4/15
 * Time: 11:20 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
?>
<img src="<?php echo Url::to(['site/qrcode', 'text' => '$text', 'size' => 300,'padding' => 10]); ?>">

