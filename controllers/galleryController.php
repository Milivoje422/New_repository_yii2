<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\GalleryImage;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;

class GalleryController extends Controller
{
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
	public function actionCreate()
	{
		$model = new GalleryImage();
		if ($model->load(Yii::$app->request->post())) {
			if ($model->save())
				return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
//		return $this->render('create');
	}

//	public function actionUpload(){
//		$fileName = 'file';
//		$uploadPath = 'uploads/2017';
//
//		if (isset($_FILES[$fileName])) {
//			$file = \yii\web\UploadedFile::getInstanceByName($fileName);
//
//			//Print file data
//			//print_r($file);
//
//			if ($file->saveAs($uploadPath . '/' . $file->name)) {
//				//Now save file data to database
//
//				echo \yii\helpers\Json::encode($file);
//			}
//		}else{
//			return $this->render('upload');
//		}
//
//		return false;

//	}

	public function actionUpload()
	{
		return $this->render('upload');

	}

	public function actionGupload()
	{
		if(isset($_POST['filename'])){
			return "SUCCESS!";
		}

		return $this->render('_gupload');
	}

}