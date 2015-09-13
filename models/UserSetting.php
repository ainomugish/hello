<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_setting".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $filename
 * @property string $avatar
 * @property integer $reminder_eve
 * @property integer $reminder_hours
 * @property integer $contact_share
 * @property integer $no_email
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class UserSetting extends \yii\db\ActiveRecord
{
    const SETTING_NO = 0;
    const SETTING_OFF = 0;
    const SETTING_YES = 10;
    const SETTING_24_HOUR = 24;
    const SETTING_48_HOUR = 48;
    const SETTING_72_HOUR = 72;

    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', ], 'required'],
            [['user_id', ], 'unique'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['filename', 'avatar'], 'string', 'max' => 255],
            [['user_id', 'reminder_eve', 'reminder_hours', 'contact_share', 'no_email', 'created_at', 'updated_at'], 'integer'],
        ];
    }


    // creates a record for the active user and sets all of the default settings:
    public static function initialize($user_id) {
        $us = UserSetting::find()->where(['user_id'=>$user_id])->one();
        if (is_null($us)) {
            $us=new UserSetting;
            $us->user_id = $user_id;
            $us->filename='';
            $us->avatar='';
            $us->reminder_eve = self::SETTING_YES;
            $us->no_email = self::SETTING_NO;
            $us->contact_share = self::SETTING_YES;
            $us->reminder_hours = 48;
            if(!$us->save()){
                echo 'not saved';
            }
        }
        return $us->id;
    }

    public function getEarlyReminderType($data) {
        $options = $this->getEarlyReminderOptions();
        return $options[$data];
    }


    public function getEarlyReminderOptions()
    {
        return array(
            self::SETTING_24_HOUR => '24 hours ahead',
            self::SETTING_48_HOUR => '48 hours ahead',
            self::SETTING_72_HOUR => '72 hours ahead',
            self::SETTING_OFF => 'Do not send an early reminder',
        );
    }

    //delete image
    public function deleteImage($path,$filename) {
        $file =array();
        $file[] = $path.$filename;
        $file[] = $path.'sqr_'.$filename;
        $file[] = $path.'sm_'.$filename;
        foreach ($file as $f) {
            // check if file exists on server
            if (!empty($f) && file_exists($f)) {
                // delete file
                unlink($f);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'filename' => Yii::t('app', 'Filename'),
            'avatar' => Yii::t('app', 'Avatar'),
            'reminder_eve' => Yii::t('app', 'Reminder Eve'),
            'reminder_hours' => Yii::t('app', 'Reminder Hours'),
            'contact_share' => Yii::t('app', 'Contact Share'),
            'no_email' => Yii::t('app', 'No Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
