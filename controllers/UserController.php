<?php
/**
 * Created by PhpStorm.
 * User: i
 * Date: 9/17/15
 * Time: 9:36 PM
 */

namespace app\controllers;

use yii\rest\ActiveController;


class UserController extends ActiveController
{
    public $modelClass = 'app\models\UserM';
}