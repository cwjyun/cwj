<?php

namespace backend\common;

use backend\models\menu;
use Yii;

class CommonClass
{
    static $list;

    /**
     * @param $title 邮件标题
     * @param $data  邮件内容
     * @return bool
     */
    public static function ErrorSendMail($title, $data)
    {
        $mail = Yii::$app->mailer->compose();
        $mail->setTo(\Yii::$app->params['adminEmail']);
        $mail->setFrom([\Yii::$app->params['mailerUserName'] => 'error_notice']);
        $mail->setSubject($title);
        $mail->setHtmlBody('<pre>' . var_export($data, true) . '</pre>');    //发布可以带html标签的文本
        $success = $mail->send();
        return $success;
    }


    public static function ajax_success($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 1, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function ajax_error($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 0, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function set_aign($data)
    {
        return Yii::$app->Ras->encrypt($data);
    }


    /**
     * 无限极分类         1 0
     *                    2 0
     *                    3 0
     *
     *                    4 1
     *                    5 2
     *                    6 3
     *
     *                    7 1
     *                    8 1
     * @param $items
     * @return array
     */
    public static function genTreeSort($data, $num = 0)
    {
        foreach ($data as $v) {
            $arr = $v;
            unset($arr['son']);
            $num = $num + 1;
            $num = $v['pid'] == 0 ? 1 : $num;
            $arr ['num'] = $num;
            self::$list [] = $arr;
            if (isset($v['son']) && is_array($v['son'])) {
                self:: genTreeSort($v['son'], $num);
            }
        }
    }


    /**
     * 无限极分类
     * @param $items
     * @return array
     */
    public static function genTree($items)
    {
        $array = [];
        foreach ($items as $k => $v) {
            $array[$v['id']] = $v;
        }
        foreach ($array as $item)
            $array[$item['pid']]['son'][$item['id']] = &$array[$item['id']];
        return isset($array[0]['son']) ? $array[0]['son'] : array();
    }


//   public static function key_array($items){
//       foreach ($items as $item) {
//           printf("%s%s", str_repeat('——', $deep), $item['name']);
//           if (!empty($item['son'])) {
//               key_array($item['son'], $deep + 1);
//           }
//       }
//
//    }

    /**
     * 无限极分类 索引数组形势
     * @param $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     */
    public static function key_array($list, $pk = 'id', $pid = 'pid', $child = 'son', $root = 0)
    {
        $tree = array();
        $packData = array();
        foreach ($list as $data) {
            $packData[$data[$pk]] = $data; //$packData[1]=$data; $packData[2]=$data
        }
        foreach ($packData as $key => $val) {
            if ($val[$pid] == $root) {   //代表跟节点
                $tree[] =& $packData[$key];
            } else {
                //找到其父类
                $packData[$val[$pid]][$child][] =& $packData[$key];
            }
        }
        return $tree;
    }


    /**
     * 无限级分类 回去所有的ID
     * @param $data
     * @param string $key
     */
    public static function get_aritcle_id($list)
    {
        self::$list[] = $list['id'];
        if (isset($list['son']) && !empty($list['son'])) {
            foreach ($list['son'] as $k => $v) {
                self::get_aritcle_id($v);
            }
        }
        return self::$list;
    }


    public static function get_menu_nav_dict()
    {
        $arr = menu::get_all();
        $result = [0 => '选择栏目'];
        foreach ($arr as $k => $v) {
            $result[$v['id']] = $v['menu_name'];
        }
      return $result;
    }
}

?>