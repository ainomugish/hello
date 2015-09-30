<?php

namespace app\models;

use Yii;
use yii\authclient\clients\Facebook;

/**
 * This is the model class for table "user_contact".
 *
 * @property integer $id
 * @property string $contact_type
 * @property string $info
 * @property integer $user_id
 *
 * @property User $user
 */
class UserContact extends \yii\db\ActiveRecord
{
    const TYPE_OTHER = 'Other';
    const TYPE_PHONE = 'Phone';
    const TYPE_SKYPE = 'Skype';
    const TYPE_FACEBOOK = 'Facebook Messenger';
    const TYPE_GOOGLE = 'Google Talk';
    const TYPE_MSN = 'MSN';
    const TYPE_AIM = 'AIM';
    const TYPE_YAHOO = 'Yahoo Messenger';
    const TYPE_ICQ = 'ICQ';
    const TYPE_JABBER = 'Jabber';
    const TYPE_QQ = 'QQ';
    const TYPE_GADU = 'Gadu-Gadu';


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_type', 'info'], 'required'],
            [['contact_type', 'info'], 'string'],
            [['user_id'], 'integer']
        ];
    }

    /*helpers to return contacTypes*/

    public function getUserContactType($data) {
        $options = $this->getUserContactTypeOptions();
        return $options[$data];
    }

    public function getUserContactTypeOptions()
    {
        return array(
            self::TYPE_PHONE => 'Phone',
            self::TYPE_SKYPE => 'Skype',
            self::TYPE_OTHER => 'Other',
            self::TYPE_FACEBOOK => 'Facebook Messenger',
            self::TYPE_GOOGLE => 'Google Talk',
            self::TYPE_MSN => 'MSN Messenger',
            self::TYPE_AIM => 'AIM',
            self::TYPE_YAHOO => 'Yahoo! Messenger',
            self::TYPE_ICQ => 'ICQ',
            self::TYPE_JABBER => 'Jabber',
            self::TYPE_QQ => 'QQ',
            self::TYPE_GADU => 'Gadu-Gadu',
        );
    }

    // creates a record for the active user and sets all of the default status:
    public static function initialize($user_id) {
        $st = UserContact::find()->where(['user_id'=>$user_id])->one();
        if (is_null($st)) {
            $st=new UserContact();
            $st->id = $user_id;
            $st->contact_type='Phone';
            $st->info='256 000 000 000';
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
            'contact_type' => Yii::t('app', 'Contact Type'),
            'info' => Yii::t('app', 'Info'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
