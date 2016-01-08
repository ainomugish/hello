<?php

namespace app\models;

use yii;
/*use dektrium\user\models\User as BaseUser;*/
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends \dektrium\user\models\User {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSettings()
    {
        return $this->hasMany(UserSetting::className(), ['user_id' => 'id'])->inverseOf('User');
    }
    public function getUserContacts()
    {
        return $this->hasMany(UserContact::className(), ['id' => 'id'])->inverseOf('User');
    }
    public function getUserStatus()
    {
        return $this->hasMany(Status::className(), ['user_id' => 'id'])->inverseOf('User');
    }
    /*public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id'])->inverseOf('User');
    }*/
}
/*extends ActiveRecord implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    /*public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
   /* public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    /*public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    /*public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    /*public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    /*public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    /*public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getAvatarImage(){
        return Yii::getAlias($this->avatar);
    }

    public function getAvatar() {
        return $this->hasOne(UserSetting::className(),['user_id' =>'id']);
    }
}*/
