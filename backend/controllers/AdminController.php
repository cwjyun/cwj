<?php

namespace backend\controllers;

use backend\common\CommonClass;
use Yii;
use backend\models\menu;

/**
 * Site controller
 */
class AdminController extends BaseController
{

    /**
     * 后台首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 配置信息页面
     * @return string
     */
    public function actionWelcome()
    {
        $mysql_info = Yii::$app->cwj_db->createCommand("select version()")->queryOne();
        $data['mysql_info']['banben'] = $mysql_info['version()'];
        return $this->render('welcome', ['data' => $data]);
    }


    /**
     * 文章导航管理页面
     * @return string
     */
    public function actionCate()
    {
        $data = menu::get_all();
        $result = CommonClass::genTree($data);
        CommonClass::genTreeSort($result);
        $data = CommonClass::$list;
        return $this->render('cate', ['data' => $data]);
    }


    /**
     * 删除 导航
     */
    public function actionDel()
    {
        $id = Yii::$app->request->post('id');
        if (!Yii::$app->request->isAjax || !$id) {
            CommonClass::ajax_error(['message' => '非法操作']);
        }
        $message = [
            'code' => 1,
            'message' => '删除成功'
        ];
        $del_one = menu::del_one($id);
        if ($del_one) {
            CommonClass::ajax_success([$message]);
        }
        $message['message'] = '删除失败';
        CommonClass::ajax_error([$message]);
    }


    /**
     * 修改导航展示页面
     * @return string
     */
    public function actionEditcate()
    {
        $id = Yii::$app->request->get('id');
        $data = menu::get_one($id);
        return $this->render('edit_cate', ['data' => $data]);
    }


    /**
     * 修改status字段
     */
    public function actionEditstatus()
    {

    }


    /**
     * 如果id为空就是一级导航 如果id存在 就是二级导航
     * 因为有个无限极导航的问题
     * 懒得家参数了
     * 逻辑太混乱
     * 所以拆分出来
     * 添加导航
     */
    public function actionAddcate()
    {

        $post = Yii::$app->request->post();
        if (!isset($post['id']) || empty($post['id'])) {
            $modles = menu::new_save($post);
            if (!$modles['code']) {
                CommonClass::ajax_error(['message' => $modles['message']]);
            }
            CommonClass::ajax_success(['message' => '保存成功']);
        } else {
            $post['pid'] = $post['id'];
            unset($post['id']);
            $modles = menu::new_save($post);
            if (!$modles['code']) {
                CommonClass::ajax_error(['message' => $modles['message']]);
            }
            CommonClass::ajax_success(['message' => '保存成功']);
        }
    }


    /**
     * 修改导航信息
     */
    public function actionUpdatecate()
    {
        $post = Yii::$app->request->post();
        $modles = menu::old_save($post);
        if (!$modles['code']) {
            CommonClass::ajax_error(['message' => $modles['message']]);
        }
        CommonClass::ajax_success(['message' => '保存成功']);

    }


}
