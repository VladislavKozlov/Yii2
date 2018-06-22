<?php

//namespace app\controllers;
namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use app\models\Books;
use app\models\BooksSearch;
use app\models\Writers;
use app\models\WritersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\ContentNegotiator;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\web\ForbiddenHttpException;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends ActiveController
{
   public $modelClass = 'app\models\Books';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
		
        $behaviors = parent::behaviors();

        /*$behaviors['access'] = [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                ],
                
                'denyCallback' => function () {
                
                    die("Access is denied!");
                },
        ]; */

         $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
        
    }
 
    /* Declare methods supported by APIs */
    protected function verbs(){
        return [
            'update' => ['POST'],
        ];
    }

	//GET http://localhost/yii2crud/api/v1/books/list +
	//GET http://localhost/yii2crud/api/v1/books/1 + 
	//POST http://localhost/yii2crud/api/v1/books/update/1 +
	//DELETE http://localhost/yii2crud/api/v1/books/1 + 

    public function actionList(){

        $model = new Books();

        return $model->getAll();        
    }

    public function actionUpdate($id){

        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post());
        $model->save();
        
        return $model->findOne($id); 
    }

}
