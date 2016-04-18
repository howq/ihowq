<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $user_id
 * @property string $user_login
 * @property string $user_psw
 * @property string $user_nickname
 * @property string $user_sign
 * @property integer $user_power
 * @property integer $user_status
 * @property string $user_email
 * @property string $user_homepage
 * @property integer $user_qq
 * @property string $user_wechat
 * @property string $user_registered
 * @property string $user_authKey
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login', 'user_psw', 'user_email'], 'required'],
            [['user_power', 'user_status', 'user_qq'], 'integer'],
            [['user_registered'], 'safe'],
            [['user_login', 'user_psw'], 'string', 'max' => 64],
            [['user_nickname'], 'string', 'max' => 50],
            [['user_sign'], 'string', 'max' => 250],
            [['user_email', 'user_homepage'], 'string', 'max' => 100],
            [['user_wechat'], 'string', 'max' => 20],
            [['user_authKey'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_login' => 'User Login',
            'user_psw' => 'User Psw',
            'user_nickname' => 'User Nickname',
            'user_sign' => 'User Sign',
            'user_power' => 'User Power',
            'user_status' => 'User Status',
            'user_email' => 'User Email',
            'user_homepage' => 'User Homepage',
            'user_qq' => 'User Qq',
            'user_wechat' => 'User Wechat',
            'user_registered' => 'User Registered',
            'user_authKey' => 'User Auth Key',
        ];
    }
}
