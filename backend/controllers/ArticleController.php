<?php

namespace backend\controllers;

use app\modules\ajax\controllers\ajax\loginAction;
use Yii;
use backend\models\menu;
use app\models\aritcle\Aritcle;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\common\CommonClass;


/**
 * Site controller
 */
class ArticleController extends BaseController
{


    /**
     * 文章列表
     * @return string
     */
    public function actionIndex()
    {
        //获取导航前段需要处理的导航数据
        $data['nav'] = $this->get_nav_info();
        return $this->render('index', ['data' => $data]);
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

    
    /**
     * 验证文章字段
     * @return array
     */
    public function actionValidate()
    {
        $model = new aritcle();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }


    /**
     * 保存文章
     * @return array
     */
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


    public function get_nav_info()
    {
        $select = ['menu_name as name', 'id', 'pid'];
        return json_encode(CommonClass::key_array(menu::get_name_all($select), 'id', 'pid', 'children'));
    }

}
