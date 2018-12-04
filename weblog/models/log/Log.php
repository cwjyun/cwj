<?php

namespace app\models\log;

use Yii;
use yii\db\Query;

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
        return 'log_' . date("Y_m");
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

    public static function check_log()
    {
        $table_name = self::tableName();
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
        }
    }
}
