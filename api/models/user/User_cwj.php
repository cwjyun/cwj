<?php

namespace api\models\user;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $password 密码
 * @property string $email 邮箱
 * @property string $wechat_name 微信好名字
 * @property string $wechat_user_name 微信号
 * @property string $ip IP
 * @property string $create_time 创建时间
 * @property string $update_time 更新时间
 * @property int $status 1，正常，2锁定，3删除
 * @property string $opid 微信opid
 */
class User_cwj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('cwj_db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['status'], 'integer'],
            [['username', 'password'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 100],
            [['wechat_name', 'wechat_user_name', 'ip', 'opid'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'wechat_name' => 'Wechat Name',
            'wechat_user_name' => 'Wechat User Name',
            'ip' => 'Ip',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
            'opid' => 'Opid',
        ];
    }
}
