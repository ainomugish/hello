<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relationship".
 *
 * @property integer $user_one_id
 * @property integer $user_two_id
 * @property integer $status
 * @property integer $action_user_id
 *
 * @property User $actionUser
 * @property User $userOne
 * @property User $userTwo
 */
class Relationship extends \yii\db\ActiveRecord
{

    /**
     * Determines the status of the relationship
     *
     * 0 - Pending
     * 1 - Accepted
     * 2 - Declined
     * 3 - Blocked
     *
     * By default the status is set to 0
     */
    //public $status;


    /**
     * This is the user who made the most recent status field update
     */
    public $actionUserId;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relationship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_one_id', 'user_two_id', 'action_user_id'], 'required'],
            [['user_one_id', 'user_two_id', 'status', 'action_user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_one_id' => Yii::t('app', 'User One ID'),
            'user_two_id' => Yii::t('app', 'User Two ID'),
            'status' => Yii::t('app', 'Status'),
            'action_user_id' => Yii::t('app', 'Action User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionUser()
    {
        return $this->hasOne(User::className(), ['id' => 'action_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOne()
    {
        return $this->hasOne(User::className(), ['id' => 'user_one_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTwo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_two_id']);
    }

    /**
     * return single friend
     */
    public function getFriend(Relationship $rel)
    {
        if ($rel->user_one_id == Yii::$app->user->getId()) {
            /*print_r($rel->user_one_id);
            print_r(Yii::$app->user->getId());*/
            $friend = $rel->userTwo;
        } else {
            //print_r($rel->user_one_id);
            $friend = $rel->userOne;
        }

        return $friend;

    }
}
