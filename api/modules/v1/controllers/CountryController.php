<?php
/**
 * Created by PhpStorm.
 * User: i
 * Date: 9/12/15
 * Time: 1:44 PM
 */

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';
}