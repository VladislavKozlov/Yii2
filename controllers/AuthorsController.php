<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Authors;
use app\models\AuthorsSearch;
use app\models\Books;
use app\models\BooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WritesController implements the CRUD actions for Writes model.
 */
class AuthorsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
		return [
      			'access' => [
        		'class' => AccessControl::className(),
        		'only' => ['*'],
        		'rules' => [
          				[
           					'allow' => true,
            				'roles' => ['@'],
          				],
        		],
				
        		'denyCallback' => function () {
          		
					return Yii::$app->response->redirect(['site/login']);
        		},
      		],
    	];

    }
	
    /**
     * Lists all Authors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Authors model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Authors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Authors();
        $book = new Books();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'book' => $book,
        ]);
    }

    /**
     * Updates an existing Authors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Authors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Writes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Writes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Authors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
