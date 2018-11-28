<?php
namespace tech\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Onearticle;

class OnearticleController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'search' => ['get'],
                    'view' => ['get'],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Onearticle::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSearch($q = '', $p = 1)
    {
        $onearticles = Onearticle::find()
            ->where(['like', 'title', $q])
            ->orWhere(['like', 'content', $q])
            ->limit(100)
            ->all();
        return $this->render('search', [
            'onearticles' => $onearticles,
            'q' => $q,
        ]);
    }

    public function actionView($id)
    {
        if (!$onearticle = Onearticle::findOne($id)) {
            return $this->redirect(['index']);
        }
        return $this->render('view', [
            'onearticle' => $onearticle,
        ]);
    }
}
