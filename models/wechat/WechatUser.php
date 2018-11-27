<?php

namespace app\models\wechat;

use Yii;
/**
 * This is the model class for table "wechat_user".
 *
 * @property int $id 主键
 * @property string $openid
 * @property string $nickname 微信昵称
 * @property int $sex 性别
 * @property string $headimgurl 头像
 * @property string $country 国家
 * @property string $province 省份
 * @property string $city 城市
 * @property string $access_token
 * @property string $refresh_token
 * @property string $created_at
 */
class WechatUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wechat_user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('wechat');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'openid', 'nickname', 'sex', 'headimgurl', 'country', 'province', 'city', 'access_token', 'refresh_token'], 'required'],
            [['id', 'sex'], 'integer'],
            [['created_at'], 'safe'],
            [['openid', 'headimgurl', 'access_token', 'refresh_token'], 'string', 'max' => 255],
            [['nickname', 'country', 'province', 'city'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'nickname' => 'Nickname',
            'sex' => 'Sex',
            'headimgurl' => 'Headimgurl',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'access_token' => 'Access Token',
            'refresh_token' => 'Refresh Token',
            'created_at' => 'Created At',
        ];
    }
}
