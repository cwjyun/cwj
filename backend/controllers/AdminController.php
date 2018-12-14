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


    public function actionEditcate()
    {
        return $this->render('edit_cate');
    }

    /**
     * 修改status字段
     */
    public function actionEditstatus()
    {

    }

    /**
     * 添加导航
     */
    public function actionAddcate()
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if (!isset($post['id']) || empty($post['id'])) {
                $module = menu::new_save($post);
            }
            $module = menu::old_save($post);
        }
        return false;
    }

}
