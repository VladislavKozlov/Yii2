<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays admin.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
 
}
