<?php
/**
 * Created by PhpStorm.
 * User: i
 * Date: 9/5/15
 * Time: 1:27 AM
 */

namespace app\models;

use Yii;
use yii\base\Model;


class Mobile extends Model
{

    public $mobile;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['mobile'], 'required'],

        ];
    }

}