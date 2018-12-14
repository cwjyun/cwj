<?php

namespace backend\models;

use Yii;
use backend\common\CommonClass;

/**
 * This is the model class for table "meun".
 *             'id' => 'ID',
 * 'pid' => 'pid',
 * 'sort' => 'sort',
 * 'menu_name' => 'menu_name',
 * 'menu_url' => 'menu_url',
 * 'status' => 'status',
 * 'type' => 'type',
 * 'create_time' => 'create_time',
 * 'update_time' => 'update_time'
 *
 */
class menu extends \yii\db\ActiveRecord
{
    public $tree;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('cwj_db');
    }


    /**
     * 新增导航数据
     * @param $data
     */
    public static function new_save($data)
    {
        $modle = new menu;
        $data['create_time'] = date("Y-m-d H:i:s");
        $data['update_time'] = date("Y-m-d H:i:s");
        $modle->setAttributes($data, true);
        $modle->save();
        if (!$modle->errors) {
            return true;
        }
        return $modle->errors;
    }


    /**
     * 无限极分类整理好的数据
     */
    public static function get_all()
    {
        return self::find()->asArray()->all();
    }

    /**
     * 修改导航数据
     * @param $data
     */
    public static function old_save($data)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_name', 'pid', 'sort', 'type'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['status'], 'integer'],
            [['menu_name', 'menu_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'pid',
            'sort' => 'sort',
            'menu_name' => 'menu_name',
            'menu_url' => 'menu_url',
            'status' => 'status',
            'type' => 'type',
            'create_time' => 'create_time',
            'update_time' => 'update_time'
        ];
    }
}
