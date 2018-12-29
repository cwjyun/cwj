<?php
/**
 * 获取M数据数据
 * 处理前段你展示需要处理的数据字段
 * 各种前段咋杂项方法全部堆积到这里
 */

namespace backend\common;

use Yii;
use backend\common\CommonClass;
use backend\models\menu;
use app\models\aritcle\Aritcle;

class FunctionClass
{
    public function init()
    {

    }


    /**
     * 文章前段需要的json字段排序格式
     * @return false|string
     */
    public static function get_nav_info()
    {
        $select = ['menu_name as name', 'id', 'pid'];
        return json_encode(CommonClass::key_array(menu::get_name_all($select), 'id', 'pid', 'children'));
    }

    /**
     * 获取文章总条数
     */
    public static function aritcle_count()
    {
        return Aritcle::get_count();
    }

    /**
     * 获取制定导航ID下的分类文章
     * 如果不传默认第一个
     * @param $id
     */
    public static function aritcle_list($id = NULL)
    {
        return   Aritcle::get_list($id);
    }
    

}

?>