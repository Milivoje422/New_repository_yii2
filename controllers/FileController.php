<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use app\models\Images;
class FileController extends Controller
{


	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
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

	public function actionIndex(){
		$this->layout = "main";
		if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin)
			return $this->render('index');

	}

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findImageModel($id),
		]);
	}


	public function actionUploadimage(){

		$model = new Images();
			if ($model->load(Yii::$app->request->post())) {
				$model->beforeUpload(UploadedFile::getInstance($model, 'file'));
				$model->created_at = date('Y-m-d H:i:s');

				if ($model->save()) {
					$model->upload(UploadedFile::getInstance($model, 'file'));
					if($model->image_group === "SINGLE") {
						return $this->redirect(['view', 'id' => $model->id]);
					}else {
						return $this->redirect(['gallery', 'id' => $model->id,
							'model' => $model]);
					}
				} else {
					var_dump($model->getErrors());
					die();
				}
		} else {
			return $this->render('create_image', [
				'model' => $model,
			]);
		}
	}


	protected function findImageModel($id)
	{
		if (($model = Images::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
