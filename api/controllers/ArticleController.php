<?php
namespace api\controllers;
use yii\rest\ActiveController;
use common\models\Article;
/**

 */
class ArticleController extends ActiveController
{
    
    public $modelClass='\common\models\Article';

    public function init(){
    }
}