<?php

namespace app\models\aritcle;

use Yii;

/**
 * This is the model class for table "aritcle".
 *
 * @property int $id
 * @property string $aritcle_name 文章名字
 * @property string $aritcle_con 文章内容
 * @property int $type 文章类型 
 * @property int $m_id 文章所属ID
 * @property int $status 是否删除0删除1上线
 * @property int $is_hidden 是否隐藏 1显示0隐藏
 * @property int $is_discuss 是否允许评论1允许0不允许
 * @property string $create_time
 * @property string $update_time
 */
class Aritcle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aritcle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aritcle_con'], 'required'],
            [['aritcle_con'], 'string'],
            [['type', 'm_id', 'status', 'is_hidden', 'is_discuss'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['aritcle_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aritcle_name' => 'Aritcle Name',
            'aritcle_con' => 'Aritcle Con',
            'type' => 'Type',
            'm_id' => 'M ID',
            'status' => 'Status',
            'is_hidden' => 'Is Hidden',
            'is_discuss' => 'Is Discuss',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
