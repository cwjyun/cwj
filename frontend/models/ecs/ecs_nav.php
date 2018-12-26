<?php

namespace app\models\ecs;

use Yii;

/**
 * This is the model class for table "ecs_nav".
 *
 * @property int $id
 * @property string $ctype
 * @property int $cid
 * @property string $name
 * @property int $ifshow
 * @property int $vieworder
 * @property int $opennew
 * @property string $url
 * @property string $type
 */
class ecs_nav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecs_nav';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('ecs_db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid'], 'integer'],
            [['name', 'ifshow', 'vieworder', 'opennew', 'url', 'type'], 'required'],
            [['ctype', 'type'], 'string', 'max' => 10],
            [['name', 'url'], 'string', 'max' => 255],
            [['ifshow', 'vieworder', 'opennew'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ctype' => 'Ctype',
            'cid' => 'Cid',
            'name' => 'Name',
            'ifshow' => 'Ifshow',
            'vieworder' => 'Vieworder',
            'opennew' => 'Opennew',
            'url' => 'Url',
            'type' => 'Type',
        ];
    }
}
