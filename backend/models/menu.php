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
     * 获取制定数组的导航数据
     */
    public static function get_p_list($pid){

        return self::find()->select('id,pid,sort,menu_name,menu_url,status,is_del,type')->where(['pid' => $pid, 'is_del' => 1])->asArray()->all();
    }

    /**
     * 新增导航数据
     * @param $data
     */
    public static function new_save($data)
    {
        $message = [
            'code' => 1,
            'message' => '',
        ];
        $data['type'] = 1;  
        $check_name = self::find()->where(['menu_name' => $data['menu_name']])->one();
        if ($check_name) {
            $message['code'] = 0;
            $message['message'] = '导航名字重复';
            return $message;
        }
        $modle = new menu;
        $data['create_time'] = date("Y-m-d H:i:s");
        $data['update_time'] = date("Y-m-d H:i:s");
        $modle->setAttributes($data, true);
        $modle->save();
        if ($modle->errors) {
            $message['code'] = 0;
            $message['message'] = '数据存入出错';
            $message['error'] = $modle->errors;
            return $message;
        }
        return $message;
    }


    public static function get_defalut_id(){
        
    }

    

    /**
     * 获取所有数据
     */
    public static function get_all()
    {
        return self::find()->where(['is_del' => 1])->asArray()->all();
    }

    public static function get_name_all($array){
        return self::find()->select($array)->where(['is_del' => 1])->asArray()->all();
    }

    public static function get_mune_one($id)
    {
        return self::find()->where(['id' => $id])->asArray()->one();
    }


    /**
     * 获取单条数据
     */
    public static function get_one($id)
    {
        return self::find()->where(['id' => $id])->asArray()->one();
    }

    /**
     * 修改导航数据
     * @param $data
     */
    public static function old_save($data)
    {
        $message = [
            'code' => 1,
            'message' => '',
        ];
        if (!$data['id']) {
            $message['code'] = 0;
            $message['message'] = '主键ID 不存在';
            return $message;
        }
        $check_id = self::find()->where(['id' => $data['id']])->one();
        if (!$check_id) {
            return self:: new_save($data);
        }
        $models = self::updateAll($data, ['id' => $data['id']]);
        if ($models) {
            $message['code'] = 0;
            $message['message'] = '保存失败';
            return $message;
        }
        return $message;
    }


    /**
     * 获取一条数据
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function del_one($id)
    {
        if (self::updateAll(['is_del' => 0], ['id' => $id])) {
            return true;
        }
        return false;
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
