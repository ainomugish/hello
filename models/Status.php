<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $message
 * @property integer $permissions
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property User $id0
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
   const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;

    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at', 'user_id'], 'integer']
        ];
    }

    // creates a record for the active user and sets all of the default status:
    public static function initialize($user_id) {
        $st = Status::find()->where(['id'=>$user_id])->one();
        if (is_null($st)) {
            $st=new Status;
            $st->id = $user_id;
            $st->message='Update Your Status';
            $st->permissions=10;
            $st->created_at= TIME();
            $st->updated_at = TIME();
            $st->user_id= $user_id;

            if(!$st->save()){
                echo 'not saved';
            }
        }
        return $st->id;
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'Message'),
            'permissions' => Yii::t('app', 'Permissions'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Last Updated'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    public function getPermissions() {
        return array (self::PERMISSIONS_PRIVATE=>'Private',self::PERMISSIONS_PUBLIC=>'Public');
    }

    public function getPermissionsLabel($permissions) {
        if ($permissions==self::PERMISSIONS_PUBLIC) {
            return 'Public';
        } else {
            return 'Private';
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
