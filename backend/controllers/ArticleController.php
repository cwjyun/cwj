<?php

namespace backend\controllers;

use backend\common\CommonClass;
use Yii;
use backend\models\menu;
use app\models\aritcle\Aritcle;

/**
 * Site controller
 */
class ArticleController extends BaseController
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
     * 后台首页
     * @return string
     */
    public function actionAdd()
    {
        $model = new aritcle();
        $data = menu::get_one(Yii::$app->request->get('id'));
        if (!$data) {
            die("没有获取到数据");
        }
        return $this->render('add', ['model' => $model, 'data' => $data]);
    }

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix" => "http://admin.test",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径

                ]
            ]
        ];
    }

}
