<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>
<div class='row'>
	<div class="container">
		<div class='col-sm-12' style="margin-top:25px;">
			<h2><?= Yii::t('app', 'Create Images'); ?></h2>
		</div>
		<div class="images-create">
			<div class="col-sm-6">

				<div class="images-form">
				<?php $form = ActiveForm::begin([
					'id' => $model->formName(),
		//			'beforeSubmit' => true,
		//			'enableAjaxValidation' => true,
				]);
				echo $this->render('_main', [
					'form' => $form,
					'model' => $model
				]);

				ActiveForm::end();
				?>
				</div>
			</div>

		</div>
	</div>
</div>











