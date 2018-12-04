<?php

namespace api\models\user;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $password_hash 密码
 * @property string $password_reset_token 密码token
 * @property string $email 邮箱
 * @property string $auth_key
 * @property int $status 状态
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property string $password 密码
 * @property string $role role
 * @property string $curr_login_at
 * @property string $curr_login_ip
 * @property string $access_token
 * @property string $login_count
 * @property int $allowance
 * @property int $allowance_updated_at
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
            [['status', 'created_at', 'updated_at', 'allowance', 'allowance_updated_at'], 'integer'],
            [['allowance', 'allowance_updated_at'], 'required'],
            [['username', 'password', 'role', 'curr_login_at', 'curr_login_ip', 'login_count'], 'string', 'max' => 50],
            [['password_hash'], 'string', 'max' => 80],
            [['password_reset_token', 'email', 'auth_key', 'access_token'], 'string', 'max' => 60],
            [['username'], 'unique'],
            [['access_token'], 'unique'],
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
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'Password',
            'role' => 'Role',
            'curr_login_at' => 'Curr Login At',
            'curr_login_ip' => 'Curr Login Ip',
            'access_token' => 'Access Token',
            'login_count' => 'Login Count',
            'allowance' => 'Allowance',
            'allowance_updated_at' => 'Allowance Updated At',
        ];
    }
}
