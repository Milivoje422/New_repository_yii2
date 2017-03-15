<?php
/**
 * Created by PhpStorm.
 * User: Jarvis
 * Date: 3/2/2017
 * Time: 8:16 PM
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Banners;
use yii\web\NotFoundHttpException;
use dektrium\user\filters\AccessRule;
use app\models\BannersSearch;
class BannerController extends Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'ruleConfig' => [
					'class' => AccessRule::className(),
				],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin'],
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

	public function actionCreate(){

		$model = new Banners();
		if ($model->load(Yii::$app->request->post())) {
			$model->getBanerSize();
			$model->file = UploadedFile::getInstance($model, 'file');
			$model->beforeUpload();
			$model->date_created = date('Y-m-d H:i:s');

			if ($model->save()) {
				$model->upload();

				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				var_dump($model->getErrors());
				die();
			}
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}

	}

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionIndex()
	{
		$searchModel = new BannersSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	protected function findModel($id)
	{
		if (($model = Banners::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

}