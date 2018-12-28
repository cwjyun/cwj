<?php

namespace backend\controllers;

use Yii;
use backend\models\menu;
use app\models\aritcle\Aritcle;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\common\CommonClass;
use yii\rest\Action;


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
        parent::actions();
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

    public function actionValidate()
    {
        $model = new aritcle();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }


    public function actionSave()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $params = Yii::$app->request->post();
        $model = new aritcle();
        if (Yii::$app->request->isPost && $model->load($params)) {
            return ['success' => $model->save()];
        } else {
            return ['code' => 'error'];
        }
    }

}
