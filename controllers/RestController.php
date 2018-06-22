<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\ContentNegotiator;


class RestController extends Controller
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
