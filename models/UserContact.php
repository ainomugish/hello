<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_contact".
 *
 * @property integer $id
 * @property string $contact_type
 * @property string $info
 */
class UserContact extends \yii\db\ActiveRecord
{
    const TYPE_OTHER = 0;
    const TYPE_PHONE = 10;
    const TYPE_SKYPE = 20;
    const TYPE_FACEBOOK = 30;
    const TYPE_GOOGLE = 40;
    const TYPE_MSN = 50;
    const TYPE_AIM = 60;
    const TYPE_YAHOO = 70;
    const TYPE_ICQ = 80;
    const TYPE_JABBER = 90;
    const TYPE_QQ = 100;
    const TYPE_GADU = 110;


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
            [['contact_type', 'info'], 'string']
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contact_type' => Yii::t('app', 'Contact Type'),
            'info' => Yii::t('app', 'Info'),
        ];
    }
}
