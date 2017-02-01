<?php

namespace app\controllers;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\PostTranslation;
use app\models\Images;
use yii\imagine\BaseImage;
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


	public function actionUploadimage($id = NULL){

		$model = new Images();
		if(empty($id)) {
			if ($model->load(Yii::$app->request->post())) {
				$model->beforeUpload(UploadedFile::getInstance($model, 'file'));
				$model->created_at = date('Y-m-d H:i:s');

				if ($model->save()) {
					$model->upload(UploadedFile::getInstance($model, 'file'));

					return $this->redirect(['uploadimage', 'id' => $model->id],
							($model->image_group == "SINGLE" ? '' :
								($model->image_group == "PHOTO_STORY" ? '?gallery_images' :
									($model->image_group == "PHOTO_EVENT_STORY" ? '?image_events' : '')
								)
							)
					);

				} else {
					var_dump($model->getErrors());
					die();
				}
			} else {
				return $this->render('create_image', [
					'model' => $model,
				]);
			}
		}else{
			$model = $this->findModel($id);
			if ($model->load(Yii::$app->request->post())) {
				$model->beforeUpload(UploadedFile::getInstance($model, 'file'));
				$model->updated_ad = date('Y-m-d H:i:s');

				if ($model->save()) {
					$model->upload(UploadedFile::getInstance($model, 'file'));

					return $this->redirect(['image_view', 'id' => $model->id]);
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

	}

}
