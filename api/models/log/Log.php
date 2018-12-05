<?php

namespace api\models\log;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $url
 * @property string $http_status
 * @property string $request
 * @property string $response
 * @property string $create_time
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log'.'_' . date('Y_m');
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('log_db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'http_status', 'request', 'response'], 'string'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'http_status' => 'Http Status',
            'request' => 'Request',
            'response' => 'Response',
            'create_time' => 'Create Time',
        ];
    }

    public static function save_log($data, $del = 0)
    {
        if ($del == 1) {
            $redis_name = "API:" . self::tableName();
            Yii::$app->redis->del($redis_name);
        }
        $table_name = self::check_log();
        if (!$table_name) return false;
        $module = new Log();
        $module->setAttributes($data, false);
        if (!$module->save()) {
            return $module->errors;
        }
        return true;
    }

    /**
     * 检测表 是否存在 不存在 则创建
     */
    public static function check_log()
    {
        $table_name = self::tableName();
        $redis_name = "API:" . $table_name;
        $redis_obj = Yii::$app->redis;
        $redis_table_name = $redis_obj->get($redis_name);
        if ($redis_table_name) {
            return $table_name;
        } else {
            $sql = "SELECT table_name FROM information_schema.TABLES WHERE table_name = '{$table_name}'";
            $db = Yii::$app->log_db;
            $query = $db->createCommand($sql)->queryOne();
            if (!$query) {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                $result = $db->createCommand()->createTable($table_name, [
                    'id' => 'pk',
                    'url' => 'text',
                    'http_status' => 'int',
                    'request' => 'text',
                    'response' => 'longtext',
                    'create_time' => 'timestamp',
                ], $tableOptions)->execute();
                if ($result) {
                    $redis_obj->setex($redis_name, 31536000, 1);
                    return $table_name;
                } else {
                    return false;
                }
            }
            $redis_obj->setex($redis_name, 31536000, 1);
            return $table_name;
        }
    }


}
